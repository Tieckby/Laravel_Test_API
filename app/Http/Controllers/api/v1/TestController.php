<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //This methode is called by default with this this controller
    public function __invoke()
    {
        $data = [
            'success' => true,
            'message' => __('messages.welcome'),
            'lang' => app()->getLocale()
        ];

        return response()->json($data, 200);
    }
}
