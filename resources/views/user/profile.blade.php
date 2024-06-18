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

    .profile-img {
        margin-bottom: 1.5rem;
        height: 120px !important;
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
    <form method="POST" action="{{ route('profile-update') }}" id="loginForm">
        @csrf
        <div style="text-align: center;">
        <img class="profile-img" src= "https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" height="120px" alt="hjh">
        </div>
        <div class="input-group">
            <label for="username">Name</label>
            <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{$auth_user->name}}" required autocomplete="email" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- <input type="email" id="username" name="username" required /> -->
        </div>
         
        <div class="input-group">
            <label for="password">First Name</label>
            <input id="first_name" type="text" class="@error('first_name') is-invalid @enderror" name="first_name" required autocomplete="current-password">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- <input type="password" id="password" name="password" required /> -->
        </div>
        
        <button type="submit">Update</button>
        <p id="errorMessage" class="error-message"></p>
    </form>
</div>
<br>
@endsection