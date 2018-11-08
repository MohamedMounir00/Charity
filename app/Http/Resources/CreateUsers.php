<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CreateUsers extends Resource
{

    /**
     * @var
     */
    private $country,$studyLevel,$offices;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($country,$studyLevel,$offices)
    {

        $this->country = $country;
        $this->studyLevel = $studyLevel;
        $this->offices = $offices;

    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'country' => Country::collection($this->country),
            'studyLevel' => StudyLevel::collection($this->studyLevel),
            'offices' => Office::collection($this->offices),

        ];
    }
}
