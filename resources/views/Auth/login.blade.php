@extends('layouts.signApp')
@section('title', 'sign in')
@section('content')
<h4 class="mx-5 my-3"> Please Enter your information to sign in :</h4>
    <form action="{{ route('login') }}" method="POST" class="login">
        @csrf 
        <form action="{{ route('login') }}" method="POST" class="m">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary ">sign in</button> 
            <p class="signupstyle">if you haven't an account !! : <a href="{{ route('signup') }}" class="text-primary" >Sign Up</a> </p>
            <div class="message">
                @if ($errors->any())
                {{ implode('', $errors->all(':message')) }}
            @endif
            </div>
            
        </form>
    </form>
@endsection
