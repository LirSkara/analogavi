@extends('layout')
@section('title')
    Khalif - Редактирование личных вещей
@endsection
@section('content')
    <div class="container" id="edit_tours">
        <div class="row mx-auto">
            <form id="edit_form_personal" class="col">
            @csrf
                <h1 class="fs-3 mb-5">Параметры</h1>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Название объявления</label>
                    </div>
                    <div class="col-12 col-lg-auto mt-0">
                        <input type="text" name="name" id="name" v-model="name" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{name_error}}</div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Описание</label>
                    </div>
                    <div class="col-12 col-lg-auto mt-0">
                        <textarea name="description" id="name" v-model="description" class="form-control" aria-describedby="passwordHelpInline"></textarea>
                        <div class="text-danger">@{{description_error}}</div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Цена</label>
                    </div>
                    <div class="col-12 col-lg-auto mt-0 mb-3">
                        <div class="input-group">
                            <input name="price" v-model="price" style="border-right: 0;width:100px;" type="text" class="form-control"
                                aria-label="Цена" aria-describedby="basic-addon2">
                            <span class="input-group-text bg-white" id="basic-addon2">₽</span>
                        </div>
                        <div class="text-danger">@{{price_error}}</div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Номер телефона</label>
                    </div>
                    <div class="col-auto mt-0 fw-bold">
                        {{ auth()->user()->tel }}
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Ваше имя</label>
                    </div>
                    <div class="col-auto mt-0 fw-bold">
                        {{ auth()->user()->name }}
                    </div>
                </div>
                <input type="hidden" name="city" v-model="my_city">
                <button class="btn btn-primary w-100" v-on:click="edit_personal()">Редактировать</button>
            </form>
            <div class="col-12 col-lg-4"></div>
        </div>

    </div>

    <script>
        const EditTours = {
            data() {
                return {
                    name: '{{$item->name}}',
                    description: '{{$item->description}}',
                    price: '{{$item->price}}',
                    name_error: '',
                    state_error: '',
                    description_error: '',
                    price_error: '',
                    file_personal_error: '',
                    my_city: JSON.parse(localStorage.getItem("city")),
                }
            },
            methods: {
                edit_personal() {
                    event.preventDefault();
                    if(this.name != '') {
                        if(this.description != '') {
                            if(this.price != '') {
                                this.personal_images_error = ''
                                this.price_error = ''
                                this.description_error = ''
                                this.name_error = ''

                                var form_personal = new FormData($("#edit_form_personal")[0]);

                                axios({
                                    method: 'post',
                                    url: '/edit_tours/{{$item->id}}',
                                    responseType: 'json',
                                    data: form_personal,
                                })
                                .then(function (response) {
                                    window.location.href = '/my_adv'
                                })
                            } else {
                                this.price_error = 'Это поле обязательно'
                                this.description_error = ''
                                this.name_error = ''
                            }
                        } else {
                            this.description_error = 'Это поле обязательно'
                            this.name_error = ''
                        }
                    } else {
                        this.name_error = 'Это поле обязательно'
                    }
                },
            }
        }
        Vue.createApp(EditTours).mount('#edit_tours')
    </script>
@endsection
