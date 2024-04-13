@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<div class="container">
    <a href="#" class="container-exit"><i class="fa-solid fa-bars"></i></a>
    <p class="container-text">Rese</p>
    
    <div class="flex between mypage">
    <div class="status">
        <h3 class="status__ttl">予約状況</h3>
        @foreach ($user->reservations as $reservation)
        <div class="status__card">
        <div class="flex align-items-center between status__card__top">
            <img src="/img/time.png" alt="time-icon" width="25px" height="25px" />
            <p>予約{{ $reservation->pivot->id }}</p>
            <form class="ml-a" action="{{ route('reserve.delete', ['reservation_id' => $reservation->pivot->id]) }}" method="POST">
            @csrf
            <input class="cancel" type="image" src="/img/cross.png" alt="送信する" width="25px" height="25px" onclick='return confirm("予約を取り消しますか？");'>
            </form>
        </div>
        <table class="status__card__bottom">
            <tr>
            <td>Shop</td>
            <td>{{$reservation->name}}</td>
            </tr>
            <tr>
            <td>Date</td>
            <td>{{$reservation->pivot->date}}</td>
            </tr>
            <tr>
            <td>Time</td>
            <td>{{$reservation->pivot->time}}</td>
            </tr>
            <tr>
            <td>Number</td>
            <td>{{$reservation->pivot->user_num}}人</td>
            </tr>
        </table>
        </div>
        @endforeach
    </div>

    
</div>
@endsection
