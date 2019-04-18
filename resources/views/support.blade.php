@extends('layout.base')
@section('title') Support @stop
@section('content')
    <style>
        .top{ background-image: radial-gradient(circle at 30% 60%, #667084, #383a46);color: #FFF;}
        .top .nav-item{padding: 20px 0px;}
        .top .nav-pills>li>a{color:#FFF;}
        .top.nav-pills .nav-link.active, .nav-pills .show>.nav-link{background-color: #FFF;color: #383a46;}
        .top .row1{line-height: 40px;background-color: rgba(255, 255, 255, 0.1);}
        .intro1{font-size: 24px;margin-top: 50px;}
        .intro1>div{}
        .intro1 .intro2{background-color: #f1f1f1;height: 100%;padding: 20px;}
        .download h3{margin-bottom: 20px;}
    </style>
    <div class="top">
        <div class="row1">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-6">
                    <h1 style="margin-top: 10px;"><img src="images/logo.png" style="width: 80px;float: left;border-radius: 10%"/></h1>
                </div>
                <div class="col-9 col-md-6">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">{{__('common.contact')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#download">{{__('common.download')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Language</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>'en']) }}">English</a>
                                <a class="dropdown-item" href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale'=>'zh']) }}">简体中文</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><h1 style="margin-top: 66px;">{{__('common.DIMTitle')}}</h1></div>
                <div class="col-md-1"></div>
                <div class="col-md-7" style="line-height: 50px;padding: 60px 0;font-size: 30px;">{{__('common.DIMIntro')}}</div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 id="intro" style="margin-top: 50px;">{{__('common.whatIsDIM')}}</h2>
        <hr/>
        <div class="row intro1">
            <div class="col-md-4 text-center"><div class="intro2">{{__('common.DIMIntro1')}}</div></div>
            <div class="col-md-4 text-center"><div class="intro2">{{__('common.DIMIntro2')}}</div></div>
            <div class="col-md-4 text-center"><div class="intro2">{{__('common.DIMIntro3')}}</div></div>
        </div>
        <h2 id="contact" style="margin-top: 50px;">{{__('common.contact')}}</h2>
        <hr/>
        <p>{{__('common.contact1')}}</p>
        <p>{{__('common.contact2')}}</p>
        <p>Email: support@dim.chat</p>
        <h2 id="download" style="margin-top: 50px;">{{__('common.download')}}</h2>
        <hr/>
        <div class="row download" style="padding-top: 20px;padding-bottom: 30px;">
            <div class="col-md-4 text-center">
                <h3>iOS</h3>
                <a href="https://itunes.apple.com/cn/app/DIM/id1457157407?mt=8"><img src="/images/app_store.png" style="width: 100%;"/></a></div>
            <div class="col-md-4 text-center">
                <h3>Android</h3>
                <p>{{__('common.comingSoon')}}</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>Qr</h3>
                <img src="/images/qrcode_image_300.png" style="width: 60%;"/>
            </div>
        </div>
    </div>
@stop