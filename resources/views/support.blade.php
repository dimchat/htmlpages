@extends('layout.base')
@section('title') Support @stop
@section('content')
    @include('components.top', ['titleArea'=>true])
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