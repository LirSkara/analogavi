@extends('layout')
@section('title')
    Avito - Добавление недвижимости
@endsection
@section('content')
    
    <div class="container" id="addrealty">
        <div v-if="cs_newold == ''" style="width: 350px;" class="mx-auto shadow px-5 py-4 bg-light">
            <div v-if="what_i_sell == ''" class="d-flex flex-column">
                <h1 class="fs-3 pb-3">Недвижимость</h1>
                <button v-on:click="choose_realty('Квартиры')" class="btn btn-outline-primary w-100 mb-2">Квартиры</button>
                <button v-on:click="choose_realty('Комнаты')" class="btn btn-outline-primary w-100 mb-2">Комнаты</button>
                <button v-on:click="choose_realty('Дома, дачи, коттеджи')" class="btn btn-outline-primary w-100 mb-2">Дома, дачи, коттеджи</button>
                <button v-on:click="choose_realty('Земельные участки')" class="btn btn-outline-primary w-100 mb-2">Земельные участки</button>
                <button v-on:click="choose_realty('Гаражи и машиноместа')" class="btn btn-outline-primary w-100 mb-2">Гаражи и машиноместа</button>
                <button v-on:click="choose_realty('Коммерческая недвижимость')" class="btn btn-outline-primary w-100 mb-2">Коммерческая недвижимость</button>
            </div>
            <div v-if="what_i_sell != '' && sell_and_buy == ''" class="d-flex flex-column">
                <div class="d-flex mb-3">
                    <button v-on:click="del_realty()" class="btn border-0 py-0"><i class="bi bi-arrow-left"></i></button>
                    <h1 class="fs-3">@{{what_i_sell}}</h1>
                </div>
                <button v-on:click="choose_sellbuy('Продам')" class="btn btn-outline-primary w-100 mb-2">Продам</button>
                <button v-on:click="choose_sellbuy('Сдам')" class="btn btn-outline-primary w-100 mb-2">Сдам</button>
                <button v-on:click="choose_sellbuy('Куплю')" class="btn btn-outline-primary w-100 mb-2">Куплю</button>
                <button v-on:click="choose_sellbuy('Сниму')" class="btn btn-outline-primary w-100 mb-2">Сниму</button>
            </div>
            <div v-if="sell_and_buy != '' && cs_newold == ''" class="d-flex flex-column">
                <div class="d-flex mb-3">
                    <button v-on:click="del_sellbuy()" class="btn border-0 py-0"><i class="bi bi-arrow-left"></i></button>
                    <h1 class="fs-3">@{{sell_and_buy}}</h1>
                </div>
                <button v-for="item in new_old" v-on:click="choose_newold(item)" class="btn btn-outline-primary w-100 mb-2">@{{item}}</button>
            </div>
        </div>
        <div v-if="cs_newold != '' && res_one != true">
            <div class="d-flex">
                <h2>Категория</h2>
                <nav aria-label="breadcrumb d-flex" style="margin-left: 10%;">
                    <ol class="breadcrumb mt-1">
                        <li class="breadcrumb-item fs-4"><a href="#" class="text-decoration-none">@{{what_i_sell}}</a></li>
                        <li class="breadcrumb-item fs-4"><a href="#" class="text-decoration-none">@{{sell_and_buy}}</a></li>
                        <li class="breadcrumb-item active fs-4" aria-current="page">@{{cs_newold}}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex flex-column">
                <h2>Расположение</h2>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label">Адрес</label>
                    <div class="mt-0" style="margin-left: 18%;">
                        <input type="text" name="name" id="name" v-model="adres" class="form-control" aria-describedby="passwordHelpInline" placeholder="Улица и номер дома">
                        <div class="text-danger">@{{adres_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label">Номер квартиры</label>
                    <div class="mt-0" style="margin-left: 12%;">
                        <input type="text" name="name" id="name" v-model="number_flat" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{number_flat_error}}</div>
                    </div>
                </div>
                <h2>Контакты</h2>
                <div class="d-flex flex-column mb-2">
                    <div class="d-flex">
                        <label for="name" class="col-form-label">Размещает объявление</label>
                        <div class="d-flex flex-column" style="margin-left: 8.1%;">
                            <div class="mt-0 d-flex">
                                <input type="radio" class="btn-check" name="who_add" value="Собственник" v-model="who_add" id="who_add1" autocomplete="off">
                                <label class="btn btn-outline-secondary border-right-none" for="who_add1">Собственник</label>
                                <input type="radio" class="btn-check" name="who_add" value="Посредник" v-model="who_add" id="who_add2" autocomplete="off">
                                <label class="btn btn-outline-secondary border-left-none" for="who_add2">Посредник</label>
                            </div>
                            <div class="text-danger">@{{who_add_error}}</div>
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <span for="name" class="col-form-label pt-0">Номер телефона</span>
                    <div class="mt-0 d-flex" style="margin-left: 12%;">
                        <span class="fw-bold">{{auth()->user()->tel}}</span>
                    </div>
                </div>
                <div class="d-flex mb-5">
                    <label for="name" class="col-form-label">Онлайн-показ</label>
                    <div class="mt-0 d-flex" style="margin-left: 13.5%;">
                        <input type="radio" class="btn-check" name="online_display" v-model="online_display" id="online_display1" autocomplete="off">
                        <label class="btn btn-secondary border-right-none" for="online_display1">Проведу</label>
                        <input type="radio" class="btn-check" name="online_display" v-model="online_display" id="online_display2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="online_display2">Не хочу</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" style="width: 700px;" v-on:click="resume_one()">Продолжить</button>
        </div>
        <div v-if="res_one == true && res_two != true">
            <div class="d-flex">
                <button class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i>Назад</button>
                <span class="ms-4 fs-5">Категория, расположение, контакты</span>
            </div>
            <div class="d-flex flex-column mt-3">
                <h2>О квартире</h2>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Тип жилья</label>
                    <div class="d-flex flex-column" style="margin-left: 13.5%;">
                        <div class="mt-0 d-flex">
                            <input type="radio" class="btn-check" name="type_residential" v-model="type_residential" id="type_residential1" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="type_residential1">Квартира</label>
                            <input type="radio" class="btn-check" name="type_residential" v-model="type_residential" id="type_residential2" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="type_residential2">Апартаменты</label>
                        </div>
                        <div class="text-danger">@{{type_residential_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Этаж</label>
                    <div class="d-flex flex-column mb-3" style="margin-left: 17.3%;">
                        <div class="mt-0 d-flex">
                            <select name="floor" v-model="floor" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{floor_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Количество комнат</label>
                    <div class="d-flex flex-column mb-3" style="margin-left: 7.1%;">
                        <div class="mt-0 d-flex">
                            <select name="count_rooms" v-model="count_rooms" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Студия">Студия</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10 комнат и больше">10 комнат и больше</option>
                                <option value="Свободная планировка">Своб. планировка</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{count_rooms_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Площадь</label>
                    <div class="mt-0" style="margin-left: 14.3%;">
                        <input type="text" v-model="square" class="form-control" name="square" placeholder="0,0 м²">
                        <div class="text-danger">@{{square_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Жилая площадь</label>
                    <div class="mt-0 d-flex" style="margin-left: 9.5%;">
                        <input type="text" v-model="residential_square" class="form-control" name="residential_square" placeholder="0,0 м²">
                    </div>
                </div>
                <h2>О доме</h2>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Тип дома</label>
                    <div class="d-flex flex-column mb-3" style="margin-left: 14.2%;">
                        <div class="mt-0 d-flex">
                            <select name="type_home" v-model="type_home" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="1">Кирпичный</option>
                                <option value="2">Панельный</option>
                                <option value="3">Блочный</option>
                                <option value="4">Монолитный</option>
                                <option value="5">Монолитно-кирпичный</option>
                                <option value="6">Деревянный</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{type_home_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Этажей в доме</label>
                    <div class="d-flex flex-column mb-3" style="margin-left: 10.2%;">
                        <div class="mt-0 d-flex">
                            <select name="floor_home" v-model="floor_home" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{floor_home_error}}</div>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label fs-5">Лифт</label>
                    <div class="mt-0 d-flex" style="margin-left: 17.1%;">
                        <input type="radio" class="btn-check" name="elevator" v-model="elevator" id="elevator1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="elevator1">Есть</label>
                        <input type="radio" class="btn-check" name="elevator" v-model="elevator" id="elevator2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="elevator2">Нет</label>
                    </div>
                </div>
                <div class="d-flex mb-3 mt-1">
                    <label for="name" class="col-form-label fs-5">Двор</label>
                    <div class="mt-0 d-flex flex-column" style="margin-left: 17.1%;">
                        <div>
                            <input class="form-check-input me-2 mb-2" type="checkbox" v-model="closed_territory" id="closed_territory" value="Закрытая территория" aria-label="...">
                            <span>Закрытая территория</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-2" type="checkbox" v-model="children_playground" id="children_playground" value="Детская площадка" aria-label="...">
                            <span>Детская площадка</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2" type="checkbox" v-model="sports_ground" id="sports_ground" value="Спортивная площадка" aria-label="...">
                            <span>Спортивная площадка</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-5">
                    <label for="name" class="col-form-label fs-5">Парковка</label>
                    <div class="mt-0 d-flex" style="margin-left: 14%;">
                        <input type="radio" class="btn-check" name="parking" v-model="parking" id="parking1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="parking1">Есть</label>
                        <input type="radio" class="btn-check" name="parking" v-model="parking" id="parking2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="parking2">Нет</label>
                    </div>
                </div>              
            </div>
            <button class="btn btn-primary" style="width: 700px;" v-on:click="resume_two()">Продолжить</button>
        </div>
        <div v-if="res_two == true">
            <div class="d-flex">
                <button class="btn btn-outline-dark"><i class="bi bi-chevron-left"></i>Назад</button>
                <span class="ms-4 fs-5">О квартире, о доме</span>
            </div>
            <div class="d-flex flex-column mt-3 mb-5">
                <h2>Фотографии</h2>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Фотографии <span class="text-muted small">(Максимум
                                3)</span></label>
                    </div>
                    <div class="col-auto mt-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addimage"><span>+</span> Добавить фото</button>
                        <div class="text-danger">@{{cars_images_error}}</div>
                        <div class="mt-3">
                            <span v-for="(item, id) in cars_images" key="id" style="width:100px;display:inline-block;">
                                <img width="100"
                                    :src="'/storage/cars_image/{{auth()->user()->id}}/' + item.image"
                                    alt="">
                                <span class="bg-danger pt-2 text-white px-1" style="position: relative;bottom:28px;cursor:pointer;" v-on:click="delete_images_cars(id)"><i class="material-icons">delete</i></span>
                            </span>
                        </div>
                    </div>
                </div>
                <h2>Описание</h2>
                <textarea type="text" class="form-control mb-4" style="height: 250px; width: 700px" placeholder="Расскажите, что есть в квартире и рядом с домом, в каком состоянии жильё. Покупателям интересно, сколько идти до магазинов и остановок транспорта, есть ли рядом торговые центры, парки и другая инфраструктура."></textarea>
                <h2>Условия сделки</h2>
                <div class="d-flex mt-2 mb-5">
                    <label for="name" class="col-form-label fs-5">Способ продажи</label>
                    <div class="d-flex flex-column">
                        <div class="mt-0 d-flex" style="margin-left: 14%;">
                            <input type="radio" class="btn-check" name="parking" v-model="parking" id="parking1" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="parking1">Свободная</label>
                            <input type="radio" class="btn-check" name="parking" v-model="parking" id="parking2" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="parking2">Альтернативная</label>
                        </div>
                        <div class="d-flex flex-column mt-2" style="margin-left: 14%;">
                            <div>   
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="closed_territory" id="closed_territory" value="Закрытая территория" aria-label="...">
                                <span>Можно в ипотеку</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="children_playground" id="children_playground" value="Детская площадка" aria-label="...">
                                <span>Продажа доли</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2" type="checkbox" v-model="sports_ground" id="sports_ground" value="Спортивная площадка" aria-label="...">
                                <span>Аукцион</span>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="d-flex mb-2">
                    <label for="name" class="col-form-label">Цена</label>
                    <div class="mt-0" style="margin-left: 12%;">
                        <input type="text" name="name" id="name" v-model="number_flat" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{number_flat_error}}</div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" style="width: 700px;" v-on:click="resume_two()">Продолжить</button>
        </div>

        <!-- Начало модального окна добавления фото -->
        <div class="modal fade" id="addimage" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выберите изображение</h5>
                        <button type="button" id="close_cars_image" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="form_add_image_cars">
                    @csrf
                        <div class="modal-body">
                            <input type="file" name="image" id="file_cars" class="w-100">
                            <div class="text-danger">@{{file_cars_error}}</div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" v-on:click="add_images_cars()">Загрузить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Конец модального окна добавления фото -->
    </div>

    <script>
        const AddRealty = {
            data() {
                return {
                    what_i_sell: '',
                    sell_and_buy: '',
                    new_old: [],
                    cs_newold: '',
                    adres: '',
                    number_flat: '',
                    who_add: '',
                    online_display: 'Проведу',
                    type_residential: '',
                    floor: '',
                    count_rooms: '',
                    square: '',
                    residential_square: '',
                    type_home: '',
                    floor_home: '',
                    elevator: '',
                    closed_territory: '',
                    children_playground: '',
                    sports_ground: '',
                    parking: '',
                    adres_error: '',
                    who_add_error: '',
                    number_flat_error: '',
                    type_residential_error: '',
                    floor_error: '',
                    count_rooms_error: '',
                    square_error: '',
                    type_home_error: '',
                    floor_home_error: '',
                    res_one: false,
                    res_two: false,
                }
            },
            methods: {
                choose_realty(realty) {
                    this.what_i_sell = realty
                },
                choose_sellbuy(sellbuy) {
                    this.sell_and_buy = sellbuy

                    if(this.what_i_sell == 'Квартиры') {
                        if(this.sell_and_buy == 'Продам') {
                            this.new_old.push(
                                'Вторичка'
                            )
                            this.new_old.push(
                                'Новостройка'
                            )
                        } else 
                        if(this.sell_and_buy == 'Сдам') {
                            this.new_old.push(
                                'На длительный срок'
                            )
                            this.new_old.push(
                                'Посуточно'
                            )
                        } else
                        if(this.sell_and_buy == 'Куплю') {
                            alert('Идем дальше')
                        } else
                        if(this.sell_and_buy == 'Сниму') {
                            this.new_old.push(
                                'На длительный срок'
                            )
                            this.new_old.push(
                                'Посуточно'
                            )
                        }
                    } else 
                    if(this.what_i_sell == 'Комнаты') {
                        if(this.sell_and_buy == 'Продам') {
                            alert('Идем дальше')
                        } else 
                        if(this.sell_and_buy == 'Сдам') {
                            this.new_old.push(
                                'На длительный срок'
                            )
                            this.new_old.push(
                                'Посуточно'
                            )
                        } else
                        if(this.sell_and_buy == 'Куплю') {
                            alert('Идем дальше')
                        } else
                        if(this.sell_and_buy == 'Сниму') {
                            this.new_old.push(
                                'На длительный срок'
                            )
                            this.new_old.push(
                                'Посуточно'
                            )
                        }
                    } else 
                    if(this.what_i_sell == 'Дома, дачи, коттеджи') {
                        if(this.sell_and_buy == 'Продам') {
                            alert('Идем дальше')
                        } else 
                        if(this.sell_and_buy == 'Сдам') {
                            this.new_old.push(
                                'На длительный срок'
                            )
                            this.new_old.push(
                                'Посуточно'
                            )
                        } else
                        if(this.sell_and_buy == 'Куплю') {
                            alert('Идем дальше')
                        } else
                        if(this.sell_and_buy == 'Сниму') {
                            this.new_old.push(
                                'На длительный срок'
                            )
                            this.new_old.push(
                                'Посуточно'
                            )
                        }
                    } else 
                    if(this.what_i_sell == 'Земельные участки') {
                        this.new_old.push(
                            'Поселений (ИЖС)'
                        )
                        this.new_old.push(
                            'Сельхозназначения (СНТ, ДНП)'
                        )
                        this.new_old.push(
                            'Промназначения'
                        )
                    } else 
                    if(this.what_i_sell == 'Гаражи и машиноместа') {
                        this.new_old.push(
                            'Гараж'
                        )
                        this.new_old.push(
                            'Машиноместо'
                        )
                    } else 
                    if(this.what_i_sell == 'Коммерческая недвижимость') {
                        this.new_old.push(
                            'Офисное помещение'
                        )
                        this.new_old.push(
                            'Помещение свободного назначения'
                        )
                        this.new_old.push(
                            'Торговое помещение'
                        )
                        this.new_old.push(
                            'Складское помещение'
                        )
                        this.new_old.push(
                            'Производственное ппомещение'
                        )
                        this.new_old.push(
                            'Помещение общественного питания'
                        )
                        this.new_old.push(
                            'Гостиница'
                        )
                        this.new_old.push(
                            'Автосервис'
                        )
                        this.new_old.push(
                            'Здание'
                        )
                    }else 
                    if(this.what_i_sell == 'Гаражи и машиноместа') {
                        this.new_old.push(
                            'Гараж'
                        )
                        this.new_old.push(
                            'Машиноместо'
                        )
                    }
                },
                del_realty() {
                    this.what_i_sell = ''
                },
                del_sellbuy() {
                    this.sell_and_buy = ''
                    this.new_old = []
                },
                choose_newold(newold) {
                    this.cs_newold = newold
                },
                resume_one() {
                    if(this.adres != '') {
                        if(this.number_flat != '') {
                            if(this.who_add != '') {
                                this.number_flat_error = ''
                                this.who_add_error = ''
                                this.adres_error = ''

                                this.res_one = true
                            } else {
                                this.who_add_error = 'Выберите один из вариантов'
                                this.number_flat_error = ''
                                this.adres_error = ''
                            }
                        } else {
                            this.number_flat_error = 'Введите номер квартиры'
                            this.adres_error = ''
                        }
                    } else {
                        this.adres_error = 'Укажите адрес'
                    }
                },
                resume_two() {
                    if(this.type_residential != '') {
                        if(this.floor != '') {
                            if(this.count_rooms != '') {
                                if(this.square != '') {
                                    if(this.type_home != '') {
                                        if(this.floor_home != '') {
                                            this.floor_home_error = ''
                                            this.type_home_error = ''
                                            this.square_error = ''
                                            this.count_rooms_error = ''
                                            this.floor_error = ''
                                            this.type_residential_error = ''

                                            this.res_two = true
                                        } else {
                                            this.floor_home_error = 'Укажите этаж'
                                            this.type_home_error = ''
                                            this.square_error = ''
                                            this.count_rooms_error = ''
                                            this.floor_error = ''
                                            this.type_residential_error = ''
                                        }
                                    } else {
                                        this.type_home_error = 'Выберите тип дома'
                                        this.square_error = ''
                                        this.count_rooms_error = ''
                                        this.floor_error = ''
                                        this.type_residential_error = ''
                                    }
                                } else {
                                    this.square_error = 'Укажите общую площадь'
                                    this.count_rooms_error = ''
                                    this.floor_error = ''
                                    this.type_residential_error = ''
                                }
                            } else {
                                this.count_rooms_error = 'Укажите количество комнат'
                                this.floor_error = ''
                                this.type_residential_error = ''
                            }
                        } else {
                            this.floor_error = 'Укажите этаж'
                            this.type_residential_error = ''
                        }
                    } else {
                        this.type_residential_error = 'Укажите тип жилья'
                    }
                }
            }
        }
        Vue.createApp(AddRealty).mount('#addrealty')
    </script>
@endsection
