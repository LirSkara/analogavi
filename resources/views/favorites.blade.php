@extends('layout')
@section('title')
    Avito - Личный кабинет
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
            <div class="cards shadow-sm bg-white border rounded-3 mt-2">
                <img src="/no_photo.png" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
                <div class="text-dark px-3 pt-2">
                    <div class="mb-3">
                        <a href="#" class="text-decoration-none link-dark yes-wrap">
                            <div class="fs-5 mb-1" style="height: 60px;">Название</div>
                            <p class="mb-2 fw-bold">1 000 000 ₽</p>
                            <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> Дербент</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
