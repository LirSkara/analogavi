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
                            @if($item['images'] != null)
                                @if(trim(strstr($item['images'], ',', true)) != '')
                                    <div id="estate" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner w-100 img-fluid img-cover">
                                            <div class="carousel-item active">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/realty_image/{{$item['user_adv']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                            </div>
                                            <?php
                                                $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                            ?>
                                            @foreach($images as $elem)
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/realty_image/{{$item['user_adv']}}/{{$elem}}" alt="...">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#estate" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#estate" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/realty_image/{{$item['user_adv']}}/{{$item['images']}}" alt="...">
                                @endif
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                            @endif
                        @elseif($item->type == 'Личные вещи')
                            @if($item->images != null)
                                @if(trim(strstr($item->images, ',', true)) != '')
                                    <div id="item" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner w-100 img-fluid img-cover">
                                            <div class="carousel-item active">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/items_image/{{$item->user_adv}}/{{trim(strstr($item->images, ',', true))}}" alt="...">
                                            </div>
                                            <?php
                                                $images = explode(',', trim(strstr($item->images, ','), ', '));
                                            ?>
                                            @foreach($images as $items)
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/items_image/{{$item->user_adv}}/{{$items}}" alt="...">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#item" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#item" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/items_image/{{$item->user_adv}}/{{$item->images}}" alt="...">
                                @endif
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                            @endif
                        @elseif($item->type == 'Туризм')
                            @if($item->images != null)
                                @if(trim(strstr($item->images, ',', true)) != '')
                                    <div id="item" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner w-100 img-fluid img-cover">
                                            <div class="carousel-item active">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/tours_image/{{$item->user_adv}}/{{trim(strstr($item->images, ',', true))}}" alt="...">
                                            </div>
                                            <?php
                                                $images = explode(',', trim(strstr($item->images, ','), ', '));
                                            ?>
                                            @foreach($images as $items)
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/tours_image/{{$item->user_adv}}/{{$items}}" alt="...">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#item" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#item" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/tours_image/{{$item->user_adv}}/{{$item->images}}" alt="...">
                                @endif
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                            @endif
                        @elseif($item->type == 'Транспорт')
                            @if($item->images != null)
                                @if(trim(strstr($item->images, ',', true)) != '')
                                    <div id="car" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner w-100 img-fluid img-cover">
                                            <div class="carousel-item active">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item->user_adv}}/{{trim(strstr($item->images, ',', true))}}" alt="...">
                                            </div>
                                            <?php
                                                $images = explode(',', trim(strstr($item->images, ','), ', '));
                                            ?>
                                            @foreach($images as $elem)
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item->user_adv}}/{{$elem}}" alt="...">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#car" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#car" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item->user_adv}}/{{$item->images}}" alt="...">
                                @endif
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                            @endif
                        @elseif($item->type == 'Работа')
                            @if($item['images'] != null)
                                @if(trim(strstr($item['images'], ',', true)) != '')
                                    <div id="job" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner w-100 img-fluid img-cover">
                                            <div class="carousel-item active">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/jobs_image/{{$item['user_adv']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                            </div>
                                            <?php
                                                $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                            ?>
                                            @foreach($images as $img)
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/jobs_image/{{$item['user_adv']}}/{{$img}}" alt="...">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#job" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#job" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item['user_adv']}}/{{$item['images']}}" alt="...">
                                @endif
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                            @endif
                        @endif
                    @else
                        <img src="/no_photo.png" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                    @endif 
                    <div class="text-dark px-3 pt-2">
                        <div class="mb-3">
                            <a @if($item->type == 'Недвижимость') href="/estate_detailed/{{$item->id_adv}}/{{$item->what_i_sell}}/{{$item->sell_and_buy}}" @elseif($item->type == 'Личные вещи') href="/item_detailed/{{$item->id_adv}}" @elseif($item->type == 'Туризм') href="/tour_detailed/{{$item->id_adv}}" @elseif($item->type == 'Транспорт') href="/car_detailed/{{$item->id_adv}}" @elseif($item->type == 'Работа') href="/job_detailed/{{$item->id_adv}}/{{$item->what_i_sell}}" @endif class="text-decoration-none link-dark yes-wrap">
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
