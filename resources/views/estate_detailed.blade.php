@extends('layout')
@section('title')Avito - Недвижимость@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100">
        <nav aria-label="breadcrumb" class="d-tel-none">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{$realty->city}}</a></li>
                <li class="breadcrumb-item"><a href="/estate" class="text-decoration-none">Недвижимоть</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{$realty->what_i_sell}}</a></li>
                @if($realty->sell_and_buy == 'Продам')
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Купить</a></li>
                @elseif($realty->sell_and_buy == 'Сдам')
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Снять</a></li>
                @endif
            </ol>
        </nav>
        <div class="d-flex-laptop">
            <div class="d-flex-column">
                @if($realty->what_i_sell == 'Квартиры')
                    @if($realty->sell_and_buy == 'Продам' || $realty->sell_and_buy == 'Сдам')
                        @if($realty->count_rooms == 'Студия')
                            <h2 class="realty-name">Комната-студия, {{$realty->square}} м², {{$realty->floor}}/{{$realty->floor_home}} эт.</h2>
                        @else
                            <h2 class="realty-name">{{$realty->count_rooms}}-к. квартира, {{$realty->square}} м², {{$realty->floor}}/{{$realty->floor_home}} эт.</h2>
                        @endif
                    @elseif($realty->sell_and_buy == 'Куплю' || $realty->sell_and_buy == 'Сниму')
                        <h2 class="realty-name">{{$realty->count_rooms}}-к. квартира</h2>
                    @endif
                @elseif($realty->what_i_sell == 'Комнаты')
                    @if($realty->sell_and_buy == 'Продам' || $realty->sell_and_buy == 'Сдам')
                        @if($realty->count_rooms == 'Студия')
                            <h2 class="realty-name">Комната-студия, {{$realty->square}} м², {{$realty->floor}}/{{$realty->floor_home}} эт.</h2>
                        @else
                            <h2 class="realty-name">Комната {{$realty->square}} м² в {{$realty->count_rooms}}-k., {{$realty->floor}}/{{$realty->floor_home}} эт.</h2>
                        @endif
                    @elseif($realty->sell_and_buy == 'Куплю' || $realty->sell_and_buy == 'Сниму')
                        <h2 class="realty-name">Комната</h2>
                    @endif
                @elseif($realty->what_i_sell == 'Дома, дачи, коттеджи')
                    @if($realty->sell_and_buy == 'Продам' || $realty->sell_and_buy == 'Сдам')
                        <h2 class="realty-name">{{$realty->object_type}} {{$realty->square}} м² на участке {{$realty->square_region}} сот.</h2>
                    @elseif($realty->sell_and_buy == 'Куплю' || $realty->sell_and_buy == 'Сниму')
                        <h2 class="realty-name">{{$realty->object_type}}</h2>
                    @endif
                @elseif($realty->what_i_sell == 'Земельные участки')
                    @if($realty->sell_and_buy == 'Продам' || $realty->sell_and_buy == 'Сдам')
                        <h2 class="fw-bold mb-3">Участок {{$realty->square}} сот.</h2>
                    @elseif($realty->sell_and_buy == 'Куплю' || $realty->sell_and_buy == 'Сниму')
                        <h2 class="fw-bold mb-3">Участок</h2>
                    @endif
                @elseif($realty->what_i_sell == 'Гаражи и машиноместа')
                    @if($realty->square != '')
                        <h2 class="fw-bold mb-3">Гараж, {{$realty->square}} м²</h2>
                    @else
                        <h2 class="fw-bold mb-3">Гараж</h2>
                    @endif
                @endif
                @if($realty->images != null)
                    @if(trim(strstr($realty->images, ',', true)) != '')
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner carousel-img">
                                <div class="carousel-item active">
                                    <img class="carousel-img" src="/storage/realty_image/{{$realty->user}}/{{trim(strstr($realty->images, ',', true))}}" alt="...">
                                </div>
                                <?php
                                    $images = explode(',', trim(strstr($realty->images, ','), ', '));
                                ?>
                                @foreach($images as $item)
                                    <div class="carousel-item">
                                        <img class="carousel-img" src="/storage/realty_image/{{$realty->user}}/{{$item}}" alt="...">
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
                        <img class="carousel-img" src="/storage/realty_image/{{$realty->user}}/{{$realty->images}}" alt="...">
                    @endif
                @else
                    <img class="carousel-img" src="/no_photo.png" alt="...">
                @endif
            </div>
            <div class="d-flex flex-column w-100">
                @if($realty->sell_and_buy == 'Продам' || $realty->sell_and_buy == 'Куплю')
                    <h2 class="realty-price">{{$realty->price}} ₽</h2>
                @elseif($realty->sell_and_buy == 'Сдам' || $realty->sell_and_buy == 'Сниму')
                    @if($realty->type_time == 'Сутки')
                        <h2 class="realty-price">{{$realty->price}} ₽ в сутки</h2>
                    @else
                        <h2 class="realty-price">{{$realty->price}} ₽ в месяц</h2>
                    @endif
                @endif
                <div class="d-flex-button">
                    <button class="btn btn-success mt-2 btn-width">{{$realty->tel}}</button>
                    <button class="btn btn-primary mt-2 btn-width">Добавить в избранное</button>
                </div>
                <h3 class="mt-3">Описание:</h3>
                <p>{{$realty->description}}</p>
            </div>
        </div>
        <div class="d-flex flex-column">
            <h3 class="mt-3">Характеристики:</h3>
            <div class="d-flex flex-column flex-wrap height-specifications">
                @if($realty->count_rooms != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Количество комнат:</span>
                        <span class="fs-specifications ms-2">{{$realty->count_rooms}}</span>
                    </div>
                @endif
                @if($realty->square != '')
                    <div class="pe-text">
                        @if($realty->what_i_sell == 'Дома, дачи, коттеджи')
                            <span class="fs-specifications text-muted">Площадь дома:</span>
                        @elseif($realty->what_i_sell == 'Квартиры')
                            <span class="fs-specifications text-muted">Площадь квартиры:</span>
                        @elseif($realty->what_i_sell == 'Комнаты')
                            <span class="fs-specifications text-muted">Площадь комнаты:</span>
                        @elseif($realty->what_i_sell == 'Земельные участки')
                            <span class="fs-specifications text-muted">Площадь участка:</span>
                        @elseif($realty->what_i_sell == 'Гаражи и машиноместа')
                            <span class="fs-specifications text-muted">Площадь гаража:</span>
                        @endif
                        <span class="fs-specifications ms-2">{{$realty->square}} м²</span>
                    </div>
                @endif
                @if($realty->residential_square != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Жилая площадь:</span>
                        <span class="fs-specifications ms-2">{{$realty->residential_square}} м²</span>
                    </div>
                @endif
                @if($realty->square_region != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Площадь участка:</span>
                        <span class="fs-specifications ms-2">{{$realty->square_region}} сот.</span>
                    </div>
                @endif
                @if($realty->floor_home != '')
                    <div class="pe-text">
                        @if($realty->what_i_sell == 'Дома, дачи, коттеджи')
                            <span class="fs-specifications text-muted">Этажей в доме:</span>
                            <span class="fs-specifications ms-2">{{$realty->floor_home}}</span>
                        @elseif($realty->what_i_sell == 'Квартиры')
                            <span class="fs-specifications text-muted">Этаж:</span>
                            <span class="fs-specifications ms-2">{{$realty->floor}} из {{$realty->floor_home}}</span>
                        @endif
                    </div>
                @endif
                @if($realty->bath_or_sauna != '' || $realty->swimming_pool != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Для отдыха:</span>
                        @if($realty->bath_or_sauna != '' && $realty->swimming_pool != '')
                            <span class="fs-specifications ms-2">Баня или сауна, бассейн</span>
                        @elseif($realty->bath_or_sauna != '' && $realty->swimming_pool == '')
                            <span class="fs-specifications ms-2">{{$realty->bath_or_sauna}}</span>
                        @elseif($realty->bath_or_sauna == '' && $realty->swimming_pool != '')
                            <span class="fs-specifications ms-2">{{$realty->swimming_pool}}</span>
                        @endif
                    </div>
                @endif
                @if($realty->plot_status != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted no-wrap">Категория земель:</span>
                        <span class="fs-specifications ms-2">{{$realty->plot_status}}</span>
                    </div>
                @endif
                @if($realty->wall_material != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Материал стен:</span>
                        <span class="fs-specifications ms-2">{{$realty->wall_material}}</span>
                    </div>
                @endif
                @if($realty->type_home != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Тип дома:</span>
                        <span class="fs-specifications ms-2">{{$realty->type_home}}</span>
                    </div>
                @endif
                @if($realty->garage_type != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Тип гаража:</span>
                        <span class="fs-specifications ms-2">{{$realty->garage_type}}</span>
                    </div>
                @endif
                @if($realty->conditioner != '' || $realty->fridge != '' || $realty->stove != '' || $realty->nuke != '' || $realty->washing_machine != '' || $realty->dishwasher != '' || $realty->water_heater != '' || $realty->TV != '')
                    <div class="pe-text">
                        <?php
                            $tech = [];
                            if($realty->conditioner != '') {
                                $tech[] = 'кондиционер';
                            }
                            if($realty->fridge != '') {
                                $tech[] = 'холодильник';
                            }
                            if($realty->stove != '') {
                                $tech[] = 'плита';
                            }
                            if($realty->nuke != '') {
                                $tech[] = 'микроволновка';
                            }
                            if($realty->washing_machine != '') {
                                $tech[] = 'стиральная машинка';
                            }
                            if($realty->dishwasher != '') {
                                $tech[] = 'посудомоечная машина';
                            }
                            if($realty->water_heater != '') {
                                $tech[] = 'водонагреватель';
                            }
                            if($realty->TV != '') {
                                $tech[] = 'телевизор';
                            }
                            $i = ''
                        ?>
                        <span class="fs-specifications text-muted">Техника:</span>
                        <span class="fs-specifications ms-2">
                            @foreach($tech as $item){{$i}} {{$item}}<?php $i = ',' ?>@endforeach
                        </span>
                    </div>
                @endif
                @if($realty->TV != '' || $realty->wi_fi != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Интернет и ТВ:</span>
                        @if($realty->TV != '' && $realty->wi_fi != '')
                            <span class="fs-specifications ms-2">Wi-fi, телевидение</span>
                        @elseif($realty->TV == '' && $realty->wi_fi != '')
                            <span class="fs-specifications ms-2">Wi-fi</span>
                        @elseif($realty->TV != '' && $realty->wi_fi == '')
                            <span class="fs-specifications ms-2">Телевидение</span>
                        @endif
                    </div>
                @endif
                @if($realty->bathroom_street != '' || $realty->bathroom_home != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Санузел:</span>
                        @if($realty->bathroom_street != '' && $realty->bathroom_home != '')
                            <span class="fs-specifications ms-2">В доме, на улице</span>
                        @elseif($realty->bathroom_street == '' && $realty->bathroom_home != '')
                            <span class="fs-specifications ms-2">В доме</span>
                        @elseif($realty->bathroom_street != '' && $realty->bathroom_home == '')
                            <span class="fs-specifications ms-2">На улице</span>
                        @endif
                    </div>
                @endif
                @if($realty->elevator != '' && $realty->elevator != false)
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Лифт:</span>
                        <span class="fs-specifications ms-2">Есть</span>
                    </div>
                @endif
                @if($realty->closed_territory != '' || $realty->children_playground != '' || $realty->sports_ground != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Двор:</span>
                        @if($realty->closed_territory != '' && $realty->children_playground != '' && $realty->sports_ground != '')
                            <span class="fs-specifications ms-2">Закрытая территория, детская площадка, спортивная площадка</span>
                        @elseif($realty->closed_territory == '' && $realty->children_playground != '' && $realty->sports_ground != '')
                            <span class="fs-specifications ms-2">Детская площадка, спортивная площадка</span>
                        @elseif($realty->closed_territory != '' && $realty->children_playground == '' && $realty->sports_ground != '')
                            <span class="fs-specifications ms-2">Закрытая территория, спортивная площадка</span>
                        @elseif($realty->closed_territory != '' && $realty->children_playground != '' && $realty->sports_ground == '')
                            <span class="fs-specifications ms-2">Закрытая территория, детская площадка</span>
                        @elseif($realty->closed_territory == '' && $realty->children_playground == '' && $realty->sports_ground != '')
                            <span class="fs-specifications ms-2">Спортивная площадка</span>
                        @elseif($realty->closed_territory != '' && $realty->children_playground == '' && $realty->sports_ground != '')
                            <span class="fs-specifications ms-2">Детская площадка</span>
                        @elseif($realty->closed_territory == '' && $realty->children_playground != '' && $realty->sports_ground != '')
                            <span class="fs-specifications ms-2">Закрытая территория</span>
                        @endif
                    </div>
                @endif
                @if($realty->parking != '' && $realty->parking != false)
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Парковка:</span>
                        <span class="fs-specifications ms-2">Парковочное место</span>
                    </div>
                @endif
            </div>
            @if($realty->max_guest != '' || $realty->may_children != '' || $realty->may_animal != '' || $realty->allowed_smoke != '')
                <h3 class="mt-3">Правила:</h3>
                <div class="d-flex">
                    <div class="d-flex flex-column">
                        @if($realty->max_guest != '' && $realty->max_guest != 'false')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Количество гостей:</span>
                                <span class="fs-specifications ms-2">{{$realty->max_guest}}</span>
                            </div>
                        @endif
                        @if($realty->may_children != '' && $realty->may_children != 'false')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Можно с детьми:</span>
                                <span class="fs-specifications ms-2">Да</span>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column">
                        @if($realty->may_animal != '' && $realty->may_animal != 'false')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Можно с животными:</span>
                                <span class="fs-specifications ms-2">Да</span>
                            </div>
                        @endif
                        @if($realty->allowed_smoke != '' && $realty->allowed_smoke != 'false')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Можно курить:</span>
                                <span class="fs-specifications ms-2">{{$realty->allowed_smoke}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            <h3 class="mt-3">Расположение:</h3>
            <span>{{$realty->adres}}</span>
        </div>
    </div>
</div>
@endsection