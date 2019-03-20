@extends('layouts.shop.app')

@section('content')
    <div class="single">
        @php
            //dump($product)
        @endphp
        @if(!empty($product))
            <div class="container">
                <div class="single_box1">
                    <div class="col-sm-5 single_left">
                        @if(!empty($product->thumb_img))
                            <a data-fancybox="gallery" href="{{asset($product->preview_img) }}"><img
                                        src="{{asset($product->thumb_img) }}" class="img-responsive" alt=""/></a>
                        @endif
                    </div>
                    <h1>{{ $product->title }}</h1>
                    <div class="col-sm-7 col_6">
                        {{--<ul class="size">
                            <h3>Size</h3>
                            <li><a href="#">S</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">2XL</a></li>
                            <li><a href="#">3XL</a></li>
                        </ul>--}}
                        @if($product->price)
                            {{--<p class="movie_option"><strong>Photo : </strong>{{ $product->id }}</p>--}}
                            @if($product->discount > 0)
                                <p class="movie_option"><strong>Old price : </strong><span
                                            style="text-decoration: line-through;">{{ $product->price }} RUB</span></p>
                                <p class="movie_option"><strong>Price with discount
                                        : </strong>{{ $product->price * ((100 - $product->discount) / 100) }} RUB -
                                    <span style="color: red;">{{ $product->discount }}%</span></p>
                            @else
                                <p class="movie_option"><strong>Price : </strong>{{ $product->price }} RUB</p>
                            @endif
                            <a class="btn_3" href="{{ route('shop.cart.add', $product->slug) }}">Add to cart</a>
                        @endif

                        @if($product->published_at)
                            <p class="movie_option"><strong>Photo : </strong>{{ $product->id }}</p>
                        @endif

                        @if($product->published_at)
                            <p class="movie_option"><strong>Upload Date
                                    : </strong>{{ \Carbon\Carbon::parse($product->published_at )->format('d M Y, H:i') }}
                            </p>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <h4 class="tag_head">Keywords</h4>
                <ul class="tags_links">
                    <li><a href="#">People</a></li>
                    <li><a href="#">City</a></li>
                    <li><a href="#">Walking</a></li>
                    <li><a href="#">Modern</a></li>
                    <li><a href="#">Computer</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Tree</a></li>
                    <li><a href="#">Motion</a></li>
                    <li><a href="#">Gym</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Industrial</a></li>
                    <li><a href="#">Interior</a></li>
                    <li><a href="#">Real Estate</a></li>
                    <li><a href="#">Food</a></li>
                    <li><a href="#">Restaurants</a></li>
                    <li><a href="#">Society</a></li>
                    <li><a href="#">Traveller</a></li>
                    <li><a href="#">Mountain</a></li>
                    <li><a href="#">Sitting</a></li>
                    <li><a href="#">Discovery</a></li>
                    <li><a href="#">Activity</a></li>
                    <li><a href="#">Resting</a></li>
                    <li><a href="#">Blue</a></li>
                    <li><a href="#">France</a></li>
                    <li><a href="#">Architecture</a></li>
                    <li><a href="#">Europe</a></li>
                    <li><a href="#">Building</a></li>
                </ul>
                <div class="tags">
                    <h4 class="tag_head">Similar Images</h4>
                    @if($products)
                        <ul class="tags_images">
                            @foreach($products as $product)
                                <li><a href="{{ route('shop.product', $product->slug) }}"><img
                                                src="{{ asset($product->thumb_img) }}" class="img-responsive"
                                                alt=""/></a>
                                    @endforeach

                        </ul>
                        <div class="clearfix"></div>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection