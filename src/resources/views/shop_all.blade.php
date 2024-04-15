@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
@csrf
<div class="container">
    <a href="#" class="container-exit"><i class="fa-solid fa-bars"></i></a>
    <p class="container-text">Rese</p>

    <div class="container-group">
        <div class="container-group-bar">
            <form class="container-group-bar" action="/search" method="get">
                <select class="container-group-bar-dropdown" name="area">
                    <option value="" disabled selected hidden>All area</option>
                    <option value="1" @if( request('gender')==1 ) selected @endif>東京都</option>
                    <option value="2" @if( request('gender')==2 ) selected @endif>大阪府</option>
                    <option value="3" @if( request('gender')==3 ) selected @endif>福岡県</option>
                </select>
                <select class="container-group-bar-dropdown" name="category_id">
                    <option value="" disabled selected hidden>All genre</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if( request('category_id')==$category->id )    selected @endif
                      >{{$category->content }}
                    </option>
                    @endforeach
                </select>
                <button class="container-group-bar-input" type="submit" value="検索"><i class="fa-solid fa-magnifying-glass"></i>Search ...</button>
            </form>
        </div>
    </div>
</div>

<div class="wrapper">
  @foreach ($authors as $author)
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
      <form action="/shop_all/shop_detail" method="POST" >
        @csrf
        <input type="hidden" name="name" value="{{$author->name}}">
        <input type="hidden" name="image" value="{{$author->image}}">
        <input type="hidden" name="city" value="{{$author->city}}">
        <input type="hidden" name="shop" value="{{$author->shop}}">
        <input type="hidden" name="group" value="{{$author->group}}">
        <button type="submit" class="wrapper-box-content-cat">詳しくみる</button>
      </form>

      <form action="/my_page" method="POST" >
        @csrf
        <input type="hidden" name="name" value="{{$author->name}}">
        <input type="hidden" name="image" value="{{$author->image}}">
        <input type="hidden" name="city" value="{{$author->city}}">
        <input type="hidden" name="shop" value="{{$author->shop}}">
          <button type="submit" class="wrapper-box-content-heart"><i class="fa-solid fa-heart"></i></button>
      </form>
    </div>
  </div>
  @endforeach
  <div class="wrapper-bottom"></div>
</div>
@endsection


