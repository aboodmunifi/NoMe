@extends('front.include.layout')
@section('title', 'الصفحة الرئيسية')

@section('content')

    <div class="site__body">
        <!-- .block-slideshow -->
    <div class="block-slideshow block-slideshow--layout--with-departments block">
        <div class="container">
            <div class="row">

            <div class="col-lg-3 d-none d-lg-block"></div>
                <div class="col-12 col-lg-9">
                    <div class="block-slideshow__body">
                        <div class="owl-carousel owl-rtl owl-loaded owl-drag">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner product-image">
                @foreach ($sliders as $slider)
                <div class="carousel-item {{ ($loop->iteration == 1) ?  'active' : '' }} cloned" ><a class="block-slideshow__slide" href="">
                    {{-- <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url({{ asset('upload/admin/slider/'. $slider->image_src) }})">
                    </div>
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url({{ asset('upload/admin/slider/'. $slider->image_src) }})">
                    </div> --}}

                    <img class="product-image__img block-slideshow__slide-image block-slideshow__slide-image--desktop"  src="{{ asset('upload/admin/slider/'. $slider->image_src) }}" alt="">
                    <img class="product-image__img block-slideshow__slide-image block-slideshow__slide-image--mobile" src="{{ asset('upload/admin/slider/'. $slider->image_src) }}" alt="">

                </a></div>
                @endforeach





                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"style="
background-color: #b61f76;
"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="
background-color: #b61f76;
"></span>
                    <span class="sr-only">Next</span>
                    </a>
            </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>    <!-- .block-slideshow / end -->

        <!-- .block-features -->
    <div class="block block-features block-features--layout--classic">
        <div class="container">
            <div class="block-features__list">
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <img src="{{asset('image/perfect.jpg')}}" width="48px" height="48px"  />
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title"> أجود الأحذية</div>
                        <div class="block-features__subtitle"> لجميع المقاسات</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <img src="{{asset('image/support.jpg')}}" width="48px" height="48px"  />
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">دعم 24/24</div>
                        <div class="block-features__subtitle">اتصل بنا في أي وقت</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <img src="{{asset('image/payment-method.png')}}" width="48px" height="48px"  />
                        <!--<svg width="48px" height="48px">-->
                        <!--    <use xlink:href="https://waslastore.ps//website/images/sprite.svg#fi-payment-security-48"></use>-->
                        <!--</svg>-->
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title"> الدفع</div>
                        <div class="block-features__subtitle"> عند الاستلام</div>
                    </div>
                </div>
                <div class="block-features__divider"></div>
                <div class="block-features__item">
                    <div class="block-features__icon">
                        <img src="{{asset('image/products.jpg')}}" width="48px" height="48px"  />
                    </div>
                    <div class="block-features__content">
                        <div class="block-features__title">أكثر من 10000</div>
                        <div class="block-features__subtitle">منتج بين يديك</div>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .block-features / end -->

        <!-- .block-products-carousel -->
        <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title"> العروض</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fa fa-arrow-left" width="7px" height="11px"></i>

                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">

                                <i class="fa fa-arrow-right" width="7px" height="11px"></i>

                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel owl-rtl owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(1122px, 0px, 0px); transition: all 0s ease 0s; width: 3649px; padding-left: 1px; padding-right: 1px;">

                                @foreach ($offerProducts as $offerProduct)
                                <div class="owl-item cloned" style="width: 266.5px; margin-left: 14px;">
                                    <div class="block-products-carousel__column" data-category="">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--hidden-actions ">
                                                <div class="product-card__image product-image">
                                                    <a href="{{ route('NoMe.productpage', $offerProduct->product_name) }}" class="product-image__body">
                                                        @if ($offerProduct->out_of_stock == 1)

                                                            <img src="{{ asset('image/sold-out.jpg') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                            >
                                                            @else
                                                            <img src="{{ asset('image/offer.png') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                            >
                                                        @endif
                                                        <img class="product-image__img" alt="" src="{{ asset('upload/admin/product/'. $offerProduct->primary_image) }}">
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="{{ route('NoMe.productpage', $offerProduct->product_name) }}">{{ $offerProduct->product_name }}</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__prices" >
                                                                                                            {{ $offerProduct->price }}₪
                                                                                                            <s style="margin-right: 10px">{{ $offerProduct->offer->old_price }}₪</s>
                                                                                                    </div>
                                                    <div class="product-card__buttons">
                                                        <a class="btn btn-primary product-card__addtocart" href="{{ route('NoMe.productpage', $offerProduct->product_name) }}">الذهاب للمنتج</a>
                                                        <meta name="csrf-token" content="jPltwjuQpZppawltECo6QtvdVdcKFU6icjO2aj3I">
                                                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">الذهاب للمنتج
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div></div>
                                @endforeach


                            </div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled" style="margin-bottom=266.5px"></div></div>
                </div>
            </div>
        </div>
        <!-- .block-products-carousel / end -->
        <!-- .block-banner -->
        <div class="block block-banner">
            <div class="container">
                <a href="{{route('NoMe.products')}}" class="block-banner__body">
                    <div class="block-banner__image block-banner__image--desktop"></div>
                    <div class="block-banner__image block-banner__image--mobile">
                    </div>
                    <div class="block-banner__title">ألاف المنتجات <br class="block-banner__mobile-br"> نضعها بين يديك
                    </div>
                    <div class="block-banner__text"> أجود أنواع الأحذية نقدمها لك  </div>
                    <div class="block-banner__button">
                        <span class="btn btn-sm btn-primary">تسوق الأن</span>
                    </div>
                </a>
            </div>
        </div>
        <!-- .block-banner / end -->
        <!-- .block-products -->
                    <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">الأكثر مبيعا</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-products__body">
                        <div class="block-products__featured">
                            <div class="block-products__featured-item">
                                @foreach ($product as $product)
                                <div class="product-card product-card--hidden-actions ">
                                    <div class="product-card__badges-list">
                                    </div>
                                    <div class="product-card__image product-image">
                                        <a href="{{ route('NoMe.productpage', $product->product_name) }}" class="product-image__body">
                                            @if ($product->out_of_stock == 1)
                                                            <img src="{{ asset('image/sold-out.jpg') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                            >
                                                        @endif
                                            <img class="product-image__img" src="{{ asset('upload/admin/product/'. $product->primary_image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="{{ route('NoMe.productpage', $product->product_name) }}">{{ $product->product_name }}</a>
                                        </div>

                                    </div>
                                    <div class="product-card__actions">

                                        <div class="product-card__prices" >
                                                                                            {{ $product->price }}₪
                                                                                    </div>
                                        <div class="product-card__buttons">
                                            <a class="btn btn-primary product-card__addtocart" href="{{ route('NoMe.productpage', $product->product_name) }}">الذهاب للمنتج</a>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="block-products__list">
                            @foreach ($products as $product )
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <div class="product-card__badges-list">
                                    </div>
                                    <div class="product-card__image product-image">
                                        <a href="{{ route('NoMe.productpage', $product->product_name) }}" class="product-image__body">
                                            @if ($product->out_of_stock == 1)
                                                            <img src="{{ asset('image/sold-out.jpg') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                            >
                                                        @endif
                                            <img class="product-image__img" alt="" src="{{ asset('upload/admin/product/'. $product->primary_image) }}">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="{{ route('NoMe.productpage', $product->product_name) }}">{{ $product->product_name }}</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="product-card__actions">

                                        <div class="product-card__prices">
                                                                                                {{ $product->price}}₪
                                                                                        </div>
                                        <div class="product-card__buttons">
                                            <a class="btn btn-primary product-card__addtocart" href="{{ route('NoMe.productpage', $product->product_name) }}">الذهاب للمنتج</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                         </div>
                    </div>
                </div>
            </div>







    <!-- .block-products / end -->
        <!-- .block-products-carousel -->

        <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title"> المضافة حديثا</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fa fa-arrow-left" width="7px" height="11px"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <i class="fa fa-arrow-right" width="7px" height="11px"></i>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel owl-rtl owl-loaded owl-drag">

                        <div class="owl-stage-outer">

                            <div class="owl-stage" style="transform: translate3d(1403px, 0px, 0px); transition: all 0s ease 0s; width: 5612px; padding-left: 1px; padding-right: 1px;">
                                @foreach ($latestProducts as $latestProduct )
                                <div class="owl-item cloned" style="width: 266.5px; margin-left: 14px;">
                                    <div class="block-products-carousel__column" data-category="">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--hidden-actions ">
                                                <div class="product-card__image product-image">
                                                    <a href="{{ route('NoMe.productpage', $latestProduct->product_name) }}" class="product-image__body">
                                                        @if ($latestProduct->out_of_stock == 1)
                                                            <img src="{{ asset('image/sold-out.jpg') }}" alt="Vostro 3500 Business Laptop i7" style="width: 50%;right: 50%;top: 28%;z-index:3;margin-bottom: -23px;position: relative;margin-top: -10px;"
                                                            >
                                                        @endif
                                                        <img class="product-image__img" alt="" src="{{ asset('upload/admin/product/'. $latestProduct->primary_image) }}">
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="{{ route('NoMe.productpage', $latestProduct->product_name) }}">{{ $latestProduct->product_name }}</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__actions">
                                                    <div class="product-card__prices">
                                                    {{ $latestProduct->price }}₪
                                                                                                        </div>
                                                    <div class="product-card__buttons">
                                                        <a class="btn btn-primary product-card__addtocart" href="{{ route('NoMe.productpage', $latestProduct->product_name) }}">الذهاب للمنتج</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>


                        </div>



                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
