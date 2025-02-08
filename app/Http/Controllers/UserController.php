<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('managerUser', User::class);
        $users = User::whereNot('id', Auth()->id())->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('managerUser', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('managerUser', User::class);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'is_admin' => "required",
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageUserName = $request->file('image')->getClientOriginalName() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/users/'), $imageUserName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => intval($request->is_admin),
            'password' => $request->password,
            'image' => $imageUserName
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('managerUser', User::class);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('managerUser', User::class);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $user)
    {
        $this->authorize('managerUser', User::class);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
        ]);

        if ($request->hasFile('image')) {

            $imagePath = public_path('/assets/images/users/' . $user->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $imageUserName = $request->file('image')->getClientOriginalName() . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/users/'), $imageUserName);
        } 
        else {
            $imageUserName = $user->image;
        }
        if ($request->password) {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => intval($request->is_admin),
                'image' => $imageUserName
            ]);
        } 
        else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => intval($request->is_admin),
                'image' => $imageUserName
            ]);
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('managerUser', User::class);
        $imagePath = public_path('/assets/images/users/' . $user->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
