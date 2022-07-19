<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/style.css">
    <meta name="theme-color" content="#0d6efd">

    <!-- Vue js -->
    <script pt src="https://unpkg.com/vue@next"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="bg-primary">
        <div class="container d-flex flex-wrap small">
          <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link link-light px-2 active" aria-current="page"><i class="material-icons align-middle me-1 text-light">pin_drop</i>Дербент</a></li>
          </ul>
          <ul class="nav">
            @if(Auth()->check())
            <li class="nav-item"><a href="/cabinet" class="nav-link link-light px-2"><i class="material-icons align-middle">person</i> {{auth()->user()->name}}</a></li>
            <li class="nav-item"><a href="/exit" class="nav-link link-light px-2"><i class="material-icons align-middle">login</i> Выход</a></li>
            @else
            <li class="nav-item"><a href="/login" class="nav-link link-light px-2"><i class="material-icons align-middle">login</i> Войти</a></li>
            <li class="nav-item"><a href="/reg" class="nav-link link-light px-2"><i class="material-icons align-middle">how_to_reg</i> Регистрация</a></li>
            @endif
        </ul>
        </div>
    </nav>
    <div class="container my-3">
        <div class="d-flex flex-wrap">
            <div class="p-2 me-4 logo">
                <!-- <span class="fs-4 fw-bold text-logo">LOGO DESC</span> -->
                <a class="mx-auto" href="/"><img class="logo-img" src="https://shopcrossroadstc.com/wp-content/uploads/sites/4/2014/07/Party-City.png" alt=""></a>
            </div>
            <div class="p-2 flex-grow-1 main-search">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-white" id="basic-addon1"><i class="material-icons">search</i></span>
                    <input type="text" class="form-control" placeholder="Поиск по объявлениям" aria-label="Username" aria-describedby="basic-addon1">
                </div>                  
            </div>
            <div class="p-2 btn-main"><a class="btn btn-primary btn-custom" href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons align-middle fs-6 pb-1 me-1">add</i>Разместить объявление</a></div>
        </div>
    </div>
    @yield('content')
    <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Главная</a></li>
            <li class="nav-item"><a href="/estate" class="nav-link px-2 text-muted">Недвижимость</a></li>
            <li class="nav-item"><a href="/cars" class="nav-link px-2 text-muted">Транспорт</a></li>
            <li class="nav-item"><a href="/job" class="nav-link px-2 text-muted">Работа</a></li>
            <li class="nav-item"><a href="items" class="nav-link px-2 text-muted">Личные вещи</a></li>
          </ul>
          <p class="text-center text-muted">© 2022 Аналог Авито, Inc</p>
        </footer>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
            <h5 class="modal-title" id="exampleModalLabel">Выберите категорию</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-2 row-cols-lg-4 pb-3">
                    <a href="/add_estate" class="col p-2 text-center text-decoration-none text-dark">
                        <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_4.png" class="w-75" alt="">
                        <div class="small-c">Недвижимость</div>
                    </a>
                    <a href="/add_cars" class="col p-2 text-center text-decoration-none text-dark">
                        <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_1.png" class="w-75" alt="">
                        <div class="small-c">Транспорт</div>
                    </a>
                    <a href="/add_job" class="col p-2 text-center text-decoration-none text-dark">
                        <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_110.png" class="w-75" alt="">
                        <div class="small-c">Работа</div>
                    </a>
                    <a href="/add_items" class="col p-2 text-center text-decoration-none text-dark">
                        <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_5.png" class="w-75" alt="">
                        <div class="small-c">Личные вещи</div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
  
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Maska js -->
    <script src="/maska.js"></script>
</body>
</html>