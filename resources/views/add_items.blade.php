@extends('layout')
@section('title')
    Avito - Добавление личных вещей
@endsection
@section('content')
    <div class="container" id="additems">
        <div class="row mx-auto">
            <form id="form_personal" class="col">
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
                        <label for="name" class="col-form-label">Состояние</label>
                    </div>
                    <div class="col-12 col-lg-auto mt-0">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select v-model="state" name="state" class="form-select" id="inlineFormSelectPref">
                            <option value="" selected disabled>Выберите состояние</option>
                            <option value="1">Новое</option>
                            <option value="2">Б/у</option>
                        </select>
                        <div class="text-danger">@{{state_error}}</div>
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
                        <label for="name" class="col-form-label">Фотографии <span class="text-muted small">(Максимум
                                3)</span></label>
                    </div>
                    <div class="col-auto mt-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addimage"><span>+</span> Добавить фото</button>
                        <div class="text-danger">@{{personal_images_error}}</div>
                        <div class="mt-3">
                            <span v-for="(item, id) in personal_images" key="id" style="width:100px;display:inline-block;">
                                <img width="100"
                                    :src="'/storage/items_image/{{auth()->user()->id}}/' + item.image"
                                    alt="">
                                <span class="bg-danger pt-2 text-white px-1" style="position: relative;bottom:28px;cursor:pointer;" v-on:click="delete_images_personal(id)"><i class="material-icons">delete</i></span>
                            </span>
                        </div>
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
                <button class="btn btn-primary w-100" v-on:click="add_personal()">Сохранить и опубликовать</button>
            </form>
            <div class="col-12 col-lg-4"></div>
        </div>

        <!-- Начало модального окна добавления фото -->
        <div class="modal fade" id="addimage" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выберите изображение</h5>
                        <button type="button" id="close_items_image" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="form_add_image_personal">
                    @csrf
                        <div class="modal-body">
                            <input type="file" name="image" id="file_personal" class="w-100">
                            <div class="text-danger">@{{file_personal_error}}</div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" v-on:click="add_images_personal()">Загрузить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Конец модального окна добавления фото -->

    </div>

    <script>
        const AddItems = {
            data() {
                return {
                    name: '',
                    state: '',
                    description: '',
                    price: '',
                    name_error: '',
                    state_error: '',
                    description_error: '',
                    price_error: '',
                    personal_images: [],
                    personal_images_error: '',
                    file_personal_error: '',
                    my_city: JSON.parse(localStorage.getItem("city")),
                }
            },
            beforeMount(){
                this.all();
            },
            methods: {
                all() {
                    var prom = this.personal_images
                    axios({
                        method: 'get',
                        url: '/all_img_items',
                        responseType: 'json',
                    })
                    .then(function (response) {
                        if(response.data != 0) {
                            response.data.forEach(function(elem) {
                                prom.push({
                                    id: elem['id'],
                                    image: elem['image'],
                                })
                            })
                        }
                    })
                },
                add_personal() {
                    event.preventDefault();
                    if(this.name != '') {
                        if(this.state != '') {
                            if(this.description != '') {
                                if(this.price != '') {
                                    if(this.personal_images.length != 0) {
                                        this.personal_images_error = ''
                                        this.price_error = ''
                                        this.description_error = ''
                                        this.state_error = ''
                                        this.name_error = ''

                                        var form_personal = new FormData($("#form_personal")[0]);

                                        axios({
                                            method: 'post',
                                            url: '/add_items',
                                            responseType: 'json',
                                            data: form_personal,
                                        })
                                        .then(function (response) {
                                            window.location.href = '/cabinet'
                                        })
                                    } else {
                                        this.personal_images_error = 'Добавьте фото'
                                        this.price_error = ''
                                        this.description_error = ''
                                        this.state_error = ''
                                        this.name_error = ''
                                    }
                                } else {
                                    this.price_error = 'Это поле обязательно'
                                    this.description_error = ''
                                    this.state_error = ''
                                    this.name_error = ''
                                }
                            } else {
                                this.description_error = 'Это поле обязательно'
                                this.state_error = ''
                                this.name_error = ''
                            }
                        } else {
                            this.state_error = 'Это поле обязательно'
                            this.name_error = ''
                        }                  
                    } else {
                        this.name_error = 'Это поле обязательно'
                    }
                },
                add_images_personal() {
                    event.preventDefault();
                    if(document.getElementById('file_personal').files.length != 0) {
                        if(this.personal_images.length <= 2) {
                            this.personal_images_error = ''
                            this.file_personal_error = ''
                            var form_add_image_personal = new FormData($("#form_add_image_personal")[0]);

                            var prom = this.personal_images
                            axios({
                                method: 'post',
                                url: '/img_add_items',
                                responseType: 'json',
                                data: form_add_image_personal,
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(function (response) {
                                close_items_image.click()
                                prom.push({
                                    id: response.data['id'],
                                    image: response.data['image'],
                                })
                                file_personal.value = "";
                            })
                        } else {
                            this.file_personal_error = 'Добавлено максимальное количество изображений'
                        }
                    } else {
                        this.file_personal_error = 'Вы не выбрали изображение'
                    }
                },
                delete_images_personal(id) {
                    var prom = this.personal_images
                    var e_item = prom[id]

                    axios({
                        method: 'get',
                        url: `/img_delete_items/${e_item.id}`,
                        responseType: 'json',
                    })
                    .then(function (response) {
                        prom.splice(id, 1)
                    })
                }
            }
        }
        Vue.createApp(AddItems).mount('#additems')
    </script>
@endsection
