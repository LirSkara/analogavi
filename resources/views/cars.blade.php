@extends('layout')
@section('title')Khalif - Транспорт@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>Транспорт</h3>
    </div>
    <div class="d-flex flex-wrap gap-2 mt-3">
        @foreach($cars as $item)
            @foreach($marks->where('id', $item->marka) as $marka)
                <div class="cards shadow-sm bg-white border rounded-3 mt-2">
                    @if($item->images != null)
                        @if(trim(strstr($item->images, ',', true)) != '')
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner w-100 img-fluid img-cover">
                                    <div class="carousel-item active">
                                        <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item->user}}/{{trim(strstr($item->images, ',', true))}}" alt="...">
                                    </div>
                                    <?php
                                        $images = explode(',', trim(strstr($item->images, ','), ', '));
                                    ?>
                                    @foreach($images as $elem)
                                        <div class="carousel-item">
                                            <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item->user}}/{{$elem}}" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @else
                            <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item->user}}/{{$item->images}}" alt="...">
                        @endif
                    @else
                        <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                    @endif
                    <div class="text-dark px-3 pt-2">
                        <div class="mb-3">
                            <a href="/car_detailed/{{$item->id}}" class="text-decoration-none link-dark yes-wrap">
                                <div class="fs-5 mb-1">{{$marka->marka}} {{$marka->model}}, {{$marka->year}}</div>
                                <p class="small">{{$marka->mileage}} пробег, {{$marka->transmission}} {{$marka->horse_power}}</p>
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