<div class="col-md-2 stock_left">
</div>
<div class="col-md-10 sap_tabs">
    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
        @if (!empty($categories))
            <ul class="resp-tabs-list">
                <li class="resp-tab-item {{ (!Route::current()->parameter("category_slug")) ? 'resp-tab-active' : '' }}"
                    aria-controls="tab_item-0" role="tab">
                    <a class="ajax" href="{{ route('shop.category') }}"><span>Все</span></a>
                </li>
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
                        <a class="ajax" href="{{ route('shop.category', $category->slug) }}"><span>{{ $category->title }}</span></a>
                    </li>
                @endforeach
                <div class="clearfix"></div>
            </ul>
        @else
            Тут сейчас пусто
        @endif
        <div class="resp-tabs-container">
            <div class="tab-2 resp-tab-content-active" aria-labelledby="tab_item-{{ $category_id }}">
                @if($products)
                    <ul class="tab_img">
                        @foreach($products as $product)
                            <li><a href="{{ route('shop.product', $product->slug) }}">
                                    <img src="{{ asset($product->thumb_img) }}" class="img-responsive" alt=""/>
                                    <div class="tab_desc">
                                        <p>{{ $product->title }} #{{ $product->id }}</p>
                                        <h4> @if($product->price)
                                                @if($product->discount > 0)
                                                    {{ $product->price * ((100 - $product->discount) / 100) }} RUB -
                                                    <span style="color: red;">{{ $product->discount }}%</span>
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
        </div>
    </div>
    @if($products->total() > $products->count())
        <br>
        <ul class="pagination">
            {{ $products->links() }}
        </ul>
    @endif
</div>
<div class="clearfix"></div>