<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\ItemsImage;
use App\Models\Items;
use App\Models\Mark;
use App\Models\CarsImage;
use App\Models\Cars;

class AddEditController extends Controller
{
    public function add_estate(){
        return view('add_estate');
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
}
