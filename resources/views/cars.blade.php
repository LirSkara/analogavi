@extends('layout')
@section('title')Avito - Транспорт@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>Транспорт</h3>
    </div>
    <div class="d-flex flex-wrap gap-2 mt-3">
        @foreach($cars as $item)
            @foreach($marks->where('id', $item->marka) as $marka)
                <div class="cards shadow-sm bg-white border rounded-3 mt-2">
                    <img src="/storage/cars_image/{{$item->user}}/{{explode(',', $item->images)[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                    <div class="text-dark px-3 pt-2">
                        <div class="mb-3">
                            <a href="/car_detailed/{{$item->id}}" class="text-decoration-none link-dark yes-wrap">
                                <div class="fs-5 mb-1" style="height: 60px;">{{$marka->marka}} {{$marka->model}}, {{$marka->year}}</div>
                                <p class="mb-2 fw-bold">{{$item->price}} ₽</p>
                                <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> {{$item->city}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection