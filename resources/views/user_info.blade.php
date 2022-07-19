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
                <li class="breadcrumb-item active" aria-current="page">Профиль</li>
            </ol>
        </nav>
        <form action="/user_info_edit" method="POST">
            <div class="bg-light border my-3 p-3 rounded shadow-sm">
                <input type="hidden" name="_token" value="GJALklT3uDHTDRSDEpxPxCKv9D7a9UqLMiUZQKSV">
                <div class="mb-2">Основная информация</div>
                <div class="row g-1">
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{auth()->user()->name}}"
                                placeholder="text">
                            <label for="firstname"><i class="bi bi-person-fill"></i> Имя</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-light border my-3 p-3 rounded shadow-sm">
                <div class="mb-2">Контактные данные</div>
                <div class="form-floating mb-2">
                    <input type="tel" class="form-control" id="tel" name="tel" value="{{auth()->user()->tel}}"
                        placeholder="text">
                    <label for="tel"><i class="bi bi-telephone"></i> Номер телефона</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}"
                        placeholder="text">
                    <label for="email"><i class="bi bi-envelope"></i> Email почта</label>
                </div>
                <button class="btn btn-secondary w-100 mt-3">Обновить данные</button>
            </div>
        </form>
    </div>
@endsection
