@extends('front.include.layout')

@section('title', 'من نحن  ')

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
                        <li class="breadcrumb-item active" aria-current="page">من نحن</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="document">
                <div class="document__header">
                    <h1 class="document__title">من نحن </h1>
                </div>
                <div class="document__content typography">
                      <p>
                        متجر NoMe هو متجر إلكتروني لبيع الأحذية المختلفة بأفخم الموديلات العالمية والماركات الفخمة معروف بالجودة العالية لما يقدمه من منتجات و خدمات, ما بين
                        المنتجات المحلية و المستوردة , مع توصيل سريع و خدمة عملاء محترفة, و تأتي منتجاتنا بأسعار معقولة
                        تناسب كافة مستويات الدخل , ويعمل المتجر على مواكبة السوق و يقدم منتجات حديثة و متنوعة, حيث سيجد
                        العملاء في المتجر سهولة إختيار المنتجات و البحث عنها , حيث بذل طاقم المتجر جهده في جعل عملية
						التسوق لدينا ممتعة و سهلة و سريعة و توفر كل ما يحتاجه العملاء من تسهيلات في جميع النواحي.

                    </p>

                    <br>

                    <h3>رسالتنا :</h3>
                    <p>
                        تقديم عدد كبير من المنتجات المميزة و العصرية و الخدمات ذات القيمة المُضافة للمواطنين , و ربط
                        عملاء المتجر في القطاع بأسواق العالم الخارجي.
                    </p>
                    <hr>
                    <h3>رؤيتنا :</h3>
                    <p>
                        نسعى لتكون منتجاتنا و خدماتنا مصدر ثقة للعملاء.
                    </p>
                    <hr>
                    <h3>القيم :</h3>
                    <p>
                        الثقة و الجودة و المرونة و الإبتكار و الإحترام. بالنهاية نتمنى منكم زيارة المتجر و سيكون طاقمنا
                        معكم في أي إستفسارات أو مساعدات تحتاجونها , كما نتمنى لكم رحلة تسوق ممتعة و أن تجدوا كل ما
                        يسركم.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
