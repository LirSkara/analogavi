@extends('layout')
@section('title')Avito - Авторизация@endsection
@section('content')
<div class="container">
    <div class="">
        <form  action="/login" method="post" style="width: 350px;" class="mx-auto shadow px-5 py-4 bg-light">
            @csrf
            <h1 class="fs-3 pb-3">Авторизация</h1>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email почта</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Пароль</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="material-icons align-middle">login</i> Войти</button>
        </form>
    </div>
</div>
@endsection