@extends('layout')
@section('title')
    Khalif - Личный кабинет
@endsection
@section('content')
    <div class="container py-lg-5">
        <nav aria-label="breadcrumb custom-cr">
            <ol class="breadcrumb crumb-custom">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item"><a href="/cabinet">Личный кабинет #{{auth()->user()->id}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Избранное</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-center">
            <h3>Избранное</h3>
        </div>
        <div class="d-flex flex-wrap gap-2 mt-3">
            @foreach($favourites as $item)
                <div class="cards shadow-sm bg-white border rounded-3 mt-2">
                    @if($item->images != '')
                        @if($item->type == 'Недвижимость')
                            <img src="/storage/realty_image/{{$item['user']}}/{{explode(',', $item['images'])[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                        @elseif($item->type == 'Личные вещи')
                            <img src="/storage/items_image/{{$item['user']}}/{{explode(',', $item['images'])[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                        @elseif($item->type == 'Транспорт')
                            <img src="/storage/cars_image/{{$item['user']}}/{{explode(',', $item['images'])[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                        @elseif($item->type == 'Работа')
                            <img src="/storage/jobs_image/{{$item['user']}}/{{explode(',', $item['images'])[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                        @endif
                    @else
                        <img src="/no_photo.png" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                    @endif 
                    <div class="text-dark px-3 pt-2">
                        <div class="mb-3">
                            <a @if($item->type == 'Недвижимость') href="/estate_detailed/{{$item->id_adv}}/{{$item->what_i_sell}}/{{$item->sell_and_buy}}" @elseif($item->type == 'Личные вещи') href="/item_detailed/{{$item->id_adv}}" @elseif($item->type == 'Транспорт') href="/car_detailed/{{$item->id_adv}}" @elseif($item->type == 'Работа') href="/job_detailed/{{$item->id_adv}}/{{$item->what_i_sell}}" @endif class="text-decoration-none link-dark yes-wrap">
                                <div class="fs-5 mb-1" style="height: 60px;">{{$item->name}}</div>
                                <p class="mb-2 fw-bold">{{$item->price}}</p>
                                <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> {{$item->city}}</p>
                            </a>
                            <a href="/delete_favourites/{{$item->id}}" class="btn btn-danger w-100">Удалить</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
