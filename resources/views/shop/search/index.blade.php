@extends('layouts.shop.app')

@section('content')
    <div class="banner">
        <div class="container">
            <div class="span_1_of_1">
                <h2>Photos, illustrations by<br> Creatives all over the world.</h2>
                <div class="search">
                    <ul class="nav1">
                        <li id="search">
                            <form action="{{ route('shop.search') }}" method="get">
                                <input type="text" name="query" id="search_text" placeholder="Search" value="{{ $query }}"/>
                                <button id="search_button"></button>
                            </form>
                        </li>
                        <li id="options">
                            <a href="#" data-category="">All Categories</a>
                            @if (!empty($categories))
                                <ul class="subnav">
                                    @foreach($categories as $category)
                                        <li><a data-category="{{ $category->slug }}">{{ $category->title }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="stock_box">
        <div class="col-md-2 stock_left">

        </div>
        <div class="col-md-10 sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">

                <ul class="resp-tabs-list">
                    <li class="resp-tab-itemresp-tab-active"
                        aria-controls="tab_item-0" role="tab">
                        <a href=""><span>Поиск</span></a>
                    </li>

                    <div class="clearfix"></div>
                </ul>

                <div class="resp-tabs-container">
                    @php
                        //dump(session('query'));
                    @endphp
                    <div class="tab-2 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0">
                        @if(isset($products) and $products !== null and $products->total())
                            <ul class="tab_img">
                                @foreach($products as $product)
                                    <li><a href="{{ route('shop.product', $product->slug) }}">
                                            <img src="{{ asset($product->thumb_img) }}" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                <p>{{ $product->title }} #{{ $product->id }}</p>
                                                <h4> @if($product->price)
                                                        {{--<p class="movie_option"><strong>Photo : </strong>{{ $product->id }}</p>--}}
                                                        @if($product->discount > 0)
                                                            {{ $product->price * ((100 - $product->discount) / 100) }}
                                                            RUB - <span
                                                                    style="color: red;">{{ $product->discount }}%</span>
                                                        @else
                                                            {{ $product->price }} RUB
                                                        @endif
                                                    @endif</h4>
                                            </div>
                                        </a></li>
                                @endforeach

                                @elseif($products === null)
                                    Введите запрос в строку поиска
                                @else
                                    Ничего не найдено
                                @endif
                                <div class="clearfix"></div>
                            </ul>
                    </div>
                </div>
            </div>
            @if(isset($products) and $products !== null and $products->total())
                @if($products->total() > $products->count())
                    <br>
                    <ul class="pagination">
                        {{ $products->links() }}
                    </ul>
                @endif
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
@endsection