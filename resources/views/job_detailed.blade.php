@extends('layout')
@section('title')Avito - Работа@endsection
@section('content')
<div class="container">
    <div class="d-flex flex-column w-100">
        <nav aria-label="breadcrumb" class="d-tel-none">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{$job_detailed->city}}</a></li>
                <li class="breadcrumb-item"><a href="/job" class="text-decoration-none">Работа</a></li>
            </ol>
        </nav>
        <div class="d-flex-laptop">
            <div class="d-flex-column">
                <h2 class="realty-name">{{$job_detailed->desired_position}}</h2>
                @if($job_detailed->images != null)
                    @if(trim(strstr($job_detailed->images, ',', true)) != '')
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner carousel-img">
                                <div class="carousel-job_detailed active">
                                    <img class="carousel-img" src="/storage/jobs_image/{{$job_detailed->user}}/{{trim(strstr($job_detailed->images, ',', true))}}" alt="...">
                                </div>
                                <?php
                                    $images = explode(',', trim(strstr($job_detailed->images, ','), ', '));
                                ?>
                                @foreach($images as $img)
                                    <div class="carousel-job_detailed">
                                        <img class="carousel-img" src="/storage/jobs_image/{{$job_detailed->user}}/{{$img}}" alt="...">
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
                        <img class="carousel-img" src="/storage/cars_image/{{$job_detailed->user}}/{{$job_detailed->images}}" alt="...">
                    @endif
                @else
                    <img class="carousel-img" src="/no_photo.png" alt="...">
                @endif
            </div>
            <div class="d-flex flex-column w-100">
                @if($job == 'Резюме')
                    <h2 class="realty-price">{{$job_detailed->price}} ₽</h2>
                @elseif($job == 'Вакансии')
                    @if($job_detailed->from_price != '' && $job_detailed->before_price == '' && $job_detailed->when_price == '')
                        <h2 class="realty-price">от {{$job_detailed->from_price}} ₽</h2>
                    @elseif($job_detailed->from_price == '' && $job_detailed->before_price != '' && $job_detailed->when_price == '')
                        <h2 class="realty-price">до {{$job_detailed->before_price}} ₽</h2>
                    @elseif($job_detailed->from_price != '' && $job_detailed->before_price != '' && $job_detailed->when_price == '')
                        <h2 class="realty-price">{{$job_detailed->from_price}} - {{$job_detailed->before_price}} ₽</h2>
                    @elseif($job_detailed->from_price != '' && $job_detailed->before_price != '' && $job_detailed->when_price != '')
                        <h2 class="realty-price">{{$job_detailed->from_price}} - {{$job_detailed->before_price}} ₽ {{$job_detailed->when_price}}</h2>
                    @elseif($job_detailed->from_price == '' && $job_detailed->before_price == '' && $job_detailed->when_price == '')
                        <h2 class="realty-price">Зарплата не указана</h2>
                    @elseif($job_detailed->from_price != '' && $job_detailed->before_price == '' && $job_detailed->when_price != '')
                        <h2 class="realty-price">от {{$job_detailed->from_price}} ₽ {{$job_detailed->when_price}}</h2>
                    @elseif($job_detailed->from_price == '' && $job_detailed->before_price != '' && $job_detailed->when_price != '')
                        <h2 class="realty-price">до {{$job_detailed->before_price}} ₽ {{$job_detailed->when_price}}</h2>
                    @endif
                @endif
                <div class="d-flex-button">
                    <button class="btn btn-success mt-2 btn-width">{{$job_detailed->tel}}</button>
                    <button class="btn btn-primary mt-2 btn-width">Добавить в избранное</button>
                </div>
                <h3 class="mt-3">Описание:</h3>
                <p>{{$job_detailed->description}}</p>
            </div>
        </div>
        <div class="d-flex flex-column">
            <h3 class="mt-3">Характеристики:</h3>
            <div class="d-flex flex-column flex-wrap height-specifications">
                <div class="pe-text">
                    <span class="fs-specifications text-muted">Сфера деятельности:</span>
                    <span class="fs-specifications ms-2">{{$job_detailed->type_job}}</span>
                </div>
                @if($job_detailed->work_schedule != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">График работы:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->work_schedule}}</span>
                    </div>
                @endif
                @if($job_detailed->work_experience != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Стаж работы:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->work_experience}}</span>
                    </div>
                @endif
                @if($job_detailed->education != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Образование:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->education}}</span>
                    </div>
                @endif
                @if($job_detailed->gender != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Лошадиных сил:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->gender}}</span>
                    </div>
                @endif
                @if($job_detailed->gender != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Дата рождения:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->day_birth}} {{$job_detailed->month_birth}} {{$job_detailed->year_birth}}</span>
                    </div>
                @endif
                @if($job_detailed->read_trips != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Готовность к командировкам:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->read_trips}}</span>
                    </div>
                @endif
                @if($job_detailed->move != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Переезд:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->move}}</span>
                    </div>
                @endif
                @if($job_detailed->citizenship != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Гражданство:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->citizenship}}</span>
                    </div>
                @endif
                @if($job_detailed->knowledge_languages != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Знание языков:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->knowledge_languages}}</span>
                    </div>
                @endif
                @if($job_detailed->frequency_payments != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Частота выплат:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->frequency_payments}}</span>
                    </div>
                @endif
                @if($job_detailed->frequency_payments != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Частота выплат:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->frequency_payments}}</span>
                    </div>
                @endif
                @if($job_detailed->where_work != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Где предстоит работать:</span>
                        <span class="fs-specifications ms-2">{{$job_detailed->where_work}}</span>
                    </div>
                @endif
                @if($job_detailed->where_work != '')
                    <div class="pe-text">
                        <span class="fs-specifications text-muted">Так же для людей:</span>
                        @if($job_detailed->over_years_old != '' && $job_detailed->from_years_old != '' && $job_detailed->with_violation_health != '')
                            <span class="fs-specifications ms-2">Старше 45 лет, от 14 лет, с нарушениями здоровья</span>
                        @elseif($job_detailed->over_years_old == '' && $job_detailed->from_years_old != '' && $job_detailed->with_violation_health != '')
                            <span class="fs-specifications ms-2">От 14 лет, с нарушениями здоровья</span>
                        @elseif($job_detailed->over_years_old != '' && $job_detailed->from_years_old == '' && $job_detailed->with_violation_health != '')
                            <span class="fs-specifications ms-2">Старше 45 лет, с нарушениями здоровья</span>
                        @elseif($job_detailed->over_years_old != '' && $job_detailed->from_years_old != '' && $job_detailed->with_violation_health == '')
                            <span class="fs-specifications ms-2">Старше 45 лет, от 14 лет</span>
                        @elseif($job_detailed->over_years_old != '' && $job_detailed->from_years_old == '' && $job_detailed->with_violation_health == '')
                            <span class="fs-specifications ms-2">Старше 45 лет</span>
                        @elseif($job_detailed->over_years_old == '' && $job_detailed->from_years_old != '' && $job_detailed->with_violation_health == '')
                            <span class="fs-specifications ms-2">От 14 лет</span>
                        @elseif($job_detailed->over_years_old == '' && $job_detailed->from_years_old == '' && $job_detailed->with_violation_health != '')
                            <span class="fs-specifications ms-2">С нарушениями здоровья</span>
                        @endif
                    </div>
                @endif
            </div>
            @if($job == 'Вакансии')
                @if($job_detailed->company_name != '' || $job_detailed->post != '' || $job_detailed->responsibilities != '' || $job_detailed->company_name != '' || $job_detailed->month_getting_started != '' && $job_detailed->year_getting_started != '' && $job_detailed->month_end_work != '' && $job_detailed->year_end_work != '')
                    <h3 class="mt-3">Работа:</h3>
                    <div class="d-flex flex-column flex-wrap height-specifications">
                        @if($job_detailed->company_name != '')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Название компании:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->company_name}}</span>
                            </div>
                        @endif
                        @if($job_detailed->post != '')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Должность:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->post}}</span>
                            </div>
                        @endif
                        @if($job_detailed->month_getting_started != '' && $job_detailed->year_getting_started != '' && $job_detailed->month_end_work != '' && $job_detailed->year_end_work != '')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Время работы:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->month_getting_started}} {{$job_detailed->year_getting_started}} - {{$job_detailed->month_end_work}} {{$job_detailed->year_end_work}}</span>
                            </div>
                        @endif
                        @if($job_detailed->responsibilities != '')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Обязанности:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->responsibilities}}</span>
                            </div>
                        @endif
                    </div>
                @endif
            @endif
            @if($job == 'Вакансии')
                @if($job_detailed->name_institution != '' || $job_detailed->specialization != '' || $job_detailed->year_graduation != '')
                    <h3 class="mt-3">Образование:</h3>
                    <div class="d-flex flex-column flex-wrap height-specifications">
                        @if($job_detailed->name_institution != '')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Название заведения:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->name_institution}}</span>
                            </div>
                        @endif
                        @if($job_detailed->specialization)
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Специальность:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->specialization}}</span>
                            </div>
                        @endif
                        @if($job_detailed->year_graduation != '')
                            <div class="pe-text">
                                <span class="fs-specifications text-muted">Год окончания:</span>
                                <span class="fs-specifications ms-2">{{$job_detailed->year_graduation}}</span>
                            </div>
                        @endif
                    </div>
                @endif
            @endif
            <h3 class="mt-3">Расположение:</h3>
            <span>{{$job_detailed->adres}}</span>
        </div>
    </div>
</div>
@endsection