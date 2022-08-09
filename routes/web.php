<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; //Подключаем контроллер
use App\Http\Controllers\AuthController; //Подключаем контроллер
use App\Http\Controllers\AddEditController; //Подключаем контроллер

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('/estate', [HomeController::class, 'estate']);
Route::get('/sotr', [HomeController::class, 'sotr']);
Route::get('/add_estate', [AddEditController::class, 'add_estate']);
Route::get('/edit_estate', [AddEditController::class, 'edit_estate']);
Route::get('/cars', [HomeController::class, 'cars']);
Route::get('/add_cars', [AddEditController::class, 'add_cars']);
Route::get('/edit_cars', [AddEditController::class, 'edit_cars']);
Route::get('/job', [HomeController::class, 'job']);
Route::get('/add_job', [AddEditController::class, 'add_job']);
Route::get('/edit_job', [AddEditController::class, 'edit_job']);
Route::get('/items', [HomeController::class, 'items']);
Route::get('/add_items', [AddEditController::class, 'add_items']);
Route::get('/edit_items', [AddEditController::class, 'edit_items']);
Route::post('/img_add_items', [AddEditController::class, 'img_add_items']);
Route::get('/img_delete_items/{id}', [AddEditController::class, 'img_delete_items']);
Route::get('/all_img_items', [AddEditController::class, 'all_img_items']);
Route::post('/add_items', [AddEditController::class, 'add_items_post']);
Route::post('/add_marka', [AddEditController::class, 'add_marka']);
Route::get('/all_marka', [AddEditController::class, 'all_marka']);
Route::post('/img_add_cars', [AddEditController::class, 'img_add_cars']);
Route::get('/all_img_cars', [AddEditController::class, 'all_img_cars']);
Route::get('/img_delete_cars/{id}', [AddEditController::class, 'img_delete_cars']);
Route::post('/add_cars', [AddEditController::class, 'add_cars_post']);
Route::get('/delete_marka', [AddEditController::class, 'delete_marka']);
Route::post('/img_add_realty', [AddEditController::class, 'img_add_realty']);
Route::get('/img_delete_realty/{id}', [AddEditController::class, 'img_delete_realty']);
Route::get('/all_img_realty', [AddEditController::class, 'all_img_realty']);
Route::post('/add_estate', [AddEditController::class, 'add_estate_post']);
Route::post('/add_apartment_rent', [AddEditController::class, 'add_apartment_rent']);
Route::post('/add_apartment_buy', [AddEditController::class, 'add_apartment_buy']);
Route::post('/add_apartment_take', [AddEditController::class, 'add_apartment_take']);
Route::post('/add_room', [AddEditController::class, 'add_room']);
Route::post('/add_room_rent', [AddEditController::class, 'add_room_rent']);
Route::post('/add_room_buy', [AddEditController::class, 'add_room_buy']);
Route::post('/add_room_take', [AddEditController::class, 'add_room_take']);
Route::post('/add_home', [AddEditController::class, 'add_home']);
Route::post('/add_home_rent', [AddEditController::class, 'add_home_rent']);
Route::post('/add_home_buy', [AddEditController::class, 'add_home_buy']);
Route::post('/add_home_take', [AddEditController::class, 'add_home_take']);
Route::post('/add_land_plot', [AddEditController::class, 'add_land_plot']);
Route::post('/add_land_plot_rent', [AddEditController::class, 'add_land_plot_rent']);
Route::post('/add_land_plot_buy', [AddEditController::class, 'add_land_plot_buy']);
Route::post('/add_land_plot_type', [AddEditController::class, 'add_land_plot_type']);
Route::post('/add_garage', [AddEditController::class, 'add_garage']);
Route::post('/add_garage_rent', [AddEditController::class, 'add_garage_rent']);
Route::post('/add_garage_buy', [AddEditController::class, 'add_garage_buy']);
Route::post('/add_garage_take', [AddEditController::class, 'add_garage_take']);
Route::get('/estate_detailed/{id}/{what_i_sell}/{sell_and_buy}', [HomeController::class, 'estate_detailed']);
Route::get('/item_detailed/{id}', [HomeController::class, 'item_detailed']);
Route::get('/car_detailed/{id}', [HomeController::class, 'car_detailed']);
Route::post('/add_job_resume', [AddEditController::class, 'add_job_resume']);
Route::get('/all_img_job', [AddEditController::class, 'all_img_job']);
Route::post('/img_add_job', [AddEditController::class, 'img_add_job']);
Route::get('/img_delete_job/{id}', [AddEditController::class, 'img_delete_job']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/reg', [AuthController::class, 'reg']);
Route::post('/login', [AuthController::class, 'login_p']);
Route::post('/reg', [AuthController::class, 'reg_p']);
Route::get('/cabinet', [AuthController::class, 'cabinet'])->name('cabinet');
Route::get('/user_info', [AuthController::class, 'user_info']);
Route::post('/user_info', [AuthController::class, 'user_info_p']);
Route::get('/my_adv', [AuthController::class, 'my_adv']);
Route::get('/favorites', [AuthController::class, 'favorites']);
Route::get('/exit', [AuthController::class, 'exit']);