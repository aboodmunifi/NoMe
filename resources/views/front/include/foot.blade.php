   <!-- quickview-modal -->
   <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content"></div>
    </div>
</div>
<!-- quickview-modal / end -->
<!-- mobilemenu -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <img height="270px" src="{{asset('image/logo.jpeg')}}"/>
        <div class="mobilemenu__header">

            <div class="mobilemenu__title">القائمة</div>

            <button type="button" class="mobilemenu__close">
                <i class="fa fa-arrow-left " width="6px" height="9px"></i>
            </button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse="" data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a href="{{route('NoMe.home')}}" class="mobile-links__item-link" style="">الرئيسية</a>
                    </div>
                </li>


                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a  class="mobile-links__item-link ">التصنيفات</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                            <i class="fa fa-arrow-left " width="6px" height="9px"></i>
                        </button>
                    </div>
                    <div class="mobile-links__item-sub-links" data-collapse-content="">
                        <ul class="mobile-links mobile-links--level--1">
                            @foreach ($categories as $category)
                            <li class="mobile-links__item" data-collapse-item="">
                                        <div class="mobile-links__item-title">
                                            <a  class="mobile-links__item-link">{{$category->category_name}}</a>
                                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                                <i class="fa fa-arrow-left " width="6px" height="9px"></i>
                                            </button>
                                        </div>
                                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                                            <ul class="mobile-links mobile-links--level--1">
                                                @foreach ($category->secondCategory as $secondCategory )
                                                <li class="mobile-links__item" data-collapse-item="">
                                                    <div class="mobile-links__item-title">
                                                        <a href="{{ route('NoMe.secondCategorypage',$secondCategory->second_category_name) }}" class="mobile-links__item-link">{{ $secondCategory->second_category_name }}</a>

                                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                                            <i class="fa fa-arrow-left " width="6px" height="9px"></i>
                                                        </button>

                                                    </div>
                                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                                            <ul class="mobile-links mobile-links--level--1">
                                                @foreach ($secondCategory->subCategories as $subCategory)
                                                <li class="mobile-links__item" data-collapse-item="">
                                                    <div class="mobile-links__item-title">
                                                        <a href="{{ route('NoMe.subCategorypage',$subCategory->sub_category_name) }}" class="mobile-links__item-link">{{ $subCategory->sub_category_name }}</a>
                                                    </div>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                            </ul>
                                        </div>
                            </li>
                                    @endforeach
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a href="{{route('NoMe.products')}}" class="mobile-links__item-link">المنتجات</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a href="{{route('NoMe.offers')}}" class="mobile-links__item-link">العروض</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a href="{{route('NoMe.about')}}" class="mobile-links__item-link">من نحن</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a href="{{route('NoMe.contact')}}" class="mobile-links__item-link">تواصل معنا</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item="">
                    <div class="mobile-links__item-title">
                        <a href="{{route('NoMe.app')}}" class="mobile-links__item-link"> حمل التطبيق</a>
                    </div>
                </li>
                
                <li class="mobile-links__item" data-collapse-item="">
                <div class="mobile-links__item-title" >
                    <a href="https://www.facebook.com/NO.ME888/" style="color: #f5a1d1 ; margin-left: 10px ; margin-right: 30px;"  class="indicator__button">

                                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="https://www.instagram.com/no.me.88/?utm_medium=copy_link" style="color: #f5a1d1; margin-left: 10px;" class="indicator__button">

                                            <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <a href="https://wa.me/970597228827" style="color: #f5a1d1 ; margin-left: 10px;" class="indicator__button">

                                            <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                                        </a>

                                    <!--<div class="indicator " style="margin-left: 10px;">-->
                                    <!--    <a href="https://wa.me/970597228827" style="color: #f5a1d1" class="indicator__button">-->

                                    <!--        <i class="fa fa-whatsapp" aria-hidden="true"></i>-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </div>

</li>

            </ul>
        </div>
    </div>
</div>
<!-- mobilemenu / end -->
<!-- photoswipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<!-- photoswipe / end -->
<!-- js -->
<script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('front/vendor/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('front/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('front/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('front/js/number.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
<script src="{{asset('front/js/header.js')}}"></script>
<script src="{{asset('front/vendor/svg4everybody/svg4everybody.min.js')}}"></script>

    <script src="{{asset('front/js/custom/wishlist.js')}}"></script>
<script>
    svg4everybody();
</script>
