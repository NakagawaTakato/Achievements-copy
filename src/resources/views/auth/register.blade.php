@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<form class="form" action="/register/thanks" method="post">
    @csrf
    <div class="container">
        <a href="#" class="container-exit"><i class="fa-solid fa-bars"></i></a>
        <p class="container-text">Rese</p>


        <div class="container-group">
            <div class="container-group-title">Registration</div>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" placeholder="Username" class="container-group-text_one" value="{{ old('name') }}" />
            <div class="form__error">
                @error('username')
                {{ $message }}
                @enderror
            </div>
            <br/>
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" class="container-group-text_two" value="{{ old('email') }}" />
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <br/>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Password" class="container-group-text_three" />
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <br/>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password_confirmation" placeholder="確認用" class="container-group-text_three" />
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </div>

    </div>
</form>
@endsection
