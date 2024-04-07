@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<form class="form" action="/login/menu_two" method="post">
    @csrf
    <div class="container">
        <a href="#" class="container-exit"><i class="fa-solid fa-bars"></i></a>
        <p class="container-text">Rese</p>


        <div class="container-group">
            <div class="container-group-title">Login</div>
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" class="container-group-text_one" value="{{ old('email') }}" />
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <br/>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Password" class="container-group-text_two" />
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </div>
    </div>
</form>
@endsection
