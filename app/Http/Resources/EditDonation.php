<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class EditDonation extends Resource
{

    /**
     * @var
     */
    private $donation,$offices,$order,$catogrey;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($donation,$offices,$order,$catogrey)
    {

        $this->donation = $donation;
        $this->offices = $offices;

        $this->catogrey = $catogrey;
        $this->order = $order;

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
           'donation' => new Donation($this->donation),
           'catogrey' => Catogrey::collection($this->catogrey),
            'offices' => Office::collection($this->offices),
            'order' => Order::collection($this->order),

        ];
    }
}
