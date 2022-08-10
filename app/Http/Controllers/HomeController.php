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

class HomeController extends Controller
{
    public function welcome(){
        $items = Items::all();
        $cars = Cars::all();
        $marks = Mark::all();
        $realty = Realty::all();
        $rooms = Rooms::all();
        $homes = Homes::all();
        $land_plotes = LandPlot::all();
        $garages = Garages::all();
        $apartment_take = ApartmentTake::all();
        $apartment_buy = ApartmentBuy::all();
        $apartment_rent = ApartmentRent::all();
        $homes_take = HomesTake::all();
        $homes_buy = HomesBuy::all();
        $homes_rent = HomesRent::all();
        $room_take = RoomTake::all();
        $room_buy = RoomBuy::all();
        $room_rent = RoomRents::all();
        $land_plot_take = LandPlotType::all();
        $land_plot_buy = LandPlotBuy::all();
        $land_plot_rent = LandPlotRent::all();
        $garages_rent = GaragesRent::all();
        $garages_buy = GaragesBuy::all();
        $garages_take = GaragesTake::all();
        $jobs_resume = JobsResume::all();
        $jobs_opening = JobsOpenings::all();

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
        $realty = Realty::all();
        $rooms = Rooms::all();
        $homes = Homes::all();
        $land_plotes = LandPlot::all();
        $garages = Garages::all();
        $apartment_take = ApartmentTake::all();
        $apartment_buy = ApartmentBuy::all();
        $apartment_rent = ApartmentRent::all();
        $homes_take = HomesTake::all();
        $homes_buy = HomesBuy::all();
        $homes_rent = HomesRent::all();
        $room_take = RoomTake::all();
        $room_buy = RoomBuy::all();
        $room_rent = RoomRents::all();
        $land_plot_take = LandPlotType::all();
        $land_plot_buy = LandPlotBuy::all();
        $land_plot_rent = LandPlotRent::all();
        $garages_rent = GaragesRent::all();
        $garages_buy = GaragesBuy::all();
        $garages_take = GaragesTake::all();

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
        $cars = Cars::all();
        $marks = Mark::all();
        return view('cars', ['cars' => $cars, 'marks' => $marks]);
    }
    public function job(){
        $jobs_resume = JobsResume::all();
        $jobs_opening = JobsOpenings::all();

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
        $items = Items::all();
        return view('items', ['items' => $items]);
    }
    public function sotr(){
        return view('sotr');
    }
    public function estate_detailed($id, $what_i_sell, $sell_and_buy){
        if($what_i_sell == 'Квартиры') {
            if($sell_and_buy == 'Продам') {
                $realty = Realty::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = ApartmentRent::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = ApartmentBuy::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = ApartmentTake::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            }
        } else
        if($what_i_sell == 'Комнаты') {
            if($sell_and_buy == 'Продам') {
                $realty = Rooms::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = RoomRents::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = RoomBuy::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else 
            if($sell_and_buy == 'Сниму') {
                $realty = RoomTake::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            }
        } else
        if($what_i_sell == 'Дома, дачи, коттеджи') {
            if($sell_and_buy == 'Продам') {
                $realty = Homes::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = HomesRent::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = HomesBuy::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = HomesTake::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            }
        } else
        if($what_i_sell == 'Земельные участки') {
            if($sell_and_buy == 'Продам') {
                $realty = LandPlot::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = LandPlotRent::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = LandPlotBuy::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = LandPlotType::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            }
        } else
        if($what_i_sell == 'Гаражи и машиноместа') {
            if($sell_and_buy == 'Продам') {
                $realty = Garages::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сдам') {
                $realty = GaragesRent::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Куплю') {
                $realty = GaragesBuy::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            } else
            if($sell_and_buy == 'Сниму') {
                $realty = GaragesTake::find($id);
                return view('estate_detailed', ['realty' => $realty]);
            }
        }
    }
    public function item_detailed($id) {
        $item = Items::find($id);
        return view('item_detailed', ['item' => $item]);
    }
    public function car_detailed($id) {
        $car = Cars::find($id);
        $marka = Mark::find($car->marka);
        return view('car_detailed', ['car' => $car, 'marka' => $marka]);
    }
    public function job_detailed($id, $job) {
        if($job == 'Резюме') {
            $job_detailed = JobsResume::find($id);
            return view('job_detailed', ['job_detailed' => $job_detailed, 'job' => $job]);
        } else
        if($job == 'Вакансии') {
            $job_detailed = JobsOpenings::find($id);
            return view('job_detailed', ['job_detailed' => $job_detailed, 'job' => $job]);
        }
    }
}
