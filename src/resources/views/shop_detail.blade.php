@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<div class="container">
    <div class="container-group">
        <a href="#" class="container-group-exit"><i class="fa-solid fa-bars"></i></a>
        <p class="container-group-text">Rese</p>

        <div class="container-group-unit">
            <form action="/my_page" method="POST" >
                <button type="submit" class=""><i class="fa-solid fa-less-than"></i></button>
            </form>

            <div class="container-group-unit-title">
                <h1>{{ $name }}</h1>
            </div>

            <img src="{{ asset($image) }}" alt="" class="container-group-unit-image" />
            <p>#{{ $city }} #{{ $shop }}</p>

            </br>
            <p>{!! nl2br(e($group)) !!}</p>
        </div>
    </div>

    <div class="container-box">
        <h1 class="container-box-text">予約</h1>
        
        <form action="/done" method="post">
            @csrf
            <div class="reservation-card__content">
                <h2 class="reservation-card__content__ttl">予約</h2>
                @if (count($errors) > 0)
                <ul class="error__lists">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
                @endif
                <input type="hidden" name="shop_id" value="{!! $shop->id !!}">
                <input class="reservation-card__date-input" type="date" value="{!! $today !!}" name="date" />
                <div class="reservation-card__pull-down">
                <select name="time">
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                </select>
                </div>
                <div class="reservation-card__pull-down">
                <select name="user_num">
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <option value="3">3人</option>
                    <option value="4">4人</option>
                </select>
                </div>
            </div>
            <input type="hidden" name="shop_id" value="{!! $shop->id !!}">
            <input type="submit" class="reservation-btn" value="予約する">
        </form>

    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var closeButton = document.querySelector('.container-exit');
    var containerGroup = document.querySelector('.container-group');


    closeButton.addEventListener('click', function(event) {
        event.preventDefault();
        containerGroup.style.display = 'none';
    });


});
</script>
@endsection
