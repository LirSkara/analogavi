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
        return view('job');
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
            'name' => ['required'],
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
            $cars->name = $data->input('name');
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
            $realty->realty_images = rtrim($images, ",");
        } else {
            $realty->realty_images = null;
        }

        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];
        
        $realty->city = 'Дербент';
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
            $realty->realty_images = rtrim($images, ",");
        } else {
            $realty->realty_images = null;
        }

        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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
            $realty->realty_images = rtrim($images, ",");
        } else {
            $realty->realty_images = null;
        }

        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];

        $realty->city = 'Дербент';
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
    public function add_room_rent(Request $data){        
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
        $realty->description = $data['description'];
        $realty->price = $data['price'];
        $realty->city = 'Дербент';
        $realty->status = 0;
        $realty->save();

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
        $realty->city = 'Дербент';
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
        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
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

        $realty->city = 'Дербент';
        $realty->status = 0;
        $realty->save();

        RealtyImage::where('user', '=', auth()->user()->id)->delete();

        return view('add_estate');
    }
}
