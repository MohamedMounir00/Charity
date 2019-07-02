<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ResponseStatus extends Resource
{
    private $status, $message;

    public function __construct($status,$message)
    {
        $this->status = $status;
        $this->message = $message;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'status'    => $this->status,
            'message'   => $this->message,
        ];
    }
}
