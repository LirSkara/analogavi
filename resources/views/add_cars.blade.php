@extends('layout')
@section('title')
    Avito - Добавление машин
@endsection
@section('content')
    <div class="container" id="addcars">
        <div class="row mx-auto">
            <form id="form_cars" class="col">
            @csrf
                <h1 class="fs-3 mb-5">Параметры</h1>
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
                        <label for="name" class="col-form-label">Марка</label>
                    </div>
                    <div class="col-12 col-lg-4 mt-0">
                        <div class="input-marka" data-bs-toggle="modal" data-bs-target="#choice_marka"><span v-if="car_selected == false">Выберите марку</span><span v-if="car_selected == true">Марка выбрана</span><i class="bi bi-chevron-down ms-auto"></i></div>
                        <div class="text-danger">@{{mark_error}}</div>
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
                <h1 class="fs-3 mb-5">Птс</h1>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Тип документа</label>
                    </div>
                    <div class="col-auto d-flex flex-wrap mt-0 gap-2">
                        <input type="radio" class="btn-check" name="type_doc" value="Оригинал/Электронный ПТС" v-model="type_doc" id="type_doc1" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-out" for="type_doc1">Оригинал/Электронный ПТС</label>
                        <input type="radio" class="btn-check" name="type_doc" value="Дубликат" v-model="type_doc" id="type_doc2" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-out" for="type_doc2">Дубликат</label>
                        <div class="text-danger">@{{type_doc_error}}</div>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <label for="name" class="col-form-label">Какой ты владелец?</label>
                    </div>
                    <div class="col-auto d-flex flex-wrap gap-2 mt-3">
                        <input type="radio" class="btn-check" name="owner_count" value="Первый" v-model="owner_count" id="owner_count1" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-out" for="owner_count1">Первый</label>
                        <input type="radio" class="btn-check" name="owner_count" value="Второй" v-model="owner_count" id="owner_count2" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-out" for="owner_count2">Второй</label>
                        <input type="radio" class="btn-check" name="owner_count" value="Третий" v-model="owner_count" id="owner_count3" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-out" for="owner_count3">Третий</label>
                        <input type="radio" class="btn-check" name="owner_count" value="Четвертый и более" v-model="owner_count" id="owner_count4" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-out" for="owner_count4">Четвертый или более</label>
                        <div class="text-danger">@{{owner_count_error}}</div>
                    </div>
                    <div class="col-12 col-lg-4 mt-0">
                        <label for="name" class="col-form-label">Когда был куплен автомобиль?</label>
                    </div>
                    <div class="col-12 col-lg-6 d-flex mt-3">
                        <select name="when_pur_year" class="form-select form-select-lg mb-3 me-2" aria-label=".form-select-lg example">
                            <option value="" selected disabled>Год</option>
                            <option v-for="(item, id) in when_car" :key="item" :value="Number(year)+Number(id)">@{{Number(year)+Number(id)}}</option>
                        </select>
                        <select name="when_pur_month"class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="" selected disabled>Месяц</option>
                            <option value="Январь">Январь</option>
                            <option value="Февраль">Февраль</option>
                            <option value="Март">Март</option>
                            <option value="Апрель">Апрель</option>
                            <option value="Май">Май</option>
                            <option value="Июнь">Июнь</option>
                            <option value="Июль">Июль</option>
                            <option value="Август">Август</option>
                            <option value="Сентябрь">Сентябрь</option>
                            <option value="Октябрь">Октябрь</option>
                            <option value="Ноябрь">Ноябрь</option>
                            <option value="Декабрь">Декабрь</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-4 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" v-on:click="check_garant()" value="true" v-model="garant" id="flexCheckDefaultwar">
                            <label class="form-check-label" for="flexCheckDefaultwar">
                                На гарантии
                            </label>
                        </div>
                    </div>
                    <div v-if="garant == true" class="col-auto col-lg-6 mt-0">
                        <div class="d-flex">
                            <select name="year_graduation" v-model="year_graduation" class="form-select form-select-lg me-2" aria-label=".form-select-lg example">
                                <option value="" selected disabled>Год окончания</option>
                                <option v-for="(item, id) in 11" :key="item" :value="Number(yyyy)+Number(id)">@{{Number(yyyy)+Number(id)}}</option>
                            </select>
                            <select name="month_graduation" v-model="month_graduation" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled>Месяц</option>
                                <option value="Январь">Январь</option>
                                <option value="Февраль">Февраль</option>
                                <option value="Март">Март</option>
                                <option value="Апрель">Апрель</option>
                                <option value="Май">Май</option>
                                <option value="Июнь">Июнь</option>
                                <option value="Июль">Июль</option>
                                <option value="Август">Август</option>
                                <option value="Сентябрь">Сентябрь</option>
                                <option value="Октябрь">Октябрь</option>
                                <option value="Ноябрь">Ноябрь</option>
                                <option value="Декабрь">Декабрь</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{error_graduation}}</div>
                    </div>
                </div>
                <h1 class="fs-3 mb-5">СТС</h1>
                <div v-if="car_no_reg == false" class="col-auto mt-0 mb-3">
                    <div class="form-floating">
                        <input type="text" name="state_number" v-model="state_number" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Госномер</label>
                    </div>
                    <div class="text-danger">@{{state_number_error}}</div>
                </div>
                <div v-if="car_no_reg == true" class="col-auto mt-0 mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
                        <label for="floatingInput">Госномер</label>
                    </div>
                </div>
                <div class="col-auto mt-0">
                    <div class="form-floating mb-3">
                        <input type="text" name="vin" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">VIN / номер кузова</label>
                    </div>
                    <div class="text-danger">@{{vin_error}}</div>
                </div>
                <div v-if="car_no_reg == false" class="col-auto mt-0">
                    <div class="form-floating mb-3">
                        <input type="text" name="ctc" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Свидетельство о регистрации (СТС)</label>
                    </div>
                    <div class="text-danger">@{{ctc_error}}</div>
                </div>
                <div v-if="car_no_reg == true" class="col-auto mt-0">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" disabled>
                        <label for="floatingInput">Свидетельство о регистрации (СТС)</label>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" v-on:click="car_no_register()" value="true" v-model="car_no_reg" id="flexCheckDefaultcarno">
                    <label class="form-check-label" for="flexCheckDefaultcarno">
                        Автомобиль не на учете в РФ
                    </label>
                </div>
                <input type="hidden" name="city" v-model="my_city">
                <button class="btn btn-primary w-100" v-on:click="add_cars()">Сохранить и опубликовать</button>
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

        <!-- Начало модального окна выбора марки -->
        <div class="modal fade" id="choice_marka" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 v-if="car_selected == false" class="modal-title" id="exampleModalLabel">Выбор марки</h5>
                        <h5 v-if="car_selected == true" class="modal-title" id="exampleModalLabel">Марка выбрана</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div v-if="car_selected == false" class="d-flex flex-column">
                            <input type="text" v-on:input="poisk_cars()" v-model="search_cars" id="input_cars" class="form-control form-control-lg border-primary" placeholder="Марка">
                            <div v-if="marks_success == 0 && models == 0" class="d-flex flex-wrap gap-2 mt-3">
                                <div v-for="item in marks" v-on:click="choose_mark(item.marka)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm">
                                    <img class="mb-2" style="height: 20pt;" :src="'logos/' + item.logo + '.jpg'" alt="...">
                                    <span class="text-center">@{{item.marka}}</span>
                                </div>
                            </div>
                            <div v-if="marks_success != 0 && models == 0" class="d-flex flex-wrap gap-2 mt-3">
                                <div v-for="item in marks_success" v-on:click="choose_mark(item.marka)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm">
                                    <img class="mb-2" style="height: 20pt;" :src="'logos/' + item.logo + '.jpg'" alt="...">
                                    <span class="text-center">@{{item.marka}}</span>
                                </div>
                            </div>
                            <div v-if="models != 0" class="d-flex flex-column mt-2">
                                <input type="text" v-on:input="poisk_models()" v-model="search_models" id="input_models" class="form-control form-control-lg border-primary" placeholder="Модель">
                                <div v-if="models_success == 0 && model == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in models" v-on:click="choose_model(item.name)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.name}}</span>
                                    </div>
                                </div>
                                <div v-if="models_success != 0 && model == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in models_success" v-on:click="choose_model(item.name)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="model != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_years" id="input_year" class="form-control form-control-lg border-primary" placeholder="Год выпуска" disabled>
                                    <button v-if="year != ''" v-on:click="close_years()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="year == ''" class="d-flex flex-wrap gap-2">
                                    <span v-for="item in model_years" class="d-flex flex-column flex-wrap w-100 mt-3" style="height: 95pt; overflow: scroll">
                                        <span class="card-year mt-1" v-for="(year, ib) in item.year_to-item.year_from+1" :key="year" v-on:click="choose_year(item.year_to-ib)">@{{item.year_to-ib}}</span>
                                    </span>
                                </div>
                            </div>
                            <div v-if="year != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_body_type" id="input_body_type" class="form-control form-control-lg border-primary" placeholder="Кузов" disabled>
                                    <button v-if="body_type != '' && year_body_types.length != 1" v-on:click="close_body_type()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="body_type == '' && year_body_types.length != 1" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in year_body_types" v-on:click="choose_body_type(item.body_type)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.body_type}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="body_type != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_gen" id="input_gen" class="form-control form-control-lg border-primary" placeholder="Поколение" disabled>
                                    <button v-if="gen != '' && gens.length != 1" v-on:click="close_gen()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="gen == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in gens" v-on:click="choose_gen(item.gen)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.gen}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="gen != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_engine_type" id="input_engine_type" class="form-control form-control-lg border-primary" placeholder="Двигатель" disabled>
                                    <button v-if="engine_type != '' && engine_types.length != 1" v-on:click="close_engine_type()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="engine_type == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in engine_types" v-on:click="choose_engine_type(item.engine_type)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.engine_type}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="engine_type != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_drive" id="input_drive" class="form-control form-control-lg border-primary" placeholder="Привод" disabled>
                                    <button v-if="drive != '' && drives.length != 1" v-on:click="close_drive()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="drive == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in drives" v-on:click="choose_drive(item.drive)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.drive}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="drive != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_transmission" id="input_transmission" class="form-control form-control-lg border-primary" placeholder="Коробка передач" disabled>
                                    <button v-if="transmission != '' && transmissions.length != 1" v-on:click="close_transmission()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="transmission == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in transmissions" v-on:click="choose_transmission(item.transmission)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.transmission}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="transmission != ''" class="d-flex flex-column mt-2">
                                <div class="d-flex" style="position: relative;">
                                    <input type="text" v-model="search_horse_power" id="input_horse_power" class="form-control form-control-lg border-primary" placeholder="Модификация" disabled>
                                    <button v-if="horse_power != '' && horse_powers.length != 1" v-on:click="close_horse_power()" class="btn border-0 btn-close-auto py-2"><i class="bi bi-x fs-5"></i></button>
                                </div>
                                <div v-if="horse_power == ''" class="d-flex flex-wrap gap-2">
                                    <div v-for="item in horse_powers" v-on:click="choose_horse_power(item.horse_power)" class="d-flex flex-column justify-content-center align-items-center card-marks bg-white border shadow-sm mt-2">
                                        <span class="text-center">@{{item.horse_power}}</span>
                                    </div>
                                </div>
                            </div>
                            <div v-if="horse_power != ''" class="d-flex flex-column mt-2">
                                <input type="text" v-model="mileage" id="input_mileage" class="form-control form-control-lg border-primary" placeholder="Пробег (км)">
                                <div class="text-danger">@{{mileage_error}}</div>
                                <div class="form-check mt-2" style="cursor: pointer;">
                                    <input class="form-check-input" type="checkbox" v-model="gas_cylinder" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Газобаллонное оборудование
                                    </label>
                                </div>
                                <button v-on:click="save_mark()" class="btn btn-primary w-100 mt-2">Сохранить марку</button>
                            </div>
                        </div>
                        <div v-if="car_selected == true" class="d-flex flex-column">
                            <div class="d-flex mb-2">
                                <span>Марка</span>
                                <span class="ms-auto">@{{marka}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Модель</span>
                                <span class="ms-auto">@{{model}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Год выпуска</span>
                                <span class="ms-auto">@{{year}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Кузов</span>
                                <span class="ms-auto">@{{body_type}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Поколение</span>
                                <span class="ms-auto">@{{gen}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Двигатель</span>
                                <span class="ms-auto">@{{engine_type}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Привод</span>
                                <span class="ms-auto">@{{drive}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Коробка передач</span>
                                <span class="ms-auto">@{{transmission}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Модификация</span>
                                <span class="ms-auto">@{{horse_power}}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <span>Пробег</span>
                                <span class="ms-auto">@{{mileage}}</span>
                            </div>
                            <div class="d-flex mb-3">
                                <span>Газобаллонное оборудование</span>
                                <span v-if="gas_cylinder == ''" class="ms-auto">Нет</span>
                                <span v-if="gas_cylinder == 1" class="ms-auto">Есть</span>
                            </div>
                            <button class="btn btn-primary" v-on:click="change_mark()">Изменить марку</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Конец модального окна выбора марки -->

    </div>

    <script>
        const AddCars = {
            data() {
                return {
                    state: '',
                    description: '',
                    price: '',
                    type_doc: '',
                    owner_count: '',
                    state_number: '',
                    car_no_reg: false,
                    state_error: '',
                    description_error: '',
                    price_error: '',
                    cars_images: [],
                    cars_images_error: '',
                    file_cars_error: '',
                    mileage_error: '',
                    mark_error: '',
                    type_doc_error: '',
                    owner_count_error: '',
                    state_number_error: '',
                    year_graduation: '',
                    month_graduation: '',
                    error_graduation: '',
                    marks: [],
                    models: [],
                    marks_models: [],
                    years: [],
                    model_years: [],
                    body_types: [],
                    year_body_types: [],
                    gens: [],
                    engine_types: [],
                    drives: [],
                    transmissions: [],
                    horse_powers: [],
                    marka: '',
                    model: '',
                    year: '',
                    body_type: '',
                    gen: '',
                    engine_type: '',
                    drive: '',
                    transmission: '',
                    horse_power: '',
                    mileage: '',
                    gas_cylinder: '',
                    car_selected: false,
                    search_cars: '',
                    search_models: '',
                    search_years: '',
                    search_body_type: '',
                    search_gen: '',
                    search_engine_type: '',
                    search_drive: '',
                    search_transmission: '',
                    search_horse_power: '',
                    marks_success: [],
                    models_success: [],
                    when_car: '',
                    yyyy: '',
                    garant: false,
                    my_city: JSON.parse(localStorage.getItem("city")),
                }
            },
            beforeMount(){
                this.all();
            },
            methods: {
                all() {
                    var prom = this.cars_images
                    axios({
                        method: 'get',
                        url: '/all_img_cars',
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

                    axios({
                        method: 'get',
                        url: '/all_marka',
                        responseType: 'json',
                    })
                    .then(function (response) {
                        if(response.data != 0) {
                            this.marka = response.data['marka']
                            this.model = response.data['model']
                            this.year = response.data['year'],
                            this.body_type = response.data['body_type']
                            this.gen = response.data['gen']
                            this.engine_type = response.data['engine_type']
                            this.drive = response.data['drive']
                            this.transmission = response.data['transmission']
                            this.horse_power = response.data['horse_power']
                            this.mileage = response.data['mileage']
                            if(response.data['gas_cylinder'] == null) {
                                this.gas_cylinder = ''
                            } else {
                                this.gas_cylinder = response.data['gas_cylinder']
                            }
                            this.car_selected = true
                        }
                    }.bind(this))

                    var marks = this.marks
                    var marks_models = this.marks_models
                    var years = this.years
                    var body_types = this.body_types
                    $(function(){
                        $.getJSON("/base.json",function(data){
                            $.each(data,function(index, value){
                                if(value['cyrillic-name'] != undefined) {
                                    marks.push({
                                        marka: value['name'],
                                        rus_marka: value['cyrillic-name'],
                                        logo: value['logo'],
                                    })
                                } else {
                                    marks.push({
                                        marka: value['name'],
                                        rus_marka: '',
                                        logo: value['logo'],
                                    })
                                }
                                value['models'].forEach(function(elem) {
                                    marks_models.push({
                                        name: elem['name'],
                                        rus_model: elem['cyrillic-name'],
                                        marka: value['name'],
                                    })

                                    elem['generations'].forEach(function(gen) {
                                        gen['configurations'].forEach(function(con) {
                                            con['techList'].forEach(function(tech) {
                                                years.push({
                                                    year_from: gen['year-from'],
                                                    year_to: gen['year-to'],
                                                    gen: gen['name'],
                                                    id_gen: gen['id'],
                                                    model: elem['name'],
                                                    marka: value['name'],
                                                    body_type: con['body-type'],
                                                    engine_type: tech['engine-type'],
                                                    drive: tech['drive'],
                                                    transmission: tech['transmission'],
                                                    horse_power: tech['horse-power'],
                                                    tech_id: tech['id'],
                                                })
                                            })
                                        })  
                                    })
                                })
                            });
                        })
                    });
                    setTimeout(function() {
                        var today = new Date();
                        var yyyy = today.getFullYear();
                        this.yyyy = yyyy
                        this.when_car = Number(yyyy)-Number(this.year)+1
                    }.bind(this), 800)
                },
                add_cars() {
                    event.preventDefault();
                    if(this.state != '') {
                        if(this.description != '') {
                            if(this.car_selected == true) {
                                if(this.price != '') {
                                    if(this.cars_images.length != 0) {
                                        if(this.type_doc != '') {
                                            if(this.owner_count != '') {
                                                if(this.garant == false) {
                                                    if(this.state_number != '' || this.car_no_reg == true) {
                                                        this.state_number_error = ''
                                                        this.owner_count_error = ''
                                                        this.type_doc_error = ''
                                                        this.cars_images_error = ''
                                                        this.price_error = ''
                                                        this.mark_error = ''
                                                        this.description_error = ''
                                                        this.state_error = ''
        
                                                        var form_cars = new FormData($("#form_cars")[0]);
        
                                                        axios({
                                                            method: 'post',
                                                            url: '/add_cars',
                                                            responseType: 'json',
                                                            data: form_cars,
                                                        })
                                                        .then(function (response) {
                                                            window.location.href = '/cabinet'
                                                        })
                                                    } else {
                                                        this.state_number_error = 'Это поле обязательно'
                                                        this.owner_count_error = ''
                                                        this.type_doc_error = ''
                                                        this.cars_images_error = ''
                                                        this.mark_error = ''
                                                        this.price_error = ''
                                                        this.description_error = ''
                                                        this.state_error = ''
                                                    }
                                                } else {
                                                    if(this.year_graduation != '') {
                                                        if(this.month_graduation != '') {
                                                            if(this.state_number != '' || this.car_no_reg == true) {
                                                                this.state_number_error = ''
                                                                this.error_graduation = ''
                                                                this.owner_count_error = ''
                                                                this.type_doc_error = ''
                                                                this.cars_images_error = ''
                                                                this.price_error = ''
                                                                this.mark_error = ''
                                                                this.description_error = ''
                                                                this.state_error = ''
                
                                                                var form_cars = new FormData($("#form_cars")[0]);
                
                                                                axios({
                                                                    method: 'post',
                                                                    url: '/add_cars',
                                                                    responseType: 'json',
                                                                    data: form_cars,
                                                                })
                                                                .then(function (response) {
                                                                    window.location.href = '/cabinet'
                                                                })
                                                            } else {
                                                                this.state_number_error = 'Это поле обязательно'
                                                                this.error_graduation = ''
                                                                this.owner_count_error = ''
                                                                this.type_doc_error = ''
                                                                this.cars_images_error = ''
                                                                this.mark_error = ''
                                                                this.price_error = ''
                                                                this.description_error = ''
                                                                this.state_error = ''
                                                            }
                                                        } else {
                                                            this.error_graduation = 'Укажите месяц'
                                                            this.owner_count_error = ''
                                                            this.type_doc_error = ''
                                                            this.cars_images_error = ''
                                                            this.mark_error = ''
                                                            this.price_error = ''
                                                            this.description_error = ''
                                                            this.state_error = ''
                                                        }
                                                    } else {
                                                        this.error_graduation = 'Укажите год'
                                                        this.owner_count_error = ''
                                                        this.type_doc_error = ''
                                                        this.cars_images_error = ''
                                                        this.mark_error = ''
                                                        this.price_error = ''
                                                        this.description_error = ''
                                                        this.state_error = ''
                                                    }
                                                }
                                            } else {
                                                this.owner_count_error = 'Выберите один из пунктов'
                                                this.type_doc_error = ''
                                                this.cars_images_error = ''
                                                this.mark_error = ''
                                                this.price_error = ''
                                                this.description_error = ''
                                                this.state_error = ''
                                            }
                                        } else {
                                            this.type_doc_error = 'Укажите тип документа'
                                            this.cars_images_error = ''
                                            this.mark_error = ''
                                            this.price_error = ''
                                            this.description_error = ''
                                            this.state_error = ''
                                        }
                                    } else {
                                        this.cars_images_error = 'Добавьте фото'
                                        this.mark_error = ''
                                        this.price_error = ''
                                        this.description_error = ''
                                        this.state_error = ''
                                    }
                                } else {
                                    this.price_error = 'Это поле обязательно'
                                    this.mark_error = ''
                                    this.description_error = ''
                                    this.state_error = ''
                                }
                            } else {
                                this.mark_error = 'Укажите марку'
                                this.description_error = ''
                                this.state_error = ''
                            }
                        } else {
                            this.description_error = 'Это поле обязательно'
                            this.state_error = ''
                        }
                    } else {
                        this.state_error = 'Это поле обязательно'
                    }             
                },
                add_images_cars() {
                    event.preventDefault();
                    if(document.getElementById('file_cars').files.length != 0) {
                        if(this.cars_images.length <= 2) {
                            this.cars_images_error = ''
                            this.file_cars_error = ''
                            var form_add_image_cars = new FormData($("#form_add_image_cars")[0]);

                            var prom = this.cars_images
                            axios({
                                method: 'post',
                                url: '/img_add_cars',
                                responseType: 'json',
                                data: form_add_image_cars,
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(function (response) {
                                close_cars_image.click()
                                prom.push({
                                    id: response.data['id'],
                                    image: response.data['image'],
                                })
                                file_cars.value = "";
                            })
                        } else {
                            this.file_cars_error = 'Добавлено максимальное количество изображений'
                        }
                    } else {
                        this.file_cars_error = 'Вы не выбрали изображение'
                    }
                },
                delete_images_cars(id) {
                    var prom = this.cars_images
                    var e_item = prom[id]

                    axios({
                        method: 'get',
                        url: `/img_delete_cars/${e_item.id}`,
                        responseType: 'json',
                    })
                    .then(function (response) {
                        prom.splice(id, 1)
                    })
                },
                poisk_cars() {
                    if(this.models != 0) {
                        this.models = []
                        this.model = ''
                        this.model_years = []
                        this.search_models = ''
                        this.models_success = []
                        input_cars.classList.add('border-primary')
                        this.year = ''
                        this.search_years = ''
                        this.body_type = ''
                        this.search_body_type = ''
                        this.gens = []
                        this.gen = ''
                        this.search_gen = ''
                        this.engine_types = []
                        this.engine_type = ''
                        this.search_engine_type = ''
                        this.drive = ''
                        this.search_drive = ''
                        this.drives = []
                        this.transmission = ''
                        this.search_transmission = ''
                        this.transmissions = []
                        this.horse_powers = []
                        this.horse_power = ''
                        this.search_horse_power = ''
                    }
                    if(this.search_cars != '') {
                        this.marks_success = this.marks,
                        searchString = this.search_cars;

                        if(!searchString){
                            if(searchString != ''){
                                return marks_success;
                            }
                        }

                        searchString = searchString.trim().toLowerCase();
                        this.marks_success = this.marks_success.filter(function(item){
                            if(item.marka.toLowerCase().indexOf(searchString) !== -1){
                                return item;
                            } else
                            if(item.rus_marka.toLowerCase().indexOf(searchString) !== -1) {
                                return item;
                            }
                        })

                        return this.marks_success
                    } else {
                        this.marks_success = [];
                    }
                },
                choose_mark(marka) {
                    this.marka = marka
                    var models = this.models
                    this.marks_models.forEach(function(value){
                        if(marka == value['marka']) {
                            models.push({
                                name: value['name'],
                                rus_model: value['rus_model'],
                            })
                        }
                    });
                    input_cars.classList.remove('border-primary')
                    this.search_cars = marka
                },
                poisk_models() {
                    if(this.model != '') {
                        this.model = ''
                        this.model_years = []
                        this.year = ''
                        this.search_years = ''
                        input_models.classList.add('border-primary')
                        this.body_type = ''
                        this.search_body_type = ''
                        this.gens = []
                        this.gen = ''
                        this.search_gen = ''
                        this.engine_types = []
                        this.engine_type = ''
                        this.search_engine_type = ''
                        this.drive = ''
                        this.search_drive = ''
                        this.drives = []
                        this.transmission = ''
                        this.search_transmission = ''
                        this.transmissions = []
                        this.horse_powers = []
                        this.horse_power = ''
                        this.search_horse_power = ''
                    }
                    if(this.search_models != '') {
                        this.models_success = this.models,
                        searchString = this.search_models;

                        if(!searchString){
                            if(searchString != ''){
                                return models_success;
                            }
                        }

                        searchString = searchString.trim().toLowerCase();
                        this.models_success = this.models_success.filter(function(item){
                            if(item.name.toLowerCase().indexOf(searchString) !== -1){
                                return item;
                            }
                            if(item.rus_model.toLowerCase().indexOf(searchString) !== -1){
                                return item;
                            }
                        })

                        return this.models_success
                    } else {
                        this.models_success = [];
                    }
                },
                choose_model(model) {
                    this.model = model
                    marka = this.marka
                    var model_years = this.model_years
                    var mas_year_from = []
                    var mas_year_to = []
                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                mas_year_from.push(value['year_from'])
                                mas_year_to.push(value['year_to'])
                            }
                        }
                    });
                    if(mas_year_to[0] != 0) {
                        model_years.push({
                            year_from: Math.min.apply(null, mas_year_from),
                            year_to: Math.max.apply(null, mas_year_to),
                        })
                    } else {
                        model_years.push({
                            year_from: Math.min.apply(null, mas_year_from),
                            year_to: 2022,
                        })
                    }
                    input_models.classList.remove('border-primary')
                    this.search_models = model
                },
                choose_year(year) {
                    this.year_body_types = []
                    this.year = year
                    var body_type = this.body_type
                    var year_body_types = this.year_body_types
                    model = this.model
                    marka = this.marka
                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                if(value['year_to'] != 0) {
                                    if(value['year_from'] <= year && value['year_to'] >= year) {
                                        if(year_body_types.filter(item => item.body_type.match(value['body_type'])).length == 0) {
                                            year_body_types.push({
                                                body_type: value['body_type'],
                                            })
                                        }
                                    }
                                } else {
                                    if(value['year_from'] <= year && 2022 >= year) {
                                        if(year_body_types.filter(item => item.body_type.match(value['body_type'])).length == 0) {
                                            year_body_types.push({
                                                body_type: value['body_type'],
                                            })
                                        }
                                    }
                                }
                            }
                        }
                    });

                    setTimeout(function () {
                        if(year_body_types.length == 1) {
                            this.choose_body_type(year_body_types[0]['body_type'])
                        }
                    }.bind(this), 100)

                    input_year.classList.remove('border-primary')
                    this.search_years = year
                },
                close_years() {
                    this.year = ''
                    this.search_years = ''
                    this.body_type = ''
                    this.search_body_type = ''
                    this.gens = []
                    this.gen = ''
                    this.search_gen = ''
                    this.engine_types = []
                    this.engine_type = ''
                    this.search_engine_type = ''
                    this.drive = ''
                    this.search_drive = ''
                    this.drives = []
                    this.transmission = ''
                    this.search_transmission = ''
                    this.transmissions = []
                    this.horse_powers = []
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                choose_body_type(body_type) {
                    this.body_type = body_type
                    var gens = this.gens
                    model = this.model
                    marka = this.marka
                    year = this.year
                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                if(value['year_to'] != 0) {
                                    if(value['year_from'] <= year && value['year_to'] >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(gens.filter(item => item.id_gen.match(value['id_gen'])).length == 0) {
                                                if(value['gen'] != '') {
                                                    gens.push({
                                                        gen: value['gen'],
                                                        id_gen: value['id_gen'],
                                                    })
                                                } else {
                                                    gens.push({
                                                        gen: `${value['year_from']}-${value['year_to']}`,
                                                        id_gen: value['id_gen'],
                                                    })
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if(value['year_from'] <= year && 2022 >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(gens.filter(item => item.id_gen.match(value['id_gen'])).length == 0) {
                                                if(value['gen'] != '') {
                                                    gens.push({
                                                        gen: value['gen'],
                                                        id_gen: value['id_gen'],
                                                    })
                                                } else {
                                                    gens.push({
                                                        gen: `${value['year_from']}-${value['year_to']}`,
                                                        id_gen: value['id_gen'],
                                                    })
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });

                    this.search_body_type = body_type

                    setTimeout(function () {
                        if(gens.length == 1) {
                            this.choose_gen(gens[0]['gen'])
                        }
                    }.bind(this), 100)

                    if(this.year_body_types.length == 1) {
                        setTimeout(function() {
                            input_body_type.classList.remove('border-primary')
                        }, 100)
                    } else {
                        input_body_type.classList.remove('border-primary')
                    }
                },
                close_body_type() {
                    this.body_type = ''
                    this.search_body_type = ''
                    this.gens = []
                    this.gen = ''
                    this.search_gen = ''
                    this.engine_types = []
                    this.engine_type = ''
                    this.search_engine_type = ''
                    this.drive = ''
                    this.search_drive = ''
                    this.drives = []
                    this.transmission = ''
                    this.search_transmission = ''
                    this.transmissions = []
                    this.horse_powers = []
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                choose_gen(gen) {
                    this.gen = gen
                    var gens = this.gens
                    model = this.model
                    marka = this.marka
                    year = this.year
                    body_type = this.body_type
                    engine_types = this.engine_types
                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                if(value['year_to'] != 0) {
                                    if(value['year_from'] <= year && value['year_to'] >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(engine_types.filter(item => item.engine_type.match(value['engine_type'])).length == 0) {
                                                    engine_types.push({
                                                        engine_type: value['engine_type'],
                                                    })
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if(value['year_from'] <= year && 2022 >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(engine_types.filter(item => item.engine_type.match(value['engine_type'])).length == 0) {
                                                    engine_types.push({
                                                        engine_type: value['engine_type'],
                                                    })
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });

                    this.search_gen = gen

                    setTimeout(function () {
                        if(engine_types.length == 1) {
                            this.choose_engine_type(engine_types[0]['engine_type'])
                        }
                    }.bind(this), 100)

                    if(this.gens.length == 1) {
                        setTimeout(function() {
                            input_gen.classList.remove('border-primary')
                        }, 100)
                    } else {
                        input_gen.classList.remove('border-primary')
                    }
                },
                choose_engine_type(engine_type) {
                    this.engine_type = engine_type
                    model = this.model
                    marka = this.marka
                    year = this.year
                    body_type = this.body_type
                    gen = this.gen
                    drives = this.drives

                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                if(value['year_to'] != 0) {
                                    if(value['year_from'] <= year && value['year_to'] >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(value['engine_type'] == engine_type) {
                                                    if(drives.filter(item => item.drive.match(value['drive'])).length == 0) {
                                                        drives.push({
                                                            drive: value['drive'],
                                                        })
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if(value['year_from'] <= year && 2022 >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(value['engine_type'] == engine_type) {
                                                    if(drives.filter(item => item.drive.match(value['drive'])).length == 0) {
                                                        drives.push({
                                                            drive: value['drive'],
                                                        })
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });

                    this.search_engine_type = engine_type

                    setTimeout(function () {
                        if(drives.length == 1) {
                            this.choose_drive(drives[0]['drive'])
                        }
                    }.bind(this), 100)

                    if(this.engine_types.length == 1) {
                        setTimeout(function() {
                            input_engine_type.classList.remove('border-primary')
                        }, 100)
                    } else {
                        input_engine_type.classList.remove('border-primary')
                    }
                },
                close_gen() {
                    this.gen = ''
                    this.search_gen = ''
                    this.engine_types = []
                    this.engine_type = ''
                    this.search_engine_type = ''
                    this.drive = ''
                    this.search_drive = ''
                    this.drives = []
                    this.transmission = ''
                    this.search_transmission = ''
                    this.transmissions = []
                    this.horse_powers = []
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                choose_drive(drive) {
                    this.drive = drive
                    model = this.model
                    marka = this.marka
                    year = this.year
                    body_type = this.body_type
                    gen = this.gen
                    engine_type = this.engine_type
                    drive = this.drive
                    transmissions = this.transmissions

                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                if(value['year_to'] != 0) {
                                    if(value['year_from'] <= year && value['year_to'] >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(value['engine_type'] == engine_type) {
                                                    if(value['drive'] == drive) {
                                                        if(transmissions.filter(item => item.transmission.match(value['transmission'])).length == 0) {
                                                            transmissions.push({
                                                                transmission: value['transmission'],
                                                            })
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if(value['year_from'] <= year && 2022 >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(value['engine_type'] == engine_type) {
                                                    if(value['drive'] == drive) {
                                                        if(transmissions.filter(item => item.transmission.match(value['transmission'])).length == 0) {
                                                            transmissions.push({
                                                                transmission: value['transmission'],
                                                            })
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });

                    this.search_drive = drive

                    setTimeout(function () {
                        if(transmissions.length == 1) {
                            this.choose_transmission(transmissions[0]['transmission'])
                        }
                    }.bind(this), 100)

                    if(this.drives.length == 1) {
                        setTimeout(function() {
                            input_drive.classList.remove('border-primary')
                        }, 100)
                    } else {
                        input_drive.classList.remove('border-primary')
                    }
                },
                close_engine_type() {
                    this.engine_type = ''
                    this.search_engine_type = ''
                    this.drive = ''
                    this.search_drive = ''
                    this.drives = []
                    this.transmission = ''
                    this.search_transmission = ''
                    this.transmissions = []
                    this.horse_powers = []
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                choose_transmission(transmission) {
                    this.transmission = transmission
                    model = this.model
                    marka = this.marka
                    year = this.year
                    body_type = this.body_type
                    gen = this.gen
                    engine_type = this.engine_type
                    drive = this.drive
                    transmission = this.transmission
                    horse_powers = this.horse_powers

                    this.years.forEach(function(value){
                        if(value['marka'] == marka) {
                            if(value['model'] == model) {
                                if(value['year_to'] != 0) {
                                    if(value['year_from'] <= year && value['year_to'] >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(value['engine_type'] == engine_type) {
                                                    if(value['drive'] == drive) {
                                                        if(value['transmission'] == transmission) {
                                                            if(horse_powers.filter(item => item.tech_id.match(value['tech_id'])).length == 0) {
                                                                horse_powers.push({
                                                                    horse_power: `${value['horse_power']} л.с`,
                                                                    tech_id: value['tech_id'],
                                                                })
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if(value['year_from'] <= year && 2022 >= year) {
                                        if(value['body_type'] == body_type) {
                                            if(value['gen'] == gen || `${value['year_from']}-${value['year_to']}` == gen) {
                                                if(value['engine_type'] == engine_type) {
                                                    if(value['drive'] == drive) {
                                                        if(value['transmission'] == transmission) {
                                                            if(horse_powers.filter(item => item.tech_id.match(value['tech_id'])).length == 0) {
                                                                horse_powers.push({
                                                                    horse_power: `${value['horse_power']} л.с`,
                                                                    tech_id: value['tech_id'],
                                                                })
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });

                    this.search_transmission = transmission

                    setTimeout(function () {
                        if(horse_powers.length == 1) {
                            this.choose_horse_power(horse_powers[0]['horse_power'])
                        }
                    }.bind(this), 100)

                    if(this.transmission.length == 1) {
                        setTimeout(function() {
                            input_transmission.classList.remove('border-primary')
                        }, 100)
                    } else {
                        input_transmission.classList.remove('border-primary')
                    }
                },
                choose_horse_power(horse_power) {
                    this.horse_power = horse_power

                    if(this.horse_powers.length == 1) {
                        setTimeout(function() {
                            input_horse_power.classList.remove('border-primary')
                        }, 100)
                    } else {
                        input_horse_power.classList.remove('border-primary')
                    }
                    this.search_horse_power = horse_power
                },
                close_transmission() {
                    this.transmission = ''
                    this.search_transmission = ''
                    this.horse_powers = []
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                close_horse_power() {
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                close_drive() {
                    this.drive = ''
                    this.search_drive = ''
                    this.transmission = ''
                    this.search_transmission = ''
                    this.transmissions = []
                    this.horse_powers = []
                    this.horse_power = ''
                    this.search_horse_power = ''
                },
                save_mark() {
                    if(this.mileage != '') {
                        this.mileage_error = ''
                        axios({
                            method: 'post',
                            url: '/add_marka',
                            responseType: 'json',
                            data: {
                                marka: this.marka,
                                model: this.model,
                                year: this.year,
                                body_type: this.body_type,
                                gen: this.gen,
                                engine_type: this.engine_type,
                                drive: this.drive,
                                transmission: this.transmission,
                                horse_power: this.horse_power,
                                mileage: this.mileage,
                                gas_cylinder: this.gas_cylinder,
                            },
                        })
                        .then(function (response) {
                        })

                        this.car_selected = true
                    } else {
                        this.mileage_error = 'Укажите пробег'
                    }
                },
                car_no_register() {
                    if(this.car_no_reg == false) {
                        this.car_no_reg == true
                    } else {
                        this.car_no_reg == false
                    }
                },
                change_mark() {
                    this.marka = ''
                    this.model = ''
                    this.year = ''
                    this.body_type = ''
                    this.gen = ''
                    this.engine_type = ''
                    this.drive = ''
                    this.transmission = ''
                    this.horse_power = ''
                    this.mileage = ''
                    this.gas_cylinder = ''
                    this.car_selected = false
                    this.search_cars = ''
                    this.search_models = ''
                    this.search_years = ''
                    this.search_body_type = ''
                    this.search_gen = ''
                    this.search_engine_type = ''
                    this.search_drive = ''
                    this.search_transmission = ''
                    this.search_horse_power = ''
                    axios({
                        method: 'get',
                        url: '/delete_marka',
                        responseType: 'json',
                        data: form_cars,
                    })
                    .then(function (response) {
                        alert('Получилось')
                    })
                },
                check_garant() {
                    if(this.garant == false) {
                        this.garant = true
                    } else {
                        this.garant = false
                    }
                }
            }
        }
        Vue.createApp(AddCars).mount('#addcars')
    </script>
@endsection