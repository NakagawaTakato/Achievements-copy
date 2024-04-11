@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<div class="container">
    <a href="#" class="container-exit"><i class="fa-solid fa-bars"></i></a>
    <p class="container-text">Rese</p>
    
    <div class="container-box">
        <h2>予約状況</h2>
        <div class="container-box-about">
            <form action="/shop_all" method="post">
                @csrf
                <i class="fa-solid fa-check"></i>
                <p class="container-box-about-sub">予約1</p>
                <p class="container-box-about-shop">Shop&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $name ?? 'デフォルト値' }}</p>
                <p class="container-box-about-date">Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $date }}</p>
                <p class="container-box-about-time">time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $time->param ?? 'デフォルト値' }}</p>
                <p class="container-box-about-number">Number&nbsp;&nbsp;&nbsp;&nbsp;{{ $fake->value ?? 'デフォルト値' }}</p>

                @method('DELETE')
                <button type="submit" class="container-box-delete"><i class="fa-solid fa-xmark"></i></button>
            </form>
        </div>
    </div>



    <h1>{{ $name }}</h1>

    <img src="{{ asset($image) }}" alt="" class="container-group-unit-image" />

    <p>#{{ $city }} #{{ $shop }}</p>

    
</div>
@endsection
