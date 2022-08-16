<?php

namespace App\Http\Controllers;

use App\Models\ApartmentRent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\ItemsImage;
use App\Models\Items;
use App\Models\Mark;
use App\Models\CarsImage;
use App\Models\Cars;
use App\Models\RealtyImage;
use App\Models\Realty;
use App\Models\ApartmentBuy;
use App\Models\ApartmentTake;
use App\Models\Rooms;
use App\Models\RoomRents;
use App\Models\RoomBuy;
use App\Models\RoomTake;
use App\Models\Homes;
use App\Models\HomesRent;
use App\Models\HomesBuy;
use App\Models\HomesTake;
use App\Models\LandPlot;
use App\Models\LandPlotRent;
use App\Models\LandPlotBuy;
use App\Models\LandPlotType;
use App\Models\Garages;
use App\Models\GaragesRent;
use App\Models\GaragesBuy;
use App\Models\GaragesTake;
use App\Models\JobsImage;
use App\Models\JobsResume;
use App\Models\JobsOpenings;
use App\Models\Favourites;

class AddEditController extends Controller
{
    public function add_estate(){
        if(Auth()->check()){
            return view('add_estate');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_estate(){
        return view('estate');
    }
    public function delete_estate(){
        return view('estate');
    }
    public function add_cars(){
        if(Auth()->check()){
            return view('add_cars');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_cars(){
        return view('cars');
    }
    public function delete_cars(){
        return view('cars');
    }
    public function add_job(){
        if(Auth()->check()){
            return view('add_job');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_job(){
        return view('job');
    }
    public function delete_job(){
        return view('job');
    }
    public function add_items(){
        if(Auth()->check()){
            return view('add_items');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_items(){
        return view('items');
    }
    public function delete_items(){
        return view('items');
    }
    public function img_add_items(Request $data){
        if(!empty($data->image)) {
            if(ItemsImage::where('user', '=', auth()->user()->id)->count() <= 2) {
                $items_image = new ItemsImage();
                $file = $data->file('image');
                $upload_folder = 'public/items_image/'.auth()->user()->id;
                $filename = rand().'_'.$file->getClientOriginalName();
                $items_image->image = $filename;
                $items_image->user = auth()->user()->id;
                Storage::putFileAs($upload_folder, $file, $filename);
                $items_image->save();
                $items = array(
                    "id" => $items_image->id,
                    "image" => $items_image->image,
                );
                return $items;
            }
        }
    }
    public function all_img_items(){
        $items_image_count = ItemsImage::where('user', '=', auth()->user()->id)->count();
        if($items_image_count != 0) {
            $items_image = ItemsImage::where('user', '=', auth()->user()->id)->get();
            return $items_image;
        } else {
            return 0;
        }
    }
    public function img_delete_items($id){
        $items_image = ItemsImage::find($id);
        $upload_folder = 'public/items_image/'.auth()->user()->id;
        Storage::delete($upload_folder . '/' . $items_image->image);
        ItemsImage::find($id)->delete();
    }
    public function add_items_post(Request $data){
        $valid = $data->validate([
            'name' => ['required'],
            'state' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $items_image = ItemsImage::where('user', '=', auth()->user()->id)->get();

        if(ItemsImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $items = new Items();
            $items->user = auth()->user()->id;
            $items->name = $data->input('name');
            $items->state = $data->input('state');
            $items->description = $data->input('description');
            $items->price = $data->input('price');
            $items->tel = auth()->user()->tel;
            $items->name_user = auth()->user()->name;
            
            $images = '';
            foreach($items_image as $item) {
                $images = $images.$item->image.',';
            }
            $items->images = rtrim($images, ",");
            $items->city = $data->input('city');
            $items->status = 0;
            $items->save();

            ItemsImage::where('user', '=', auth()->user()->id)->delete();
        }
    }
    public function add_marka(Request $data) {
        if($data['mileage'] != '') {
            $mark = new Mark();
            $mark->user = auth()->user()->id;
            $mark->marka = $data['marka'];
            $mark->model = $data['model'];
            $mark->year = $data['year'];
            $mark->body_type = $data['body_type'];
            $mark->gen = $data['gen'];
            $mark->engine_type = $data['engine_type'];
            $mark->drive = $data['drive'];
            $mark->transmission = $data['transmission'];
            $mark->horse_power = $data['horse_power'];
            $mark->mileage = $data['mileage'];
            $mark->gas_cylinder = $data['gas_cylinder'];
            $mark->status = 0;
            $mark->save();
        }
    }
    public function all_marka() {
        $marka_count = Mark::where([['user', '=', auth()->user()->id], ['status', '=', 0]])->count();
        if($marka_count != 0) {
            $marka = Mark::where([['user', '=', auth()->user()->id], ['status', '=', 0]])->first();
            return $marka;
        } else {
            return 0;
        }
    }
    public function img_add_cars(Request $data) {
        if(!empty($data->image)) {
            if(CarsImage::where('user', '=', auth()->user()->id)->count() <= 2) {
                $cars_image = new CarsImage();
                $file = $data->file('image');
                $upload_folder = 'public/cars_image/'.auth()->user()->id;
                $filename = rand().'_'.$file->getClientOriginalName();
                $cars_image->image = $filename;
                $cars_image->user = auth()->user()->id;
                Storage::putFileAs($upload_folder, $file, $filename);
                $cars_image->save();
                $cars = array(
                    "id" => $cars_image->id,
                    "image" => $cars_image->image,
                );
                return $cars;
            }
        }
    }
    public function all_img_cars(){
        $cars_image_count = CarsImage::where('user', '=', auth()->user()->id)->count();
        if($cars_image_count != 0) {
            $cars_image = CarsImage::where('user', '=', auth()->user()->id)->get();
            return $cars_image;
        } else {
            return 0;
        }
    }
    public function img_delete_cars($id){
        $cars_image = CarsImage::find($id);
        $upload_folder = 'public/cars_image/'.auth()->user()->id;
        Storage::delete($upload_folder . '/' . $cars_image->image);
        CarsImage::find($id)->delete();
    }
    public function add_cars_post(Request $data){
        $valid = $data->validate([
            'state' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $cars_image = CarsImage::where('user', '=', auth()->user()->id)->get();
        $marka = Mark::where([['user', '=', auth()->user()->id], ['status', '=', 0]])->first();
        $marka->status = 1;
        $marka->save();
        
        if(CarsImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $cars = new Cars();
            $cars->user = auth()->user()->id;
            $cars->state = $data->input('state');
            $cars->description = $data->input('description');
            $cars->price = $data->input('price');
            $cars->tel = auth()->user()->tel;
            $cars->name_user = auth()->user()->name;
            
            $images = '';
            foreach($cars_image as $item) {
                $images = $images.$item->image.',';
            }
            $cars->images = rtrim($images, ",");

            $cars->marka = $marka->id;
            $cars->type_doc = $data->input('type_doc');
            $cars->owner_count = $data->input('owner_count');
            $cars->when_pur_year = $data->input('when_pur_year');
            $cars->when_pur_month = $data->input('when_pur_month');
            if(!empty($data->input('year_graduation'))) {
                $cars->year_graduation = $data->input('year_graduation');
                $cars->month_graduation = $data->input('month_graduation');
            } else {
                $cars->year_graduation = null;
                $cars->month_graduation = null;
            }
            if($data->input('state_number') != '') {
                $cars->state_number = $data->input('state_number');
            } else {
                $cars->state_number = null;
            }
            $cars->vin = $data->input('vin');
            $cars->ctc = $data->input('ctc');
            $cars->city = $data->input('city');
            $cars->status = 0;
            $cars->save();

            CarsImage::where('user', '=', auth()->user()->id)->delete();
        }
    }
    public function delete_marka() {
        CarsImage::where('user', '=', auth()->user()->id)->delete();
    }
    public function img_add_realty(Request $data) {
        if(!empty($data->image)) {
            if(RealtyImage::where('user', '=', auth()->user()->id)->count() <= 19) {
                $realty_image = new RealtyImage();
                $file = $data->file('image');
                $upload_folder = 'public/realty_image/'.auth()->user()->id;
                $filename = rand().'_'.$file->getClientOriginalName();
                $realty_image->image = $filename;
                $realty_image->user = auth()->user()->id;
                Storage::putFileAs($upload_folder, $file, $filename);
                $realty_image->save();
                $realty = array(
                    "id" => $realty_image->id,
                    "image" => $realty_image->image,
                );
                return $realty;
            }
        }
    }
    public function all_img_realty(){
        $realty_image_count = RealtyImage::where('user', '=', auth()->user()->id)->count();
        if($realty_image_count != 0) {
            $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
            return $realty_image;
        } else {
            return 0;
        }
    }
    public function img_delete_realty($id){
        $realty_image = RealtyImage::find($id);
        $upload_folder = 'public/realty_image/'.auth()->user()->id;
        Storage::delete($upload_folder . '/' . $realty_image->image);
        RealtyImage::find($id)->delete();
    }
    public function add_estate_post(Request $data){
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new Realty();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->number_flat = $data['number_flat'];
        $realty->who_add = $data['who_add'];
        $realty->online_display = $data['online_display'];

        $realty->type_residential = $data['type_residential'];
        $realty->floor = $data['floor'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->square = $data['square'];
        $realty->residential_square = $data['residential_square'];
        $realty->type_home = $data['type_home'];
        $realty->floor_home = $data['floor_home'];
        $realty->elevator = $data['elevator'];
        $realty->closed_territory = $data['closed_territory'];
        $realty->children_playground = $data['children_playground'];
        $realty->sports_ground = $data['sports_ground'];
        $realty->parking = $data['parking'];
        
        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];
        
        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_apartment_rent(Request $data){
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new ApartmentRent();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->number_flat = $data['number_flat'];
        $realty->who_add = $data['who_add'];
        $realty->online_display = $data['online_display'];

        $realty->type_time = $data['type_time'];
        $realty->type_residential = $data['type_residential'];
        $realty->floor = $data['floor'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->square = $data['square'];
        $realty->residential_square = $data['residential_square'];
        $realty->conditioner = $data['conditioner'];
        $realty->fridge = $data['fridge'];
        $realty->stove = $data['stove'];
        $realty->nuke = $data['nuke'];
        $realty->washing_machine = $data['washing_machine'];
        $realty->dishwasher = $data['dishwasher'];
        $realty->water_heater = $data['water_heater'];
        $realty->TV = $data['TV'];
        $realty->wi_fi = $data['wi_fi'];
        $realty->television = $data['television'];
        $realty->type_home = $data['type_home'];
        $realty->floor_home = $data['floor_home'];
        $realty->elevator = $data['elevator'];
        $realty->closed_territory = $data['closed_territory'];
        $realty->children_playground = $data['children_playground'];
        $realty->sports_ground = $data['sports_ground'];
        $realty->parking = $data['parking'];
        $realty->max_guest = $data['max_guest'];
        $realty->may_children = $data['may_children'];
        $realty->may_animal = $data['may_animal'];
        $realty->allowed_smoke = $data['allowed_smoke'];
        
        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_apartment_buy(Request $data){        
        $realty = new ApartmentBuy();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_apartment_take(Request $data){        
        $realty = new ApartmentTake();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->count_bed = $data['count_bed'];
        $realty->count_sleeping_places = $data['count_sleeping_places'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->conditioner = $data['conditioner'];
        $realty->fridge = $data['fridge'];
        $realty->stove = $data['stove'];
        $realty->nuke = $data['nuke'];
        $realty->washing_machine = $data['washing_machine'];
        $realty->TV = $data['TV'];
        $realty->wi_fi = $data['wi_fi'];
        $realty->parking = $data['parking'];
        $realty->may_children = $data['may_children'];
        $realty->may_animal = $data['may_animal'];
        $realty->allowed_smoke = $data['allowed_smoke'];
        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_room(Request $data){
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new Rooms();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->number_flat = $data['number_flat'];
        $realty->who_add = $data['who_add'];
        $realty->online_display = $data['online_display'];

        $realty->type_residential = $data['type_residential'];
        $realty->floor = $data['floor'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->square = $data['square'];
        $realty->residential_square = $data['residential_square'];
        $realty->type_home = $data['type_home'];
        $realty->floor_home = $data['floor_home'];
        $realty->elevator = $data['elevator'];
        $realty->closed_territory = $data['closed_territory'];
        $realty->children_playground = $data['children_playground'];
        $realty->sports_ground = $data['sports_ground'];
        $realty->parking = $data['parking'];
        
        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_room_rent(Request $data){
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();

        $realty = new RoomRents();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->number_flat = $data['number_flat'];
        $realty->who_add = $data['who_add'];
        $realty->online_display = $data['online_display'];
        $realty->type_residential = $data['type_residential'];
        $realty->location = $data['location'];
        $realty->floor = $data['floor'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->square = $data['square'];
        $realty->type_home = $data['type_home'];
        $realty->floor_home = $data['floor_home'];
        $realty->count_bed = $data['count_bed'];
        $realty->count_sleeping_places = $data['count_sleeping_places'];
        $realty->TV = $data['TV'];
        $realty->wi_fi = $data['wi_fi'];
        $realty->stove = $data['stove'];
        $realty->nuke = $data['nuke'];
        $realty->fridge = $data['fridge'];
        $realty->washing_machine = $data['washing_machine'];
        $realty->conditioner = $data['conditioner'];
        $realty->parking = $data['parking'];
        $realty->may_children = $data['may_children'];
        $realty->may_animal = $data['may_animal'];
        $realty->allowed_smoke = $data['allowed_smoke'];

        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->price = $data['price'];
        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_room_buy(Request $data){        
        $realty = new RoomBuy();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->description = $data['description'];
        $realty->price = $data['price'];
        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_room_take(Request $data){        
        $realty = new RoomTake();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->count_bed = $data['count_bed'];
        $realty->count_sleeping_places = $data['count_sleeping_places'];
        $realty->TV = $data['TV'];
        $realty->wi_fi = $data['wi_fi'];
        $realty->stove = $data['stove'];
        $realty->nuke = $data['nuke'];
        $realty->fridge = $data['fridge'];
        $realty->washing_machine = $data['washing_machine'];
        $realty->conditioner = $data['conditioner'];
        $realty->parking = $data['parking'];
        $realty->may_children = $data['may_children'];
        $realty->may_animal = $data['may_animal'];
        $realty->allowed_smoke = $data['allowed_smoke'];
        $realty->description = $data['description'];
        $realty->price = $data['price'];
        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_home(Request $data){        
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new Homes();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];
        $realty->online_display = $data['online_display'];

        $realty->object_type = $data['object_type'];
        $realty->bath_or_sauna = $data['bath_or_sauna'];
        $realty->swimming_pool = $data['swimming_pool'];
        $realty->plot_status = $data['plot_status'];
        $realty->year_construction = $data['year_construction'];
        $realty->wall_material = $data['wall_material'];
        $realty->floor_home = $data['floor_home'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->terrace_veranda = $data['terrace_veranda'];
        $realty->square = $data['square'];
        $realty->square_region = $data['square_region'];
        $realty->bathroom_home = $data['bathroom_home'];
        $realty->bathroom_street = $data['bathroom_street'];
        
        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_home_rent(Request $data){        
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new HomesRent();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];
        $realty->online_display = $data['online_display'];

        $realty->type_time = $data['type_time'];
        $realty->object_type = $data['object_type'];
        $realty->bath_or_sauna = $data['bath_or_sauna'];
        $realty->swimming_pool = $data['swimming_pool'];
        $realty->plot_status = $data['plot_status'];
        $realty->year_construction = $data['year_construction'];
        $realty->wall_material = $data['wall_material'];
        $realty->floor_home = $data['floor_home'];
        $realty->count_rooms = $data['count_rooms'];
        $realty->terrace_veranda = $data['terrace_veranda'];
        $realty->square = $data['square'];
        $realty->square_region = $data['square_region'];
        $realty->bathroom_home = $data['bathroom_home'];
        $realty->bathroom_street = $data['bathroom_street'];
        $realty->conditioner = $data['conditioner'];
        $realty->fridge = $data['fridge'];
        $realty->stove = $data['stove'];
        $realty->nuke = $data['nuke'];
        $realty->washing_machine = $data['washing_machine'];
        $realty->TV = $data['TV'];
        $realty->max_guest = $data['max_guest'];
        $realty->may_children = $data['may_children'];
        $realty->may_animal = $data['may_animal'];
        $realty->allowed_smoke = $data['allowed_smoke'];
        
        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_home_buy(Request $data){                
        $realty = new HomesBuy();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->object_type = $data['object_type'];
        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_home_take(Request $data){                
        $realty = new HomesTake();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->object_type = $data['object_type'];
        $realty->bath_or_sauna = $data['bath_or_sauna'];
        $realty->swimming_pool = $data['swimming_pool'];
        $realty->conditioner = $data['conditioner'];
        $realty->fridge = $data['fridge'];
        $realty->stove = $data['stove'];
        $realty->nuke = $data['nuke'];
        $realty->washing_machine = $data['washing_machine'];
        $realty->TV = $data['TV'];
        $realty->count_bed = $data['count_bed'];
        $realty->count_sleeping_places = $data['count_sleeping_places'];
        $realty->may_children = $data['may_children'];
        $realty->may_animal = $data['may_animal'];
        $realty->allowed_smoke = $data['allowed_smoke'];
        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_land_plot(Request $data){        
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new LandPlot();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_land_plot_rent(Request $data){        
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new LandPlotRent();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_land_plot_buy(Request $data){                
        $realty = new LandPlotBuy();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_land_plot_type(Request $data){                
        $realty = new LandPlotType();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_garage(Request $data){        
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new Garages();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->garage_type = $data['garage_type'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_garage_rent(Request $data){        
        $realty_image = RealtyImage::where('user', '=', auth()->user()->id)->get();
        
        $realty = new GaragesRent();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        if(RealtyImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($realty_image as $item) {
                $images = $images.$item->image.',';
            }
            $realty->images = rtrim($images, ",");
        } else {
            $realty->images = null;
        }

        $realty->description = $data['description'];
        $realty->garage_type = $data['garage_type'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_garage_buy(Request $data){                
        $realty = new GaragesBuy();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function add_garage_take(Request $data){                
        $realty = new GaragesTake();
        $realty->user = auth()->user()->id;
        $realty->tel = auth()->user()->tel;
        $realty->name_user = auth()->user()->name;
        $realty->what_i_sell = $data['what_i_sell'];
        $realty->sell_and_buy = $data['sell_and_buy'];

        $realty->adres = $data['adres'];

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return redirect()->route('login');
    }
    public function img_add_job(Request $data){
        if(!empty($data->image)) {
            if(JobsImage::where('user', '=', auth()->user()->id)->count() <= 4) {
                $job_image = new JobsImage();
                $file = $data->file('image');
                $upload_folder = 'public/jobs_image/'.auth()->user()->id;
                $filename = rand().'_'.$file->getClientOriginalName();
                $job_image->image = $filename;
                $job_image->user = auth()->user()->id;
                Storage::putFileAs($upload_folder, $file, $filename);
                $job_image->save();
                $items = array(
                    "id" => $job_image->id,
                    "image" => $job_image->image,
                );
                return $items;
            }
        }
    }
    public function all_img_job(){
        $jobs_image_count = JobsImage::where('user', '=', auth()->user()->id)->count();
        if($jobs_image_count != 0) {
            $jobs_image = JobsImage::where('user', '=', auth()->user()->id)->get();
            return $jobs_image;
        } else {
            return 0;
        }
    }
    public function img_delete_job($id){
        $jobs_image = JobsImage::find($id);
        $upload_folder = 'public/jobs_image/'.auth()->user()->id;
        Storage::delete($upload_folder . '/' . $jobs_image->image);
        JobsImage::find($id)->delete();
    }
    public function add_job_resume(Request $data){        
        $jobs_image = JobsImage::where('user', '=', auth()->user()->id)->get();
        
        $jobs = new JobsResume();
        $jobs->user = auth()->user()->id;
        $jobs->tel = auth()->user()->tel;
        $jobs->name_user = auth()->user()->name;
        $jobs->type_job = $data['type_job'];

        $jobs->desired_position = $data['desired_position'];
        $jobs->work_schedule = $data['work_schedule'];
        $jobs->work_experience = $data['work_experience'];
        $jobs->education = $data['education'];
        $jobs->gender = $data['gender'];
        $jobs->day_birth = $data['day_birth'];
        $jobs->month_birth = $data['month_birth'];
        $jobs->year_birth = $data['year_birth'];
        $jobs->read_trips = $data['read_trips'];
        $jobs->move = $data['move'];
        $jobs->citizenship = $data['citizenship'];
        $jobs->company_name = $data['company_name'];
        $jobs->post = $data['post'];
        $jobs->month_getting_started = $data['month_getting_started'];
        $jobs->year_getting_started = $data['year_getting_started'];
        $jobs->month_end_work = $data['month_end_work'];
        $jobs->year_end_work = $data['year_end_work'];
        $jobs->until_now = $data['until_now'];
        $jobs->responsibilities = $data['responsibilities'];
        $jobs->name_institution = $data['name_institution'];
        $jobs->specialization = $data['specialization'];
        $jobs->year_graduation = $data['year_graduation'];
        $jobs->knowledge_languages = $data['knowledge_languages'];

        if(JobsImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($jobs_image as $item) {
                $images = $images.$item->image.',';
            }
            $jobs->images = rtrim($images, ",");
        } else {
            $jobs->images = null;
        }

        $jobs->description = $data['description'];
        $jobs->price = $data['price'];
        $jobs->adres = $data['adres'];

        $jobs->city = $data['city'];
        $jobs->status = 0;
        $jobs->save();

        JobsImage::where('user', '=', auth()->user()->id)->delete();
    }
    public function add_job_openings(Request $data){        
        $jobs_image = JobsImage::where('user', '=', auth()->user()->id)->get();
        
        $jobs = new JobsOpenings();
        $jobs->user = auth()->user()->id;
        $jobs->tel = auth()->user()->tel;
        $jobs->name_user = auth()->user()->name;
        $jobs->type_job = $data['type_job'];

        $jobs->desired_position = $data['desired_position'];
        $jobs->work_schedule = $data['work_schedule'];
        $jobs->frequency_payments = $data['frequency_payments'];
        $jobs->where_work = $data['where_work'];

        if(JobsImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $images = '';
            foreach($jobs_image as $item) {
                $images = $images.$item->image.',';
            }
            $jobs->images = rtrim($images, ",");
        } else {
            $jobs->images = null;
        }

        $jobs->description = $data['description'];
        $jobs->from_price = $data['from_price'];
        $jobs->before_price = $data['before_price'];
        $jobs->when_price = $data['when_price'];
        $jobs->adres = $data['adres'];
        $jobs->work_experience = $data['work_experience'];
        $jobs->over_years_old = $data['over_years_old'];
        $jobs->from_years_old = $data['from_years_old'];
        $jobs->with_violation_health = $data['with_violation_health'];

        $jobs->city = $data['city'];
        $jobs->status = 0;
        $jobs->save();

        JobsImage::where('user', '=', auth()->user()->id)->delete();
    }
    public function add_favourites($type, $what_i_sell, $sell_and_buy, $id){
        if($type == 'Недвижимость') {
            if($what_i_sell == 'Квартиры') {
                if($sell_and_buy == 'Продам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = Realty::find($id);
                        if($item->count_rooms == 'Студия') {
                            $item_name = 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.';
                        } else {
                            $item_name = $item->count_rooms.'-к. квартира, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.';
                        }
                    }
                } else
                if($sell_and_buy == 'Сдам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = ApartmentRent::find($id);
                        if($item->count_rooms == 'Студия') {
                            $item_name = 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.';
                        } else {
                            $item_name = $item->count_rooms.'-к. квартира, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.';
                        }
                    }
                } else
                if($sell_and_buy == 'Куплю') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = ApartmentBuy::find($id);
                        $item_name = $item->count_rooms.'-к. квартира';
                    }
                } else
                if($sell_and_buy == 'Сниму') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = ApartmentTake::find($id);
                        $item_name = $item->count_rooms.'-к. квартира';
                    }
                }
            } else
            if($what_i_sell == 'Комнаты') {
                if($sell_and_buy == 'Продам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = Rooms::find($id);
                        if($item->count_rooms == 'Студия') {
                            $item_name = 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.';
                        } else {
                            $item_name = 'Комната '.$item->square.' м² в '.$item->count_rooms.'-k., '.$item->floor.'/'.$item->floor_home.' эт.';
                        }
                    }
                } else
                if($sell_and_buy == 'Сдам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = RoomRents::find($id);
                        if($item->count_rooms == 'Студия') {
                            $item_name = 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.';
                        } else {
                            $item_name = 'Комната '.$item->square.' м² в '.$item->count_rooms.'-k., '.$item->floor.'/'.$item->floor_home.' эт.';
                        }
                    }
                } else
                if($sell_and_buy == 'Куплю') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = RoomBuy::find($id);
                        $item_name = 'Комната';
                    }
                } else
                if($sell_and_buy == 'Сниму') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = RoomTake::find($id);
                        $item_name = 'Комната';
                    }
                }
            } else 
            if($what_i_sell == 'Дома, дачи, коттеджи') {
                if($sell_and_buy == 'Продам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = Homes::find($id);
                        $item_name = $item->object_type.' '.$item->square.' м² на участке '.$item->square_region.' сот.';
                    }
                } else
                if($sell_and_buy == 'Сдам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = HomesRent::find($id);
                        $item_name = $item->object_type.' '.$item->square.' м² на участке '.$item->square_region.' сот.';
                    }
                } else
                if($sell_and_buy == 'Куплю') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = HomesBuy::find($id);
                        $item_name = $item->object_type;
                    }
                } else
                if($sell_and_buy == 'Сниму') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = HomesTake::find($id);
                        $item_name = $item->object_type;
                    }
                }
            } else
            if($what_i_sell == 'Земельные участки') {
                if($sell_and_buy == 'Продам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = LandPlot::find($id);
                        $item_name = 'Участок '.$item->square.' сот.';
                    }
                } else
                if($sell_and_buy == 'Сдам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = LandPlotRent::find($id);
                        $item_name = 'Участок '.$item->square.' сот.';
                    }
                } else
                if($sell_and_buy == 'Куплю') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = LandPlotBuy::find($id);
                        $item_name = 'Участок';
                    }
                } else
                if($sell_and_buy == 'Сниму') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = LandPlotType::find($id);
                        $item_name = 'Участок';
                    }
                }
            } else
            if($what_i_sell == 'Гаражи и машиноместа') {
                if($sell_and_buy == 'Продам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = Garages::find($id);
                        $item_name = 'Гараж, '.$item->square.' м²';
                    }
                } else
                if($sell_and_buy == 'Сдам') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = GaragesRent::find($id);
                        $item_name = 'Гараж, '.$item->square.' м²';
                    }
                } else
                if($sell_and_buy == 'Куплю') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = GaragesBuy::find($id);
                        $item_name = 'Гараж';
                    }
                } else
                if($sell_and_buy == 'Сниму') {
                    $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $what_i_sell], ['sell_and_buy', '=', $sell_and_buy]])->count();
                    if($count == 0) {
                        $item = GaragesTake::find($id);
                        $item_name = 'Гараж';
                    }
                }
            }
        }
        if($count == 0) {
            if($item->sell_and_buy == 'Продам' || $item->sell_and_buy == 'Куплю') {
                $item_price = $item->price.' ₽';
            } else
            if($item->sell_and_buy == 'Сдам' || $item->sell_and_buy == 'Сниму') {
                if($item->type_time == 'Сутки') {
                    $item_price = $item->price.' ₽ в сутки';
                } else {
                    $item_price = $item->price.' ₽ в месяц';
                }
            }
            $item_city = $item->city;
            $item_images = $item->images;
    
            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->what_i_sell = $what_i_sell;
            $favourite->sell_and_buy = $sell_and_buy;
            $favourite->id_adv = $id;
            $favourite->name = $item_name;
            $favourite->price = $item_price;
            $favourite->city = $item_city;
            $favourite->images = $item_images;
            $favourite->save();
        }
    }
    public function add_favourites_item($type, $id){
        if($type == 'Личные вещи') {
            $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type]])->count();
            if($count == 0) {
                $item = Items::find($id);
                $item_name = $item->name;
            }
        }
        if($count == 0) {
            $item_price = $item->price;
            $item_city = $item->city;
            $item_images = $item->images;

            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->name = $item_name;
            $favourite->price = $item_price;
            $favourite->city = $item_city;
            $favourite->images = $item_images;
            $favourite->save();
        }
    }
    public function add_favourites_car($type, $id){
        if($type == 'Транспорт') {
            $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type]])->count();
            if($count == 0) {
                $item = Cars::find($id);
                $marka = Mark::find($item->marka);
                $item_name = $marka->marka.' '.$marka->model.', '.$marka->year;
            }
        }
        if($count == 0) {
            $item_price = $item->price.' ₽';
            $item_city = $item->city;
            $item_images = $item->images;

            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->name = $item_name;
            $favourite->price = $item_price;
            $favourite->city = $item_city;
            $favourite->images = $item_images;
            $favourite->save();
        }
    }
    public function add_favourites_job($type, $job, $id){
        if($type == 'Работа') {
            if($job == 'Резюме') {
                $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $job]])->count();
                if($count == 0) {
                    $item = JobsResume::find($id);
                    $item_name = $item->desired_position;
                    $item_price = $item->price.' ₽';
                    $item_what_i_sell = 'Резюме';
                    $item_city = $item->city;
                    $item_images = $item->images;
                }
            } else
            if($job == 'Вакансии') {
                $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type], ['what_i_sell', '=', $job]])->count();
                if($count == 0) {
                    $item = JobsOpenings::find($id);
                    $item_name = $item->desired_position;
                    if($item['from_price'] != '' && $item['before_price'] == '' && $item['when_price'] == '') {
                        $item_price = 'от '.$item['from_price'].' ₽';
                    } else
                    if($item['from_price'] == '' && $item['before_price'] != '' && $item['when_price'] == '') {
                        $item_price = 'до '.$item['before_price'].' ₽';
                    } else
                    if($item['from_price'] != '' && $item['before_price'] != '' && $item['when_price'] == '') {
                        $item_price = $item['from_price'].' - '.$item['before_price'].' ₽';
                    } else
                    if($item['from_price'] != '' && $item['before_price'] != '' && $item['when_price'] != '') {
                        $item_price = $item['from_price'].' - '.$item['before_price'].' ₽ '.$item['when_price'];
                    } else
                    if($item['from_price'] == '' && $item['before_price'] == '' && $item['when_price'] == '') {
                        $item_price = $item->price;
                    } else
                    if($item['from_price'] != '' && $item['before_price'] == '' && $item['when_price'] != '') {
                        $item_price = $item->price;
                    } else
                    if($item['from_price'] == '' && $item['before_price'] != '' && $item['when_price'] != '') {
                        $item_price = $item->price;
                    }
                    $item_what_i_sell = 'Вакансии';
                    $item_city = $item->city;
                    $item_images = $item->images;
                }
            }
        }

        if($count == 0) {
            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->name = $item_name;
            $favourite->what_i_sell = $item_what_i_sell;
            $favourite->price = $item_price;
            $favourite->city = $item_city;
            $favourite->images = $item_images;
            $favourite->save();
        }
    }
    public function delete_favourites($id) {
        Favourites::find($id)->delete();
        return redirect()->route('favorites');
    }
    public function all_ads() {
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
        $cars = Cars::all();
        $marks = Mark::all();
        $items = Items::all();
        $jobs_resume = JobsResume::all();
        $jobs_openings = JobsOpenings::all();

        $ads = [];

        foreach($homes as $item) {
            $ads[] = array(
                "name" => $item->object_type.' '.$item->square.' м² на участке '.$item->square_region.' сот.',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($realty as $item) {
            if($item->count_rooms == 'Студия') {
                $ads[] = array(
                    "name" => 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price,
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => $item->count_rooms.'-к. квартира, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price,
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($rooms as $item) {
            if($item->count_rooms == 'Студия') {
                $ads[] = array(
                    "name" => 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price,
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => 'Комната '.$item->square.' м² в '.$item->count_rooms.'-k., '.$item->floor.'/'.$item->floor_home.' эт.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price,
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($land_plotes as $item) {
            $ads[] = array(
                "name" => 'Участок '.$item->square.' сот.',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($garages as $item) {
            $ads[] = array(
                "name" => 'Гараж, '.$item->square.' м²',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($apartment_rent as $item) {
            if($item->count_rooms == 'Студия') {
                if($item->type_time == 'Сутки') {
                    $ads[] = array(
                        "name" => 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в сутки',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                } else {
                    $ads[] = array(
                        "name" => 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в месяц',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                }
            } else {
                if($item->type_time == 'Сутки') {
                    $ads[] = array(
                        "name" => $item->count_rooms.'-к. квартира, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в сутки',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                } else {
                    $ads[] = array(
                        "name" => $item->count_rooms.'-к. квартира, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в месяц',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                }
            }
        };

        foreach($apartment_buy as $item) {
            $ads[] = array(
                "name" => $item->count_rooms.'-к. квартира',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($apartment_take as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => $item->count_rooms.'-к. квартира',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => $item->count_rooms.'-к. квартира',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($homes_rent as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => $item->object_type.' '.$item->square.' м² на участке '.$item->square_region.' сот.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => $item->object_type.' '.$item->square.' м² на участке '.$item->square_region.' сот.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($homes_buy as $item) {
            $ads[] = array(
                "name" => $item->object_type,
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($homes_take as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => $item->object_type,
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => $item->object_type,
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($room_rent as $item) {
            if($item->count_rooms == 'Студия') {
                if($item->type_time == 'Сутки') {
                    $ads[] = array(
                        "name" => 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в сутки',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                } else {
                    $ads[] = array(
                        "name" => 'Комната-студия, '.$item->square.' м², '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в месяц',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                }
            } else {
                if($item->type_time == 'Сутки') {
                    $ads[] = array(
                        "name" => 'Комната '.$item->square.' м² в '.$item->count_rooms.'-k., '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в сутки',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                } else {
                    $ads[] = array(
                        "name" => 'Комната '.$item->square.' м² в '.$item->count_rooms.'-k., '.$item->floor.'/'.$item->floor_home.' эт.',
                        "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                        "images" => $item->images,
                        "city" => $item->city,
                        "price" => $item->price.' ₽ в месяц',
                        "user" => $item->user,
                        "type" => 'Недвижимость',
                        "what_i_sell" => $item->what_i_sell,
                        "sell_and_buy" => $item->sell_and_buy,
                    );
                }
            }
        };

        foreach($room_buy as $item) {
            $ads[] = array(
                "name" => 'Комната',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($room_take as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => 'Комната',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => 'Комната',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($land_plot_rent as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => 'Участок '.$item->square.' сот.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => 'Участок '.$item->square.' сот.',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($land_plot_buy as $item) {
            $ads[] = array(
                "name" => 'Участок',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($land_plot_take as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => 'Участок',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => 'Участок',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($garages_rent as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => 'Гараж, '.$item->square.' м²',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => 'Гараж, '.$item->square.' м²',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        
        foreach($garages_buy as $item) {
            $ads[] = array(
                "name" => 'Гараж',
                "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price,
                "user" => $item->user,
                "type" => 'Недвижимость',
                "what_i_sell" => $item->what_i_sell,
                "sell_and_buy" => $item->sell_and_buy,
            );
        };

        foreach($garages_take as $item) {
            if($item->type_time == 'Сутки') {
                $ads[] = array(
                    "name" => 'Гараж',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в сутки',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            } else {
                $ads[] = array(
                    "name" => 'Гараж',
                    "link" => '/estate_detailed/'.$item->id.'/'.$item->what_i_sell.'/'.$item->sell_and_buy,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽ в месяц',
                    "user" => $item->user,
                    "type" => 'Недвижимость',
                    "what_i_sell" => $item->what_i_sell,
                    "sell_and_buy" => $item->sell_and_buy,
                );
            }
        };

        foreach($cars as $item) {
            foreach($marks->where('id', '=', $item->marka) as $marka) {
                $ads[] = array(
                    "name" => $marka->marka.' '.$marka->model.', '.$marka->year,
                    "link" => '/car_detailed/'.$item->id,
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->price.' ₽',
                    "user" => $item->user,
                    "type" => 'Транспорт',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            }
        };

        foreach($items as $item) {
            $ads[] = array(
                "name" => $item->name,
                "link" => '/item_detailed/'.$item->id,
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price.' ₽',
                "user" => $item->user,
                "type" => 'Личные вещи',
                "what_i_sell" => '',
                "sell_and_buy" => '',
                "what_i_sell" => '',
                "sell_and_buy" => '',
            );
        };

        foreach($jobs_resume as $item) {
            $ads[] = array(
                "name" => $item->desired_position,
                "link" => '/job_detailed/'.$item->id.'/Резюме',
                "images" => $item->images,
                "city" => $item->city,
                "price" => $item->price.' ₽',
                "user" => $item->user,
                "type" => 'Работа',
                "what_i_sell" => '',
                "sell_and_buy" => '',
            );
        };

        foreach($jobs_openings as $item) {
            if($item->from_price != '' && $item->before_price == '' && $item->when_price == '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => 'от '.$item->from_price.' ₽',
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            } else
            if($item->from_price == '' && $item->before_price != '' && $item->when_price == '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => 'до '.$item->before_price.' ₽',
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            } else
            if($item->from_price != '' && $item->before_price != '' && $item->when_price == '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->from_price.' - '.$item->before_price.' ₽',
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            } else 
            if($item->from_price != '' && $item->before_price != '' && $item->when_price != '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => $item->from_price.' - '.$item->before_price.' ₽ '.$item->when_price,
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            } else
            if($item->from_price == '' && $item->before_price == '' && $item->when_price == '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => 'Зарплата не указана',
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            } else
            if($item->from_price != '' && $item->before_price == '' && $item->when_price != '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => 'от '.$item->from_price.' ₽ '.$item->when_price,
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            } else
            if($item->from_price == '' && $item->before_price != '' && $item->when_price != '') {
                $ads[] = array(
                    "name" => $item->desired_position,
                    "link" => '/job_detailed/'.$item->id.'/Вакансии',
                    "images" => $item->images,
                    "city" => $item->city,
                    "price" => 'до '.$item->before_price.' ₽ '.$item->when_price,
                    "user" => $item->user,
                    "type" => 'Работа',
                    "what_i_sell" => '',
                    "sell_and_buy" => '',
                );
            }
        };

        return $ads;
    }
}
