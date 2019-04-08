@extends('layout.base')
@section('title') Support @stop
@section('content')
    <div class="container">
    <h1>DIM! - Secure Chat</h1>
    <p class="lead">This social network chatting client is based on a new protocol designed for instant messaging, which named DIMP(Decentralized Instant Messaging Protocol).</p>

    <ul class="list-unstyled">
        <li>1. It generates user accounts in client (not server) and saved the private key in the client, just publish the user ID and public key onto the DIM network;</li>
        <li>2. Every user can get your ID & public key, then can verify whether the public key is bound to the ID by the 'Meta Algorithm' in the client (again, not server);</li>
        <li>3. The sender must use the receiver's public key to encrypt the message content before sending out, so only the receiver's private key can decrypt it.</li>
    </ul>
    <div class="" style="border-top:1px dashed #e0e0f5;text-align: right;margin-top: 10px;">
        Copyright ©2019 Alber Moky
    </div>
    </div>
@stop