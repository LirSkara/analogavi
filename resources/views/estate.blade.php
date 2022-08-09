@extends('layout')
@section('title')Avito - Недвижимость@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>Недвижимость</h3>
    </div>
    <div class="d-flex flex-wrap gap-2 mt-3">
        @foreach($estate as $item)
            <div class="cards shadow-sm bg-white border rounded-3 mt-2">
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
@endsection