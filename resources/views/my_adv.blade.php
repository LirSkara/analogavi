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
                <li class="breadcrumb-item active" aria-current="page">Объявления</li>
            </ol>
        </nav>
        123
    </div>
@endsection
