<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\String_;

class Problem extends JsonResource
{
    public static $mode='problem';

    public static function setMode($mode)
    {
        self::$mode = $mode;
        return __CLASS__;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'title' => $this->title,
            'body' => $this->body,
            'tags'=> $this-> tag,
            'users'=> $this-> user,
            'created_at' => $this->created_at

        ];
    }
}
