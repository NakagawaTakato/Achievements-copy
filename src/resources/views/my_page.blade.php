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
        @foreach($categories as $category)
        <div class="container-box-about">
            <form action="{{ route('deleteMethod', ['author_id' => $author->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <i class="fa-solid fa-check"></i>
                <p class="container-box-about-date">{{ $category->date }}</p>
                <p class="container-box-about-param">{{ $category->wrapper->param }}</p>
                <p class="container-box-about-value">{{ $category->number->value }}</p>
                <button type="submit" class="container-box-delete"><i class="fa-solid fa-xmark"></i></button>
            </form>
        </div>
        @endforeach
    </div>

    @foreach ($authors as $author)
        @if($author->is_correct == 1)
        <div class="wrapper-box" id="{{$author->id}}">
            <div class="wrapper-box-img">
                <img src="{{ $author->image }}" alt="" />
            </div>
            <div class="wrapper-box-content">
                <h2 class="wrapper-box-content-ttl">
                {{$author->name}}
                </h2>
                <p class="wrapper-box-content-text">
                @if($author->gender == 1)
                #東京都
                @elseif($author->gender == 2)
                #大阪府
                @else
                #福岡県
                @endif
                </p>
                <p class="wrapper-box-content-text-categories">
                #{{$author->category->content}}
                </p>

                <form action="/shop_all" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="wrapper-box-content-heart"><i class="fa-solid fa-heart"></i></button>
                </form>
            </div>
        </div>
        @endif
    @endforeach
    
</div>
@endsection
