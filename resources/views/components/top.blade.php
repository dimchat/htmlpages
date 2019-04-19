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
                            <a class="nav-link" href="{{route('support.page')}}#contact">{{__('common.contact')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('support.page')}}#download">{{__('common.download')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('terms.page')}}">{{__('common.terms')}}</a>
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
        @if($titleArea)
        <div class="container">
            <div class="row">
                <div class="col-md-4"><h1 style="margin-top: 66px;">{{__('common.DIMTitle')}}</h1></div>
                <div class="col-md-1"></div>
                <div class="col-md-7" style="line-height: 50px;padding: 60px 0;font-size: 30px;">{{__('common.DIMIntro')}}</div>
            </div>
        </div>
            @endif
    </div>
