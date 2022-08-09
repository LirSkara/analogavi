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
            <div class="d-flex-tel">
                <h2 class="width-blocks">Категория</h2>
                <nav aria-label="breadcrumb d-flex">
                    <ol class="breadcrumb mt-1">
                        <li class="breadcrumb-item fs-4"><a href="#" v-on:click="back_category()" class="text-decoration-none">@{{what_i_sell}}</a></li>
                        <li class="breadcrumb-item active fs-4" aria-current="page">@{{sell_and_buy}}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex flex-column">
                <h2>Расположение</h2>
                <div class="d-flex-tel mb-2">
                    <label v-if="sell_and_buy == 'Продам' || sell_and_buy == 'Сдам'" for="name" class="col-form-label width-blocks">Адрес</label>
                    <label v-if="sell_and_buy == 'Куплю' || sell_and_buy == 'Сниму'" for="name" class="col-form-label width-blocks">Желаемый район</label>
                    <div v-if="sell_and_buy == 'Продам' || sell_and_buy == 'Сдам'" class="mt-0">
                        <input type="text" name="name" id="name" v-model="adres" class="form-control" aria-describedby="passwordHelpInline" placeholder="Улица и номер дома">
                        <div class="text-danger">@{{adres_error}}</div>
                    </div>
                    <div v-if="sell_and_buy == 'Куплю' || sell_and_buy == 'Сниму'" class="mt-0">
                        <input type="text" name="name" id="name" v-model="adres" class="form-control" aria-describedby="passwordHelpInline" placeholder="Улица и номер дома">
                        <div class="text-danger">@{{adres_error}}</div>
                    </div>
                </div>
                <div v-if="what_i_sell == 'Квартиры' && sell_and_buy == 'Продам' || what_i_sell == 'Комнаты' && sell_and_buy == 'Сдам' || what_i_sell == 'Комнаты' && sell_and_buy == 'Продам' || what_i_sell == 'Квартиры' && sell_and_buy == 'Сдам'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Номер квартиры</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="name" v-model="number_flat" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{number_flat_error}}</div>
                    </div>
                </div>
                <h2>Контакты</h2>
                <div v-if="sell_and_buy == 'Продам' || sell_and_buy == 'Сдам'" class="d-flex flex-column mb-2">
                    <div class="d-flex-tel">
                        <label for="name" class="col-form-label width-blocks">Размещает объявление</label>
                        <div class="d-flex flex-column">
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
                <div class="d-flex-tel mb-2">
                    <span for="name" class="col-form-label pt-0 width-blocks">Номер телефона</span>
                    <div class="mt-0 d-flex">
                        <span class="fw-bold">{{auth()->user()->tel}}</span>
                    </div>
                </div>
                <div v-if="sell_and_buy == 'Продам' && what_i_sell != 'Земельные участки' && what_i_sell != 'Гаражи и машиноместа' || what_i_sell != 'Земельные участки' && sell_and_buy == 'Сдам' && what_i_sell != 'Гаражи и машиноместа'" class="d-flex-tel mb-5">
                    <label for="name" class="col-form-label width-blocks">Онлайн-показ</label>
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="online_display" value="Проведу" v-model="online_display" id="online_display1" checked autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="online_display1">Проведу</label>
                        <input type="radio" class="btn-check" name="online_display" value="Не хочу" v-model="online_display" id="online_display2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="online_display2">Не хочу</label>
                    </div>
                </div>
            </div>
            <button v-if="what_i_sell == 'Квартиры' && sell_and_buy == 'Продам' || what_i_sell == 'Квартиры' && sell_and_buy == 'Сдам' || what_i_sell == 'Комнаты' && sell_and_buy == 'Продам' || what_i_sell == 'Комнаты' && sell_and_buy == 'Сдам'" class="btn btn-primary w-700" v-on:click="resume_one()">Продолжить</button>
            <button v-if="sell_and_buy == 'Куплю' && what_i_sell != 'Земельные участки' && what_i_sell != 'Гаражи и машиноместа' || sell_and_buy == 'Сниму' && what_i_sell != 'Земельные участки' && what_i_sell != 'Гаражи и машиноместа'" class="btn btn-primary w-700" v-on:click="resume_one_buy()">Продолжить</button>
            <button v-if="what_i_sell == 'Дома, дачи, коттеджи' && sell_and_buy == 'Продам' || what_i_sell == 'Дома, дачи, коттеджи' && sell_and_buy == 'Сдам' || what_i_sell == 'Земельные участки' && sell_and_buy == 'Продам' || what_i_sell == 'Земельные участки' && sell_and_buy == 'Сдам' || what_i_sell == 'Земельные участки' && sell_and_buy == 'Куплю' || what_i_sell == 'Земельные участки' && sell_and_buy == 'Сниму' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Продам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Сдам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Куплю' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Сниму'" class="btn btn-primary w-700" v-on:click="resume_one_home()">Продолжить</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Квартиры' && sell_and_buy == 'Продам' || res_one == true && res_two != true && what_i_sell == 'Комнаты' && sell_and_buy == 'Продам'">
            <div class="d-flex flex-column mt-3">
                <h2>О квартире</h2>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Тип жилья</label>
                    <div class="d-flex flex-column">
                        <div class="mt-0 d-flex">
                            <input type="radio" class="btn-check" name="type_residential" value="Квартира" v-model="type_residential" id="type_residential1" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="type_residential1">Квартира</label>
                            <input type="radio" class="btn-check" name="type_residential" value="Апартаменты" v-model="type_residential" id="type_residential2" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="type_residential2">Апартаменты</label>
                        </div>
                        <div class="text-danger">@{{type_residential_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Этаж</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="floor" class="form-select form-select-lg" aria-label=".form-select-lg example">
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
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Количество комнат</label>
                    <div class="d-flex flex-column mb-3">
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
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Площадь</label>
                    <div class="mt-0">
                        <input type="text" v-model="square" class="form-control" name="square" placeholder="0,0 м²">
                        <div class="text-danger">@{{square_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Жилая площадь</label>
                    <div class="mt-0 d-flex">
                        <input type="text" v-model="residential_square" class="form-control" name="residential_square" placeholder="0,0 м²">
                    </div>
                </div>
                <h2>О доме</h2>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Тип дома</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select name="type_home" v-model="type_home" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Кирпичный">Кирпичный</option>
                                <option value="Панельный">Панельный</option>
                                <option value="Блочный">Блочный</option>
                                <option value="Монолитный">Монолитный</option>
                                <option value="Монолитно-кирпичный">Монолитно-кирпичный</option>
                                <option value="Деревянный">Деревянный</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{type_home_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Этажей в доме</label>
                    <div class="d-flex flex-column mb-3">
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
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Лифт</label>
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="elevator" value="true" v-model="elevator" id="elevator1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="elevator1">Есть</label>
                        <input type="radio" class="btn-check" name="elevator" value="false" v-model="elevator" id="elevator2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="elevator2">Нет</label>
                    </div>
                </div>
                <div class="d-flex-tel mb-3 mt-1">
                    <label for="name" class="col-form-label fs-5 width-blocks">Двор</label>
                    <div class="mt-0 d-flex flex-column">
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
                <div class="d-flex-tel mb-5">
                    <label for="name" class="col-form-label fs-5 width-blocks">Парковка</label>
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="parking" value="true" v-model="parking" id="parking1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="parking1">Есть</label>
                        <input type="radio" class="btn-check" name="parking" value="false" v-model="parking" id="parking2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="parking2">Нет</label>
                    </div>
                </div>              
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_two()">Продолжить</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Дома, дачи, коттеджи'">
            <h2>О доме</h2>
            <div v-if="sell_and_buy == 'Сдам'" class="d-flex-tel mb-2">
                <label for="name" class="col-form-label width-blocks">Тип времени</label>
                <div class="d-flex flex-column">
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="type_time" value="Длительный срок" v-model="type_time" id="type_time1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="type_time1">Длительный срок</label>
                        <input type="radio" class="btn-check" name="type_time" value="Сутки" v-model="type_time" id="type_time2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="type_time2">Сутки</label>
                    </div>
                    <div class="text-danger">@{{type_time_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-3">
                <label for="name" class="col-form-label width-blocks">Вид объекта</label>
                <div class="d-flex-tel flex-column">
                    <div class="mt-0 mb-3 d-flex">
                        <input type="radio" class="btn-check" name="parking" value="Дом" v-model="object_type" id="object_type1" checked autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="object_type1">Дом</label>
                        <input type="radio" class="btn-check" name="parking" value="Дача" v-model="object_type" id="object_type2" autocomplete="off">
                        <label class="btn btn-outline-secondary rounded-0" for="object_type2">Дача</label>
                        <input type="radio" class="btn-check" name="parking" value="Коттедж" v-model="object_type" id="object_type3" autocomplete="off">
                        <label class="btn btn-outline-secondary rounded-0" for="object_type3">Коттедж</label>
                        <input type="radio" class="btn-check" name="parking" value="Таунхаус" v-model="object_type" id="object_type4" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="object_type4">Таунхаус</label>
                    </div>
                    <div v-if="sell_and_buy != 'Куплю'" class="d-flex flex-column">
                        <div>   
                            <input class="form-check-input me-2 mb-2" type="checkbox" v-model="bath_or_sauna" id="bath_or_sauna" value="Баня или сауна" aria-label="...">
                            <span>Баня или сауна</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-2" type="checkbox" v-model="swimming_pool" id="swimming_pool" value="Бассейн" aria-label="...">
                            <span>Бассейн</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="sell_and_buy != 'Куплю'" class="d-flex flex-column">
                <div v-if="sell_and_buy != 'Сниму'" class="d-flex flex-column">
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Статус участка</label>
                        <div class="d-flex flex-column mb-3">
                            <div class="mt-0 d-flex">
                                <select v-model="plot_status" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
                                    <option value="Индивидуальное жилищное строительство (ИЖС)">Индивидуальное жилищное строительство (ИЖС)</option>
                                    <option value="Садовое некоммерческое товарищество (СНТ)">Садовое некоммерческое товарищество (СНТ)</option>
                                    <option value="Дачное некоммерческое партнёрство (ДНП)">Дачное некоммерческое партнёрство (ДНП)</option>
                                    <option value="Фермерское хозяйство">Фермерское хозяйство</option>
                                </select>
                            </div>
                            <div class="text-danger">@{{plot_status_error}}</div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Год постройки</label>
                        <div class="mt-0">
                            <input type="text"   id="year_construction" v-model="year_construction" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Материал стен</label>
                        <div class="d-flex flex-column mb-3">
                            <select v-model="wall_material" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Кирпич">Кирпич</option>
                                <option value="Брус">Брус</option>
                                <option value="Бревно">Бревно</option>
                                <option value="Газоблоки">Газоблоки</option>
                                <option value="Металл">Металл</option>
                                <option value="Пеноблоки">Пеноблоки</option>
                                <option value="Сэндвич-панели">Сэндвич-панели</option>
                                <option value="Ж/б панели">Ж/б панели</option>
                                <option value="Экспериментальные материалы">Экспериментальные материалы</option>
                            </select>
                            <div class="text-danger">@{{wall_material_error}}</div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Этажей в доме</label>
                        <div class="d-flex flex-column mb-3">
                            <div class="mt-0 d-flex">
                                <select v-model="floor_home" class="form-select form-select-lg" aria-label=".form-select-lg example">
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
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Количество комнат</label>
                        <div class="d-flex flex-column mb-3">
                            <div class="mt-0 d-flex">
                                <select v-model="count_rooms" class="form-select form-select-lg" aria-label=".form-select-lg example">
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
                            <div class="mt-3">   
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="terrace_veranda" id="terrace_veranda" value="Можно в ипотеку" aria-label="...">
                                <span>Терраса или веранда</span>
                            </div>        
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Площадь дома</label>
                        <div class="mt-0">
                            <input type="text" v-model="square" class="form-control" name="text" placeholder="0,0 м²">
                            <div class="text-danger">@{{square_error}}</div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Площадь участка</label>
                        <div class="mt-0">
                            <input type="text" v-model="square_region" class="form-control" name="text" placeholder="0 сот">
                            <div class="text-danger">@{{square_region_error}}</div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Санузел</label>
                        <div class="d-flex flex-column">
                            <div class="mt-3">   
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="bathroom_home" id="bathroom_home" value="В доме" aria-label="...">
                                <span>В доме</span>
                            </div> 
                            <div class="mt-3">   
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="bathroom_street" id="bathroom_street" value="На улице" aria-label="...">
                                <span>На улице</span>
                            </div> 
                        </div>
                    </div>
                </div>
                <div v-if="sell_and_buy == 'Сдам' || sell_and_buy == 'Сниму'" class="d-flex-tel">
                    <label for="name" class="col-form-label width-blocks">Техника</label>
                    <div class="mt-0 d-flex" style="width: 600px;">
                        <div class="d-flex flex-column mt-2">
                            <div>   
                                <input class="form-check-input me-2 mb-3" type="checkbox" v-model="conditioner" id="conditioner" value="Кондиционер" aria-label="...">
                                <span>Кондиционер</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-3" type="checkbox" v-model="fridge" id="fridge" value="Холодильник" aria-label="...">
                                <span>Холодильник</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-3 mb-3" type="checkbox" v-model="stove" id="stove" value="Плита" aria-label="...">
                                <span>Плита</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2" type="checkbox" v-model="nuke" id="nuke" value="Микроволновка" aria-label="...">
                                <span>Микроволновка</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column mt-2" style="margin-left: 14%;">
                            <div>   
                                <input class="form-check-input me-2 mb-3" type="checkbox" v-model="washing_machine" id="washing_machine" value="Стиральная машина" aria-label="...">
                                <span>Стиральная машина</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-3" type="checkbox" v-model="dishwasher" id="dishwasher" value="Посудомоечная машина" aria-label="...">
                                <span>Посудомоечная машина</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-3" type="checkbox" v-model="water_heater" id="water_heater" value="Водонагреватель" aria-label="...">
                                <span>Водонагреватель</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-3" type="checkbox" v-model="TV" id="TV" value="Телевизор" aria-label="...">
                                <span>Телевизор</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="sell_and_buy == 'Сдам' || sell_and_buy == 'Сниму'" class="d-flex flex-column">
                    <h2>Правила</h2>
                    <div v-if="sell_and_buy == 'Сдам'" class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Максимум гостей</label>
                        <div class="d-flex flex-column mb-3">
                            <div class="mt-0 d-flex">
                                <select name="max_guest" v-model="max_guest" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8 и более">8 и более</option>
                                </select>
                            </div>
                            <div class="text-danger">@{{max_guest_error}}</div>
                        </div>
                    </div>
                    <div v-if="sell_and_buy == 'Сниму'" class="d-flex flex-column mb-3">
                        <div class="d-flex-tel mb-2">
                            <label for="name" class="col-form-label width-blocks">Количество кроватей</label>
                            <div class="d-flex flex-column mb-3">
                                <div class="mt-0 d-flex">
                                    <select v-model="count_bed" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                        <option value="" selected disabled></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8+">8+</option>
                                    </select>
                                </div>
                                <div class="text-danger">@{{count_bed_error}}</div>
                            </div>
                        </div>
                        <div class="d-flex-tel mb-2">
                            <label for="name" class="col-form-label width-blocks">Количество спальных мест</label>
                            <div class="d-flex flex-column mb-3">
                                <div class="mt-0 d-flex">
                                    <select v-model="count_sleeping_places" class="form-select form-select-lg" aria-label=".form-select-lg example">
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
                                        <option value="16+">16+</option>
                                    </select>
                                </div>
                                <div class="text-danger">@{{count_sleeping_places_error}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Можно с детьми</label>
                        <div class="d-flex flex-column">
                            <div class="mt-0 d-flex">
                                <input type="radio" class="btn-check" name="may_children" value="true" v-model="may_children" id="may_children1" autocomplete="off">
                                <label class="btn btn-outline-secondary border-right-none" for="may_children1">Да</label>
                                <input type="radio" class="btn-check" name="may_children" value="false" v-model="may_children" id="may_children2" autocomplete="off">
                                <label class="btn btn-outline-secondary border-left-none" for="may_children2">Нет</label>
                            </div>
                            <div class="text-danger">@{{may_children_error}}</div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label width-blocks">Можно с животными</label>
                        <div class="d-flex flex-column">
                            <div class="mt-0 d-flex">
                                <input type="radio" class="btn-check" name="may_animal" value="true" v-model="may_animal" id="may_animal1" autocomplete="off">
                                <label class="btn btn-outline-secondary border-right-none" for="may_animal1">Да</label>
                                <input type="radio" class="btn-check" name="may_animal" value="false" v-model="may_animal" id="may_animal2" autocomplete="off">
                                <label class="btn btn-outline-secondary border-left-none" for="may_animal2">Нет</label>
                            </div>
                            <div class="text-danger">@{{may_animal_error}}</div>
                        </div>
                    </div>
                    <div class="d-flex-tel mb-5">
                        <label for="name" class="col-form-label width-blocks">Разрешено курить</label>
                        <div class="mt-0 d-flex">
                            <input type="radio" class="btn-check" name="allowed_smoke" value="true" v-model="allowed_smoke" id="allowed_smoke1" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="allowed_smoke1">Да</label>
                            <input type="radio" class="btn-check" name="allowed_smoke" value="false" v-model="allowed_smoke" id="allowed_smoke2" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="allowed_smoke2">Нет</label>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_two_home()">Продолжить</button>
        </div>
        <div v-if="res_two == true && sell_and_buy == 'Сдам' || res_two == true && sell_and_buy == 'Продам'">
            <div class="d-flex flex-column mt-3 mb-5">
                <h2>Фотографии</h2>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Фотографии <span class="text-muted small">(Максимум
                                20)</span></label>
                    </div>
                    <div class="col-auto mt-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addimage"><span>+</span> Добавить фото</button>
                        <div class="text-danger">@{{realty_images_error}}</div>
                        <div class="mt-3">
                            <span v-for="(item, id) in realty_images" key="id" style="width:100px;display:inline-block;">
                                <img width="100"
                                    :src="'/storage/realty_image/{{auth()->user()->id}}/' + item.image"
                                    alt="">
                                <span class="bg-danger pt-2 text-white px-1" style="position: relative;bottom:28px;cursor:pointer;" v-on:click="delete_images_realty(id)"><i class="material-icons">delete</i></span>
                            </span>
                        </div>
                    </div>
                </div>
                <h2>Описание</h2>
                <div class="d-flex flex-column mb-4">
                    <textarea type="text" class="form-control width-textarea" v-model="description" placeholder="Расскажите, что есть в квартире и рядом с домом, в каком состоянии жильё. Покупателям интересно, сколько идти до магазинов и остановок транспорта, есть ли рядом торговые центры, парки и другая инфраструктура."></textarea>
                    <div class="text-danger">@{{description_error}}</div>
                </div>
                <h2>Условия сделки</h2>
                <div v-if="what_i_sell != 'Дома, дачи, коттеджи' && sell_and_buy != 'Продам' || what_i_sell != 'Земельные участки' || what_i_sell != 'Гаражи и машиноместа' || what_i_sell != 'Квартиры'" class="d-flex-tel mt-2 mb-5">
                    <label for="name" class="col-form-label fs-5 width-blocks">Способ продажи</label>
                    <div class="d-flex flex-column">
                        <div class="mt-0 d-flex">
                            <input type="radio" class="btn-check" name="method_sale" value="Свободная" v-model="method_sale" id="method_sale1" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="method_sale1">Свободная</label>
                            <input type="radio" class="btn-check" name="method_sale" value="Альтернативная" v-model="method_sale" id="method_sale2" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="method_sale2">Альтернативная</label>
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <div>   
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="mortgage" id="mortgage" value="Можно в ипотеку" aria-label="...">
                                <span>Можно в ипотеку</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2 mb-2" type="checkbox" v-model="sale_share" id="sale_share" value="Продажа доли" aria-label="...">
                                <span>Продажа доли</span>
                            </div>
                            <div>
                                <input class="form-check-input me-2" type="checkbox" v-model="auction" id="auction" value="Аукцион" aria-label="...">
                                <span>Аукцион</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Продам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Сдам'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Тип гаража</label>
                    <div class="mt-0">
                        <select v-model="garage_type" class="form-select form-select-lg" aria-label=".form-select-lg example">
                            <option value="" selected disabled></option>
                            <option value="Железобетонный">Железобетонный</option>
                            <option value="Кирпичный">Кирпичный</option>
                            <option value="Металлический">Металлический</option>
                        </select>
                    </div>
                </div>   
                <div v-if="what_i_sell == 'Земельные участки' && sell_and_buy == 'Продам' || what_i_sell == 'Земельные участки' && sell_and_buy == 'Сдам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Продам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Сдам'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Площадь</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="square" v-model="square" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{square_error}}</div>
                    </div>
                </div> 
                <div v-if="what_i_sell == 'Земельные участки' && sell_and_buy == 'Продам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Продам' || what_i_sell == 'Квартиры' && sell_and_buy == 'Продам' || what_i_sell == 'Дома, дачи, коттеджи' && sell_and_buy == 'Продам' || what_i_sell == 'Комнаты' && sell_and_buy == 'Продам'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Цена</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="price" v-model="price" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{price_error}}</div>
                    </div>
                </div>
                <div v-if="what_i_sell == 'Земельные участки' && sell_and_buy == 'Сдам' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Сдам' || what_i_sell == 'Квартиры' && sell_and_buy == 'Сдам' || what_i_sell == 'Дома, дачи, коттеджи' && sell_and_buy == 'Сдам' || what_i_sell == 'Комнаты' && sell_and_buy == 'Сдам'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Арендная плата</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="price" v-model="price" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{price_error}}</div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_three()">Опубликовать</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Квартиры' && sell_and_buy == 'Сдам'">
            <h2>О квартире</h2>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Тип времени</label>
                <div class="d-flex flex-column">
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="type_time" value="Длительный срок" v-model="type_time" id="type_time1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="type_time1">Длительный срок</label>
                        <input type="radio" class="btn-check" name="type_time" value="Сутки" v-model="type_time" id="type_time2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="type_time2">Сутки</label>
                    </div>
                    <div class="text-danger">@{{type_time_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Тип жилья</label>
                <div class="d-flex flex-column">
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="type_residential" value="Квартира" v-model="type_residential" id="type_residential1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="type_residential1">Квартира</label>
                        <input type="radio" class="btn-check" name="type_residential" value="Апартаменты" v-model="type_residential" id="type_residential2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="type_residential2">Апартаменты</label>
                    </div>
                    <div class="text-danger">@{{type_residential_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Этаж</label>
                <div class="d-flex flex-column mb-3">
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
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Количество комнат</label>
                <div class="d-flex flex-column mb-3">
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
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Площадь</label>
                <div class="mt-0">
                    <input type="text" v-model="square" class="form-control" name="square" placeholder="0,0 м²">
                    <div class="text-danger">@{{square_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Жилая площадь</label>
                <div class="mt-0 d-flex">
                    <input type="text" v-model="residential_square" class="form-control" name="residential_square" placeholder="0,0 м²">
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Техника</label>
                <div class="mt-0 d-flex">
                    <div class="d-flex flex-column mt-2">
                        <div>   
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="conditioner" id="conditioner" value="Кондиционер" aria-label="...">
                            <span>Кондиционер</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="fridge" id="fridge" value="Холодильник" aria-label="...">
                            <span>Холодильник</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3 mb-3" type="checkbox" v-model="stove" id="stove" value="Плита" aria-label="...">
                            <span>Плита</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2" type="checkbox" v-model="nuke" id="nuke" value="Микроволновка" aria-label="...">
                            <span>Микроволновка</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2" style="margin-left: 14%;">
                        <div>   
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="washing_machine" id="washing_machine" value="Стиральная машина" aria-label="...">
                            <span>Стиральная машина</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="dishwasher" id="dishwasher" value="Посудомоечная машина" aria-label="...">
                            <span>Посудомоечная машина</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="water_heater" id="water_heater" value="Водонагреватель" aria-label="...">
                            <span>Водонагреватель</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="TV" id="TV" value="Телевизор" aria-label="...">
                            <span>Телевизор</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Интернет и ТВ</label>
                <div class="mt-0 d-flex">
                    <div class="d-flex flex-column mt-2">
                        <div>   
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="wi_fi" id="wi_fi" value="Wi-Fi" aria-label="...">
                            <span>Wi-Fi</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="television" id="television" value="Телевидение" aria-label="...">
                            <span>Телевидиние</span>
                        </div>
                    </div>
                </div>
            </div>
            <h2>О доме</h2>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Тип дома</label>
                <div class="d-flex flex-column mb-3">
                    <div class="mt-0 d-flex">
                        <select name="type_home" v-model="type_home" class="form-select form-select-lg" aria-label=".form-select-lg example">
                            <option value="" selected disabled></option>
                            <option value="Кирпичный">Кирпичный</option>
                            <option value="Панельный">Панельный</option>
                            <option value="Блочный">Блочный</option>
                            <option value="Монолитный">Монолитный</option>
                            <option value="Монолитно-кирпичный">Монолитно-кирпичный</option>
                            <option value="Деревянный">Деревянный</option>
                        </select>
                    </div>
                    <div class="text-danger">@{{type_home_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Этажей в доме</label>
                <div class="d-flex flex-column mb-3">
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
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Лифт</label>
                <div class="mt-0 d-flex">
                    <input type="radio" class="btn-check" name="elevator" value="true" v-model="elevator" id="elevator1" autocomplete="off">
                    <label class="btn btn-outline-secondary border-right-none" for="elevator1">Есть</label>
                    <input type="radio" class="btn-check" name="elevator" value="false" v-model="elevator" id="elevator2" autocomplete="off">
                    <label class="btn btn-outline-secondary border-left-none" for="elevator2">Нет</label>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Парковка</label>
                <div class="mt-0 d-flex">
                    <input type="radio" class="btn-check" name="parking" value="true" v-model="parking" id="parking1" autocomplete="off">
                    <label class="btn btn-outline-secondary border-right-none" for="parking1">Есть</label>
                    <input type="radio" class="btn-check" name="parking" value="false" v-model="parking" id="parking2" autocomplete="off">
                    <label class="btn btn-outline-secondary border-left-none" for="parking2">Нет</label>
                </div>
            </div>
            <h2>Правила заселения</h2>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Максимум гостей</label>
                <div class="d-flex flex-column mb-3">
                    <div class="mt-0 d-flex">
                        <select name="max_guest" v-model="max_guest" class="form-select form-select-lg" aria-label=".form-select-lg example">
                            <option value="" selected disabled></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8 и более">8 и более</option>
                        </select>
                    </div>
                    <div class="text-danger">@{{max_guest_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Можно с детьми</label>
                <div class="d-flex flex-column">
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="may_children" value="true" v-model="may_children" id="may_children1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="may_children1">Да</label>
                        <input type="radio" class="btn-check" name="may_children" value="false" v-model="may_children" id="may_children2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="may_children2">Нет</label>
                    </div>
                    <div class="text-danger">@{{may_children_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-2">
                <label for="name" class="col-form-label fs-5 width-blocks">Можно с животными</label>
                <div class="d-flex flex-column">
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" name="may_animal" value="true" v-model="may_animal" id="may_animal1" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="may_animal1">Да</label>
                        <input type="radio" class="btn-check" name="may_animal" value="false" v-model="may_animal" id="may_animal2" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="may_animal2">Нет</label>
                    </div>
                    <div class="text-danger">@{{may_animal_error}}</div>
                </div>
            </div>
            <div class="d-flex-tel mb-5">
                <label for="name" class="col-form-label fs-5 width-blocks">Разрешено курить</label>
                <div class="mt-0 d-flex">
                    <input type="radio" class="btn-check" name="allowed_smoke" value="true" v-model="allowed_smoke" id="allowed_smoke1" autocomplete="off">
                    <label class="btn btn-outline-secondary border-right-none" for="allowed_smoke1">Да</label>
                    <input type="radio" class="btn-check" name="allowed_smoke" value="false" v-model="allowed_smoke" id="allowed_smoke2" autocomplete="off">
                    <label class="btn btn-outline-secondary border-left-none" for="allowed_smoke2">Нет</label>
                </div>
            </div>
            <button class="btn btn-primary w-700" v-on:click="apartment_rent_two()">Продолжить</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Квартиры' && sell_and_buy == 'Куплю'">
            <div class="d-flex flex-column mt-3">
                <h2>О квартире</h2>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Количество комнат</label>
                    <div class="d-flex flex-column mb-3">
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
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_two_buy()">Продолжить</button>
        </div>
        <div v-if="res_two == true && sell_and_buy == 'Куплю' || res_two == true && sell_and_buy == 'Сниму'">
            <div class="d-flex flex-column mt-3 mb-5">
                <h2>Описание</h2>
                <div class="d-flex flex-column mb-4">
                    <textarea type="text" class="form-control width-textarea" v-model="description" placeholder="Расскажите, что есть в квартире и рядом с домом, в каком состоянии жильё. Покупателям интересно, сколько идти до магазинов и остановок транспорта, есть ли рядом торговые центры, парки и другая инфраструктура."></textarea>
                    <div class="text-danger">@{{description_error}}</div>
                </div>
                <h2>Условия сделки</h2>     
                <div v-if="what_i_sell == 'Земельные участки' && sell_and_buy != 'Сниму' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Куплю' || what_i_sell == 'Квартиры' && sell_and_buy == 'Куплю' || what_i_sell == 'Дома, дачи, коттеджи' && sell_and_buy == 'Куплю'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Цена</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="price" v-model="price" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{price_error}}</div>
                    </div>
                </div>
                <div v-if="what_i_sell == 'Земельные участки' && sell_and_buy == 'Сниму' || what_i_sell == 'Гаражи и машиноместа' && sell_and_buy == 'Сниму' || what_i_sell == 'Квартиры' && sell_and_buy == 'Сниму' || what_i_sell == 'Дома, дачи, коттеджи' && sell_and_buy == 'Сниму' || what_i_sell == 'Комнаты' && sell_and_buy == 'Сниму'" class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Арендная плата</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="price" v-model="price" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{price_error}}</div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_three()">Опубликовать</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Квартиры' && sell_and_buy == 'Сниму' || res_one == true && res_two != true && what_i_sell == 'Комнаты' && sell_and_buy == 'Сниму'">
            <div class="d-flex flex-column mt-3">
                <div v-if="what_i_sell == 'Квартиры' && sell_and_buy == 'Сниму'" class="d-flex flex-column">
                    <h2>О квартире</h2>
                    <div class="d-flex-tel mb-2">
                        <label for="name" class="col-form-label fs-5 width-blocks">Количество комнат</label>
                        <div class="d-flex flex-column mb-3">
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
                </div>
                <h2>Дополнительные параметры</h2>
                <div class="d-flex-tel" style="width: 500px;">
                    <div class="d-flex flex-column w-50">
                        <span class="mb-2">Количество кроватей</span>
                        <select name="count_bed" v-model="count_bed" class="form-select form-select-lg" aria-label=".form-select-lg example">
                            <option value="" selected disabled></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8+">8+</option>
                        </select>
                        <span class="mb-2 mt-2">Количество спальных мест</span>
                        <select name="count_sleeping_places" v-model="count_sleeping_places" class="form-select form-select-lg" aria-label=".form-select-lg example">
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
                            <option value="16+">16+</option>
                        </select>
                        <span class="mb-2 mt-2">Мультимедиа</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="wi_fi" value="wi_fi" aria-label="...">
                            <span>Wi-Fi</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="TV" value="Телевизор" aria-label="...">
                            <span>Телевизор</span>
                        </div>
                        <span class="mb-2 mt-2">Бытовая техника</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="stove" value="Плита" aria-label="...">
                            <span>Плита</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="nuke" value="Микроволновка" aria-label="...">
                            <span>Микроволновка</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="fridge" value="Холодильник" aria-label="...">
                            <span>Холодильник</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="washing_machine" value="Стиральная машина" aria-label="...">
                            <span>Стиральная машина</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column w-50 ms-5 mb-4">
                        <span class="mb-2 mt-2">Бытовая техника</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="conditioner" value="Кондиционер" aria-label="...">
                            <span>Кондиционер</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="parking" value="Парковочное место" aria-label="...">
                            <span>Парковочное место</span>
                        </div>
                        <span class="mb-2 mt-2">Бытовая техника</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="may_animal" value="Можно с питомцами" aria-label="...">
                            <span>Можно с питомцами</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="may_children" value="Можно с детьми" aria-label="...">
                            <span>Можно с детьми</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="allowed_smoke" value="Можно курить" aria-label="...">
                            <span>Можно курить</span>
                        </div>
                    </div>
                </div>
            </div>
            <button v-if="what_i_sell == 'Квартиры' && sell_and_buy == 'Сниму'" class="btn btn-primary w-700" v-on:click="resume_two_buy()">Продолжить</button>
            <button v-if="what_i_sell == 'Комнаты' && sell_and_buy == 'Сниму'" class="btn btn-primary w-700" v-on:click="resume_two_buy_room()">Продолжить</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Комнаты' && sell_and_buy == 'Сдам'">
            <div class="d-flex flex-column mt-3">
                <h2>Параметры</h2>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Тип жилья</label>
                    <div class="d-flex flex-column">
                        <div class="mt-0 d-flex">
                            <input type="radio" class="btn-check" name="type_residential" value="Квартира" v-model="type_residential" id="type_residential1" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="type_residential1">Комната</label>
                            <input type="radio" class="btn-check" name="type_residential" value="Апартаменты" v-model="type_residential" id="type_residential2" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="type_residential2">Койко-место</label>
                        </div>
                        <div class="text-danger">@{{type_residential_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Расположение</label>
                    <div class="d-flex flex-column">
                        <div>
                            <input class="form-check-input me-2 mb-3" name="location" type="radio" v-model="location" value="Квартира" aria-label="...">
                            <span>Квартира</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" name="location" type="radio" v-model="location" value="Хостел" aria-label="...">
                            <span>Хостел</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" name="location" type="radio" v-model="location" value="Гостиница" aria-label="...">
                            <span>Гостиница</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Количество комнат</label>
                    <div class="d-flex flex-column mb-3">
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
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Тип дома</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select name="type_home" v-model="type_home" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Кирпичный">Кирпичный</option>
                                <option value="Панельный">Панельный</option>
                                <option value="Блочный">Блочный</option>
                                <option value="Монолитный">Монолитный</option>
                                <option value="Монолитно-кирпичный">Монолитно-кирпичный</option>
                                <option value="Деревянный">Деревянный</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{type_home_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Этаж</label>
                    <div class="d-flex flex-column mb-3">
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
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Этажей в доме</label>
                    <div class="d-flex flex-column mb-3">
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
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label fs-5 width-blocks">Площадь</label>
                    <div class="mt-0">
                        <input type="text" v-model="square" class="form-control" name="square" placeholder="0,0 м²">
                        <div class="text-danger">@{{square_error}}</div>
                    </div>
                </div>
                <h2>Дополнительные параметры</h2>
                <div class="d-flex-tel" style="width: 500px;">
                    <div class="d-flex flex-column w-50">
                        <span class="mb-2">Количество кроватей</span>
                        <select name="count_bed" v-model="count_bed" class="form-select form-select-lg" aria-label=".form-select-lg example">
                            <option value="" selected disabled></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8+">8+</option>
                        </select>
                        <span class="mb-2 mt-2">Количество спальных мест</span>
                        <select name="count_sleeping_places" v-model="count_sleeping_places" class="form-select form-select-lg" aria-label=".form-select-lg example">
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
                            <option value="16+">16+</option>
                        </select>
                        <span class="mb-2 mt-2">Мультимедиа</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="wi_fi" value="wi_fi" aria-label="...">
                            <span>Wi-Fi</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="TV" value="Телевизор" aria-label="...">
                            <span>Телевизор</span>
                        </div>
                        <span class="mb-2 mt-2">Бытовая техника</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="stove" value="Плита" aria-label="...">
                            <span>Плита</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="nuke" value="Микроволновка" aria-label="...">
                            <span>Микроволновка</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="fridge" value="Холодильник" aria-label="...">
                            <span>Холодильник</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="washing_machine" value="Стиральная машина" aria-label="...">
                            <span>Стиральная машина</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column w-50 ms-5 mb-4">
                        <span class="mb-2 mt-2">Бытовая техника</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="conditioner" value="Кондиционер" aria-label="...">
                            <span>Кондиционер</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="parking" value="Парковочное место" aria-label="...">
                            <span>Парковочное место</span>
                        </div>
                        <span class="mb-2 mt-2">Бытовая техника</span>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="may_animal" value="Можно с питомцами" aria-label="...">
                            <span>Можно с питомцами</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="may_children" value="Можно с детьми" aria-label="...">
                            <span>Можно с детьми</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-3" type="checkbox" v-model="allowed_smoke" value="Можно курить" aria-label="...">
                            <span>Можно курить</span>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_two_rent_room()">Продолжить</button>
        </div>
        <div v-if="res_one == true && res_two != true && what_i_sell == 'Комнаты' && sell_and_buy == 'Куплю'">
            <div class="d-flex flex-column mt-3 mb-5">
                <h2>Описание</h2>
                <div class="d-flex flex-column mb-4">
                    <textarea type="text" class="form-control width-textarea" v-model="description" placeholder="Расскажите, что есть в квартире и рядом с домом, в каком состоянии жильё. Покупателям интересно, сколько идти до магазинов и остановок транспорта, есть ли рядом торговые центры, парки и другая инфраструктура."></textarea>
                    <div class="text-danger">@{{description_error}}</div>
                </div>   
                <div class="d-flex-tel mb-2">
                    <label for="name" class="col-form-label width-blocks">Цена</label>
                    <div class="mt-0">
                        <input type="text" name="name" id="price" v-model="price" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{price_error}}</div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-700" v-on:click="resume_three()">Опубликовать</button>
        </div>

        <!-- Начало модального окна добавления фото -->
        <div class="modal fade" id="addimage" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выберите изображение</h5>
                        <button type="button" id="close_realty_image" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="form_add_image_realty">
                    @csrf
                        <div class="modal-body">
                            <input type="file" name="image" id="file_realty" class="w-100">
                            <div class="text-danger">@{{file_realty_error}}</div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" v-on:click="add_images_realty()">Загрузить</button>
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
                    realty_images: [],
                    description: '',
                    method_sale: '',
                    mortgage: '',
                    sale_share: '',
                    auction: '',
                    price: '',
                    type_time: '',
                    conditioner: '',
                    fridge: '',
                    stove: '',
                    nuke: '',
                    washing_machine: '',
                    dishwasher: '',
                    water_heater: '',
                    TV: '',
                    wi_fi: '',
                    television: '',
                    max_guest: '',
                    may_children: '',
                    may_animal: '',
                    allowed_smoke: '',
                    count_bed: '',
                    count_sleeping_places: '',
                    location: 'Квартира',
                    object_type: 'Дом',
                    bath_or_sauna: '',
                    swimming_pool: '',
                    plot_status: '',
                    year_construction: '',
                    wall_material: '',
                    terrace_veranda: '',
                    square_region: '',
                    bathroom_home: '',
                    bathroom_street: '',
                    garage_type: '',
                    adres_error: '',
                    who_add_error: '',
                    number_flat_error: '',
                    type_residential_error: '',
                    floor_error: '',
                    count_rooms_error: '',
                    square_error: '',
                    type_home_error: '',
                    floor_home_error: '',
                    file_realty_error: '',
                    description_error: '',
                    price_error: '',
                    type_time_error: '',
                    may_children_error: '',
                    may_animal_error: '',
                    plot_status_error: '',
                    wall_material_error: '',
                    square_region_error: '',    
                    res_one: false,
                    res_two: false,
                    my_city: JSON.parse(localStorage.getItem("city")),
                }
            },
            beforeMount(){
                this.all();
            },
            methods: {
                all() {
                    var prom = this.realty_images
                    axios({
                        method: 'get',
                        url: '/all_img_realty',
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
                choose_realty(realty) {
                    this.what_i_sell = realty
                },
                choose_sellbuy(sellbuy) {
                    this.sell_and_buy = sellbuy

                    if(this.what_i_sell == 'Квартиры') {
                        this.cs_newold = true
                    } else 
                    if(this.what_i_sell == 'Комнаты') {
                        this.cs_newold = true
                    } else 
                    if(this.what_i_sell == 'Дома, дачи, коттеджи') {
                        this.cs_newold = true
                    } else 
                    if(this.what_i_sell == 'Земельные участки') {
                        this.cs_newold = true
                    } else 
                    if(this.what_i_sell == 'Гаражи и машиноместа') {
                        this.cs_newold = true
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
                },
                add_images_realty() {
                    event.preventDefault();
                    if(document.getElementById('file_realty').files.length != 0) {
                        if(this.realty_images.length <= 19) {
                            this.realty_images_error = ''
                            this.file_realty_error = ''
                            var form_add_image_cars = new FormData($("#form_add_image_realty")[0]);

                            var prom = this.realty_images
                            axios({
                                method: 'post',
                                url: '/img_add_realty',
                                responseType: 'json',
                                data: form_add_image_cars,
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(function (response) {
                                close_realty_image.click()
                                prom.push({
                                    id: response.data['id'],
                                    image: response.data['image'],
                                })
                                file_realty.value = "";
                            })
                        } else {
                            this.file_realty_error = 'Добавлено максимальное количество изображений'
                        }
                    } else {
                        this.file_realty_error = 'Вы не выбрали изображение'
                    }
                },
                delete_images_realty(id) {
                    var prom = this.realty_images
                    var e_item = prom[id]

                    axios({
                        method: 'get',
                        url: `/img_delete_realty/${e_item.id}`,
                        responseType: 'json',
                    })
                    .then(function (response) {
                        prom.splice(id, 1)
                    })
                },
                resume_three() {
                    if(this.description != '') {
                        if(this.price != '') {
                            if(this.what_i_sell == 'Квартиры') {
                                if(this.sell_and_buy == 'Продам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_estate',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            number_flat: this.number_flat,
                                            who_add: this.who_add,
                                            online_display: this.online_display,
                                            type_residential: this.type_residential,
                                            floor: this.floor,
                                            count_rooms: this.count_rooms,
                                            square: this.square,
                                            residential_square: this.residential_square,
                                            type_home: this.type_home,
                                            floor_home: this.floor_home,
                                            elevator: this.elevator,
                                            closed_territory: this.closed_territory,
                                            children_playground: this.children_playground,
                                            sports_ground: this.sports_ground,
                                            parking: this.parking,
                                            realty_images: this.realty_images,
                                            description: this.description,
                                            method_sale: this.method_sale,
                                            mortgage: this.mortgage,
                                            sale_share: this.sale_share,
                                            auction: this.auction,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Сдам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_apartment_rent',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            number_flat: this.number_flat,
                                            who_add: this.who_add,
                                            online_display: this.online_display,
                                            type_time: this.type_time,
                                            type_residential: this.type_residential,
                                            floor: this.floor,
                                            count_rooms: this.count_rooms,
                                            square: this.square,
                                            residential_square: this.residential_square,
                                            conditioner: this.conditioner,
                                            fridge: this.fridge,
                                            stove: this.stove,
                                            nuke: this.nuke,
                                            washing_machine: this.washing_machine,
                                            dishwasher: this.dishwasher,
                                            water_heater: this.water_heater,
                                            TV: this.TV,
                                            wi_fi: this.wi_fi,
                                            television: this.television,
                                            type_home: this.type_home,
                                            floor_home: this.floor_home,
                                            elevator: this.elevator,
                                            closed_territory: this.closed_territory,
                                            children_playground: this.children_playground,
                                            sports_ground: this.sports_ground,
                                            parking: this.parking,
                                            max_guest: this.max_guest,
                                            may_children: this.may_children,
                                            may_animal: this.may_animal,
                                            allowed_smoke: this.allowed_smoke,
                                            realty_images: this.realty_images,
                                            description: this.description,
                                            method_sale: this.method_sale,
                                            mortgage: this.mortgage,
                                            sale_share: this.sale_share,
                                            auction: this.auction,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Куплю') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_apartment_buy',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            count_rooms: this.count_rooms,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Сниму') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_apartment_take',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            count_rooms: this.count_rooms,
                                            count_bed: this.count_bed,
                                            count_sleeping_places: this.count_sleeping_places,
                                            TV: this.TV,
                                            wi_fi: this.wi_fi,
                                            stove: this.stove,
                                            nuke: this.nuke,
                                            fridge: this.fridge,
                                            washing_machine: this.washing_machine,
                                            conditioner: this.conditioner,
                                            parking: this.parking,
                                            may_children: this.may_children,
                                            may_animal: this.may_animal,
                                            allowed_smoke: this.allowed_smoke,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                }
                            } else 
                            if(this.what_i_sell == 'Комнаты') {
                                if(this.sell_and_buy == 'Продам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_room',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            number_flat: this.number_flat,
                                            who_add: this.who_add,
                                            online_display: this.online_display,
                                            type_residential: this.type_residential,
                                            floor: this.floor,
                                            count_rooms: this.count_rooms,
                                            square: this.square,
                                            residential_square: this.residential_square,
                                            type_home: this.type_home,
                                            floor_home: this.floor_home,
                                            elevator: this.elevator,
                                            closed_territory: this.closed_territory,
                                            children_playground: this.children_playground,
                                            sports_ground: this.sports_ground,
                                            parking: this.parking,
                                            realty_images: this.realty_images,
                                            description: this.description,
                                            method_sale: this.method_sale,
                                            mortgage: this.mortgage,
                                            sale_share: this.sale_share,
                                            auction: this.auction,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Сдам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_room_rent',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            number_flat: this.number_flat,
                                            who_add: this.who_add,
                                            online_display: this.online_display,
                                            type_residential: this.type_residential,
                                            location: this.location,
                                            floor: this.floor,
                                            count_rooms: this.count_rooms,
                                            square: this.square,
                                            type_home: this.type_home,
                                            floor_home: this.floor_home,
                                            count_bed: this.count_bed,
                                            count_sleeping_places: this.count_sleeping_places,
                                            TV: this.TV,
                                            wi_fi: this.wi_fi,
                                            stove: this.stove,
                                            nuke: this.nuke,
                                            fridge: this.fridge,
                                            washing_machine: this.washing_machine,
                                            conditioner: this.conditioner,
                                            parking: this.parking,
                                            may_children: this.may_children,
                                            may_animal: this.may_animal,
                                            allowed_smoke: this.allowed_smoke,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Куплю') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_room_buy',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Сниму') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_room_take',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            count_bed: this.count_bed,
                                            count_sleeping_places: this.count_sleeping_places,
                                            TV: this.TV,
                                            wi_fi: this.wi_fi,
                                            stove: this.stove,
                                            nuke: this.nuke,
                                            fridge: this.fridge,
                                            washing_machine: this.washing_machine,
                                            conditioner: this.conditioner,
                                            parking: this.parking,
                                            may_children: this.may_children,
                                            may_animal: this.may_animal,
                                            allowed_smoke: this.allowed_smoke,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                }
                            } else
                            if(this.what_i_sell == 'Дома, дачи, коттеджи') {
                                if(this.sell_and_buy == 'Продам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_home',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            who_add: this.who_add,
                                            online_display: this.online_display,
                                            object_type: this.object_type,
                                            bath_or_sauna: this.bath_or_sauna,
                                            swimming_pool: this.swimming_pool,
                                            plot_status: this.plot_status,
                                            year_construction: this.year_construction,
                                            wall_material: this.wall_material,
                                            floor_home: this.floor_home,
                                            count_rooms: this.count_rooms,
                                            terrace_veranda: this.terrace_veranda,
                                            square: this.square,
                                            square_region: this.square_region,
                                            bathroom_home: this.bathroom_home,
                                            bathroom_street: this.bathroom_street,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Сдам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_home_rent',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            who_add: this.who_add,
                                            online_display: this.online_display,
                                            type_time: this.type_time,
                                            object_type: this.object_type,
                                            bath_or_sauna: this.bath_or_sauna,
                                            swimming_pool: this.swimming_pool,
                                            plot_status: this.plot_status,
                                            year_construction: this.year_construction,
                                            wall_material: this.wall_material,
                                            floor_home: this.floor_home,
                                            count_rooms: this.count_rooms,
                                            terrace_veranda: this.terrace_veranda,
                                            square: this.square,
                                            square_region: this.square_region,
                                            bathroom_home: this.bathroom_home,
                                            bathroom_street: this.bathroom_street,
                                            conditioner: this.conditioner,
                                            fridge: this.fridge,
                                            stove: this.stove,
                                            nuke: this.nuke,
                                            washing_machine: this.washing_machine,
                                            dishwasher: this.dishwasher,
                                            water_heater: this.water_heater,
                                            TV: this.TV,
                                            max_guest: this.max_guest,
                                            may_children: this.may_children,
                                            may_animal: this.may_animal,
                                            allowed_smoke: this.allowed_smoke,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Куплю') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_home_buy',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            object_type: this.object_type,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else
                                if(this.sell_and_buy == 'Сниму') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_home_take',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            object_type: this.object_type,
                                            bath_or_sauna: this.bath_or_sauna,
                                            swimming_pool: this.swimming_pool,
                                            conditioner: this.conditioner,
                                            fridge: this.fridge,
                                            stove: this.stove,
                                            nuke: this.nuke,
                                            washing_machine: this.washing_machine,
                                            dishwasher: this.dishwasher,
                                            water_heater: this.water_heater,
                                            TV: this.TV,
                                            count_bed: this.count_bed,
                                            count_sleeping_places: this.count_sleeping_places,
                                            may_children: this.may_children,
                                            may_animal: this.may_animal,
                                            allowed_smoke: this.allowed_smoke,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                }
                            } else 
                            if(this.what_i_sell == 'Земельные участки') {
                                if(this.sell_and_buy == 'Продам') {
                                    if(this.square != '') {
                                        this.price_error = ''
                                        this.description_error = ''
                                        this.square_error = ''
                                        
                                        axios({
                                            method: 'post',
                                            url: '/add_land_plot',
                                            responseType: 'json',
                                            data: {
                                                what_i_sell: this.what_i_sell,
                                                sell_and_buy: this.sell_and_buy,
                                                adres: this.adres,
                                                who_add: this.who_add,
                                                description: this.description,
                                                square: this.square,
                                                price: this.price,
                                                city: this.my_city,
                                            },
                                        })
                                        .then(function (response) {
                                            window.location.href = '/cabinet'
                                        })
                                    } else {
                                        this.square_error = 'Введите значение параметра'
                                        this.price_error = ''
                                        this.description_error = ''
                                    }
                                } else
                                if(this.sell_and_buy == 'Сдам') {
                                    if(this.square != '') {
                                        this.price_error = ''
                                        this.description_error = ''
                                        this.square_error = ''
                                        
                                        axios({
                                            method: 'post',
                                            url: '/add_land_plot_rent',
                                            responseType: 'json',
                                            data: {
                                                what_i_sell: this.what_i_sell,
                                                sell_and_buy: this.sell_and_buy,
                                                adres: this.adres,
                                                who_add: this.who_add,
                                                description: this.description,
                                                square: this.square,
                                                price: this.price,
                                                city: this.my_city,
                                            },
                                        })
                                        .then(function (response) {
                                            window.location.href = '/cabinet'
                                        })
                                    } else {
                                        this.square_error = 'Введите значение параметра'
                                        this.price_error = ''
                                        this.description_error = ''
                                    }
                                } else 
                                if(this.sell_and_buy == 'Куплю') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_land_plot_buy',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else 
                                if(this.sell_and_buy == 'Сниму') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_land_plot_type',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                }
                            } else
                            if(this.what_i_sell == 'Гаражи и машиноместа') {
                                if(this.sell_and_buy == 'Продам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_garage',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            who_add: this.who_add,
                                            garage_type: this.garage_type,
                                            square: this.square,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    })
                                } else 
                                if(this.sell_and_buy == 'Сдам') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_garage_rent',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            who_add: this.who_add,
                                            garage_type: this.garage_type,
                                            square: this.square,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    }) 
                                } else
                                if(this.sell_and_buy == 'Куплю') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_garage_buy',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    }) 
                                } else
                                if(this.sell_and_buy == 'Сниму') {
                                    this.price_error = ''
                                    this.description_error = ''
                                    
                                    axios({
                                        method: 'post',
                                        url: '/add_garage_take',
                                        responseType: 'json',
                                        data: {
                                            what_i_sell: this.what_i_sell,
                                            sell_and_buy: this.sell_and_buy,
                                            adres: this.adres,
                                            description: this.description,
                                            price: this.price,
                                            city: this.my_city,
                                        },
                                    })
                                    .then(function (response) {
                                        window.location.href = '/cabinet'
                                    }) 
                                }
                            }
                        } else {
                            this.price_error = 'Введите цену'
                            this.description_error = ''
                        }
                    } else {
                        this.description_error = 'Пожалуйста, заполните описание'
                    }
                },
                apartment_rent_two() {
                    if(this.type_time != '') {
                        if(this.type_residential != '') {
                            if(this.floor != '') {
                                if(this.count_rooms != '') {
                                    if(this.square != '') {
                                        if(this.type_home != '') {
                                            if(this.floor_home != '') {
                                                if(this.may_children != '') {
                                                    if(this.may_animal != '') {
                                                        this.may_animal_error = ''
                                                        this.may_children_error = ''
                                                        this.floor_home_error = ''
                                                        this.type_home_error = ''
                                                        this.square_error = ''
                                                        this.count_rooms_error = ''
                                                        this.floor_error = ''
                                                        this.type_residential_error = ''
                                                        this.type_time_error = ''

                                                        this.res_two = true
                                                    } else {
                                                        this.may_animal_error = 'Укажите значение параметра'
                                                        this.may_children_error = ''
                                                        this.floor_home_error = ''
                                                        this.type_home_error = ''
                                                        this.square_error = ''
                                                        this.count_rooms_error = ''
                                                        this.floor_error = ''
                                                        this.type_residential_error = ''
                                                        this.type_time_error = ''
                                                    }
                                                } else {
                                                    this.may_children_error = 'Укажите значение параметра'
                                                    this.floor_home_error = ''
                                                    this.type_home_error = ''
                                                    this.square_error = ''
                                                    this.count_rooms_error = ''
                                                    this.floor_error = ''
                                                    this.type_residential_error = ''
                                                    this.type_time_error = ''
                                                }
                                            } else {
                                                this.floor_home_error = 'Укажите этаж'
                                                this.type_home_error = ''
                                                this.square_error = ''
                                                this.count_rooms_error = ''
                                                this.floor_error = ''
                                                this.type_residential_error = ''
                                                this.type_time_error = ''
                                            }
                                        } else {
                                            this.type_home_error = 'Выберите тип дома'
                                            this.square_error = ''
                                            this.count_rooms_error = ''
                                            this.floor_error = ''
                                            this.type_residential_error = ''
                                            this.type_time_error = ''
                                        }
                                    } else {
                                        this.square_error = 'Укажите общую площадь'
                                        this.count_rooms_error = ''
                                        this.floor_error = ''
                                        this.type_residential_error = ''
                                        this.type_time_error = ''
                                    }
                                } else {
                                    this.count_rooms_error = 'Укажите количество комнат'
                                    this.floor_error = ''
                                    this.type_residential_error = ''
                                    this.type_time_error = ''
                                }
                            } else {
                                this.floor_error = 'Укажите этаж'
                                this.type_residential_error = ''
                                this.type_time_error = ''
                            }
                        } else {
                            this.type_residential_error = 'Укажите тип жилья'
                            this.type_time_error = ''
                        }
                    } else {
                        this.type_time_error = 'Укажите тип времени'
                    }
                },
                resume_one_buy() {
                    if(this.adres != '') {
                        this.adres_error = ''

                        this.res_one = true
                    } else {
                        this.adres_error = 'Укажите адрес'
                    }
                },
                resume_two_buy() {
                    if(this.count_rooms != '') {
                        this.count_rooms_error = ''

                        this.res_two = true
                    } else {
                        this.count_rooms_error = 'Укажите количество комнат'
                    }
                },
                back_category() {
                    this.sell_and_buy = ''
                    this.cs_newold = ''
                },
                resume_two_rent_room() {
                    if(this.type_residential != '') {
                        if(this.floor != '') {
                            if(this.count_rooms != '') {
                                if(this.square != '') {
                                    if(this.type_home != '') {
                                        if(this.floor_home != '') {
                                            this.may_animal_error = ''
                                            this.may_children_error = ''
                                            this.floor_home_error = ''
                                            this.type_home_error = ''
                                            this.square_error = ''
                                            this.count_rooms_error = ''
                                            this.floor_error = ''
                                            this.type_residential_error = ''
                                            this.type_time_error = ''

                                            this.res_two = true
                                        } else {
                                            this.floor_home_error = 'Укажите этаж'
                                            this.type_home_error = ''
                                            this.square_error = ''
                                            this.count_rooms_error = ''
                                            this.floor_error = ''
                                            this.type_residential_error = ''
                                            this.type_time_error = ''
                                        }
                                    } else {
                                        this.type_home_error = 'Выберите тип дома'
                                        this.square_error = ''
                                        this.count_rooms_error = ''
                                        this.floor_error = ''
                                        this.type_residential_error = ''
                                        this.type_time_error = ''
                                    }
                                } else {
                                    this.square_error = 'Укажите общую площадь'
                                    this.count_rooms_error = ''
                                    this.floor_error = ''
                                    this.type_residential_error = ''
                                    this.type_time_error = ''
                                }
                            } else {
                                this.count_rooms_error = 'Укажите количество комнат'
                                this.floor_error = ''
                                this.type_residential_error = ''
                                this.type_time_error = ''
                            }
                        } else {
                            this.floor_error = 'Укажите этаж'
                            this.type_residential_error = ''
                            this.type_time_error = ''
                        }
                    } else {
                        this.type_residential_error = 'Укажите тип жилья'
                        this.type_time_error = ''
                    }
                },
                resume_two_buy_room() {
                    this.res_two = true
                },
                resume_one_home() {
                    if(this.what_i_sell == 'Дома, дачи, коттеджи') {
                        if(this.adres != '') {
                            if(this.who_add != ''){
                                this.who_add_error = ''
                                this.adres_error = ''
        
                                this.res_one = true
                            } else {
                                this.who_add_error = 'Выберите право собственности'
                                this.adres_error = ''
                            }
                        } else {
                            this.adres_error = 'Укажите адрес'
                        }
                    } else
                    if(this.what_i_sell == 'Земельные участки') {
                        if(this.sell_and_buy == 'Продам' || this.sell_and_buy == 'Сдам') {
                            if(this.adres != '') {
                                if(this.who_add != ''){
                                    this.who_add_error = ''
                                    this.adres_error = ''

                                    this.res_one = true
                                    this.res_two = true
                                } else {
                                    this.who_add_error = 'Выберите право собственности'
                                    this.adres_error = ''
                                }
                            } else {
                                this.adres_error = 'Укажите адрес'
                            }
                        } else 
                        if(this.sell_and_buy == 'Куплю' || this.sell_and_buy == 'Сниму') {
                            if(this.adres != '') {
                                this.adres_error = ''

                                this.res_one = true
                                this.res_two = true
                            } else {
                                this.adres_error = 'Укажите адрес'
                            }
                        }
                    } else
                    if(this.what_i_sell == 'Гаражи и машиноместа') {
                        if(this.sell_and_buy == 'Продам' || this.sell_and_buy == 'Сдам') {
                            if(this.adres != '') {
                                if(this.who_add != ''){
                                    this.who_add_error = ''
                                    this.adres_error = ''
    
                                    this.res_one = true
                                    this.res_two = true
                                } else {
                                    this.who_add_error = 'Выберите право собственности'
                                    this.adres_error = ''
                                }
                            } else {
                                this.adres_error = 'Укажите адрес'
                            }
                        } else 
                        if(this.sell_and_buy == 'Куплю' || this.sell_and_buy == 'Сниму') {
                            if(this.adres != '') {
                                this.adres_error = ''

                                this.res_one = true
                                this.res_two = true
                            } else {
                                this.adres_error = 'Укажите адрес'
                            }
                        }
                    }
                },
                resume_two_home() {
                    if(this.sell_and_buy == 'Продам') {
                        if(this.plot_status != '') {
                            if(this.wall_material != '') {
                                if(this.floor_home != '') {
                                    if(this.count_rooms != '') {
                                        if(this.square != '') {
                                            if(this.square_region != '') {
                                                this.square_region_error = ''
                                                this.square_error = ''
                                                this.count_rooms_error = ''
                                                this.floor_home_error = ''
                                                this.wall_material_error = ''
                                                this.plot_status_error = ''
    
                                                this.res_two = true
                                            } else {
                                                this.square_region_error = 'Введите значение параметра'
                                                this.square_error = ''
                                                this.count_rooms_error = ''
                                                this.floor_home_error = ''
                                                this.wall_material_error = ''
                                                this.plot_status_error = ''
                                            }
                                        } else {
                                            this.square_error = 'Введите значение параметра'
                                            this.count_rooms_error = ''
                                            this.floor_home_error = ''
                                            this.wall_material_error = ''
                                            this.plot_status_error = ''
                                        }
                                    } else {
                                        this.count_rooms_error = 'Укажите значение параметра'
                                        this.floor_home_error = ''
                                        this.wall_material_error = ''
                                        this.plot_status_error = ''
                                    }
                                } else {
                                    this.floor_home_error = 'Выберите значение из списка'
                                    this.wall_material_error = ''
                                    this.plot_status_error = ''
                                }
                            } else {
                                this.wall_material_error = 'Выберите значение из списка'
                                this.plot_status_error = ''
                            }
                        } else {
                            this.plot_status_error = 'Укажите значение параметра'
                        }
                    } else
                    if(this.sell_and_buy == 'Сдам') {
                        if(this.type_time != '') {
                            if(this.plot_status != '') {
                                if(this.wall_material != '') {
                                    if(this.floor_home != '') {
                                        if(this.count_rooms != '') {
                                            if(this.square != '') {
                                                if(this.square_region != '') {
                                                    if(this.may_children != '') {
                                                        if(this.may_animal != '') {
                                                            this.square_region_error = ''
                                                            this.square_error = ''
                                                            this.count_rooms_error = ''
                                                            this.floor_home_error = ''
                                                            this.wall_material_error = ''
                                                            this.plot_status_error = ''
                                                            this.type_time_error = ''
                
                                                            this.res_two = true
                                                        } else {
                                                            this.may_animal_error = 'Укажите значение параметра'
                                                            this.may_children_error = ''
                                                            this.square_region_error = ''
                                                            this.square_error = ''
                                                            this.count_rooms_error = ''
                                                            this.floor_home_error = ''
                                                            this.wall_material_error = ''
                                                            this.plot_status_error = ''
                                                            this.type_time_error = ''
                                                        }
                                                    } else {
                                                        this.may_children_error = 'Укажите значение параметра'
                                                        this.square_region_error = ''
                                                        this.square_error = ''
                                                        this.count_rooms_error = ''
                                                        this.floor_home_error = ''
                                                        this.wall_material_error = ''
                                                        this.plot_status_error = ''
                                                        this.type_time_error = ''
                                                    }
                                                } else {
                                                    this.square_region_error = 'Введите значение параметра'
                                                    this.square_error = ''
                                                    this.count_rooms_error = ''
                                                    this.floor_home_error = ''
                                                    this.wall_material_error = ''
                                                    this.plot_status_error = ''
                                                    this.type_time_error = ''
                                                }
                                            } else {
                                                this.square_error = 'Введите значение параметра'
                                                this.count_rooms_error = ''
                                                this.floor_home_error = ''
                                                this.wall_material_error = ''
                                                this.plot_status_error = ''
                                                this.type_time_error = ''
                                            }
                                        } else {
                                            this.count_rooms_error = 'Укажите значение параметра'
                                            this.floor_home_error = ''
                                            this.wall_material_error = ''
                                            this.plot_status_error = ''
                                            this.type_time_error = ''
                                        }
                                    } else {
                                        this.floor_home_error = 'Выберите значение из списка'
                                        this.wall_material_error = ''
                                        this.plot_status_error = ''
                                        this.type_time_error = ''
                                    }
                                } else {
                                    this.wall_material_error = 'Выберите значение из списка'
                                    this.plot_status_error = ''
                                    this.type_time_error = ''
                                }
                            }else {
                                this.plot_status_error = 'Укажите значение параметра'
                            }
                        } else {
                            this.type_time_error = 'Выберите тип времени'
                        }
                    } else
                    if(this.sell_and_buy == 'Куплю' || this.sell_and_buy == 'Сниму') {
                        this.res_two = true
                    }
                }
            }
        }
        Vue.createApp(AddRealty).mount('#addrealty')
    </script>
@endsection
