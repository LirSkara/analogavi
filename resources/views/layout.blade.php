<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Khalif</title>

    <meta name="theme-color" content="#0d6efd">
    
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

        <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Vue js -->
    <script pt src="https://unpkg.com/vue@next"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
    <!-- Yandex Api -->
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
    <nav class="bg-primary" id="city">
        <div class="container d-flex flex-wrap small">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#choice_city" class="nav-link link-light px-2 active" aria-current="page"><i class="material-icons align-middle me-1 text-light">pin_drop</i>@{{my_city}}</a></li>
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
        <!-- Начало модального окна выбора города -->
        <div class="modal fade" id="choice_city" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="exampleModalLabel">Выбор города</h5>
                        <button type="button" class="btn-close" id="close_city" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="overflow-y: scroll; overflow-x: hidden; height: 600px;">
                        <div class="d-flex flex-column">
                            <input type="text" v-on:input="poisk_city()" v-model="search_city" id="input_city" class="form-control form-control-lg border-primary" placeholder="Город">
                            <div v-if="city_success == ''" class="d-flex flex-column gap-2 mt-3">
                                <div v-for="item in city" v-on:click="choose_city(item.city)" class="ps-2 btn-city">
                                    <span class="fs-5">@{{item.city}},</span>
                                    <span class="fs-5 text-muted ms-2">@{{item.region}}</span>
                                </div>
                            </div>
                            <div v-if="city_success != ''" class="d-flex flex-column gap-2 mt-3">
                                <div v-for="item in city_success" v-on:click="choose_city(item.city)" class="ps-2 btn-city">
                                    <span class="fs-5">@{{item.city}},</span>
                                    <span class="fs-5 text-muted ms-2">@{{item.region}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Конец модального окна выбора города -->
    </nav>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="cust-logo">
                <h1 class="fw-bold mt-2"><img class="logo-img" src="https://khalifmarket.com/apple-touch-icon.png" alt="Khalif" style="width:44px;height:44px;position:relative;bottom:4px;margin-right:-8px;"> <a class="text-dark" href="/">Khalif</a></h1>
            </div>
            <nav id="navbar" class="navbar order-last order-lg-0 ms-auto">
                <ul class="px-3">
                    <input type="search" placeholder="Введите в поиск" class="form-control py-2 px-4">
                    <li class="nav-item scrollto"><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="">+ Разместить объявление</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            
        </div>
    </header><!-- End Header -->
        <!-- Начало модального окна выбора города -->
        <div class="modal fade" id="choice_city" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="exampleModalLabel">Выбор города</h5>
                        <button type="button" class="btn-close" id="close_city" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="overflow-y: scroll; overflow-x: hidden; height: 600px;">
                        <div class="d-flex flex-column">
                            <input type="text" v-on:input="poisk_city()" v-model="search_city" id="input_city" class="form-control form-control-lg border-primary" placeholder="Город">
                            <div v-if="city_success == ''" class="d-flex flex-column gap-2 mt-3">
                                <div v-for="item in city" v-on:click="choose_city(item.city)" class="ps-2 btn-city">
                                    <span class="fs-5">@{{item.city}},</span>
                                    <span class="fs-5 text-muted ms-2">@{{item.region}}</span>
                                </div>
                            </div>
                            <div v-if="city_success != ''" class="d-flex flex-column gap-2 mt-3">
                                <div v-for="item in city_success" v-on:click="choose_city(item.city)" class="ps-2 btn-city">
                                    <span class="fs-5">@{{item.city}},</span>
                                    <span class="fs-5 text-muted ms-2">@{{item.region}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Конец модального окна выбора города -->
    </nav>
    <div class="container my-3" id="ads_search">
        <div class="d-flex flex-wrap">
            <div class="px-1 pt-1 me-4 logo">
                <a class="mx-auto fs-1 text-decoration-none fw-bold text-dark" href="/"><img class="logo-img" src="https://khalifmarket.com/apple-touch-icon.png" alt="Khalif" style="width:44px;height:44px;position:relative;bottom:4px;">Khalif</a>
            </div>
            <div class="p-2 flex-grow-1 main-search mt-2">
                <div class="input-group mb-3">
                    <input type="text" v-on:input="search()" v-model="search_input" id="poisk_input" class="form-control" placeholder="Поиск по объявлениям" aria-label="Username" aria-describedby="basic-addon1">
                    <button v-on:click="btn_search()" class="d-flex align-items-center btn btn-primary text-white" id="btn_poisk"><i class="material-icons fs-6 me-1">search</i> Найти</button>
                </div>
                <div id="platform_search" class="d-none div-success">
                    <div class="w-100 bg-white border border-1 border-top-0 d-flex flex-column">
                        <div v-if="ads_success.length != 0" class="my-2 d-flex flex-column">
                            <a v-for="item in ads_success" :href="item.link" class="py-2 px-3 d-flex text-decoration-none w-100">
                                <i class="bi bi-search me-2 text-muted"></i>
                                <span class="text-dark">@{{item.name}}</span>
                            </a>
                        </div>
                        <div v-if="ads_success.length == 0" class="my-2 d-flex">
                            <a class="py-2 px-3 d-flex text-decoration-none w-100">
                                <span class="text-dark">По ващему запросу ничего не найдено</span>
                            </a>
                        </div>
                    </div>
                </div>         
            </div>
            <div class="p-2 btn-main mt-2"><a class="btn btn-primary btn-custom" href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons align-middle fs-6 pb-1 me-1">add</i>Разместить объявление</a></div>
        </div>
    </div>
    <!-- <header id="header" class="d-flex align-items-center mb-3">
        <div class="container d-flex align-items-center">

            <h1 class="fw-bold mt-2"><img class="logo-img" src="https://khalifmarket.com/apple-touch-icon.png" alt="Khalif" style="width:44px;height:44px;position:relative;bottom:4px;margin-right:-8px;"> <a class="text-dark text-decoration-none" href="/">Khalif</a></h1>
            
            <div class="logo mx-auto"> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <!-- </div>
            <input type="search" placeholder="Введите в поиск" class="form-control me-0 py-2 px-4 w-50">
            <div class="p-2 btn-main"><a class="btn btn-primary btn-custom" href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons align-middle fs-6 pb-1 me-1">add</i>Разместить объявление</a></div>

        </div>
    </header> -->
    @yield('content')
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; <strong><span>Khalif 2022</span></strong><br>Все права защищены
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

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
                    <a href="/add_tourism" class="col p-2 text-center text-decoration-none text-dark">
                        <img src="https://www.avito.st/s/app/visual_shortcuts/light/228x192/cat_5.png" class="w-75" alt="">
                        <div class="small-c">Туризм</div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    <script>
        if(localStorage.getItem("city") == null){
            localStorage.setItem("city", JSON.stringify('Москва'));
        }
        const City = {
            data() {
                return {
                    city: [],
                    city_success: [],
                    search_city: '',
                    my_city: JSON.parse(localStorage.getItem("city")),
                }
            },
            beforeMount() {
                this.all();
            },
            methods: {
                all() {
                    var city = this.city
                    $(function(){
                        $.getJSON("/russia.json",function(data){
                            $.each(data,function(index, value){
                                city.push({
                                    region: value['region'],
                                    city: value['city'],
                                })
                            });
                        })
                    });
                    if(this.my_city == '') {
                        window.onload = function () {
                            localStorage.setItem("city", JSON.stringify('Москва'));
                        }
                    }
                },
                poisk_city() {
                    if(this.search_city != '') {
                        input_city.classList.add('border-primary')
                        this.city_success = this.city,
                        searchString = this.search_city;

                        if(!searchString){
                            if(searchString != ''){
                                return city_success;
                            }
                        }

                        searchString = searchString.trim().toLowerCase();
                        this.city_success = this.city_success.filter(function(item){
                            if(item.city.toLowerCase().indexOf(searchString) !== -1){
                                return item;
                            } else
                            if(item.region.toLowerCase().indexOf(searchString) !== -1) {
                                return item;
                            }
                        })

                        return this.city_success
                    } else {
                        this.city_success = [];
                    }
                },
                choose_city(city) {
                    this.search_city = city
                    input_city.classList.remove('border-primary')
                    localStorage.setItem("city", JSON.stringify(city));
                    this.my_city = city
                    close_city.click()
                },
            }
        }
        Vue.createApp(City).mount('#city')

        const AdsSearch = {
            data() {
                return {
                    ads: [],
                    ads_success: [],
                    search_input: '',
                }
            },
            beforeMount() {
                this.all();
            },
            methods: {
                all() {
                    axios({
                        method: 'get',
                        url: `/all_ads`,
                        responseType: 'json',
                    })
                    .then(function (response) {
                        response.data.forEach(elem => {
                            this.ads.push({
                                name: elem['name'],
                                link: elem['link'],
                                images: elem['images'],
                                city: elem['city'],
                                price: elem['price'],
                                user: elem['user'],
                                type: elem['type'],
                                what_i_sell: elem['what_i_sell'],
                                sell_and_buy: elem['sell_and_buy'],
                            })
                        });
                    }.bind(this))
                },
                search() {
                    if(this.search_input != '') {
                        platform_search.classList.remove('d-none')
                        poisk_input.classList.add('border-bottom-left-none')
                        btn_poisk.classList.add('border-bottom-right-none')
                        
                        this.ads_success = this.ads,
                        searchString = this.search_input;

                        if(!searchString){
                            if(searchString != ''){
                                return ads_success;
                            }
                        }

                        searchString = searchString.trim().toLowerCase();
                        this.ads_success = this.ads_success.filter(function(item){
                            if(item.name.toLowerCase().indexOf(searchString) !== -1){
                                return item;
                            }
                        })
                        
                        return this.ads_success
                    } else {
                        platform_search.classList.add('d-none')
                        poisk_input.classList.remove('border-bottom-left-none')
                        btn_poisk.classList.remove('border-bottom-right-none')
                    }
                },
                btn_search() {
                    if(this.search_input != '') {
                        localStorage.setItem("ads_success", JSON.stringify(this.ads_success));
                        localStorage.setItem("search_input", JSON.stringify(this.search_input));
                        window.location.href = '/success_search'
                    }
                }
            }
        }
        Vue.createApp(AdsSearch).mount('#ads_search')
    </script>
  
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Maska js -->
    <script src="/maska.js"></script>
</body>
</html>