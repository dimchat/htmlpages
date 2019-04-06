<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPSTORM_META\type;

class ComplaintController extends Controller
{

    public function complaint( Request $request )
    {
        $request->validate( [
            'type'=>'in:"individual","group"',
        ]);
        $type = $request->input('type','individual' );
        $reason = urldecode($request->input('reason', ''));
        $reasons = collect(config('complaint.reasons'))->filter(function ($value, $key) use ( $reason,$type ){
            return $value['parent'] == $reason && in_array( $type, $value['type'] );
        });
        return view('complaint.complaint', ['reason'=>$reason, 'reasons'=>$reasons, 'type'=>$type]);
    }

    public function submitPage( Request $request )
    {

        return view('complaint.submit', []);
    }
}
