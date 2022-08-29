<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use Illuminate\Http\Request;
use App\Models\User;
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
use App\Models\Tour;
use App\Models\Reason;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function reg()
    {
        return view('reg');
    }

    public function login_p(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);

        if (auth('web')->attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withErrors([
                'email' => 'Email или пароль введены неверно!'
            ]);
        }
    }

    public function reg_p(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'name' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
            'status' => 0,
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        return redirect()->route('home');
    }

    public function cabinet()
    {
        $realty = Realty::where('user', '=', auth()->user()->id)->count();
        $rooms = Rooms::where('user', '=', auth()->user()->id)->count();
        $homes = Homes::where('user', '=', auth()->user()->id)->count();
        $land_plotes = LandPlot::where('user', '=', auth()->user()->id)->count();
        $garages = Garages::where('user', '=', auth()->user()->id)->count();
        $apartment_take = ApartmentTake::where('user', '=', auth()->user()->id)->count();
        $apartment_buy = ApartmentBuy::where('user', '=', auth()->user()->id)->count();
        $apartment_rent = ApartmentRent::where('user', '=', auth()->user()->id)->count();
        $homes_take = HomesTake::where('user', '=', auth()->user()->id)->count();
        $homes_buy = HomesBuy::where('user', '=', auth()->user()->id)->count();
        $homes_rent = HomesRent::where('user', '=', auth()->user()->id)->count();
        $room_take = RoomTake::where('user', '=', auth()->user()->id)->count();
        $room_buy = RoomBuy::where('user', '=', auth()->user()->id)->count();
        $room_rent = RoomRents::where('user', '=', auth()->user()->id)->count();
        $land_plot_take = LandPlotType::where('user', '=', auth()->user()->id)->count();
        $land_plot_buy = LandPlotBuy::where('user', '=', auth()->user()->id)->count();
        $land_plot_rent = LandPlotRent::where('user', '=', auth()->user()->id)->count();
        $garages_rent = GaragesRent::where('user', '=', auth()->user()->id)->count();
        $garages_buy = GaragesBuy::where('user', '=', auth()->user()->id)->count();
        $garages_take = GaragesTake::where('user', '=', auth()->user()->id)->count();
        $cars = Cars::where('user', '=', auth()->user()->id)->count();
        $items = Items::where('user', '=', auth()->user()->id)->count();
        $tours = Tour::where('user', '=', auth()->user()->id)->count();
        $jobs_resume = JobsResume::where('user', '=', auth()->user()->id)->count();
        $jobs_openings = JobsOpenings::where('user', '=', auth()->user()->id)->count();

        $ads_count = $realty + $rooms + $homes + $land_plotes + $garages + $apartment_take + $apartment_buy + $apartment_rent + $homes_take + $homes_buy + $homes_rent + $room_take + $room_buy + $room_rent + $land_plot_take + $land_plot_buy + $land_plot_rent + $garages_take + $garages_buy + $garages_rent + $cars + $items + $jobs_resume + $jobs_openings + $tours;

        $favourites_count = Favourites::where('user', '=', auth()->user()->id)->count();
        return view('cabinet', ['favourites_count' => $favourites_count, 'ads_count' => $ads_count]);
    }

    public function user_info()
    {
        return view('user_info');
    }

    public function user_info_p(Request $data)
    {
        $valid = $data->validate([
            'name' => ['required'],
            'tel' => ['string'],
            'email' => ['email', 'string', 'unique:users,email'],
        ]);
        
        $review = User::find(auth()->user()->id);
        $review->name = $data->input('name');
        $review->tel = $data->input('tel');
        $review->email = auth()->user()->email;
        $review->save();

        return redirect()->route('cabinet');
    }

    public function my_adv()
    {
        $realty = Realty::where('user', '=', auth()->user()->id)->get();
        $rooms = Rooms::where('user', '=', auth()->user()->id)->get();
        $homes = Homes::where('user', '=', auth()->user()->id)->get();
        $land_plotes = LandPlot::where('user', '=', auth()->user()->id)->get();
        $garages = Garages::where('user', '=', auth()->user()->id)->get();
        $apartment_take = ApartmentTake::where('user', '=', auth()->user()->id)->get();
        $apartment_buy = ApartmentBuy::where('user', '=', auth()->user()->id)->get();
        $apartment_rent = ApartmentRent::where('user', '=', auth()->user()->id)->get();
        $homes_take = HomesTake::where('user', '=', auth()->user()->id)->get();
        $homes_buy = HomesBuy::where('user', '=', auth()->user()->id)->get();
        $homes_rent = HomesRent::where('user', '=', auth()->user()->id)->get();
        $room_take = RoomTake::where('user', '=', auth()->user()->id)->get();
        $room_buy = RoomBuy::where('user', '=', auth()->user()->id)->get();
        $room_rent = RoomRents::where('user', '=', auth()->user()->id)->get();
        $land_plot_take = LandPlotType::where('user', '=', auth()->user()->id)->get();
        $land_plot_buy = LandPlotBuy::where('user', '=', auth()->user()->id)->get();
        $land_plot_rent = LandPlotRent::where('user', '=', auth()->user()->id)->get();
        $garages_rent = GaragesRent::where('user', '=', auth()->user()->id)->get();
        $garages_buy = GaragesBuy::where('user', '=', auth()->user()->id)->get();
        $garages_take = GaragesTake::where('user', '=', auth()->user()->id)->get();
        $cars = Cars::where('user', '=', auth()->user()->id)->get();
        $marks = Mark::where('user', '=', auth()->user()->id)->get();
        $items = Items::where('user', '=', auth()->user()->id)->get();
        $tours = Tour::where('user', '=', auth()->user()->id)->get();
        $jobs_resume = JobsResume::where('user', '=', auth()->user()->id)->get();
        $jobs_openings = JobsOpenings::where('user', '=', auth()->user()->id)->get();

        $estate = [];

        foreach($homes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($realty as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($rooms as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($land_plotes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($garages as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($apartment_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($apartment_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($apartment_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($homes_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($homes_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($homes_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($room_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($room_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($room_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($land_plot_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($land_plot_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($land_plot_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($garages_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        
        foreach($garages_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($garages_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($cars as $item) {
            foreach($marks->where('id', '=', $item->marka) as $marka) {
                $estate[] = array(
                    "id" => $item->id,
                    "type" => 'Транспорт',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                    "type_time" => '',
                    "user" => $item->user,
                    "square" => '',
                    "price" => $item->price,
                    "city" => $item->city,
                    "images" => $item->images,
                    "marka" => $marka->marka,
                    "model" => $marka->model,
                    "year" => $marka->year,
                    "mileage" => $marka->mileage,
                    "transmission" => $marka->transmission,
                    "horse_power" => $marka->horse_power,
                    "created_at" => $item->created_at,
                    "status" => $item->status,
                );
            }
        };

        foreach($items as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Личные вещи',
                "name" => $item->name,
                "what_i_sell" => '',
                "sell_and_buy" => '',
                "type_time" => '',
                "user" => $item->user,
                "square" => '',
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($tours as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Туризм',
                "name" => $item->name,
                "what_i_sell" => '',
                "sell_and_buy" => '',
                "type_time" => '',
                "user" => $item->user,
                "square" => '',
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($jobs_resume as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Работа',
                "desired_position" => $item->desired_position,
                "what_i_sell" => 'Резюме',
                "user" => $item->user,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        foreach($jobs_openings as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Работа',
                "desired_position" => $item->desired_position,
                "what_i_sell" => 'Вакансии',
                "user" => $item->user,
                "from_price" => $item->from_price,
                "before_price" => $item->before_price,
                "when_price" => $item->when_price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
                "status" => $item->status,
            );
        };

        $dateArray = [];
        foreach($estate as $key=>$arr){
            $dateArray[$key]=$arr['created_at'];
        }
        array_multisort($dateArray, SORT_DESC, $estate);

        $reason = Reason::get();

        return view('my_adv', ['estate' => $estate, 'reason' => $reason]);
    }

    public function favorites()
    {
        $favourites = Favourites::orderBy('id', 'DESC')->get();
        return view('favorites', ['favourites' => $favourites]);
    }

    public function exit()
    {
        auth('web')->logout();
        return redirect()->route('home');
    }

    public function control_panel()
    {
        return view('control_panel.index');
    }

    public function cp_adv()
    {
        $realty = Realty::where('status', '=', 0)->get();
        $rooms = Rooms::where('status', '=', 0)->get();
        $homes = Homes::where('status', '=', 0)->get();
        $land_plotes = LandPlot::where('status', '=', 0)->get();
        $garages = Garages::where('status', '=', 0)->get();
        $apartment_take = ApartmentTake::where('status', '=', 0)->get();
        $apartment_buy = ApartmentBuy::where('status', '=', 0)->get();
        $apartment_rent = ApartmentRent::where('status', '=', 0)->get();
        $homes_take = HomesTake::where('status', '=', 0)->get();
        $homes_buy = HomesBuy::where('status', '=', 0)->get();
        $homes_rent = HomesRent::where('status', '=', 0)->get();
        $room_take = RoomTake::where('status', '=', 0)->get();
        $room_buy = RoomBuy::where('status', '=', 0)->get();
        $room_rent = RoomRents::where('status', '=', 0)->get();
        $land_plot_take = LandPlotType::where('status', '=', 0)->get();
        $land_plot_buy = LandPlotBuy::where('status', '=', 0)->get();
        $land_plot_rent = LandPlotRent::where('status', '=', 0)->get();
        $garages_rent = GaragesRent::where('status', '=', 0)->get();
        $garages_buy = GaragesBuy::where('status', '=', 0)->get();
        $garages_take = GaragesTake::where('status', '=', 0)->get();
        $cars = Cars::where('status', '=', 0)->get();
        $marks = Mark::where('status', '=', 1)->get();
        $items = Items::where('status', '=', 0)->get();
        $tours = Tour::where('status', '=', 0)->get();
        $jobs_resume = JobsResume::where('status', '=', 0)->get();
        $jobs_openings = JobsOpenings::where('status', '=', 0)->get();

        $estate = [];

        foreach($homes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($realty as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($rooms as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($land_plotes as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($garages as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($apartment_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($apartment_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($apartment_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($homes_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($homes_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($homes_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($room_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($room_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($room_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
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
                "created_at" => $item->created_at,
            );
        };

        foreach($land_plot_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($land_plot_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($land_plot_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($garages_rent as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        
        foreach($garages_buy as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($garages_take as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
                "type_time" => $item->type_time,
                "user" => $item->user,
                "square" => $item->square,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($cars as $item) {
            foreach($marks->where('id', '=', $item->marka) as $marka) {
                $estate[] = array(
                    "id" => $item->id,
                    "type" => 'Транспорт',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                    "type_time" => '',
                    "user" => $item->user,
                    "square" => '',
                    "price" => $item->price,
                    "city" => $item->city,
                    "images" => $item->images,
                    "marka" => $marka->marka,
                    "model" => $marka->model,
                    "year" => $marka->year,
                    "created_at" => $item->created_at,
                );
            }
        };

        foreach($items as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Личные вещи',
                "name" => $item->name,
                "what_i_sell" => '',
                "sell_and_buy" => '',
                "type_time" => '',
                "user" => $item->user,
                "square" => '',
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($tours as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Туризм',
                "name" => $item->name,
                "what_i_sell" => '',
                "sell_and_buy" => '',
                "type_time" => '',
                "user" => $item->user,
                "square" => '',
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($jobs_resume as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Работа',
                "desired_position" => $item->desired_position,
                "what_i_sell" => 'Резюме',
                "user" => $item->user,
                "price" => $item->price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        foreach($jobs_openings as $item) {
            $estate[] = array(
                "id" => $item->id,
                "type" => 'Работа',
                "desired_position" => $item->desired_position,
                "what_i_sell" => 'Вакансии',
                "user" => $item->user,
                "from_price" => $item->from_price,
                "before_price" => $item->before_price,
                "when_price" => $item->when_price,
                "city" => $item->city,
                "images" => $item->images,
                "created_at" => $item->created_at,
            );
        };

        $dateArray = [];
        foreach($estate as $key=>$arr){
            $dateArray[$key]=$arr['created_at'];
        }
        array_multisort($dateArray, SORT_ASC, $estate);

        return view('control_panel.all_adv', ['estate' => $estate]);
    }
    public function approve_items($id) {
        $item = Items::find($id);
        $item->status = 1;
        $item->save();

        return redirect()->route('all_adv');
    }
    public function no_approve_items(Request $data, $id) {
        $items = Items::find($id);
        $items->status = -1;
        $items->save();

        if(Reason::where('id_adv', '=', $id)->count() == 0) {
            $reason = new Reason;
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        } else {
            $reason = Reason::find($id);
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        }

        Favourites::where('id_adv', '=', $id)->delete();

        return redirect()->route('all_adv');
    }
    public function approve_cars($id) {
        $item = Cars::find($id);
        $item->status = 1;
        $item->save();

        return redirect()->route('all_adv');
    }
    public function no_approve_cars(Request $data, $id) {
        $cars = Cars::find($id);
        $cars->status = -1;
        $cars->save();

        if(Reason::where('id_adv', '=', $id)->count() == 0) {
            $reason = new Reason;
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        } else {
            $reason = Reason::find($id);
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        }

        Favourites::where('id_adv', '=', $id)->delete();

        return redirect()->route('all_adv');
    }
    public function approve_estate($what_i_sell, $sell_and_buy, $id) {
        if($what_i_sell == 'Квартиры') {
            if($sell_and_buy == 'Продам') {
                $item = Realty::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = ApartmentRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = ApartmentBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = ApartmentTake::find($id);
            }
        } else
        if($what_i_sell == 'Комнаты') {
            if($sell_and_buy == 'Продам') {
                $item = Rooms::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = RoomRents::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = RoomBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = RoomTake::find($id);
            }
        } else 
        if($what_i_sell == 'Дома, дачи, коттеджи') {
            if($sell_and_buy == 'Продам') {
                $item = Homes::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = HomesRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = HomesBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = HomesTake::find($id);
            }
        } else
        if($what_i_sell == 'Земельные участки') {
            if($sell_and_buy == 'Продам') {
                $item = LandPlot::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = LandPlotRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = LandPlotBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = LandPlotType::find($id);
            }
        } else
        if($what_i_sell == 'Гаражи и машиноместа') {
            if($sell_and_buy == 'Продам') {
                $item = Garages::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = GaragesRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = GaragesBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = GaragesTake::find($id);
            }
        }

        $item->status = 1;
        $item->save();
        return redirect()->route('all_adv');
    }
    public function no_approve_estate(Request $data, $what_i_sell, $sell_and_buy, $id) {
        if($what_i_sell == 'Квартиры') {
            if($sell_and_buy == 'Продам') {
                $item = Realty::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = ApartmentRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = ApartmentBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = ApartmentTake::find($id);
            }
        } else
        if($what_i_sell == 'Комнаты') {
            if($sell_and_buy == 'Продам') {
                $item = Rooms::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = RoomRents::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = RoomBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = RoomTake::find($id);
            }
        } else 
        if($what_i_sell == 'Дома, дачи, коттеджи') {
            if($sell_and_buy == 'Продам') {
                $item = Homes::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = HomesRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = HomesBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = HomesTake::find($id);
            }
        } else
        if($what_i_sell == 'Земельные участки') {
            if($sell_and_buy == 'Продам') {
                $item = LandPlot::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = LandPlotRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = LandPlotBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = LandPlotType::find($id);
            }
        } else
        if($what_i_sell == 'Гаражи и машиноместа') {
            if($sell_and_buy == 'Продам') {
                $item = Garages::find($id);
            } else
            if($sell_and_buy == 'Сдам') {
                $item = GaragesRent::find($id);
            } else
            if($sell_and_buy == 'Куплю') {
                $item = GaragesBuy::find($id);
            } else
            if($sell_and_buy == 'Сниму') {
                $item = GaragesTake::find($id);
            }
        }
        
        $item->status = -1;
        $item->save();

        if(Reason::where('id_adv', '=', $id)->count() == 0) {
            $reason = new Reason;
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        } else {
            $reason = Reason::find($id);
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        }

        Favourites::where('id_adv', '=', $id)->delete();
        return redirect()->route('all_adv');
    }
    public function approve_jobs($what_i_sell, $id) {
        if($what_i_sell == 'Резюме') {
            $item = JobsResume::find($id);
        } else {
            $item = JobsOpenings::find($id);
        }

        $item->status = 1;
        $item->save();
        return redirect()->route('all_adv');
    }
    public function no_approve_jobs(Request $data, $what_i_sell, $id) {
        if($what_i_sell == 'Резюме') {
            $jobs = JobsResume::find($id);
        } else {
            $jobs = JobsOpenings::find($id);
        }
        $jobs->status = -1;
        $jobs->save();

        if(Reason::where('id_adv', '=', $id)->count() == 0) {
            $reason = new Reason;
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        } else {
            $reason = Reason::find($id);
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        }

        Favourites::where('id_adv', '=', $id)->delete();        
        return redirect()->route('all_adv');
    }
    public function approve_tours($id) {
        $item = Tour::find($id);
        $item->status = 1;
        $item->save();
        return redirect()->route('all_adv');
    }
    public function no_approve_tours(Request $data, $id) {
        $tour = Tour::find($id);
        $tour->status = -1;
        $tour->save();

        if(Reason::where('id_adv', '=', $id)->count() == 0) {
            $reason = new Reason;
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        } else {
            $reason = Reason::find($id);
            $reason->id_adv = $id;
            $reason->text = $data->input('text');
            $reason->save();
        }

        Favourites::where('id_adv', '=', $id)->delete();

        return redirect()->route('all_adv');
    }
    public function cp_personal() {
        return view('control_panel.personal');
    }
    public function all_personal() {
        $item = User::all();
        return $item;
    }
    public function increase($id) {
        $item = User::find($id);
        if($item->status == 0) {
            $item->status = 6;
            $item->save();
        }
        return $item;
    }
    public function lower($id) {
        $item = User::find($id);
        if($item->status == 6) {
            $item->status = 0;
            $item->save();
        }
        return $item;
    }
}