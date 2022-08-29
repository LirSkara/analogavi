<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Items;
use App\Models\Realty;
use App\Models\Rooms;
use App\Models\Cars;
use App\Models\Mark;
use App\Models\Homes;
use App\Models\LandPlot;
use App\Models\Garages;
use App\Models\ApartmentTake;
use App\Models\ApartmentBuy;
use App\Models\ApartmentRent;
use App\Models\Favourites;
use App\Models\HomesTake;
use App\Models\HomesBuy;
use App\Models\HomesRent;
use App\Models\RoomTake;
use App\Models\RoomBuy;
use App\Models\RoomRents;
use App\Models\LandPlotType;
use App\Models\LandPlotBuy;
use App\Models\LandPlotRent;
use App\Models\GaragesRent;
use App\Models\GaragesBuy;
use App\Models\GaragesTake;
use App\Models\JobsOpenings;
use App\Models\JobsResume;
use App\Models\Tour;

class HomeController extends Controller
{
    public function welcome(){
        $items = Items::where('status', '=', 1)->get();
        $cars = Cars::where('status', '=', 1)->get();
        $marks = Mark::where('status', '=', 1)->get();
        $realty = Realty::where('status', '=', 1)->get();
        $rooms = Rooms::where('status', '=', 1)->get();
        $homes = Homes::where('status', '=', 1)->get();
        $land_plotes = LandPlot::where('status', '=', 1)->get();
        $garages = Garages::where('status', '=', 1)->get();
        $apartment_take = ApartmentTake::where('status', '=', 1)->get();
        $apartment_buy = ApartmentBuy::where('status', '=', 1)->get();
        $apartment_rent = ApartmentRent::where('status', '=', 1)->get();
        $homes_take = HomesTake::where('status', '=', 1)->get();
        $homes_buy = HomesBuy::where('status', '=', 1)->get();
        $homes_rent = HomesRent::where('status', '=', 1)->get();
        $room_take = RoomTake::where('status', '=', 1)->get();
        $room_buy = RoomBuy::where('status', '=', 1)->get();
        $room_rent = RoomRents::where('status', '=', 1)->get();
        $land_plot_take = LandPlotType::where('status', '=', 1)->get();
        $land_plot_buy = LandPlotBuy::where('status', '=', 1)->get();
        $land_plot_rent = LandPlotRent::where('status', '=', 1)->get();
        $garages_rent = GaragesRent::where('status', '=', 1)->get();
        $garages_buy = GaragesBuy::where('status', '=', 1)->get();
        $garages_take = GaragesTake::where('status', '=', 1)->get();
        $jobs_resume = JobsResume::where('status', '=', 1)->get();
        $jobs_opening = JobsOpenings::where('status', '=', 1)->get();

        $estate = [];

        foreach($homes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($realty as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($rooms as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($land_plotes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($garages as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($apartment_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($apartment_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($apartment_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($homes_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($homes_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($homes_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($room_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($room_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($room_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($land_plot_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($land_plot_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($land_plot_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($garages_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        
        foreach($garages_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($garages_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        shuffle($estate);

        $jobs = [];

        foreach($jobs_resume as $item) {
            $jobs[] = array(
                "id" => $item->id,
                "job" => 'Резюме',
                "type_job" => $item->type_job,
                "desired_position" => $item->desired_position,
                "user" => $item->user,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($jobs_opening as $item) {
            $jobs[] = array(
                "id" => $item->id,
                "job" => 'Вакансии',
                "type_job" => $item->type_job,
                "desired_position" => $item->desired_position,
                "user" => $item->user,
                "from_price" => $item->from_price,
                "before_price" => $item->before_price,
                "when_price" => $item->when_price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        shuffle($jobs);

        return view('welcome', ['items' => $items, 'cars' => $cars, 'marks' => $marks, 'estate' => $estate, 'jobs' => $jobs]);
    }
    public function estate(){
        $realty = Realty::where('status', '=', 1)->get();
        $rooms = Rooms::where('status', '=', 1)->get();
        $homes = Homes::where('status', '=', 1)->get();
        $land_plotes = LandPlot::where('status', '=', 1)->get();
        $garages = Garages::where('status', '=', 1)->get();
        $apartment_take = ApartmentTake::where('status', '=', 1)->get();
        $apartment_buy = ApartmentBuy::where('status', '=', 1)->get();
        $apartment_rent = ApartmentRent::where('status', '=', 1)->get();
        $homes_take = HomesTake::where('status', '=', 1)->get();
        $homes_buy = HomesBuy::where('status', '=', 1)->get();
        $homes_rent = HomesRent::where('status', '=', 1)->get();
        $room_take = RoomTake::where('status', '=', 1)->get();
        $room_buy = RoomBuy::where('status', '=', 1)->get();
        $room_rent = RoomRents::where('status', '=', 1)->get();
        $land_plot_take = LandPlotType::where('status', '=', 1)->get();
        $land_plot_buy = LandPlotBuy::where('status', '=', 1)->get();
        $land_plot_rent = LandPlotRent::where('status', '=', 1)->get();
        $garages_rent = GaragesRent::where('status', '=', 1)->get();
        $garages_buy = GaragesBuy::where('status', '=', 1)->get();
        $garages_take = GaragesTake::where('status', '=', 1)->get();

        $estate = [];

        foreach($homes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($realty as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($rooms as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($land_plotes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($garages as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($apartment_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($apartment_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($apartment_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($homes_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($homes_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($homes_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "object_type" => $item->object_type,
                "square" => $item->square,
                "square_region" => $item->square_region,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($room_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($room_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($room_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "count_rooms" => $item->count_rooms,
                "floor" => $item->floor,
                "floor_home" => $item->floor_home,
            );
        };

        foreach($land_plot_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($land_plot_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($land_plot_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($garages_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        
        foreach($garages_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($garages_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        shuffle($estate);

        return view('estate', ['estate' => $estate]);
    }
    public function cars(){
        $cars = Cars::where('status', '=', 1)->orderBy('id', 'DESC')->get();
        $marks = Mark::all();
        return view('cars', ['cars' => $cars, 'marks' => $marks]);
    }
    public function job(){
        $jobs_resume = JobsResume::where('status', '=', 1)->get();
        $jobs_opening = JobsOpenings::where('status', '=', 1)->get();

        $jobs = [];

        foreach($jobs_resume as $item) {
            $jobs[] = array(
                "id" => $item->id,
                "job" => 'Резюме',
                "type_job" => $item->type_job,
                "desired_position" => $item->desired_position,
                "user" => $item->user,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        foreach($jobs_opening as $item) {
            $jobs[] = array(
                "id" => $item->id,
                "job" => 'Вакансии',
                "type_job" => $item->type_job,
                "desired_position" => $item->desired_position,
                "user" => $item->user,
                "from_price" => $item->from_price,
                "before_price" => $item->before_price,
                "when_price" => $item->when_price,
                "city" => $item->city,
                "images" => $item->images,
            );
        };

        shuffle($jobs);
        
        return view('job', ['jobs' => $jobs]);
    }
    public function items(){
        $items = Items::where('status', '=', 1)->orderBy('id', 'DESC')->get();
        return view('items', ['items' => $items]);
    }
    public function sotr(){
        return view('sotr');
    }
    public function estate_detailed($id, $what_i_sell, $sell_and_buy){
        if($what_i_sell == 'Квартиры') {
            if($sell_and_buy == 'Продам') {
                $realty = Realty::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = ApartmentRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = ApartmentBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = ApartmentTake::find($id);
            }
        } else
        if($what_i_sell == 'Комнаты') {
            if($sell_and_buy == 'Продам') {
                $realty = Rooms::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = RoomRents::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = RoomBuy::find($id);
            } else 
            if($sell_and_buy == 'Сниму') {
                $realty = RoomTake::find($id);
            }
        } else
        if($what_i_sell == 'Дома, дачи, коттеджи') {
            if($sell_and_buy == 'Продам') {
                $realty = Homes::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = HomesRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = HomesBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = HomesTake::find($id);
            }
        } else
        if($what_i_sell == 'Земельные участки') {
            if($sell_and_buy == 'Продам') {
                $realty = LandPlot::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = LandPlotRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = LandPlotBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = LandPlotType::find($id);
            }
        } else
        if($what_i_sell == 'Гаражи и машиноместа') {
            if($sell_and_buy == 'Продам') {
                $realty = Garages::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = GaragesRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = GaragesBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = GaragesTake::find($id);
            }
        }
        if(auth()->user() != null) {
            $favourites = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', 'Недвижимость'], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
            return view('estate_detailed', ['realty' => $realty, 'favourites' => $favourites]);
        } else {
            return view('estate_detailed', ['realty' => $realty]);
        }
    }
    public function item_detailed($id) {
        $item = Items::find($id);
        if(auth()->user() != null) {
            $favourites = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', 'Личные вещи']])->count();
            return view('item_detailed', ['item' => $item, 'favourites' => $favourites]);
        } else {
            return view('item_detailed', ['item' => $item]);
        }
    }
    public function car_detailed($id) {
        $car = Cars::find($id);
        $marka = Mark::find($car->marka);
        if(auth()->user() != null) {
            $favourites = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', 'Транспорт']])->count(); 
            return view('car_detailed', ['car' => $car, 'marka' => $marka, 'favourites' => $favourites]);
        } else {
            return view('car_detailed', ['car' => $car, 'marka' => $marka]);
        }
    }
    public function job_detailed($id, $job) {
        if($job == 'Резюме') {
            $job_detailed = JobsResume::find($id);
        } else
        if($job == 'Вакансии') {
            $job_detailed = JobsOpenings::find($id);
        }
        if(auth()->user() != null) {
            $favourites = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', 'Работа'], ['what_i_sell', '=', $job]])->count();
            return view('job_detailed', ['job_detailed' => $job_detailed, 'job' => $job, 'favourites' => $favourites]);
        } else {
            return view('job_detailed', ['job_detailed' => $job_detailed, 'job' => $job]);
        }
    }
    public function success_search() {
        return view('success_search');
    }
    public function tours(){
        $items = Tour::where('status', '=', 1)->orderBy('id', 'DESC')->get();
        return view('tours', ['items' => $items]);
    }
    public function tour_detailed($id) {
        $item = Tour::find($id);
        if(auth()->user() != null) {
            $favourites = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', 'Туризм']])->count();
            return view('tour_detailed', ['item' => $item, 'favourites' => $favourites]);
        } else {
            return view('tour_detailed', ['item' => $item]);
        }
    }
}
