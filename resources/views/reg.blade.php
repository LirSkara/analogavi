@extends('layout')
@section('title')Avito - Регистрация@endsection
@section('content')
<div class="container">
    <div class="">
        <form action="/reg" method="post" style="width: 350px;" class="mx-auto shadow px-5 py-4 bg-light">
            @csrf
            <h1 class="fs-3 pb-3">Регистрация</h1>
            @error('name'){{$message}}@enderror
            <div class="mb-3">
                <label for="name" class="form-label">Ваше имя</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            @error('tel'){{$message}}@enderror
            <div class="mb-3">
                <label for="tel" class="form-label">Ваш телефон</label>
                <input name="tel" type="tel" data-tel-input class="form-control" id="tel" aria-describedby="telhelp">
            </div>
            @error('email'){{$message}}@enderror
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email почта</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            @error('password'){{$message}}@enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Придумайте пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
              <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="material-icons align-middle">how_to_reg</i> Регистрация</button>
        </form>
    </div>
</div>
@endsection