@extends('front.include.layout')

@section('title', 'الصفحة المنتج')

@section('content')

<div class="site__body">
        <div class="page-header">
            <meta name="csrf-token" content="NF7U9zNC5Dg8IZLCbj8eW7XBxJouzW95qA1gQk4s">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb d-flex justify-content-between">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('NoMe.home')}}">الرئيسية</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="https://waslastore.ps//website/images/sprite.svg#arrow-rounded-right-6x9">
                                    </use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('NoMe.products')}}">المنتجات</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="https://waslastore.ps//website/images/sprite.svg#arrow-rounded-right-6x9">
                                    </use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }} </li>
                        </ol>
                    </nav>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-success">{{ session('delete') }}</div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-info">{{ session('update') }}</div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-danger">{{ session('warning') }}</div>
                    @endif
                    <div>
                                                                    </div>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="product product--layout--standard" data-layout="standard">
                    <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <button class="product-gallery__zoom">
                                        <svg width="24px" height="24px">
                                            <use xlink:href="https://waslastore.ps//website/images/sprite.svg#zoom-in-24">
                                            </use>
                                        </svg>
                                    </button>
                                    <div class="owl-carousel owl-rtl owl-loaded owl-drag" id="product-image">

                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 6372px;">

                                            <div class="block-slideshow block-slideshow--layout--with-departments block">
                                                {{-- <div class="container"> --}}
                                                    {{-- <div class="row"> --}}

                                                    {{-- <div class=""></div> --}}
                                                        <div class="owl-item" style="width: 531px;">
                                                            <div class="block-slideshow__body">
                                                                <div class="owl-carousel owl-rtl owl-loaded owl-drag">
                                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                                        <div class="carousel-inner product-image ">
                                                        @foreach ($productImages as $productImage)

                                                        <div class="carousel-item {{ ($loop->iteration == 1) ?  'active' : '' }} cloned" style="
                                                            " ><a class="block-slideshow__slide" href="">
                                                            {{-- <div class="product-image__img block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url({{ asset('upload/admin/product/'. $productImage->image_name) }})">
                                                            </div>
                                                            <div class="product-image__img block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url({{ asset('upload/admin/product/'. $productImage->image_name) }})">
                                                            </div> --}}

                                                            <img class="product-image__img block-slideshow__slide-image block-slideshow__slide-image--desktop"  src="{{ asset('upload/admin/product/'. $productImage->image_name) }}" alt="">
                                                            <img class="product-image__img block-slideshow__slide-image block-slideshow__slide-image--mobile" src="{{ asset('upload/admin/product/'. $productImage->image_name) }}" alt="">

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


                                            {{-- </div> --}}
                                            {{-- </div> --}}
                                            </div>

                                            {{-- <div class="owl-item " style="width: 531px;">
                                                <div class="product-image ">

                                                    <img class="product-image__img" style="width: 89%; height:400px" src="{{ asset('upload/admin/product/'. $product->primary_image) }}" alt="">

                                                </div>
                                            </div> --}}


                                             {{-- <div class="owl-item" style="width: 531px;">
                                                <div class="product-image product-image--location--gallery">
                                                <a href="{{ asset('upload/admin/product/'. $product->primary_image) }}" class="product-image__body" target="_blank">
                                                    <img class="product-image__img" src="{{ asset('upload/admin/product/'. $product->primary_image) }}" alt="">
                                                </a>
                                                </div>
                                             </div> --}}

                                                {{-- @foreach ($productImages as $productImage)
                                                <div class="product-image product-image--location--gallery">
                                                    <a href="{{ asset('upload/admin/product/'. $productImage->image_name) }}" class="product-image__body" target="_blank" >

                                                <img class="product-image__img" src="{{ asset('upload/admin/product/'. $productImage->image_name) }}" alt="" >

                                                    </a>
                                            </div>
                                                @endforeach --}}



                                             </div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
                                </div>
<!--                                <div class="product-gallery__carousel">-->
<!--                                    <div class="owl-carousel owl-rtl owl-loaded owl-drag" id="product-carousel" data-length="9">-->


<!--                                         <div class="owl-stage-outer">-->
<!--                                            <div class="owl-stage product-image--location--gallery" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1308px;">-->
<!--                                                @foreach ($productImages as $productImage)-->
<!--                                                <div class="owl-item  $loop->iteration==$productImage->id?'active':''  " style="width: 99px; margin-left: 10px;">-->
<!--                                                    <a  class="product-image " style="padding:2px;">-->
<!--                                                        <div class="product-image__body" style="-->
<!--    width: 100px;-->
<!--    height: 74px;-->
<!--">-->
<!--                                                <img class="product-image__img product-gallery__carousel-image " src="{{ asset('upload/admin/product/'. $productImage->image_name) }}" alt="" style="    padding-right: 0px; padding-left: 25px;">-->
<!--                                                        </div>-->
<!--                                                    </a>-->
<!--                                            </div>-->
<!--                                                @endforeach-->


<!--                                        </div></div>-->
<!--                                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div>-->
<!--                                        </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <!-- .product__gallery / end -->
                        <!-- .product__info -->
                        <div class="product__info">
                            <div class="product__wishlist-compare">
                                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="" data-original-title="Wishlist">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="https://waslastore.ps//website/images/sprite.svg#wishlist-16"></use>
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="" data-original-title="Compare">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="https://waslastore.ps//website/images/sprite.svg#compare-16"></use>
                                    </svg>
                                </button>
                            </div>
                            <h1 class="product__name">{{ $product->product_name }}</h1>

                            <ul class="product__meta">
                                <li class="product__meta-availability">التصنيفات:</li>
                                                                    <li><a href="/category/198">{{ $product->subCategory->sub_category_name }}</a></li>

                                                            </ul>
                        </div>
                        <!-- .product__info / end -->
                        <!-- .product__sidebar -->

                                                    <div class="product__sidebar">
                                <div class="product__prices">
                                    <span id="price">{{ $product->price }}</span> ₪
                                </div>
<form action="{{ route('NoMe.order') }}" method="POST">
    @csrf
    <div class="product__options">
        <div class="form-group" id="Color" data-product="5086">
            <label class="control-label">اختر اللون</label>

            <select class="form-control @error('color') is-invalid @enderror select2" name="color" >
                <option disabled="" selected="">إختار اللون المناسب</option>
                    @forelse ($product->colors as $color )
                    <option value="{{ $color->color_name }}">{{ $color->color_name }}</option>

                    @empty
                    <option value="">لايوجد ألون لعرضها</option>

                    @endforelse

            </select>
            @if($errors->has('color'))
                <div
                    class="invalid-feedback">{{ $errors->first('color') }}
                </div>
            @endif
        </div>


<div class="form-group" id="Size" >
    <label class="control-label">المقاس</label>
    <select class="form-control @error('size') is-invalid @enderror select2" name="size" onchange="selectOption()">
        <option disabled="" selected="" value="null"> إختار المقاس المناسب</option>
        @forelse ($product->sizes as $size)
        <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>

        @empty
        <option value="">لا يوجد مقاس لعرضه</option>

        @endforelse

    </select>
    @if($errors->has('categorsizey_name'))
        <div
            class="invalid-feedback">{{ $errors->first('size') }}
        </div>
    @endif
</div>
<p class="text-danger" id="test-error"></p>
 <input type="hidden" name="product_id" value="{{ $product->id }}">

<div class="form-group product__option">
    <label class="product__option-label" for="product-quantity">الكمية</label>
    <div class="product__actions">
        <div class="product__actions-item">
            <div class="input-number product__quantity">
                <input id="product-quantity" class="input-number__input form-control @error('amount') is-invalid @enderror form-control-lg" type="number" min="1" value="1" name="amount">
                <div class="input-number__add"></div>
                <div class="input-number__sub"></div>
            </div>
        </div>
    </div>
    @if($errors->has('amount'))
        <div
            class="invalid-feedback">{{ $errors->first('amount') }}
        </div>
    @endif
