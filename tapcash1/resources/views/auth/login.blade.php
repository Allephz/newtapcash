
@extends('layouts.app')
@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    body {
        min-height: 100vh;
        width: 100vw;
        background: url('/login-bg.png') no-repeat center center fixed;
        background-size: cover;
        overflow: hidden;
    }
    .login-card {
        background: rgba(255,255,255,0.95);
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(44,62,80,0.2);
        min-width: 350px;
        padding: 2rem 2.5rem;
    }
</style>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="login-card">
        <h3 class="mb-4 text-center">Login Tapcash</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection
