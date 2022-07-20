@extends('layout')
@section('title')
    Avito - Личный кабинет
@endsection
@section('content')
    <div class="container py-lg-5">
        <nav aria-label="breadcrumb custom-cr">
            <ol class="breadcrumb crumb-custom">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Личный кабинет #{{ auth()->user()->id }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col">
                <div class="btn-group w-100" role="group" aria-label="Basic example">
                    <a href="#" class="link-dark text-decoration-none dropdown-toggle btn btn-light w-100 text-start"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="ms-2">{{ auth()->user()->email }}</span>
                    </a>
                    <ul class="dropdown-menu small w-100 py-0" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item border-bottom py-2" href="/user_info"><i class="bi bi-person-fill"></i>
                                Мой профиль</a></li>
                        @if (auth()->user()->id == 1)
                            <li><a class="dropdown-item border-bottom py-2" href="/control_panel"><i
                                        class="bi bi-gear-fill"></i>
                                    Панель управления</a></li>
                        @endif
                        <li><a class="dropdown-item py-2 border-bottom" href="/sotr"><i class="bi bi-info-circle"></i>
                                Сотрудничество с нами</a></li>
                    </ul>
                    <button data-bs-toggle="modal" data-bs-target="#exit" type="button" class="btn btn-danger pt-2"><i
                            class="bi bi-box-arrow-right"></i>
                        <!--и-->
                    </button>
                </div>
                <div class="row row-cols-3 g-2 mt-1 small text-center">
                    <div class="col">
                        <a href="/my_adv" class="small px-3 text-center text-decoration-none text-dark">
                            <i class="bi bi-file-earmark-richtext fs-1 text-primary d-block"></i>
                            Объявления
                            <span class="small text-muted d-block">Всего моих: 0</span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="/favorites" class="small px-3 text-center text-decoration-none text-dark">
                            <i class="bi bi-bookmark-heart fs-1 text-danger d-block"></i>
                            Избранное
                            <span class="small text-muted d-block">Всего: 0</span>
                        </a>
                    </div>
                    <div class="col">
                        <a href="tel:+79998887766" class="small px-3 text-center text-decoration-none text-dark">
                            <i class="bi bi-telephone-plus-fill fs-1 text-info d-block"></i>
                            Тех. Поддержка
                            <span class="small text-muted d-block">Мы всегда на связи</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="modal fade" id="exit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content pb-2 pt-4">
                <h5 class="text-center" id="exampleModalLabel">Вы уверены?</h5>
                <div class="m-3 text-center">
                    <a href="/exit" class="btn btn-danger">Выйти из аккаунта</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
@endsection
