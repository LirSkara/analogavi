@extends('layout')
@section('title')Khalif - Регистрация@endsection
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center bg-image">
        <div class="container text-center text-md-left" data-aos="fade-up">
            <div class="mb-3"><img class="logo-img" src="https://khalifmarket.com/apple-touch-icon.png" alt="Khalif" style="width:94px;height:94px;position:relative;bottom:4px;margin-right:-8px;border-radius:10px;"><br><span style="font-size:40pt;" class="text-white">Khalif</span></div>
            <h1>Добро пожаловать</h1>
            <h2>Тут вы можете найти или продать что угодно.</h2>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= What We Do Section ======= -->
        <section id="what-we-do" class="what-we-do">
            <div class="container">

                <div class="section-title mt-5">
                    <h2>Категории сайта</h2>
                </div>

                <div class="row row-cols-2 row-cols-lg-5">
                    <div class="col d-flex align-items-stretch">
                        <div class="icon-box cus">
                            <a href="/estate">
                                <img class="w-50 mb-3"
                                    src="/001.svg"
                                    alt="">
                                <h4>Недвижимость</h4>
                            </a>
                            <p>Khalif позволяет легко просматривать дома. Когда вы будете готовы, вы также можете связаться с владельцем.</p>
                        </div>
                    </div>

                    <div class="col d-flex align-items-stretch">
                        <div class="icon-box cus">
                            <a href="/cars">
                                <img class="w-50 mb-3" src="/002.svg" alt="">
                                <h4>Автомобили</h4>
                            </a>
                            <p>Выбрать для себя новый автомобиль или продать свой, теперь на нашем сайте сделать это гораздо проще.</p>
                        </div>
                    </div>

                    <div class="col d-flex align-items-stretch">
                        <div class="icon-box cus">
                            <a href="/job">
                                <img class="w-50 mb-3" src="/003.svg"
                                    alt="">
                                <h4>Работа</h4>
                            </a>
                            <p>Тут вы можете найти работу или поискасть к себе в бизнес сотрудников. Khalif поможет найти вам всё.</p>
                        </div>
                    </div>

                    <div class="col d-flex align-items-stretch">
                        <div class="icon-box cus">
                            <a href="/items">
                                <img class="w-50 mb-3" src="/004.svg"
                                    alt="">
                                <h4>Личные вещи</h4>
                            </a>
                            <p>Продавайте и покупайте личные вещи, начиная от одежды, заканчивая техникой и мебелью.</p>
                        </div>
                    </div>
                    
                    <div class="col d-flex align-items-stretch">
                        <div class="icon-box cus">
                            <a href="/tours">
                                <img class="w-50 mb-3" src="/005.svg" alt="">
                                <h4>Туризм</h4>
                            </a>
                            <p>Туристические поездки во всевозможные направления по всему миру.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End What We Do Section -->

    </main><!-- End #main -->
@endsection