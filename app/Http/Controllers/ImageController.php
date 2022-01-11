<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $label = $request->label;
        $url = 'https://zenya-image-class.herokuapp.com/addImage?label='.$label;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('file'=> curl_file_create($file->path())),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function predict(Request $request)
    {
        $file = $request->file('file');

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://zenya-image-class.herokuapp.com/getPrediction',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('file'=> curl_file_create($file->path())),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }
}
