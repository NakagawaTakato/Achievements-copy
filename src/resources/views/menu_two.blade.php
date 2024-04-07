@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
<form class="form" action="/logout" method="post">
     @csrf
    <div class="container">
        <a href="#" class="container-exit"><i class="fa-solid fa-xmark"></i></a>

        <div class="container-group">
            <a href="#" class="container-group-text_one">Home</a>
            <a href="http://localhost/" class="container-group-text_two">Logout</a>
            <a href="http://localhost/shop_all" class="container-group-text_three">Mypage</a>
        </div>
    </div>
</form>
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
