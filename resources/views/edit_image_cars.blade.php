@extends('layout')
@section('title')
    Khalif - Личный кабинет
@endsection
@section('content')
    <div class="container py-lg-5" id="edit_image_cars">
        <div class="d-flex">
            <h3>Фото объявления</h3>
            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addimage"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="d-flex flex-wrap gap-2 mt-3">
            <div v-for="(item, id) in images" :key="item" class="cards shadow-sm bg-white border rounded-3 mt-2">
                <img class="img-fluid rounded-top img-cover w-100" :src="'/storage/cars_image/{{$item->user}}/' + item" alt="...">
                <div class="d-flex">
                    <a class="btn btn-warning border-right-none border-top-left-none w-50" data-bs-toggle="modal" :data-bs-target="'#editimage' + id">Редактировать</a>
                    <a class="btn btn-danger border-left-none border-top-right-none w-50" data-bs-toggle="modal" :data-bs-target="'#deleteimage' + id">Удалить</a>
                </div>

                <!-- Modal delete image -->
                <div class="modal fade" :id="'deleteimage' + id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Удаление изображения</h5>
                                <button type="button" class="btn-close" :id="'close_delete_image' + id" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Вы действительно хотите удалить это изображение? Отменить это действие будет невозможно</p>
                                <div class="d-flex">
                                    <button class="btn btn-primary ms-auto" data-bs-dismiss="modal" aria-label="Close">Нет</button>
                                    <button class="btn btn-danger ms-2" v-on:click="delete_images(id)">Да</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit image -->
                <div class="modal fade" :id="'editimage' + id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Редактирование изображения</h5>
                                <button type="button" class="btn-close" :id="'close_edit_image' + id" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form :id="'form_edit_image' + id">
                                @csrf
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Выберите изоображение</label>
                                        <input class="form-control" type="file" name="image" :id="'edit_file' + id">
                                        <div class="text-danger">@{{edit_file_error}}</div>
                                    </div>
                                    <button class="btn btn-primary w-100" v-on:click="edit_images(id)">Загрузить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal add image -->
        <div class="modal fade" id="addimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление изоображения</h5>
                        <button type="button" class="btn-close" id="close_add_image" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form_add_image">
                        @csrf
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Выберите изоображение</label>
                                <input class="form-control" type="file" name="image" id="add_file">
                            </div>
                            <button class="btn btn-primary w-100" v-on:click="add_images()">Загрузить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        const EditImageCars = {
            data() {
                return {
                    images_string: '{{$item->images}}',
                    images: [],
                    add_file_error: '',
                    edit_file_error: '',
                }
            },
            beforeMount(){
                this.all();
            },
            methods: {
                all() {
                    if(this.images_string != '') {
                        this.images = this.images_string.split(',');
                    }
                },
                add_images() {
                    event.preventDefault();
                    if(document.getElementById('add_file').files.length != 0) {
                        if(this.images.length <= 2) {
                            this.add_file_error = ''
                            var form_add_image = new FormData($("#form_add_image")[0]);

                            axios({
                                method: 'post',
                                url: '/add_image_car/{{$item->id}}',
                                responseType: 'json',
                                data: form_add_image,
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(function (response) {
                                close_add_image.click()
                                
                                this.images.push(response.data)
                            }.bind(this))
                        } else {
                            this.add_file_error = 'Добавлено максимальное количество изображений'
                        }
                    } else {
                        this.add_file_error = 'Вы не выбрали изображение'
                    }
                },
                delete_images(id) {
                    axios({
                        method: 'post',
                        url: `/delete_image_car/{{$item->id}}/${id}`,
                        responseType: 'json',
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function (response) {
                        document.getElementById(`close_delete_image${id}`).click()
                        
                        this.images.splice(id, 1);
                    }.bind(this))
                },
                edit_images(id) {
                    event.preventDefault();
                    if(document.getElementById(`edit_file${id}`).files.length != 0) {
                        this.edit_file_error = ''
                        var form_edit_image = new FormData($(`#form_edit_image${id}`)[0]);

                        axios({
                            method: 'post',
                            url: `/edit_image_car/{{$item->id}}/${id}`,
                            responseType: 'json',
                            data: form_edit_image,
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(function (response) {
                            document.getElementById(`close_edit_image${id}`).click()
                            
                            this.images[id] = response.data
                        }.bind(this))
                    } else {
                        this.edit_file_error = 'Вы не выбрали изображение'
                    }
                },
            } 
        }
        Vue.createApp(EditImageCars).mount('#edit_image_cars')
    </script>
@endsection