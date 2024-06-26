@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<div class="container">
    <a href="#" class="container-exit"><i class="fa-solid fa-xmark"></i></a>

    <div class="container-group">
        <a href="#" class="container-group-text_one">Home</a>
        <form class="form" action="/logout" method="post">
            @csrf
            <input class="container-group-logout" type="submit" value="logout">
        </form>
        <a href="/shop_all" class="container-group-text_three">Mypage</a>
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
