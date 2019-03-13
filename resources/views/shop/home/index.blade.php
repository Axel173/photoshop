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
                                <input type="text" name="query" id="search_text" placeholder="Search"/>
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
    <div class="grid_1">
        <h3>Over 42 Million Stock Images, Vectors, Footage and Audio Clips</h3>
        @if(!empty($categoriesWithProducts))
            @foreach($categoriesWithProducts as $categoryWithProducts)
                @php /** @var \App\Models\ShopCategory $categoryWithProducts*/ @endphp
                @if(!$categoryWithProducts->is_published)
                    <div class="col-md-2 col_1">
                        <a href="{{ route('shop.category', $categoryWithProducts->slug) }}">
                            <h4>{{ $categoryWithProducts->title }}</h4></a>
                    </div>
                    @php $iter = 1 @endphp
                    @foreach($categoryWithProducts->products as $product)

                        <div class="col-md-2 col_1">
                            <a href="{{ route('shop.product', $product->slug) }}"><img
                                        src="{{asset($product->thumb_img)}}" class="img-responsive" alt=""/></a>
                        </div>
                        @php $iter++ @endphp
                        @if($iter > 5 )
                            @break
                        @endif
                    @endforeach
                @endif
                <div class="clearfix"></div>
            @endforeach
        @else
            Тут ничего нет, пока что
        @endif
    </div>
@endsection
