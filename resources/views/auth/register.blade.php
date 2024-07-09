@extends('layouts.app')

@section('content')
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .invalid-feedback{
        display: block !important;
    }

    body {
        font-family: Arial, sans-serif;
        /* display: flex; */
        background: linear-gradient(to right, #ff7e5f, #03c03c);
    }

    .login-container {
        margin: auto;
        background: linear-gradient(to right, #43cea2, #185a9d);
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 50%;
    }

    h2 {
        margin-bottom: 1.5rem;
        color: #000000;
        text-align: center;
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .input-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #000000;
        font-family: Arial, Helvetica, sans-serif;
    }

    .input-group input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        width: 100%;
        padding: 0.75rem;
        border: none;
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
        text-align: center;
        margin-top: 1rem;
        display: none;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .login-container {
            padding: 1.5rem;
        }
    }
</style>
<br><br><br><br>
<div class="login-container">
    <form method="POST" action="{{ route('register') }}" id="loginForm">
        @csrf
        <h2>Register</h2>
        <div class="input-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" required autocomplete="current-password">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- <input type="password" id="password" name="password" required /> -->
        </div>
        <div class="input-group">
            <label for="username">Email</label>
            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- <input type="email" id="username" name="username" required /> -->
        </div>

        <div class="input-group">
            <label for="username">Password</label>
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group">
            <label for="username">Confirm Password</label>
            <input id="password_confirmation" type="password" class=" @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password" autofocus>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
       
        <div class="input-group">
         Already Have an Account? Please<a href="login"> &nbsp;Login!</a>
        </div>
        <button type="submit">Register</button>
        <p id="errorMessage" class="error-message"></p>
    </form>
</div>
<br>
@endsection