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
        
        <form action="/shop_all/shop_detail/shop_detail_two" method="post">
            @csrf
            <input type="date" name="date" class="container-box-date" required value="{{ old('date') }}">

            <div class="container-box-time">{{ $displays->param }}</div>
            <input type="hidden" name="wrapper_id" value="{{ $wrappers['wrapper_id'] }}">
            <!-- <select class="container-box-time" name="time">
                <option value="time" disabled selected hidden>時間を選択</option>
                @foreach($wrappers as $wrapper)
                    <option value="{{ $wrapper->id }}" {{ old('time') == $wrapper->id ? 'selected' : '' }}>{{$wrapper->param}}</option>
                @endforeach
            </select> -->
            <select class="container-box-number" name="number">
                <option value="number" disabled selected hidden>人数</option>
                @foreach($numbers as $number)
                    <option value="{{ $number->id }}" {{ old('fake') == $number->id ? 'selected' : '' }}>{{$number->value}}</option>
                @endforeach
            </select>

            <input type="hidden" name="name" value="{{$name}}">
            <input type="hidden" name="city" value="{{$city}}">
            <input type="hidden" name="shop" value="{{$shop}}">
            <input type="hidden" name="image" value="{{$image}}">
            <input type="hidden" name="shop" value="{{$shop}}">
            <input type="hidden" name="group" value="{{$group}}">

            <button class="container-box-button" type="submit">予約する</button>
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