</div>
<div class="form-group" id="" >
    <label class="control-label">ادخل الاسم</label>
    <input class="form-control @error('person_name') is-invalid @enderror" name="person_name" type="text" value="{{ old('person_name') }}" placeholder="أدخل الاسم" >
    @if($errors->has('person_name'))
    <div
        class="invalid-feedback">{{ $errors->first('person_name') }}
    </div>
@endif</div>
<div class="form-group" id="" >
    <label class="control-label">رقم الجوال</label>
    <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" value="{{ old('phone') }}" placeholder="ادخل رقم جوال " >
    @if($errors->has('phone'))
    <div
        class="invalid-feedback">{{ $errors->first('phone') }}
    </div>
@endif
</div>
<div class="form-group" id="" >
    <label class="control-label"> العنوان</label>
    <input class="form-control @error('address') is-invalid @enderror" name="address" type="text" value="{{ old('address') }}" placeholder="ادخل العنوان بالتفصيل" >
    @if($errors->has('address'))
    <div
        class="invalid-feedback">{{ $errors->first('address') }}
    </div>
@endif</div>
<div class="form-group" id="" >
    <label class="control-label"> هل لديك كود خصم ؟</label>
    <input class="form-control @error('discount') is-invalid @enderror" name="discount" type="text" value="{{ old('discount') }}" placeholder="ادخل كود الخصم الخاص بك واذا لا يوجد أدخل 0" >
    @if($errors->has('discount'))
    <div
        class="invalid-feedback">{{ $errors->first('discount') }}
    </div>
@endif</div>
<div class="product__actions-item product__actions-item--addtocart">
    <button type="submit" id="add-to-card" class="btn btn-primary btn-lg mb-2" >إضافة
        طلبية
    </button>
</div>
                                    </div>
                                </form>
                                <!-- .product__options / end -->
                            </div>
                                        <!-- .product__end -->

                    </div>
                </div>
                <div class="product-tabs product-tabs--sticky">
                    <div class="product-tabs__list">
                        <div class="product-tabs__list-body">
                            <div class="product-tabs__list-container container">
                                <a href="#tab-description" class="product-tabs__item product-tabs__item--active" style="margin-right: 0;">الوصف</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                            <div class="typography">

                            <p> {{ $product->description ?? "هذا المنتج لايحتوي على وصف" }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">منتجات متشابهة</h3>
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
                                    @foreach ($products as $product_tow )
                                    <div class="owl-item cloned" style="width: 266.5px; margin-left: 14px;">
                                        <div class="block-products-carousel__column" data-category="">
                                            <div class="block-products-carousel__cell">
                                                <div class="product-card product-card--hidden-actions ">
                                                    <div class="product-card__image product-image">
                                                        <a href="{{ route('NoMe.productpage', $product_tow->product_name) }}" class="product-image__body">
                                                            <img class="product-image__img" alt="" src="{{ asset('upload/admin/product/'. $product_tow->primary_image) }}">
                                                        </a>
                                                    </div>
                                                    <div class="product-card__info">
                                                        <div class="product-card__name">
                                                            <a href="{{ route('NoMe.productpage', $product_tow->product_name) }}">{{ $product_tow->product_name }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__actions">
                                                        <div class="product-card__prices">
                                                        {{ $product_tow->price }}₪
                                                                                                            </div>
                                                        <div class="product-card__buttons">
                                                            <a class="btn btn-primary product-card__addtocart" href="{{ route('NoMe.productpage', $product_tow->product_name) }}">الذهاب للمنتج</a>

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

    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">تأكيد العملية</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد من الحذف
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="event.preventDefault(); document.getElementById('delete-product').submit();">حذف
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
