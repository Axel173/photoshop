@extends('layouts.shop.app')

@section('content')
    <div class="single">
        <div class="container">
            <div class="single_box1">
                <div class="col-sm-5 single_left">
                    <img src="{{asset('images/single.jpg') }}" class="img-responsive" alt=""/>
                </div>
                <div class="col-sm-7 col_6">
                    <ul class="size">
                        <h3>Size</h3>
                        <li><a href="#">S</a></li>
                        <li><a href="#">M</a></li>
                        <li><a href="#">L</a></li>
                        <li><a href="#">XL</a></li>
                        <li><a href="#">2XL</a></li>
                        <li><a href="#">3XL</a></li>
                    </ul>
                    <a class="btn_3" href="price.html">Download this Photo</a>
                    <p class="movie_option"><strong>Photo : </strong>5487695478</p>
                    <p class="movie_option"><strong>Upload Date : </strong>July 02, 2015</p>
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
                <ul class="tags_images">
                    <li><a href="#"><img src="{{asset('images/pic40.jpg') }}" class="img-responsive" alt=""/></a></li>
                    <li><a href="#"><img src="{{asset('images/pic41.jpg') }}" class="img-responsive" alt=""/></a></li>
                    <li><a href="#"><img src="{{asset('images/pic42.jpg') }}" class="img-responsive" alt=""/></a></li>
                    <li><a href="#"><img src="{{asset('images/pic43.jpg') }}" class="img-responsive" alt=""/></a></li>
                    <li class="last"><a href="#"><img src="{{asset('images/pic39.jpg') }}" class="img-responsive" alt=""/></a></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
        </div>
    </div>
@endsection