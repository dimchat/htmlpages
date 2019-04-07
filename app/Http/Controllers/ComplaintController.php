<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function errorPage( $messages )
    {
        $errorMsg = '';
        foreach( $messages as $error)
        {
            $errorMsg .= $error. ' ';
        }
        return view('errors.validationError', ['message'=>$errorMsg]);
    }
    public function complaint( Request $request )
    {
        $validator = \Validator::make($request->all(), [
            'sender'=>'required|max:128',
            'identifier'=>'required|max:128',
            'type'=>'required|in:"individual","group"|max:200',
            'reason'=>'in:'.join(',', array_keys(config('complaint.reasons'))),
        ]);

        if ($validator->fails()) {
            return $this->errorPage($validator->errors()->all());
        }

        $type = $request->input('type','individual' );
        $sender = $request->input('sender', '');
        $identifier = $request->input('identifier' );
        $reason = urldecode($request->input('reason', ''));
        $reasons = collect(config('complaint.reasons'))->filter(function ($value, $key) use ( $reason,$type ){
            return $value['parent'] == $reason && in_array( $type, $value['type'] );
        });
        return view('complaint.complaint', ['reason'=>$reason, 'reasons'=>$reasons, 'type'=>$type, 'identifier'=>$identifier,'sender'=>$sender,]);
    }

    public function submitPage( Request $request )
    {
        $validator = \Validator::make($request->all(), [
            'sender'=>'required|max:128',
            'identifier'=>'required|max:128',
            'type'=>'required|in:"individual","group"|max:200',
            'reason'=>'required|in:'.join(',', array_keys(config('complaint.reasons'))),
        ]);

        if ($validator->fails()) {
            return $this->errorPage($validator->errors()->all());
        }
        return view('complaint.submit', []);
    }

    public function submit( Request $request )
    {
        $request->validate( [
            'sender'=>'required|max:128',
            'identifier'=>'required|max:128',
            'content'=>'required|max:800',
            'type'=>'required|in:"individual","group"|max:200',
            'reason'=>'required|in:'.join(',', array_keys(config('complaint.reasons'))),
        ]);
        $sender = $request->input('sender', '');
        $identifier = $request->input('identifier', '');
        $type = $request->input('type', '');
        $content = $request->input('content', '');
        $reason = $request->input('reason', '');
        $nowTime = time();

        $filenames = $request->input('filenames');

        // handle images
        $fileDatas = $request->input('filedata');
        $file_paths = [];
        if(!empty($fileDatas))
        {
            $i = 0;
            foreach ( $fileDatas as $key => $data)
            {
                $original_file_name = $filenames[$i];
                $temp_file_name_array = explode('.', $original_file_name);
                if(count($temp_file_name_array) == 1)
                {
                    $file_extension = '';
                }
                else
                {
                    $file_extension = array_pop( $temp_file_name_array );
                }

                list(, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);

                //generate file name
                $filename = date('Y', time()).'/'.uniqid(time().rand(10000,99999)).'.'.$file_extension;

                $file_result = Storage::disk('uploads')->put($filename, $data );
                // insert into database
                if( !$file_result )
                {
                    return errorResult('Can not save image!');
                }
                array_push( $file_paths, $filename );
                $i++;
            }
        }

        $text = date('Y-m-d_H:i:s', $nowTime).' '.rawurlencode($sender).' '.rawurlencode($identifier).' '.$type.' '.$reason.' '.rawurlencode($content).' '.join('|', $file_paths);

        // log data
        file_put_contents(env('COMPLAINT_FILE_PATH').'complaint.txt', $text.PHP_EOL , FILE_APPEND | LOCK_EX);

        return response()->json(successResult('submit success!'));
    }

    public function submitSuccessPage(Request $request)
    {
        return view('complaint.submitSuccess');
    }
}
