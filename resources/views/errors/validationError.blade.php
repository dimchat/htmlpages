@extends('layout.base')
@section('title') 投诉 @stop
@section('content')
<style>
    .title1{color: #666;margin: 10px 0;padding-left: 15px;}
</style>
    <div class="container" style="margin-top: 50px;text-align: center;">
        <h2>错误!</h2>
        <div>
            {{$message}}
        </div>
    </div>
@stop