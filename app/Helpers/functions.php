<?php

function successResult(string $message, $data = [])
{
    return ['msg' => $message, 'success' => true, 'data' => $data];
}

function errorResult(string $message, $data = [], int $error_code = 0)
{
    return ['msg' => $message, 'success' => false, 'code' => $error_code, 'data' => $data];
}

function getAddressFromID( $ID )
{
    $address = explode('@', $ID );
    $address = $address[count($address)-1];

    return $address;
}