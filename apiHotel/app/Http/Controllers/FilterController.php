<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CheckinResource;
use App\Checkin;

class FilterController extends Controller
{
    /**
     * Exibe os checkins sem data de saida, ou seja, que ainda estão no hotel
     *
     * @return void
     */
    public function guestsCheckin()
    {
        return CheckinResource::collection(Checkin::whereNull('exitDate')->get());
    }

    /**
     * Exibe os checkins com data de saida, ou seja, que já realizaram o checkout
     *
     * @return void
     */
    public function guestsCheckout()
    {
        return CheckinResource::collection(Checkin::whereNotNull('exitDate')->get());
    }
}
