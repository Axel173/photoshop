@extends('layouts.shop.app')

@section('content')
    <div class="container">
        <div class="row single_box1">
            <h1>Make order</h1>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate="" method="POST" action="{{ route('shop.order.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input name="first_name" type="text" class="form-control" id="firstName" placeholder=""
                                   value="{{ old('first_name') }}" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input name="last_name" type="text" class="form-control" id="lastName" placeholder=""
                                   value="{{ old('last_name') }}" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input name="user_name" type="text" class="form-control" id="username"
                                   placeholder="Username" value="{{ old('user_name') }}" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Required)</span></label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com"
                               required="" value="{{ old('email') }}">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description">Description <span class="text-muted">(Optional)</span></label>
                        <textarea name="description" type="text" class="form-control" id="description"
                                  placeholder="Some text, about the order">{{ old('description') }}</textarea>
                        <div class="invalid-feedback">
                            This field is optional. You can steel this field empty
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                @if(isset($cart_products) and $cart_products !== false and $cart_products->count() > 0)
                    @php
                        $total_price = 0;
                    @endphp
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{ $cart_products->count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach($cart_products as $key => $product)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><a
                                                href="{{ route('shop.product', $product->slug) }}">{{ $product->title }}</a>
                                    </h6>
                                    <small class="text-muted">{{ $product->description }}</small>
                                </div>
                                <span class="text-muted">
                                    @if($product->discount > 0)
                                        @php $total_price += $product->price * ((100 - $product->discount) / 100) @endphp
                                        {{ $product->price * ((100 - $product->discount) / 100) }} RUB
                                    @else
                                        @php $total_price += $product->price @endphp
                                        {{ $product->price }} RUB
                                    @endif
                                </span>
                            </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (RUB)</span>
                            <strong>{{ $total_price }} RUB</strong>
                        </li>
                    </ul>
                @endif
            </div>
        </div>

    </div>
@endsection