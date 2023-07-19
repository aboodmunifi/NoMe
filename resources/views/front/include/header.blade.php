<!-- mobile site__header -->
<header class="site__header d-lg-none">
    <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
        <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
            <div class="mobile-header__panel">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                            <i class="fa fa-list fa-2x" style="color: #fff;"></i>
                        </button>
<!--                        <center>-->
<!--                        <a class="mobile-header__logo" href="/">-->
<!--                            <center>-->
<!--                            <div style="width: 300%; ">-->
<!--<h3>الرئيسية</h3>-->
<!--                            </div>-->
<!--                            </center>-->
<!--                            </center>-->
                        </a>
                        <div class="search search--location--mobile-header mobile-header__search">
                            <div class="search__body" >

                                <form class="search__form" action="{{route('NoMe.findProduct')}}" method="get" style="margin-right: 0px;" >
                                    @csrf
                                    <input type="hidden" value="all" name="query">
                                    <input class="search__input search" value="{{ request()->input('query') }}" name="query" placeholder="ابحث في أكثر من 10,000 منتج" aria-label="Site search" type="text" autocomplete="off"  style="margin-top: 8px;">






                                    <button class="search__button search__button--type--submit" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>

                                    <button class="search__button search__button--type--close" type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>

                                    <div class="search__border"></div>




                                </form>
                                <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                            </div>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                                <button class="indicator__button">
                                    <i class="fa fa-search"></i>
                                    <!--<span class="indicator__area">-->
                                    <!--    search-->
                                        <!--<svg width="20px" height="20px">-->
                                        <!--    <use xlink:href="https://waslastore.ps//website/images/sprite.svg#search-20"></use>-->
                                        <!--</svg>-->
                                    <!--</span>-->
                                </button>
                            <!--</div>-->
                            <!--                        <div class="indicator indicator--mobile">-->
                            <!--    <a href="/login" class="indicator__button">-->
                            <!--        <span class="indicator__area">-->
                            <!--            <svg width="20px" height="20px">-->
                            <!--                <use xlink:href="https://waslastore.ps//website/images/sprite.svg#person-20"></use>-->
                            <!--            </svg>-->
                            <!--        </span>-->
                            <!--    </a>-->
                            <!--</div>-->

                        </div>
                    </div>
                                </div>
            </div>
        </div>
    </header>
        <!-- mobile site__header / end -->
        <header class="site__header d-lg-block d-none">
            <div class="site-header">
                <!-- .topbar -->
                <!-- <div class="site-header__topbar topbar">
                    <div class="topbar__container container">
                        <div class="topbar__row">
                            <div class="topbar__item topbar__item--link">
                                <a style="color: #f5a1d1" href="">
                                    <i class="fa fa-facebook"  aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="topbar__item topbar__item--link">
                                <a style="color: #f5a1d1" href="https://www.instagram.com/waslastore.ps/"> <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="topbar__item topbar__item--link">
                                <a style="color: #f5a1d1" href="https://twitter.com/waslastore">
                                    <i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="topbar__item topbar__item--link">
                                <a style="color: #f5a1d1" href="https://api.whatsapp.com/send?phone=970592502504&amp;app=facebook&amp;entry_point=page_cta&amp;fbclid=IwAR2iwVf_bqw9g-remrm-px-bx6DXYMiQpW0W06MV8ca0BePZNKKspJhR4SY">
                                    <i class="fab fa-whatsapp"></i></a>
                            </div>
                            <div class="topbar__spring"></div>
                                                <div class="topbar__item">
                                <div class="topbar-dropdown">
                                    <button class="topbar-dropdown__btn" type="button" onclick="window.location = '/login';">
                                        تسجيل الدخول
                                    </button>
                                </div>
                            </div>
                            <div class="topbar__item">
                                <div class="topbar-dropdown">
                                    <button class="topbar-dropdown__btn" type="button" onclick="window.location = '/register';">
                                        انشاء حساب
                                    </button>
                                </div>
                            </div>


                            <div class="topbar__item">
                                <div class="topbar-dropdown">
                                    <button class="topbar-dropdown__btn" type="button">
                                        اللغة: <span class="topbar__item-value">العربية</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- .topbar / end -->
                <div class="site-header__middle container">
                    <div class="site-header__logo">
                        <a href="/">
                            <!-- logo -->
                            <div>
                                <img style="width: 50%" src="{{asset('front/css/image/logo-3.png')}}" alt="">
                            </div>
                            <!-- logo / end -->
                        </a>
                    </div>
                    <div class="site-header__search">
                        <div class="search search--location--header ">
                            <div class="search__body">

                                <form class="search__form" action="{{route('NoMe.findProduct')}}" method="GET" style="margin-bottom: 0px;">
                                    <select class="search__categories" aria-label="Category" value="{{ request()->input('query') }}" name="query">
                                        <option value="all">جميع التصنيفات</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->category_name }}">
                                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $category->category_name }}</option>
                                            @endforeach                                                         </select>
                                    <input class="search__input" value="{{ request()->input('query') }}" name="query" placeholder="ابحث في أكثر من 10,000 منتج" aria-label="Site search" type="text" autocomplete="off">
                                    <button class="search__button search__button--type--submit" type="submit">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="https://waslastore.ps//website/images/sprite.svg#search-20"></use>
                                        </svg>
                                    </button>
                                    <div class="search__border"></div>
                                </form>
                                <div class="search__suggestions suggestions suggestions--location--header"></div>
                            </div>
                        </div>
                    </div>
                    <div class="site-header__phone">
                        <div class="site-header__phone-title">خدمة العملاء</div>
                        <div class="site-header__phone-number">059-722-8827</div>
                    </div>
                </div>
                <div class="site-header__nav-panel">
                    <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                    <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow" style="">
                        <div class="nav-panel__container container">
                            <div class="nav-panel__row">
                                <div class="nav-panel__departments ">
                                    <!-- .departments -->
                                    <div class="departments departments--opens" data-departments-fixed-by=".block-slideshow">
                                        <div class="departments__body" style="height: auto;">
                                            <div class="departments__links-wrapper">
                                                <div class="departments__submenus-container"></div>
                                                <ul class="departments__links ">




                    @foreach ($categories as $category)
                    <li class="departments__item">
                        <a class="departments__item-link " id="198">
                            {{ $category->category_name }}
                            <i class="fa fa-arrow-right departments__item-arrow" width="6px" height="9px"></i>

                        </a>
                        <div class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--sm">
                                <!-- .megamenu -->
                            <div class="megamenu  megamenu--departments ">
                                <div class="megamenu__body">

                                    <div class="row">

                                        <div class="col-12">
                                            <ul class="megamenu__links megamenu__links--level--0">
                                                @foreach ($category->secondCategory as $secondCategory )


                                                <li class="megamenu__item  megamenu__item--with-submenu ">
                                                    <a href="{{ route('NoMe.secondCategorypage',$secondCategory->second_category_name) }}">{{ $secondCategory->second_category_name }}</a>
                                                    @foreach ($secondCategory->subCategories as $subCategory)
                                                    <ul class="megamenu__links megamenu__links--level--1">
                                                        <li class="megamenu__item" id="700">
                                                            <a href="{{ route('NoMe.subCategorypage',$subCategory->sub_category_name) }}">{{ $subCategory->sub_category_name }}</a>
                                                        </li>
                                                    </ul>
                                                    @endforeach




                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        {{-- <div class="col-12">
                                            <ul class="megamenu__links megamenu__links--level--0">
                                                            @foreach ($category->product as $product )
                                                            <a href="{{route('NoMe.products')}}">{{ $product->product_name }}</a>
                                                        </li>
                                                            @endforeach                                                                                        <li class="megamenu__item ">

                                                                                                                                                                                                    <li class="megamenu__item ">

                                                                                                                                                                                                    <li class="megamenu__item ">

                                                                                                                                        </ul>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                    @endforeach




                                                </ul>
                                            </div>
                                        </div>
                                        <button class="departments__button">
                                            <i class="fa fa-bars fa-1x departments__button-icon"  width="18px" height="14px"  ></i>
                                            تسوق حسب الأقسام
                                            <i class="fa fa-arrow-circle-down fa-1x departments__button-arrow"  width="9px" height="6px"></i>
                                                </button>
                                    </div>
                                    <!-- .departments / end -->
                                </div>
                                <!-- .nav-links -->
                                <div class="nav-panel__nav-links nav-links">
                                    <ul class="nav-links__list">
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="{{route('NoMe.home')}}">
                                                <div class="nav-links__item-body">
                                                    الرئيسية
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="{{route('NoMe.products')}}">
                                                <div class="nav-links__item-body">
                                                    المنتجات
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="{{route('NoMe.offers')}}">
                                                <div class="nav-links__item-body">
                                                    العروض
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="{{route('NoMe.about')}}">
                                                <div class="nav-links__item-body">
                                                    من نحن
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="{{route('NoMe.contact')}}">
                                                <div class="nav-links__item-body">
                                                    تواصل معنا
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="{{route('NoMe.app')}}">
                                                <div class="nav-links__item-body">
                                                     حمل التطبيق
                                                </div>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-links__item  nav-links__item--has-submenu ">
                                            <a class="nav-links__item-link" href="/usage-policy">
                                                <div class="nav-links__item-body">
                                                    سياسة الاستخدام
                                                </div>
                                            </a>
                                        </li> -->

                                    </ul>
                                </div>
                                <!-- .nav-links / end -->
                                <div class="nav-panel__indicators" >
                                    <div class="indicator" style="margin-left: 10px;">
                                        <a href="https://www.facebook.com/NO.ME888/" style="color: #f5a1d1"  class="indicator__button">

                                            <i class="fa fa-facebook-square fa-1x" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="indicator " style="margin-left: 10px;">
                                        <a href="https://www.instagram.com/no.me.88/?utm_medium=copy_link" style="color: #f5a1d1" class="indicator__button">

                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>

                                    </div>
                                    <div class="indicator " style="margin-left: 10px;">
                                        <a href="https://wa.me/970597228827" style="color: #f5a1d1" class="indicator__button">

                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
