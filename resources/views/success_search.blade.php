@extends('layout')
@section('title')
    Khalif - Личный кабинет
@endsection
@section('content')
<div class="container py-lg-5" id="poisk_ads">
    <div class="d-flex flex-column">
        <h3 class="mx-auto">Поиск по запросу</h3>
        <i class="bi bi-arrow-down-short mx-auto fs-2"></i>
        <p class="mx-auto fs-5">@{{search_input}}</p>
    </div>
    <div class="d-flex flex-wrap gap-2 mt-3">
        <div v-for="item in ads_success" class="cards shadow-sm bg-white border rounded-3 mt-2">
            <img v-if="item.images != null && item.type == 'Недвижимость'" :src="'/storage/realty_image/' + item.user + '/' +  item.images.split(',')[0]" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
            <img v-if="item.images != null && item.type == 'Личные вещи'" :src="'/storage/items_image/' + item.user + '/' + item.images.split(',')[0]" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
            <img v-if="item.images != null && item.type == 'Транспорт'" :src="'/storage/cars_image/' + item.user + '/' + item.images.split(',')[0]" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
            <img v-if="item.images != null && item.type == 'Работа'" :src="'/storage/jobs_image/' + item.user + '/' + item.images.split(',')[0]" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
            <img v-if="item.images == null" src="/no_photo.png" class="img-fluid rounded-top img-cover w-100" alt="Дербенту придали особый статус">
            <div class="text-dark px-3 pt-2">
                <div class="mb-3">
                    <a v-if="item.type == 'Недвижимость'" :href="'/estate_detailed/' + item.id + '/' + item.what_i_sell + '/' + item.sell_and_buy" class="text-decoration-none link-dark yes-wrap">
                        <div class="fs-5 mb-1" style="height: 60px;">@{{item.name}}</div>
                        <p class="mb-2 fw-bold">@{{item.price}}</p>
                        <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> @{{item.city}}</p>
                    </a>
                    <a v-if="item.type == 'Личные вещи'" :href="'/item_detailed/' + item.id" class="text-decoration-none link-dark yes-wrap">
                        <div class="fs-5 mb-1" style="height: 60px;">@{{item.name}}</div>
                        <p class="mb-2 fw-bold">@{{item.price}}</p>
                        <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> @{{item.city}}</p>
                    </a>
                    <a v-if="item.type == 'Транспорт'" :href="'/car_detailed/' + item.id" class="text-decoration-none link-dark yes-wrap">
                        <div class="fs-5 mb-1" style="height: 60px;">@{{item.name}}</div>
                        <p class="mb-2 fw-bold">@{{item.price}}</p>
                        <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> @{{item.city}}</p>
                    </a>
                    <a v-if="item.type == 'Работа'" :href="'/job_detailed/' + item.id + '/' + item.what_i_sell" class="text-decoration-none link-dark yes-wrap">
                        <div class="fs-5 mb-1" style="height: 60px;">@{{item.name}}</div>
                        <p class="mb-2 fw-bold">@{{item.price}}</p>
                        <p class="display-6 fs-6 text-muted"><i class="bi bi-geo-alt-fill"></i> @{{item.city}}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const PoiskAds = {
        data() {
            return {
                ads_success: JSON.parse(localStorage.getItem("ads_success")),
                search_input: JSON.parse(localStorage.getItem("search_input")),
            }
        },
    }
    Vue.createApp(PoiskAds).mount('#poisk_ads')
</script>
@endsection
