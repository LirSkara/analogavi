@extends('layout')
@section('title')Khalif - Главная страница@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="scrolling-wrapper scroll-none pb-3">
                <a href="/estate" class="card p-2 text-center">
                    <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_4.png" class="w-75" alt="">
                    <div class="small-c">Недвижимость</div>
                </a>
                <a href="/cars" class="card p-2 text-center">
                    <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_1.png" class="w-75" alt="">
                    <div class="small-c">Транспорт</div>
                </a>
                <a href="/job" class="card p-2 text-center">
                    <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_110.png" class="w-75" alt="">
                    <div class="small-c">Работа</div>
                </a>
                <a href="/items" class="card p-2 text-center">
                    <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_5.png" class="w-75" alt="">
                    <div class="small-c">Личные вещи</div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="fs-4">Недвижимость</div>
</div>
<div class="container px-0">
    <div class="scrolling-wrapper scroll-none pb-2 px-2">

        @foreach($estate as $item)
            <div style="display: inline-block;vertical-align: top;width: 300px;" class="shadow-sm bg-white border rounded-3 mt-2 me-2">
                @if($item['images'] != '')
                    <img src="/storage/realty_image/{{$item['user']}}/{{explode(',', $item['images'])[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                @else
                    <img src="/no_photo.png" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                @endif                
                <div class="text-dark px-3 pt-2">
                    <div class="mb-3">
                        <a href="/estate_detailed/{{$item['id']}}/{{$item['what_i_sell']}}/{{$item['sell_and_buy']}}" class="text-decoration-none link-dark yes-wrap">
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
                            @if($item['sell_and_buy'] == 'Продам' || $item['sell_and_buy'] == 'Куплю')
                                <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                            @elseif($item['sell_and_buy'] == 'Сдам' || $item['sell_and_buy'] == 'Сниму')
                                @if($item['type_time'] == 'Сутки')
                                    <p class="mb-2 fw-bold">{{$item['price']}} ₽ в сутки</p>
                                @else
                                    <p class="mb-2 fw-bold">{{$item['price']}} ₽ в месяц</p>
                                @endif
                            @endif
                            <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> {{$item['city']}}</p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>


<div class="container mt-3">
    <div class="fs-4">Транспорт</div>
</div>
<div class="container px-0">
    <div class="scrolling-wrapper scroll-none pb-2 px-2">
        
        @foreach($cars as $item)
            @foreach($marks->where('id', $item->marka) as $marka)
                <div style="display: inline-block;vertical-align: top;width: 300px;" class="shadow-sm bg-white border rounded-3 mt-2 me-2">
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

<div class="container mt-3">
    <div class="fs-4">Работа</div>
</div>
<div class="container px-0">
    <div class="scrolling-wrapper scroll-none pb-2 px-2">

        @foreach($jobs as $item)
            <div style="display: inline-block;vertical-align: top;width: 300px;" class="shadow-sm bg-white border rounded-3 mt-2 me-2">
                @if($item['images'] != '')
                    <img src="/storage/jobs_image/{{$item['user']}}/{{explode(',', $item['images'])[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                @else
                    <img src="/no_photo.png" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                @endif                 
                <div class="text-dark px-3 pt-2">
                    <div class="mb-3">
                        <a href="/job_detailed/{{$item['id']}}/{{$item['job']}}" class="text-decoration-none link-dark yes-wrap">
                            <div class="fs-5 mb-1" style="height: 60px;">{{$item['desired_position']}}</div>
                            @if($item['job'] == 'Резюме')
                                <p class="mb-2 fw-bold">{{$item['price']}} ₽</p>
                            @elseif($item['job'] == 'Вакансии')
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
                            <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> {{$item['city']}}</p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<div class="container mt-3">
    <div class="fs-4">Личные вещи</div>
</div>
<div class="container px-0">
    <div class="scrolling-wrapper scroll-none pb-2 px-2">

        @foreach($items as $item)
            <div style="display: inline-block;vertical-align: top;width: 300px;" class="shadow-sm bg-white border rounded-3 mt-2 me-2">
                <img src="/storage/items_image/{{$item->user}}/{{explode(',', $item->images)[0]}}" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                <div class="text-dark px-3 pt-2">
                    <div class="mb-3">
                        <a href="/item_detailed/{{$item->id}}" class="text-decoration-none link-dark yes-wrap">
                            <div class="fs-5 mb-1" style="height: 60px;">{{$item->name}}</div>
                            <p class="mb-2 fw-bold">{{$item->price}} ₽</p>
                            <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> {{$item->city}}</p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection