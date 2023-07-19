@extends('front.include.layout')

@section('title', ' التواصل')

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
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="document">
                    <div class="document__header">
                        <h1 class="document__title">تواصل معنا</h1>
                    </div>
                    <div class="document__content typography">
                        <div class="col-12">
                            <h4 class="contact-us__header card-title">تواصل معنا</h4>
                            <form action="{{route('NoMe.send-email')}}" method="post">
                                @csrf
                                <input type="hidden">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="form-name">الاسم</label>
                                        <input type="text" id="form-name" class="form-control" placeholder="الاسم" name="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form-email">رقم الجوال</label>
                                        <input type="text" id="form-email" name='email' class="form-control" placeholder="رقم الجوال">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="form-subject">العنوان</label>
                                    <input type="text" id="form-subject" class="form-control" placeholder="العنوان" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="form-message">الرسالة</label>
                                    <textarea id="form-message"  class="form-control" rows="4" name="content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">ارسال رسالة</button>
                            </form>
                        </div>
                        <div class="col-12">
                            <img src="{{ asset('front/css/image/nome_contact.jpeg') }}" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
