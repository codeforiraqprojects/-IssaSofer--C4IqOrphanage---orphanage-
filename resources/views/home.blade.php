@extends('layout.app')

@section('content')
<!-- start header -->
<div class="header">
    <div class="overlay">
        <div class="container text">
            <div class="content">
                <div class="cont text-center">
                    <h2>قدم خيرك ... وانفع غيرك ...</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- start about -->

<div class="about">
    <div class="container">
        <div class="cart">
            <div class="row">
                <div class="col-sm-8">
                    <div class="content text-center">
                        <h3>من نحن؟</h3>
                        <p>هناك حقيقية مثبتة منذ زمن طويل وهي ان المحتوة المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في الصفحة التي يقراها ولذلك يتم استخدام طريقة اوريم ايبسوم لانها تعطي توزيعا طبيعيا الى حد ما للاحرف عوضا عن </p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="photo">
                        <img src="{{ asset('image/header.jpg')}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end about --->

<!-- start news -->
<div class="news">
    <div class="container">
        <div class="content text-center">
            <h2>اخبارنا </h2>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="img">
                        <img src="{{asset('image/header.jpg')}}" />
                    </div>
                    <div class="contents">
                        <h3>مساعدات</h3>
                        <p>هناك حقيقية مثبتة منذ زمن طويل وهي ان المحتوة المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في الصفحة التي يقراها</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="img">
                        <img src="{{asset('image/header.jpg')}}" />
                    </div>
                    <div class="contents">
                        <h3>مساعدات</h3>
                        <p>هناك حقيقية مثبتة منذ زمن طويل وهي ان المحتوة المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في الصفحة التي يقراها</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="img">
                        <img src="{{asset('image/header.jpg')}}" />
                    </div>
                    <div class="contents">
                        <h3>مساعدات</h3>
                        <p>هناك حقيقية مثبتة منذ زمن طويل وهي ان المحتوة المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص او شكل توضع الفقرات في الصفحة التي يقراها</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end news -->

<!-- start orphans -->
<div class="orphans">
    <div class="container">
        <div class="counts text-center">
            <div class="row">
                <div class="col-4">
                    <h6>عدد المساعدات</h6>
                    <p>{{count($helpCount)}}</p>
                </div>
                <div class="col-4">
                    <h6>عدد الايتام</h6>
                    <p>{{count($orphanCount)}}</p>
                </div>
                <div class="col-4">
                    <h6>عدد الايتام المتبني</h6>
                    <p>{{count($adoptedCount)}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end orphans -->

@endsection
