<?php

namespace App\Exceptions\api\v1;

use Exception;

class GlobalException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $data = [
            'status' => $this->code,
            'message' => $this->getMessage(),
        ];

        return response()->json($data, $this->code);
    }
}
