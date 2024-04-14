@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@endsection

@section('content')
@csrf
<div class="flex align-items-center">
	<div id="hamburger" class="header__hamburger">
		<span></span>
		<span></span>
		<span></span>
	</div>
	<h1 class="header__ttl">Rese</h1>
</div>

<header>
  <div class="header align-items-center flex">
    <x-hamburger-menu />
    @if(request()->path() == '/' || request()->path() == 'search')
      <x-search />
    @endif
  </div>
  @if (session('fs_msg'))
    <div class="flash_message">
      {{ session('fs_msg') }}
    </div>
  @endif

  <x-drowmenu />
</header>

<div class="search">
	<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
	<form class="flex" action="/search" method="GET">
		@csrf
		<div class="search__pull-down">
			<select name="area">
				<option value="">All area</option>
				@foreach($areas as $area)
					@if (!empty($area_name))
						@if ($area->name === $area_name)
							<option value="{!! $area->name !!}" selected>
								{{$area->name}}
							</option>
						@else
							<option value="{!! $area->name !!}">
								{{$area->name}}
							</option>
						@endif
					@else
						<option value="{!! $area->name !!}">
							{{$area->name}}
						</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="search__pull-down">
			<select name="genre">
				<option value="">All genre</option>
				@foreach($genres as $genre)
					@if (!empty($genre_name))
						@if ($genre->name === $genre_name)
							<option value="{!! $genre->name !!}" selected>
								{{$genre->name}}
							</option>
						@else
							<option value="{!! $genre->name !!}">
								{{$genre->name}}
							</option>
						@endif
					@else
						<option value="{!! $genre->name !!}">
							{{$genre->name}}
						</option>
					@endif
				@endforeach
			</select>
		</div>
		<input class="search__keyword" type="text" placeholder="Search ..." value="{!! $keyword ?? '' !!}" name="keyword" />
		<input type="submit" class="search__btn" value="検索" />
	</form>
</div>

<div class="main">
  <div class="flex wrap shops">
    @foreach($shops as $shop)
    <div class="shop-card">
      <img class="shop-card__img" src="{!! $shop->image_url !!}" alt="shop-img" />
      <div class="shop-card__content">
        <h2 class="shop-card__content__ttl">{{$shop->name}}</h2>
        <p class="shop-card__content__txt">
          #{{$shop->area->name}}&nbsp;#{{$shop->genre->name}}
        </p>
        <div class="flex align-items-center">
          <a class="shop-card__content__link" href="{!! '/detail/' . $shop->id !!}">
            詳しくみる
          </a>
          <!-- @if( Auth::check() ) -->
            @if(count($shop->likes) == 0)
            <form class="ml-a" method="POST" action="{{ route('like', ['shop_id' => $shop->id]) }}">
              @csrf
              <input class="shop-card__content__icon inactive" type="image" src="/img/unlike.png" alt="いいね" width="32px" height="32px">
            </form>
            @else
            <form class="ml-a" method="POST" action="{{ route('unlike', ['shop_id' => $shop->id]) }}">
              @csrf
              <input class="shop-card__content__icon inactive" type="image" src="/img/like.png" alt="いいねを外す" width="32px" height="32px">
            </form>
            @endif
          <!-- @endif -->
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection


