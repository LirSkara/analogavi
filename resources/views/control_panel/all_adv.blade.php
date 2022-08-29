@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Объявления</h1>
    </div>
    <div class="d-flex gap-3 mt-3 flex-wrap" id="all_adv">

        @foreach($estate as $item)
            <div class="shadow-sm bg-white border rounded-3 mt-2 cp-cart" style="position: relative;">
                @if($item['images'] != '')
                    @if($item['type'] == 'Недвижимость')
                        @if($item['images'] != null)
                            @if(trim(strstr($item['images'], ',', true)) != '')
                                <div id="estate" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100 img-fluid img-cover" style="object-fit: cover;" >
                                        <div class="carousel-item active">
                                            <img class="img-fluid rounded-top img-cover w-100" style="object-fit: cover;" src="/storage/realty_image/{{$item['user']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                        </div>
                                        <?php
                                            $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                        ?>
                                        @foreach($images as $elem)
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/realty_image/{{$item['user']}}/{{$elem}}" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev my-auto" style="height: 50%;" type="button" data-bs-target="#estate" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next my-auto" style="height: 50%;" type="button" data-bs-target="#estate" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/realty_image/{{$item['user']}}/{{$item['images']}}" alt="...">
                            @endif
                        @else
                            <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                        @endif
                    @elseif($item['type'] == 'Личные вещи')
                        @if($item['images'] != null)
                            @if(trim(strstr($item['images'], ',', true)) != '')
                                <div id="item" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100 img-fluid img-cover">
                                        <div class="carousel-item active">
                                            <img class="img-fluid rounded-top img-cover w-100" src="/storage/items_image/{{$item['user']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                        </div>
                                        <?php
                                            $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                        ?>
                                        @foreach($images as $items)
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/items_image/{{$item['user']}}/{{$items}}" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev my-auto" style="height: 50%;" type="button" data-bs-target="#item" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next my-auto" style="height: 50%;" type="button" data-bs-target="#item" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/items_image/{{$item['user']}}/{{$item['images']}}" alt="...">
                            @endif
                        @else
                            <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                        @endif
                    @elseif($item['type'] == 'Туризм')
                        @if($item['images'] != null)
                            @if(trim(strstr($item['images'], ',', true)) != '')
                                <div id="item" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100 img-fluid img-cover">
                                        <div class="carousel-item active">
                                            <img class="img-fluid rounded-top img-cover w-100" src="/storage/tours_image/{{$item['user']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                        </div>
                                        <?php
                                            $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                        ?>
                                        @foreach($images as $items)
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/tours_image/{{$item['user']}}/{{$items}}" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev my-auto" style="height: 50%;" type="button" data-bs-target="#item" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next my-auto" style="height: 50%;" type="button" data-bs-target="#item" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/tours_image/{{$item['user']}}/{{$item['images']}}" alt="...">
                            @endif
                        @else
                            <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                        @endif
                    @elseif($item['type'] == 'Транспорт')
                        @if($item['images'] != null)
                            @if(trim(strstr($item['images'], ',', true)) != '')
                                <div id="car" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100 img-fluid img-cover">
                                        <div class="carousel-item active">
                                            <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item['user']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                        </div>
                                        <?php
                                            $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                        ?>
                                        @foreach($images as $elem)
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item['user']}}/{{$elem}}" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev my-auto" style="height: 50%;" type="button" data-bs-target="#car" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next my-auto" style="height: 50%;" type="button" data-bs-target="#car" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/cars_image/{{$item['user']}}/{{$item['images']}}" alt="...">
                            @endif
                        @else
                            <img class="img-fluid rounded-top img-cover w-100" src="/no_photo.png" alt="...">
                        @endif
                    @elseif($item['type'] == 'Работа')
                        @if($item['images'] != null)
                            @if(trim(strstr($item['images'], ',', true)) != '')
                                <div id="job" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner w-100 img-fluid img-cover">
                                        <div class="carousel-item active">
                                            <img class="img-fluid rounded-top img-cover w-100" src="/storage/jobs_image/{{$item['user']}}/{{trim(strstr($item['images'], ',', true))}}" alt="...">
                                        </div>
                                        <?php
                                            $images = explode(',', trim(strstr($item['images'], ','), ', '));
                                        ?>
                                        @foreach($images as $img)
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/jobs_image/{{$item['user']}}/{{$img}}" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev my-auto" style="height: 50%;" type="button" data-bs-target="#job" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next my-auto" style="height: 50%;" type="button" data-bs-target="#job" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @else
                                <img class="img-fluid rounded-top img-cover w-100" src="/storage/jobs_image/{{$item['user']}}/{{$item['images']}}" alt="...">
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
                        <a @if($item['type'] == 'Недвижимость') href="/estate_detailed/{{$item['id']}}/{{$item['what_i_sell']}}/{{$item['sell_and_buy']}}" @elseif($item['type'] == 'Транспорт') href="/car_detailed/{{$item['id']}}" @elseif($item['type'] == 'Туризм') href="/tour_detailed/{{$item['id']}}" @elseif($item['type'] == 'Личные вещи') href="/item_detailed/{{$item['id']}}" @elseif($item['type'] == 'Работа') href="/job_detailed/{{$item['id']}}/{{$item['what_i_sell']}}" @endif class="text-decoration-none link-dark yes-wrap">
                            @if($item['type'] == 'Недвижимость')
                                @if($item['what_i_sell'] == 'Дома, дачи, коттеджи')
                                    @if($item['sell_and_buy'] == 'Продам' || $item['sell_and_buy'] == 'Сдам')
                                        <div class="fs-5 mb-1" style="height: 60px;">{{$item['object_type']}} {{$item['square']}} м² на участке {{$item['square_region']}} сот.</div>
                                    @elseif($item['sell_and_buy'] == 'Куплю' || $item['sell_and_buy'] == 'Сниму')
                                        <div class="fs-5 mb-1" style="height: 60px;">{{$item['object_type']}}</div>
                                    @endif
                                @elseif($item['what_i_sell'] == 'Квартиры')
                                    @if($item['sell_and_buy'] == 'Продам' || $item['sell_and_buy'] == 'Сдам')
                                        @if($item['count_rooms'] == 'Студия')
                                            <div class="fs-5 mb-1" style="height: 60px;">Комната-студия, {{$item['square']}} м², {{$item['floor']}}/{{$item['floor_home']}} эт.</div>
                                        @else
                                            <div class="fs-5 mb-1" style="height: 60px;">{{$item['count_rooms']}}-к. квартира, {{$item['square']}} м², {{$item['floor']}}/{{$item['floor_home']}} эт.</div>
                                        @endif
                                    @elseif($item['sell_and_buy'] == 'Куплю' || $item['sell_and_buy'] == 'Сниму')
                                        <div class="fs-5 mb-1" style="height: 60px;">{{$item['count_rooms']}}-к. квартира</div>
                                    @endif
                                @elseif($item['what_i_sell'] == 'Комнаты')
                                    @if($item['sell_and_buy'] == 'Продам' || $item['sell_and_buy'] == 'Сдам')
                                        @if($item['count_rooms'] == 'Студия')
                                            <div class="fs-5 mb-1" style="height: 60px;">Комната-студия, {{$item['square']}} м², {{$item['floor']}}/{{$item['floor_home']}} эт.</div>
                                        @else
                                            <div class="fs-5 mb-1" style="height: 60px;">Комната {{$item['square']}} м² в {{$item['count_rooms']}}-k., {{$item['floor']}}/{{$item['floor_home']}} эт.</div>
                                        @endif
                                    @elseif($item['sell_and_buy'] == 'Куплю' || $item['sell_and_buy'] == 'Сниму')
                                        <div class="fs-5 mb-1" style="height: 60px;">Комната</div>
                                    @endif
                                @elseif($item['what_i_sell'] == 'Земельные участки')
                                    @if($item['sell_and_buy'] == 'Продам' || $item['sell_and_buy'] == 'Сдам')
                                        <div class="fs-5 mb-1" style="height: 60px;">Участок {{$item['square']}} сот.</div>
                                    @elseif($item['sell_and_buy'] == 'Куплю' || $item['sell_and_buy'] == 'Сниму')
                                        <div class="fs-5 mb-1" style="height: 60px;">Участок</div>
                                    @endif
                                @elseif($item['what_i_sell'] == 'Гаражи и машиноместа')
                                    @if($item['square'] != '')
                                        <div class="fs-5 mb-1" style="height: 60px;">Гараж, {{$item['square']}} м²</div>
                                    @else
                                        <div class="fs-5 mb-1" style="height: 60px;">Гараж</div>
                                    @endif
                                @endif
                            @elseif($item['type'] == 'Транспорт')
                                <div class="fs-5 mb-1" style="height: 60px;">{{$item['marka']}} {{$item['model']}}, {{$item['year']}}</div>
                            @elseif($item['type'] == 'Личные вещи')
                                <div class="fs-5 mb-1" style="height: 60px;">{{$item['name']}}</div>
                            @elseif($item['type'] == 'Туризм')
                                <div class="fs-5 mb-1" style="height: 60px;">{{$item['name']}}</div>
                            @elseif($item['type'] == 'Работа')
                                <div class="fs-5 mb-1" style="height: 60px;">{{$item['desired_position']}}</div>
                            @endif
                            @if($item['type'] == 'Недвижимость')
                                @if($item['sell_and_buy'] == 'Продам' || $item['sell_and_buy'] == 'Куплю')
                                    <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                                @elseif($item['sell_and_buy'] == 'Сдам' || $item['sell_and_buy'] == 'Сниму')
                                    @if($item['type_time'] == 'Сутки')
                                        <p class="mb-2 fw-bold">{{$item['price']}} ₽ в сутки</p>
                                    @else
                                        <p class="mb-2 fw-bold">{{$item['price']}} ₽ в месяц</p>
                                    @endif
                                @endif
                            @elseif($item['type'] == 'Транспорт')
                                <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                            @elseif($item['type'] == 'Личные вещи')
                                <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                            @elseif($item['type'] == 'Туризм')
                                <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                            @elseif($item['type'] == 'Работа')
                                @if($item['what_i_sell'] == 'Резюме')
                                    <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                                @elseif($item['what_i_sell'] == 'Вакансии')
                                    @if($item['from_price'] != '' && $item['before_price'] == '' && $item['when_price'] == '')
                                        <p class="mb-2 fw-bold">от {{$item['from_price']}} ₽</p>
                                    @elseif($item['from_price'] == '' && $item['before_price'] != '' && $item['when_price'] == '')
                                        <p class="mb-2 fw-bold">до {{$item['before_price']}} ₽</p>
                                    @elseif($item['from_price'] != '' && $item['before_price'] != '' && $item['when_price'] == '')
                                        <p class="mb-2 fw-bold">{{$item['from_price']}} - {{$item['before_price']}} ₽</p>
                                    @elseif($item['from_price'] != '' && $item['before_price'] != '' && $item['when_price'] != '')
                                        <p class="mb-2 fw-bold">{{$item['from_price']}} - {{$item['before_price']}} ₽ {{$item['when_price']}}</p>
                                    @elseif($item['from_price'] == '' && $item['before_price'] == '' && $item['when_price'] == '')
                                        <p class="mb-2 fw-bold">Зарплата не указана</p>
                                    @elseif($item['from_price'] != '' && $item['before_price'] == '' && $item['when_price'] != '')
                                        <p class="mb-2 fw-bold">от {{$item['from_price']}} ₽ {{$item['when_price']}}</p>
                                    @elseif($item['from_price'] == '' && $item['before_price'] != '' && $item['when_price'] != '')
                                        <p class="mb-2 fw-bold">до {{$item['before_price']}} ₽ {{$item['when_price']}}</p>
                                    @endif
                                @endif                                
                            @endif
                            <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> {{$item['city']}}</p>
                        </a>
                        <div class="d-flex gap-2">
                            <a class="btn btn-danger w-50" data-mdb-toggle="modal" data-mdb-target="#no_approve{{$item['id']}}">Не одобрить</a>
                            @if($item['type'] == 'Недвижимость')
                                <a href="/approve_estate/{{$item['what_i_sell']}}/{{$item['sell_and_buy']}}/{{$item['id']}}" class="btn btn-success w-50">Одобрить</a>
                            @elseif($item['type'] == 'Транспорт')
                                <a href="/approve_cars/{{$item['id']}}" class="btn btn-success w-50">Одобрить</a>
                            @elseif($item['type'] == 'Личные вещи')
                                <a href="/approve_items/{{$item['id']}}" class="btn btn-success w-50">Одобрить</a>
                            @elseif($item['type'] == 'Туризм')
                                <a href="/approve_tours/{{$item['id']}}" class="btn btn-success w-50">Одобрить</a>
                            @elseif($item['type'] == 'Работа')
                                <a href="/approve_jobs/{{$item['what_i_sell']}}/{{$item['id']}}" class="btn btn-success w-50">Одобрить</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="no_approve{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Напишите причину</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @if($item['type'] == 'Недвижимость') action="/no_approve_estate/{{$item['what_i_sell']}}/{{$item['sell_and_buy']}}/{{$item['id']}}" @elseif($item['type'] == 'Транспорт') action="/no_approve_cars/{{$item['id']}}" @elseif($item['type'] == 'Личные вещи') action="/no_approve_items/{{$item['id']}}" @elseif($item['type'] == 'Туризм') action="/no_approve_tours/{{$item['id']}}" @elseif($item['type'] == 'Работа') action="/no_approve_jobs/{{$item['what_i_sell']}}/{{$item['id']}}" @endif>
                                <textarea name="text" class="form-control" id="textAreaExample" rows="4"></textarea>
                                <button class="btn btn-primary w-100 mt-2">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>

@endsection