@extends('layout.base')
@section('title') Support @stop
@section('content')
    <style>
        .top{ background-image: radial-gradient(circle at 30% 60%, #667084, #383a46);color: #FFF;}
        .top a{color:#FFF;}
        .top .row1{line-height: 80px;background-color: rgba(255, 255, 255, 0.1);}
        .intro1{font-size: 24px;margin-top: 50px;}
        .intro1>div{}
        .intro1 .intro2{background-color: #f1f1f1;height: 100%;padding: 20px;}
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
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#download">Download</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><h1 style="margin-top: 66px;">DIM! - Secure Chat</h1></div>
                <div class="col-md-1"></div>
                <div class="col-md-7" style="line-height: 50px;padding: 60px 0;font-size: 30px;">
                    This social network chatting client is based on a new protocol designed for instant messaging, which named DIMP(Decentralized Instant Messaging Protocol).
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 id="intro" style="margin-top: 50px;">What is DIM?</h2>
        <hr/>
        <div class="row intro1">
            <div class="col-md-4 text-center"><div class="intro2">It generates user accounts in client (not server) and saved the private key in the client, just publish the user ID and public key onto the DIM network.</div></div>
            <div class="col-md-4 text-center"><div class="intro2">Every user can get your ID & public key, then can verify whether the public key is bound to the ID by the 'Meta Algorithm' in the client (again, not server).</div></div>
            <div class="col-md-4 text-center"><div class="intro2">The sender must use the receiver's public key to encrypt the message content before sending out, so only the receiver's private key can decrypt it.</div></div>
        </div>
        <h2 id="contact" style="margin-top: 50px;">Contact</h2>
        <hr/>
        <p>Any question, please contact me (DIM! ID: moky@4DnqXWdTV8wuZgfqSCX9GjE2kNq7HJrUgQ, or search number: 404-969-9527).</p>
        <h2 id="download" style="margin-top: 50px;">Download</h2>
        <hr/>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
    </div>
@stop