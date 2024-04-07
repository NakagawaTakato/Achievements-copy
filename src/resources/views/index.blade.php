@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <a href="#" class="container-exit">×</a>
    <div class="container-group">
        <a href="#" class="container-group-text_one">Home</a>
        <a href="/register" class="container-group-text_two">Registration</a>
        <a href="/login" class="container-group-text_three">Login</a>
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
