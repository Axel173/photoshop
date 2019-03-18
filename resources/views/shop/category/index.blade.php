@extends('layouts.shop.app')

@section('content')
    <div class="stock_box">
        <div class="col-md-2 stock_left">
            {{--<div class="w_sidebar">
                <section class="sky-form">
                    <h4>Collections</h4>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All
                            images</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Standard</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Following</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Lorem Ipsum</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Injected humour</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Default model </label>
                    </div>
                </section>
                <section class="sky-form">
                    <h4>Freshness</h4>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Any
                            time</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past 3 months</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past month</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past week</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Past 3 days</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Any time</label>
                    </div>
                </section>
                <section class="sky-form">
                    <h4>colour</h4>
                    <ul class="w_nav2">
                        <li><a class="color1" href="#"></a></li>
                        <li><a class="color2" href="#"></a></li>
                        <li><a class="color3" href="#"></a></li>
                        <li><a class="color4" href="#"></a></li>
                        <li><a class="color5" href="#"></a></li>
                        <li><a class="color6" href="#"></a></li>
                        <li><a class="color7" href="#"></a></li>
                        <li><a class="color8" href="#"></a></li>
                        <li><a class="color9" href="#"></a></li>
                        <li><a class="color10" href="#"></a></li>
                        <li><a class="color12" href="#"></a></li>
                        <li><a class="color13" href="#"></a></li>
                        <li><a class="color14" href="#"></a></li>
                        <li><a class="color15" href="#"></a></li>
                        <li><a class="color5" href="#"></a></li>
                        <li><a class="color6" href="#"></a></li>
                        <li><a class="color7" href="#"></a></li>
                        <li><a class="color8" href="#"></a></li>
                        <li><a class="color9" href="#"></a></li>
                        <li><a class="color10" href="#"></a></li>
                    </ul>
                </section>
                <section class="sky-form">
                    <h4>discount</h4>
                    <div class="col col-4">
                        <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                    </div>
                    <div class="col col-4">
                        <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                        <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                    </div>
                </section>
            </div>--}}
        </div>
        <div class="col-md-10 sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                @if (!empty($categories))
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item {{ (!Route::current()->parameter("category_slug")) ? 'resp-tab-active' : '' }}"
                            aria-controls="tab_item-0" role="tab">
                            <a href="{{ route('shop.category') }}"><span>Все</span></a>
                        </li>
                        {{--<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>What's Hot</span></li>--}}
                        @php
                            $category_id = 0;
                            $class = '';
                        @endphp
                        @foreach($categories as $category)
                            @php
                                    if(Route::current()->parameter("category_slug") ===  $category->slug){
                                        $category_id = $category->id;
                                        $class = 'resp-tab-active';
                                    }
                            @endphp
                            <li class="resp-tab-item {{ (Route::current()->parameter("category_slug") ===  $category->slug) ? 'resp-tab-active' : '' }}"
                                aria-controls="tab_item-{{ $category->id }}" role="tab">
                                <a href="{{ route('shop.category', $category->slug) }}"><span>{{ $category->title }}</span></a>
                            </li>
                        @endforeach
                        <div class="clearfix"></div>
                    </ul>
                @else
                    Тут сейчас пусто
                @endif
                {{--<ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>What's Hot</span></li>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Designers</span></li>
                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Featured</span></li>
                    <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>Featured</span></li>
                    <div class="clearfix"></div>
                </ul>--}}
                <div class="resp-tabs-container">
                    @php
                        //dump($products);
                    @endphp
                    <div class="tab-2 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-{{ $category_id }}">
                        @if($products)
                            <ul class="tab_img">
                                @foreach($products as $product)
                                    <li><a href="{{ route('shop.product', $product->slug) }}">
                                            <img src="{{ asset($product->thumb_img) }}" class="img-responsive" alt=""/>
                                            <div class="tab_desc">
                                                <p>{{ $product->title }} #{{ $product->id }}</p>
                                                <h4> @if($product->price)
                                                        {{--<p class="movie_option"><strong>Photo : </strong>{{ $product->id }}</p>--}}
                                                        @if($product->discount > 0)
                                                            {{ $product->price * ((100 - $product->discount) / 100) }} RUB - <span style="color: red;">{{ $product->discount }}%</span>
                                                        @else
                                                            {{ $product->price }} RUB
                                                        @endif
                                                    @endif</h4>
                                            </div>
                                        </a></li>
                                @endforeach
                            </ul>
                                @endif
                                <div class="clearfix"></div>

                    </div>
                    {{--<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                        <ul class="tab_img">
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic30.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic31.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic32.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic33.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic34.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic35.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic36.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic37.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic38.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic39.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic10.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic11.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic12.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic13.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic14.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic15.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic16.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic17.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic18.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic19.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic20.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic21.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic22.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic23.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic24.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic25.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic26.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic27.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic28.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic29.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                        <ul class="tab_img">
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic40.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic2.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic3.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic4.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic5.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic6.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic6.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic7.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic8.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic9.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic10.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic11.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic12.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic13.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic14.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic15.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic16.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic17.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic18.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic19.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic41.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic21.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic22.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic23.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic24.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic25.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic26.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic27.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic28.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic29.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                        <ul class="tab_img">
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic1.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic2.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic42.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic4.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic5.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic6.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic6.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic7.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic8.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic9.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic10.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic43.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic12.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic13.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic14.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic15.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic16.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic17.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic18.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic19.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic20.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic21.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic22.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic23.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic24.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic25.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic26.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic27.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li><a href="single.html">
                                    <img src="{{ asset('images/pic28.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <li class="last"><a href="single.html">
                                    <img src="{{ asset('images/pic29.jpg') }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>There are many variations</p>
                                        <h4>#25478921</h4>
                                    </div>
                                </a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>--}}
                </div>
            </div>
            @if($products->total() > $products->count())
                <br>
                <ul class="pagination">
                    {{ $products->links() }}
                </ul>

            @endif
            {{--<ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>--}}
        </div>
        <div class="clearfix"></div>
    </div>
@endsection