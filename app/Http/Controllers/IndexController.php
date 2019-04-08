<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function support( Request $request )
    {
        return view('support' );
    }

    public function IDUpload( $ID, Request $request )
    {
        $p = '/(^[A-Za-z0-9][A-Za-z0-9-_\.]*@[A-Za-z0-9]+$)|(^[A-Za-z0-9]+$)/';
        if (!preg_match($p, $ID)) {
            return ['code'=>422,'message'=>'ID format does not match!'];
        }
        $validator = \Validator::make($request->all(), [
            'file'=>'mimetypes:audio/*,video/*,image/*|max:100000',
            'avatar'=>'image|max:10000',
        ]);

        $address = getAddressFromID( $ID );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMsg = '';
            foreach( $errors as $error)
            {
                $errorMsg .= $error. ' ';
            }
            return ['code'=>412,'message'=>$errorMsg];
        }

        if ($request->hasFile('avatar')) {
            $fileName = md5_file($request->avatar).'.'.$request->avatar->extension();
            $filePath = $request->avatar->storeAs($address, $fileName, 'avatars');
            return ['code'=>200,'message'=>'OK','filename'=>$fileName];
        }
        elseif ($request->hasFile('file')) {
            $fileName = md5_file($request->file).'.'.$request->file->extension();
            $filePath = $request->file->storeAs($address, $fileName, 'userUploads');
            return ['code'=>200,'message'=>'OK','filename'=>$fileName];
        }
        else
        {
            return ['code'=>422,'message'=>'file requires'];
        }
    }

    public function downloadFilename($ID, $filename)
    {
        $p = '/(^[A-Za-z0-9][A-Za-z0-9-_\.]*@[A-Za-z0-9]+$)|(^[A-Za-z0-9]+$)/';
        if (!preg_match($p, $ID)) {
            return ['code'=>422,'message'=>'ID format does not match!'];
        }

        $address = getAddressFromID( $ID );
        $filePath = $address.'/'.$filename;
        if (!Storage::disk('userUploads')->exists($filePath))
        {
            return abort(404);
        }
        $type = Storage::disk('userUploads')->mimeType($filePath);
        $file = Storage::disk('userUploads')->get($filePath);
        return Response::make($file, 200)->header("Content-Type", $type);
    }

    public function avatarFilename( $ID, $filename, $ext )
    {
        $p = '/(^[A-Za-z0-9][A-Za-z0-9-_\.]*@[A-Za-z0-9]+$)|(^[A-Za-z0-9]+$)/';
        if (!preg_match($p, $ID)) {
            return ['code'=>422,'message'=>'ID format does not match!'];
        }

        $address = getAddressFromID( $ID );
        $filePath = $address.'/'.$filename.'.'.$ext;
        if (!Storage::disk('avatars')->exists($filePath))
        {
            return abort(404);
        }
        $type = Storage::disk('avatars')->mimeType($filePath);
        $file = Storage::disk('avatars')->get($filePath);
        return Response::make($file, 200)->header("Content-Type", $type);
    }

    public function avatarIDExt( $ID, $ext )
    {
        $filename = 'avatar';
        return $this->avatarFilename( $ID, $filename, $ext );
    }

    public function IDAvatarExt( $ID, $ext )
    {
        $filename = 'avatar';
        $ext = 'png';
        return $this->avatarFilename( $ID, $filename, $ext );
    }
}
