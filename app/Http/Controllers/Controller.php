<?php

namespace App\Http\Controllers;

use App\Models\ApartmentBuy;
use App\Models\ApartmentRent;
use App\Models\ApartmentTake;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

use App\Models\Realty;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
        $realty = Realty::all()->toJson();
        View::share('realty', $realty);
        $apartment_rent = ApartmentRent::all();
        View::share('apartment_rent', $apartment_rent);
        $apartment_buy = ApartmentBuy::all();
        View::share('apartment_buy', $apartment_buy);
        $apartment_take = ApartmentTake::all();
        View::share('apartment_take', $apartment_take);
    }
}
