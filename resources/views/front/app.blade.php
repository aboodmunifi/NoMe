@extends('front.include.layout')

@section('title', ' حمل التطبيقات')

@section('content')

<div class="site__body">
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('NoMe.home')}}">الرئيسية</a>
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="https://waslastore.ps//website/images/sprite.svg#arrow-rounded-right-6x9">
                                </use>
                            </svg>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> حمل التطبيقات</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="block">
    <div class="container">
        <div class="row">
            <div class="container text-center">
                <br><br>
                <h3 class="section-title mt-0 mb-40">حمل التطبيقات</h3>
<br>
<div class="cta-cta mb-48">


    <a class="button button-badges button-wide-mobile mb-8" href="https://google.com" target="_blank">
    <img src="{{ asset('image/apple.png') }}" style="height:100px;width:250px " />


    </a>

    <a class="button button-badges button-wide-mobile mb-8" href="https://google.com" target="_blank">
        <img src="{{ asset('image/android.png') }}" style="height:100px;width:250px " />


        </a>



</div>
            </div>
            </div>
<br>
                <img src="{{ asset('image/appphone1.jpeg') }}" style="width: 70%;margin-right: 15%;"  />
<br>

            </div>
        </div>
    </div>
</div>
@endsection


