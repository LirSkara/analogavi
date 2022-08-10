@extends('layout')
@section('title')Avito - Работа@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h3>Работа</h3>
    </div>
    <div class="d-flex flex-wrap gap-2 mt-3">
        @foreach($jobs as $item)
            <div class="cards shadow-sm bg-white border rounded-3 mt-2">
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
@endsection