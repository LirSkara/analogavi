@extends('layout')
@section('title')Khalif - Туризм@endsection
@section('content')
<div class="container" id="tour">
    <div class="d-flex flex-column w-100">
        <nav aria-label="breadcrumb" class="d-tel-none">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{$item->city}}</a></li>
                <li class="breadcrumb-item"><a href="/tours" class="text-decoration-none">Туризм</a></li>
            </ol>
        </nav>
        <div class="d-flex-laptop">
            <div class="d-flex-column">
                <h2 class="realty-name">{{$item->name}}</h2>
                @if($item->images != null)
                    @if(trim(strstr($item->images, ',', true)) != '')
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner carousel-img">
                                <div class="carousel-item active">
                                    <img class="carousel-img" src="/storage/tours_image/{{$item->user}}/{{trim(strstr($item->images, ',', true))}}" alt="...">
                                </div>
                                <?php
                                    $images = explode(',', trim(strstr($item->images, ','), ', '));
                                ?>
                                @foreach($images as $items)
                                    <div class="carousel-item">
                                        <img class="carousel-img" src="/storage/tours_image/{{$item->user}}/{{$items}}" alt="...">
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
                        <img class="carousel-img" src="/storage/tours_image/{{$item->user}}/{{$item->images}}" alt="...">
                    @endif
                @else
                    <img class="carousel-img" src="/no_photo.png" alt="...">
                @endif
            </div>
            <div class="d-flex flex-column w-100">
                <h2 class="realty-price">{{$item->price}} ₽</h2>
                <div class="d-flex-button">
                    <button class="btn btn-success mt-2 btn-width">{{$item->tel}}</button>
                    @if(Auth::check())
                        @if($favourites == 0)
                            <button v-on:click="add_favourites({{$item->id}})" id="btn_add_fav_item" class="btn btn-primary mt-2 btn-width">Добавить в избранное</button>
                        @else
                            <button class="btn btn-dis mt-2 btn-width">В избранном</button>
                        @endif
                    @else
                        <button class="btn btn-primary mt-2 btn-width" data-bs-toggle="modal" data-bs-target="#no_favourites">Добавить в избранное</button>
                    @endif
                </div>
                <h3 class="mt-3">Описание:</h3>
                <p>{{$item->description}}</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="no_favourites" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                Для того, чтобы добавить в избранное, нужно зарегистрироваться
            </div>
        </div>
    </div>
</div>

<script>
    const Tour = {
        data() {
            return {

            }
        },
        methods: {
            add_favourites(id) {
                var type = 'Туризм'
                axios({
                    method: 'get',
                    url: `/add_favourites_tour/${type}/${id}`,
                    responseType: 'json',
                })
                .then(function (response) {
                    btn_add_fav_item.classList.remove('btn-primary')
                    btn_add_fav_item.classList.add('btn-dis')
                    document.getElementById('btn_add_fav_item').innerHTML = 'В избранном'
                })
            }
        }
    }
    Vue.createApp(Tour).mount('#tour')
</script>
@endsection