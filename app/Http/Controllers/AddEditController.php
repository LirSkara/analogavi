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
use App\Models\TourImage;
use App\Models\Tour;

class AddEditController extends Controller
{
    public function add_estate(){
        if(Auth()->check()){
            return view('add_estate');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_estate($what_i_sell, $sell_and_buy, $id){
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

        return view('edit_estate', ['item' => $item]);
    }
    public function edit_image_estate($what_i_sell, $sell_and_buy, $id){
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

        return view('edit_image_estate', ['item' => $item]);
    }
    public function delete_estate($what_i_sell, $sell_and_buy, $id){
        if($what_i_sell == 'Квартиры') {
            if($sell_and_buy == 'Продам') {
                Realty::find($id)->delete();
            } else
            if($sell_and_buy == 'Сдам') {
                ApartmentRent::find($id)->delete();
            } else
            if($sell_and_buy == 'Куплю') {
                ApartmentBuy::find($id)->delete();
            } else
            if($sell_and_buy == 'Сниму') {
                ApartmentTake::find($id)->delete();
            }
        } else
        if($what_i_sell == 'Комнаты') {
            if($sell_and_buy == 'Продам') {
                Rooms::find($id)->delete();
            } else
            if($sell_and_buy == 'Сдам') {
                RoomRents::find($id)->delete();
            } else
            if($sell_and_buy == 'Куплю') {
                RoomBuy::find($id)->delete();
            } else
            if($sell_and_buy == 'Сниму') {
                RoomTake::find($id)->delete();
            }
        } else 
        if($what_i_sell == 'Дома, дачи, коттеджи') {
            if($sell_and_buy == 'Продам') {
                Homes::find($id)->delete();
            } else
            if($sell_and_buy == 'Сдам') {
                HomesRent::find($id)->delete();
            } else
            if($sell_and_buy == 'Куплю') {
                HomesBuy::find($id)->delete();
            } else
            if($sell_and_buy == 'Сниму') {
                HomesTake::find($id)->delete();
            }
        } else
        if($what_i_sell == 'Земельные участки') {
            if($sell_and_buy == 'Продам') {
                LandPlot::find($id)->delete();
            } else
            if($sell_and_buy == 'Сдам') {
                LandPlotRent::find($id)->delete();
            } else
            if($sell_and_buy == 'Куплю') {
                LandPlotBuy::find($id)->delete();
            } else
            if($sell_and_buy == 'Сниму') {
                LandPlotType::find($id)->delete();
            }
        } else
        if($what_i_sell == 'Гаражи и машиноместа') {
            if($sell_and_buy == 'Продам') {
                Garages::find($id)->delete();
            } else
            if($sell_and_buy == 'Сдам') {
                GaragesRent::find($id)->delete();
            } else
            if($sell_and_buy == 'Куплю') {
                GaragesBuy::find($id)->delete();
            } else
            if($sell_and_buy == 'Сниму') {
                GaragesTake::find($id)->delete();
            }
        }
        
        Favourites::where('id_adv', '=', $id)->delete();
        return redirect()->route('my_adv');
    }
    public function add_cars(){
        if(Auth()->check()){
            return view('add_cars');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_cars($id){
        $car = Cars::find($id);
        $marka = Mark::find($car->marka);
        return view('edit_cars', ['car' => $car, 'marka' => $marka]);
    }
    public function edit_image_cars($id){
        $item = Cars::find($id);
        return view('edit_image_cars', ['item' => $item]);
    }
    public function delete_cars($id){
        Cars::find($id)->delete();
        Favourites::where('id_adv', '=', $id)->delete();
        return redirect()->route('my_adv');
    }
    public function add_job(){
        if(Auth()->check()){
            return view('add_job');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_jobs($what_i_sell, $id){
        if($what_i_sell == 'Резюме') {
            $job = JobsResume::find($id);
            $name_job = 'Резюме';
        } else {
            $job = JobsOpenings::find($id);
            $name_job = 'Вакансии';
        }
        return view('edit_job', ['job' => $job, 'name_job' => $name_job]);
    }
    public function edit_image_jobs($what_i_sell, $id){
        if($what_i_sell == 'Резюме') {
            $item = JobsResume::find($id);
            $item_job = 'Резюме';
        } else {
            $item = JobsOpenings::find($id);
            $item_job = 'Вакансии';
        }
        return view('edit_image_jobs', ['item' => $item, 'item_job' => $item_job]);
    }
    public function delete_jobs($what_i_sell, $id){
        if($what_i_sell == 'Резюме') {
            JobsResume::find($id)->delete();
        } else {
            JobsOpenings::find($id)->delete();
        }
        Favourites::where('id_adv', '=', $id)->delete();
        return redirect()->route('my_adv');
    }
    public function add_items(){
        if(Auth()->check()){
            return view('add_items');
        } else {
            return redirect()->route('login');
        }
    }
    public function edit_items($id){
        $item = Items::find($id);
        return view('edit_items', ['item' => $item]);
    }
    public function delete_items($id){
        Items::find($id)->delete();
        Favourites::where('id_adv', '=', $id)->delete();
        return redirect()->route('my_adv');
    }
    public function edit_image_items($id){
        $item = Items::find($id);
        return view('edit_image_items', ['item' => $item]);
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
    public function edit_marka(Request $data, $id) {
        if($data['mileage'] != '') {
            $mark = Mark::find($id);
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
            $mark->save();

            $car = Cars::where('marka', '=', $mark->id)->first();
            $car->status = 0;
            $car->save();
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
            $cars->car_no_reg = $data->input('car_no_reg');
            $cars->city = $data->input('city');
            $cars->status = 0;
            $cars->save();

            CarsImage::where('user', '=', auth()->user()->id)->delete();
        }
    }
    public function delete_marka() {
        CarsImage::where([['user', '=', auth()->user()->id], ['status', '=', 0]])->delete();
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
    public function edit_estate_post(Request $data, $id){        
        $realty = Realty::find($id);
        $realty->name_user = auth()->user()->name;

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
        
        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];
        
        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_apartment_rent(Request $data, $id){
        $realty = ApartmentRent::find($id);
        $realty->name_user = auth()->user()->name;
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
        
        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_apartment_buy(Request $data, $id){        
        $realty = ApartmentBuy::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_apartment_take(Request $data, $id){        
        $realty = ApartmentTake::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_room(Request $data, $id){
        $realty = Rooms::find($id);
        $realty->name_user = auth()->user()->name;
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
        
        $realty->description = $data['description'];
        $realty->method_sale = $data['method_sale'];
        $realty->mortgage = $data['mortgage'];
        $realty->sale_share = $data['sale_share'];
        $realty->auction = $data['auction'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_room_rent(Request $data, $id){
        $realty = RoomRents::find($id);
        $realty->name_user = auth()->user()->name;
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
        $realty->city = $data['city'];
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
        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

        return view('add_estate');
    }
    public function edit_room_buy(Request $data, $id){        
        $realty = RoomBuy::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_room_take(Request $data, $id){        
        $realty = RoomTake::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_home(Request $data, $id){        
        $realty = Homes::find($id);
        $realty->name_user = auth()->user()->name;
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
        
        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_home_rent(Request $data, $id){      
        $realty = HomesRent::find($id);
        $realty->name_user = auth()->user()->name;
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

        $realty->description = $data['description'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_home_buy(Request $data, $id){                
        $realty = HomesBuy::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_home_take(Request $data, $id){                
        $realty = HomesTake::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_land_plot(Request $data, $id){        
        $realty = LandPlot::find($id);
        $realty->name_user = auth()->user()->name;
        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        $realty->description = $data['description'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_land_plot_rent(Request $data, $id){        
        $realty = LandPlotRent::find($id);
        $realty->name_user = auth()->user()->name;
        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        $realty->description = $data['description'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_land_plot_buy(Request $data, $id){                
        $realty = LandPlotBuy::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_land_plot_type(Request $data, $id){                
        $realty = LandPlotType::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_garage(Request $data, $id){        
        $realty = Garages::find($id);
        $realty->name_user = auth()->user()->name;
        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        $realty->description = $data['description'];
        $realty->garage_type = $data['garage_type'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_garage_rent(Request $data, $id){        
        $realty = GaragesRent::find($id);
        $realty->name_user = auth()->user()->name;
        $realty->adres = $data['adres'];
        $realty->who_add = $data['who_add'];

        $realty->description = $data['description'];
        $realty->garage_type = $data['garage_type'];
        $realty->square = $data['square'];
        $realty->price = $data['price'];

        $realty->city = $data['city'];
        $realty->status = 0;
        $realty->save();

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
    public function edit_garage_buy(Request $data, $id){                
        $realty = GaragesBuy::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_garage_take(Request $data, $id){                
        $realty = GaragesTake::find($id);
        $realty->name_user = auth()->user()->name;
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
    public function edit_job_resume(Request $data, $id){        
        $jobs = JobsResume::find($id);
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

        $jobs->description = $data['description'];
        $jobs->price = $data['price'];
        $jobs->adres = $data['adres'];

        $jobs->city = $data['city'];
        $jobs->status = 0;
        $jobs->save();
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
    public function edit_job_openings(Request $data, $id){        
        $jobs = JobsOpenings::find($id);
        $jobs->name_user = auth()->user()->name;
        $jobs->type_job = $data['type_job'];

        $jobs->desired_position = $data['desired_position'];
        $jobs->work_schedule = $data['work_schedule'];
        $jobs->frequency_payments = $data['frequency_payments'];
        $jobs->where_work = $data['where_work'];

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
            $item_user_adv = $item->user;
    
            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->what_i_sell = $what_i_sell;
            $favourite->sell_and_buy = $sell_and_buy;
            $favourite->id_adv = $id;
            $favourite->user_adv = $item_user_adv;
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
            $item_user_adv = $item->user;

            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->user_adv = $item_user_adv;
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
            $item_user_adv = $item->user;

            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->user_adv = $item_user_adv;
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
                    $item_user_adv = $item->user;
                }
            }
        }

        if($count == 0) {
            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->user = $item_user_adv;
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
        $cars = Cars::where('status', '=', 1)->get();
        $marks = Mark::where('status', '=', 1)->get();
        $items = Items::where('status', '=', 1)->get();
        $jobs_resume = JobsResume::where('status', '=', 1)->get();
        $jobs_openings = JobsOpenings::where('status', '=', 1)->get();

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
    public function edit_items_post(Request $data, $id){
        $valid = $data->validate([
            'name' => ['required'],
            'state' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $items = Items::find($id);
        $items->name = $data->input('name');
        $items->state = $data->input('state');
        $items->description = $data->input('description');
        $items->price = $data->input('price');
        $items->name_user = auth()->user()->name;
        
        $items->city = $data->input('city');
        $items->status = 0;
        $items->save();
    }
    public function edit_cars_post(Request $data, $id){
        $valid = $data->validate([
            'state' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);
        
        $cars = Cars::find($id);
        $cars->state = $data->input('state');
        $cars->description = $data->input('description');
        $cars->price = $data->input('price');
        $cars->name_user = auth()->user()->name;

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
        $cars->car_no_reg = $data->input('car_no_reg');
        $cars->city = $data->input('city');
        $cars->status = 0;
        $cars->save();
    }
    public function add_image_item(Request $data, $id) {
        $item = Items::find($id);
        $file = $data->file('image');
        $upload_folder = 'public/items_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        if($item->images != '') {
            $item->images = $item->images.','.$filename;
        } else {
            $item->images = $filename;
        }
        $item->save();
        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function delete_image_item($id, $image) {
        $item = Items::find($id);
        $upload_folder = 'public/items_image/'.$item->user;
        $images = explode(',', $item->images);
        unset($images[$image]);
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::delete($upload_folder . '/' . $image);
    }
    public function edit_image_item(Request $data, $id, $image) {
        $item = Items::find($id);
        $images = explode(',', $item->images);

        $file = $data->file('image');
        $upload_folder = 'public/items_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $images[$image]);

        $images[$image] = $filename;
        
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function add_image_car(Request $data, $id) {
        $item = Cars::find($id);
        $file = $data->file('image');
        $upload_folder = 'public/cars_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        if($item->images != '') {
            $item->images = $item->images.','.$filename;
        } else {
            $item->images = $filename;
        }
        $item->save();
        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function delete_image_car($id, $image) {
        $item = Cars::find($id);
        $upload_folder = 'public/cars_image/'.$item->user;
        $images = explode(',', $item->images);
        unset($images[$image]);
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::delete($upload_folder . '/' . $image);
    }
    public function edit_image_car(Request $data, $id, $image) {
        $item = Cars::find($id);
        $images = explode(',', $item->images);

        $file = $data->file('image');
        $upload_folder = 'public/cars_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $images[$image]);

        $images[$image] = $filename;
        
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function add_image_estate(Request $data, $what_i_sell, $sell_and_buy, $id) {
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

        $file = $data->file('image');
        $upload_folder = 'public/realty_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        if($item->images != '') {
            $item->images = $item->images.','.$filename;
        } else {
            $item->images = $filename;
        }
        $item->save();
        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function delete_image_estate($what_i_sell, $sell_and_buy, $id, $image) {
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

        $upload_folder = 'public/realty_image/'.$item->user;
        $images = explode(',', $item->images);
        unset($images[$image]);
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::delete($upload_folder . '/' . $image);
    }
    public function edit_image_estate_post(Request $data, $what_i_sell, $sell_and_buy, $id, $image) {
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
        $images = explode(',', $item->images);

        $file = $data->file('image');
        $upload_folder = 'public/realty_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $images[$image]);

        $images[$image] = $filename;
        
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function add_image_job(Request $data, $what_i_sell, $id) {
        if($what_i_sell == 'Резюме') {
            $item = JobsResume::find($id);
        } else {
            $item = JobsOpenings::find($id);
        }

        $file = $data->file('image');
        $upload_folder = 'public/jobs_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        if($item->images != '') {
            $item->images = $item->images.','.$filename;
        } else {
            $item->images = $filename;
        }
        $item->save();
        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function delete_image_job($what_i_sell, $id, $image) {
        if($what_i_sell == 'Резюме') {
            $item = JobsResume::find($id);
        } else {
            $item = JobsOpenings::find($id);
        }

        $upload_folder = 'public/jobs_image/'.$item->user;
        $images = explode(',', $item->images);
        unset($images[$image]);
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::delete($upload_folder . '/' . $image);
    }
    public function edit_image_job(Request $data, $what_i_sell, $id, $image) {
        if($what_i_sell == 'Резюме') {
            $item = JobsResume::find($id);
        } else {
            $item = JobsOpenings::find($id);
        }
        $images = explode(',', $item->images);

        $file = $data->file('image');
        $upload_folder = 'public/jobs_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $images[$image]);

        $images[$image] = $filename;
        
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function add_tourism(){
        if(Auth()->check()){
            return view('add_tourism');
        } else {
            return redirect()->route('login');
        }
    }
    public function img_add_tour(Request $data){
        if(!empty($data->image)) {
            if(TourImage::where('user', '=', auth()->user()->id)->count() <= 2) {
                $items_image = new TourImage();
                $file = $data->file('image');
                $upload_folder = 'public/tours_image/'.auth()->user()->id;
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
    public function all_img_tour(){
        $items_image_count = TourImage::where('user', '=', auth()->user()->id)->count();
        if($items_image_count != 0) {
            $items_image = TourImage::where('user', '=', auth()->user()->id)->get();
            return $items_image;
        } else {
            return 0;
        }
    }
    public function img_delete_tour($id){
        $items_image = TourImage::find($id);
        $upload_folder = 'public/tours_image/'.auth()->user()->id;
        Storage::delete($upload_folder . '/' . $items_image->image);
        TourImage::find($id)->delete();
    }
    public function add_tour_post(Request $data){
        $valid = $data->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $items_image = TourImage::where('user', '=', auth()->user()->id)->get();

        if(TourImage::where('user', '=', auth()->user()->id)->count() != 0) {
            $items = new Tour();
            $items->user = auth()->user()->id;
            $items->name = $data->input('name');
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

            TourImage::where('user', '=', auth()->user()->id)->delete();
        }
    }
    public function edit_tours($id){
        $item = Tour::find($id);
        return view('edit_tours', ['item' => $item]);
    }
    public function edit_tours_post(Request $data, $id){
        $valid = $data->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $items = Tour::find($id);
        $items->name = $data->input('name');
        $items->description = $data->input('description');
        $items->price = $data->input('price');
        $items->name_user = auth()->user()->name;
        
        $items->city = $data->input('city');
        $items->status = 0;
        $items->save();
    }
    public function delete_tours($id){
        Tour::find($id)->delete();
        Favourites::where('id_adv', '=', $id)->delete();
        return redirect()->route('my_adv');
    }
    public function edit_image_tours($id){
        $item = Tour::find($id);
        return view('edit_image_tours', ['item' => $item]);
    }
    public function add_image_tour(Request $data, $id) {
        $item = Tour::find($id);
        $file = $data->file('image');
        $upload_folder = 'public/tours_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        if($item->images != '') {
            $item->images = $item->images.','.$filename;
        } else {
            $item->images = $filename;
        }
        $item->save();
        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function delete_image_tour($id, $image) {
        $item = Tour::find($id);
        $upload_folder = 'public/tours_image/'.$item->user;
        $images = explode(',', $item->images);
        unset($images[$image]);
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::delete($upload_folder . '/' . $image);
    }
    public function edit_image_tour(Request $data, $id, $image) {
        $item = Tour::find($id);
        $images = explode(',', $item->images);

        $file = $data->file('image');
        $upload_folder = 'public/tours_image/'.$item->user;
        $filename = rand().'_'.$file->getClientOriginalName();
        Storage::delete($upload_folder . '/' . $images[$image]);

        $images[$image] = $filename;
        
        $images_string = '';
        foreach($images as $img) {
            $images_string = $images_string.$img.',';
        }
        if($images_string == '') {
            $item->images = null;
        } else {
            $item->images = rtrim($images_string, ",");
        }
        $item->save();

        Storage::putFileAs($upload_folder, $file, $filename);

        return $filename;
    }
    public function add_favourites_tour($type, $id){
        if($type == 'Туризм') {
            $count = Favourites::where([['user', '=', auth()->user()->id], ['id_adv', '=', $id], ['type', '=', $type]])->count();
            if($count == 0) {
                $item = Tour::find($id);
                $item_name = $item->name;
            }
        }
        if($count == 0) {
            $item_price = $item->price;
            $item_city = $item->city;
            $item_images = $item->images;
            $item_user_adv = $item->user;

            $favourite = new Favourites;
            $favourite->user = auth()->user()->id;
            $favourite->type = $type;
            $favourite->id_adv = $id;
            $favourite->user_adv = $item_user_adv;
            $favourite->name = $item_name;
            $favourite->price = $item_price;
            $favourite->city = $item_city;
            $favourite->images = $item_images;
            $favourite->save();
        }
    }
}