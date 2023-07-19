@extends('front.include.layout')

@section('title', ' المنتجات')

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
                        <li class="breadcrumb-item active" aria-current="page">المنتجات</li>
                    </ol>
                </nav>
            </div>
            <div class="page-header__title">
                <h1>المنتجات</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__options">

                        </div>
                        <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false" data-mobile-grid-columns="2">
                            <div class="products-list__body">

                                @forelse ($products as $product )
                                <div class="products-list__item">
                                    <div class="product-card product-card--hidden-actions ">
                                        <div class="product-card__image product-image">
                                            <a href="{{ route('NoMe.productpage', $product->product_name) }}" class="product-image__body">

                                                @if ($product->out_of_stock == 1)
                                                <img src="{{ asset('image/sold-out.jpg') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                >
                                                @elseif($product->status_offer == 1)
                                                <img src="{{ asset('image/offer.png') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                >
                                            @endif
                                                <img class="product-image__img" src="{{ asset('upload/admin/product/'. $product->primary_image) }}" alt="" >

                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="{{ route('NoMe.productpage', $product->product_name) }}">{{ $product->product_name }}</a>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__prices">
                                                                {{ $product->price }}₪
                                                                {{-- <s style="margin-right: 10px">{{ $product->offer->old_price }}₪</s> --}}

                                                            </div>
                                            <div class="product-card__buttons">
                                                <a class="btn btn-primary product-card__addtocart" href="{{ route('NoMe.productpage', $product->product_name) }}">الذهاب للمنتج</a>

                                                <meta name="csrf-token" content="jPltwjuQpZppawltECo6QtvdVdcKFU6icjO2aj3I">

                                                <button id="but-wishlist[16745]" onclick="return setWishlist(16745);" class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist
                                                    " type="button">
                                                    <svg width="16px" height="16px" id="svg-wishlist[16745]" style="">&gt;
                                                        <use xlink:href="https://waslastore.ps//website/images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div>لا يوجد منتجات لعرضها</div>
                                @endforelse

</div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

