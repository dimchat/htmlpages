@extends('layout.base')
@section('title') 投诉 @stop
@section('content')
<style>
    .title1{color: #666;margin: 10px 0;padding-left: 15px;}
</style>
    <div class="container" style="margin-top: 10px;padding: 0;">
        @if(count($reasons) > 0)
        <div class="title1" style="">请选择投诉该账号的原因:</div>
        <div class="list-group list-group-flush">
            @foreach($reasons as $key => $value)
            <a href="{{route('complaint', ['type'=>$type,'reason'=>urlencode($key)])}}" class="list-group-item list-group-item-action">{{$key}}</a>
            @endforeach
        </div>
        @endif

        @if( !empty($reason) && isset( config("complaint.reasons.$reason")['solutions'] ) )
            <div class="title1" style="margin: 10px 0;padding-left: 15px;">你可以:</div>
                <div class="list-group list-group-flush">
                    @foreach(config("complaint.reasons.$reason")['solutions'] as $solution)
                        @if( $solution == 'submit' )
                        <a href="{{route('complaint.submit.page', ['type'=>$type,'reason'=>$reason])}}" class="list-group-item list-group-item-action">提交给我们进行审核</a>
                        @endif
                    @endforeach
                </div>
        @endif
    </div>
@stop