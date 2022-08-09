@extends('layout')
@section('title')Avito - Недвижимость@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100">
        <nav aria-label="breadcrumb" class="d-tel-none">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{$car->city}}</a></li>
                <li class="breadcrumb-item"><a href="/cars" class="text-decoration-none">Транспорт</a></li>
            </ol>
        </nav>
        <div class="d-flex-laptop">
            <div class="d-flex-column">
                <h2 class="realty-name">{{$marka->marka}} {{$marka->model}}, {{$marka->year}}</h2>
                @if($car->images != null)
                    @if(trim(strstr($car->images, ',', true)) != '')
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner carousel-img">
                                <div class="carousel-item active">
                                    <img class="carousel-img" src="/storage/cars_image/{{$car->user}}/{{trim(strstr($car->images, ',', true))}}" alt="...">
                                </div>
                                <?php
                                    $images = explode(',', trim(strstr($car->images, ','), ', '));
                                ?>
                                @foreach($images as $item)
                                    <div class="carousel-item">
                                        <img class="carousel-img" src="/storage/cars_image/{{$car->user}}/{{$item}}" alt="...">
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
                        <img class="carousel-img" src="/storage/cars_image/{{$car->user}}/{{$car->images}}" alt="...">
                    @endif
                @else
                    <img class="carousel-img" src="/no_photo.png" alt="...">
                @endif
            </div>
            <div class="d-flex flex-column w-100">
                <h2 class="realty-price">{{$car->price}} ₽</h2>
                <div class="d-flex-button">
                    <button class="btn btn-success mt-2 btn-width">{{$car->tel}}</button>
                    <button class="btn btn-primary mt-2 btn-width">Добавить в избранное</button>
                </div>
                <h3 class="mt-3">Описание:</h3>
                <p>{{$car->description}}</p>
            </div>
        </div>
        <div class="d-flex flex-column">
            <h3 class="mt-3">Характеристики:</h3>
            <div class="d-flex flex-column flex-wrap height-specifications">
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Год выпуска:</span>
                    <span class="fs-specifications ms-2">{{$marka->year}}</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Поколение:</span>
                    <span class="fs-specifications ms-2">{{$marka->gen}}</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Пробег:</span>
                    <span class="fs-specifications ms-2">{{$marka->mileage}} км</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Владельцев:</span>
                    @if($car->owner_count == 'Первый')
                        <span class="fs-specifications ms-2">1</span>
                    @elseif($car->owner_count == 'Второй')
                        <span class="fs-specifications ms-2">2</span>
                    @elseif($car->owner_count == 'Третий')
                        <span class="fs-specifications ms-2">3</span>
                    @elseif($car->owner_count == 'Четвертый и более')
                        <span class="fs-specifications ms-2">4 и более</span>
                    @endif
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Лошадиных сил:</span>
                    <span class="fs-specifications ms-2">{{$marka->horse_power}}</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Тип двигателя:</span>
                    <span class="fs-specifications ms-2">{{$marka->engine_type}}</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Коробка передач:</span>
                    <span class="fs-specifications ms-2">{{$marka->transmission}}</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Привод:</span>
                    <span class="fs-specifications ms-2">{{$marka->drive}}</span>
                </div>
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Тип кузова:</span>
                    <span class="fs-specifications ms-2">{{$marka->body_type}}</span>
                </div>
                @if($car->vin != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">VIN или номер кузова:</span>
                        <span class="fs-specifications ms-2">{{$car->vin}}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection