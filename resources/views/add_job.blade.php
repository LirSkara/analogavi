@extends('layout')
@section('title')
    Khalif - Добавление недвижимости
@endsection
@section('content')
    
    <div class="container" id="addjob">
        <div v-if="type_job == ''" style="width: 350px;" class="mx-auto shadow px-5 py-4 bg-light">
            <div v-if="job == ''" class="d-flex flex-column">
                <h1 class="fs-3 pb-3">Работа</h1>
                <button v-on:click="choose_job('Резюме')" class="btn btn-outline-primary w-100 mb-2">Резюме</button>
                <button v-on:click="choose_job('Вакансии')" class="btn btn-outline-primary w-100 mb-2">Вакансии</button>
            </div>
            <div v-if="job != ''" class="d-flex flex-column">
                <div class="d-flex mb-3">
                    <button v-on:click="del_job()" class="btn border-0 py-0"><i class="bi bi-arrow-left"></i></button>
                    <h1 class="fs-3">@{{job}}</h1>
                </div>
                <button v-on:click="choose_type_job('IT, интернет, телеком')" class="btn btn-outline-primary w-100 mb-2">IT, интернет, телеком</button>
                <button v-on:click="choose_type_job('Автомобильный бизнес')" class="btn btn-outline-primary w-100 mb-2">Автомобильный бизнес</button>
                <button v-on:click="choose_type_job('Административная работа')" class="btn btn-outline-primary w-100 mb-2">Административная работа</button>
                <button v-on:click="choose_type_job('Банки, инвестиции')" class="btn btn-outline-primary w-100 mb-2">Банки, инвестиции</button>
                <button v-on:click="choose_type_job('Без опыта, студенты')" class="btn btn-outline-primary w-100 mb-2">Без опыта, студенты</button>
                <button v-on:click="choose_type_job('Бухгалтерия, финансы')" class="btn btn-outline-primary w-100 mb-2">Бухгалтерия, финансы</button>
                <button v-on:click="choose_type_job('Высший менеджмент')" class="btn btn-outline-primary w-100 mb-2">Высший менеджмент</button>
                <button v-on:click="choose_type_job('Госслужба, НКО')" class="btn btn-outline-primary w-100 mb-2">Госслужба, НКО</button>
                <button v-on:click="choose_type_job('Домашний персонал')" class="btn btn-outline-primary w-100 mb-2">Домашний персонал</button>
                <button v-on:click="choose_type_job('ЖКХ, эксплуатация')" class="btn btn-outline-primary w-100 mb-2">ЖКХ, эксплуатация</button>
                <button v-on:click="choose_type_job('Искусство, развлечения')" class="btn btn-outline-primary w-100 mb-2">Искусство, развлечения</button>
                <button v-on:click="choose_type_job('Консультирование')" class="btn btn-outline-primary w-100 mb-2">Консультирование</button>
                <button v-on:click="choose_type_job('Курьерская доставка')" class="btn btn-outline-primary w-100 mb-2">Курьерская доставка</button>
                <button v-on:click="choose_type_job('Маркетинг, реклама, PR')" class="btn btn-outline-primary w-100 mb-2">Маркетинг, реклама, PR</button>
                <button v-on:click="choose_type_job('Медицина, фармацевтика')" class="btn btn-outline-primary w-100 mb-2">Медицина, фармацевтика</button>
                <button v-on:click="choose_type_job('Образование, наука')" class="btn btn-outline-primary w-100 mb-2">Образование, наука</button>
                <button v-on:click="choose_type_job('Охрана, безопасность')" class="btn btn-outline-primary w-100 mb-2">Охрана, безопасность</button>
                <button v-on:click="choose_type_job('Продажи')" class="btn btn-outline-primary w-100 mb-2">Продажи</button>
                <button v-on:click="choose_type_job('Производство, сырьё, с/х')" class="btn btn-outline-primary w-100 mb-2">Производство, сырьё, с/х</button>
                <button v-on:click="choose_type_job('Страхование')" class="btn btn-outline-primary w-100 mb-2">Страхование</button>
                <button v-on:click="choose_type_job('Строительство')" class="btn btn-outline-primary w-100 mb-2">Строительство</button>
                <button v-on:click="choose_type_job('Такси')" class="btn btn-outline-primary w-100 mb-2">Такси</button>
                <button v-on:click="choose_type_job('Транспорт, логистика')" class="btn btn-outline-primary w-100 mb-2">Транспорт, логистика</button>
                <button v-on:click="choose_type_job('Туризм, рестораны')" class="btn btn-outline-primary w-100 mb-2">Туризм, рестораны</button>
                <button v-on:click="choose_type_job('Управление персоналом')" class="btn btn-outline-primary w-100 mb-2">Управление персоналом</button>
                <button v-on:click="choose_type_job('Фитнес, салоны красоты')" class="btn btn-outline-primary w-100 mb-2">Фитнес, салоны красоты</button>
                <button v-on:click="choose_type_job('Юриспруденция')" class="btn btn-outline-primary w-100 mb-2">Юриспруденция</button>
            </div>
        </div>
        <div v-if="type_job != ''">
            <div class="d-flex-tel-job">
                <h2 class="width-blocks">Категория</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-1">
                        <li class="breadcrumb-item fs-category"><a href="#" v-on:click="back_category()" class="text-decoration-none">@{{job}}</a></li>
                        <li class="breadcrumb-item active fs-category" aria-current="page">@{{type_job}}</li>
                    </ol>
                </nav>
            </div>
            <div v-if="job == 'Резюме'" class="d-flex flex-column">
                <h2>Параметры</h2>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Желаемая должность</label>
                    <div class="mt-0">
                        <input type="text" class="form-control" v-model="desired_position" aria-describedby="passwordHelpInline">
                        <div class="text-muted" v-if="desired_position_error == ''">Например, «Главный бухгалтер» или «Мастер отделочных работ»</div>
                        <div class="text-danger">@{{desired_position_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">График работы</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="work_schedule" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Вихтовый метод">Вихтовый метод</option>
                                <option value="Неполный день">Неполный день</option>
                                <option value="Полный день">Полный день</option>
                                <option value="Свободный график">Свободный график</option>
                                <option value="Сменный график">Сменный график</option>
                                <option value="Удалённая работа">Удалённая работа</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{work_schedule_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Стаж работы</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="work_experience" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Без опыта">Без опыта</option>
                                <option value="1 год">1 год</option>
                                <option value="2 года">2 года</option>
                                <option value="3 года">3 года</option>
                                <option value="4 года">4 года</option>
                                <option value="5 лет">5 лет</option>
                                <option value="6 лет">6 лет</option>
                                <option value="7 лет">7 лет</option>
                                <option value="8 лет">8 лет</option>
                                <option value="9 лет">9 лет</option>
                                <option value="10 лет">10 лет</option>
                                <option value="11 лет">11 лет</option>
                                <option value="12 лет">12 лет</option>
                                <option value="13 лет">13 лет</option>
                                <option value="14 лет">14 лет</option>
                                <option value="15 лет">15 лет</option>
                                <option value="16 лет">16 лет</option>
                                <option value="17 лет">17 лет</option>
                                <option value="18 лет">18 лет</option>
                                <option value="19 лет">19 лет</option>
                                <option value="20 лет">20 лет</option>
                                <option value="21 лет">21 лет</option>
                                <option value="22 лет">22 лет</option>
                                <option value="23 лет">23 лет</option>
                                <option value="24 лет">24 лет</option>
                                <option value="25 лет">25 лет</option>
                                <option value="26 лет">26 лет</option>
                                <option value="27 лет">27 лет</option>
                                <option value="28 лет">28 лет</option>
                                <option value="29 лет">29 лет</option>
                                <option value="30 лет">30 лет</option>
                                <option value="31 лет">31 лет</option>
                                <option value="32 лет">32 лет</option>
                                <option value="33 лет">33 лет</option>
                                <option value="34 лет">34 лет</option>
                                <option value="35 лет">35 лет</option>
                                <option value="36 лет">36 лет</option>
                                <option value="37 лет">37 лет</option>
                                <option value="38 лет">38 лет</option>
                                <option value="39 лет">39 лет</option>
                                <option value="40 лет">40 лет</option>
                                <option value="41 лет">41 лет</option>
                                <option value="42 лет">42 лет</option>
                                <option value="43 лет">43 лет</option>
                                <option value="44 лет">44 лет</option>
                                <option value="45 лет">45 лет</option>
                                <option value="46 лет">46 лет</option>
                                <option value="47 лет">47 лет</option>
                                <option value="48 лет">48 лет</option>
                                <option value="49 лет">49 лет</option>
                                <option value="50 лет">50 лет</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Образование</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="education" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Высшее">Высшее</option>
                                <option value="Незаконченное высшее">Незаконченное высшее</option>
                                <option value="Среднее">Среднее</option>
                                <option value="Среднее специальное">Среднее специальное</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Пол</label>
                    <div class="d-flex flex-column">
                        <div class="mt-0 d-flex">
                            <input type="radio" class="btn-check" value="Мужской" id="gender1" v-model="gender" autocomplete="off">
                            <label class="btn btn-outline-secondary border-right-none" for="gender1">Мужской</label>
                            <input type="radio" class="btn-check" value="Женский" id="gender2" v-model="gender" autocomplete="off">
                            <label class="btn btn-outline-secondary border-left-none" for="gender2">Женский</label>
                        </div>
                        <div class="text-danger">@{{gender_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Дата рождения</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="day_birth" class="form-select form-select-lg me-2" aria-label=".form-select-lg example">
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
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select v-model="month_birth" class="form-select form-select-lg me-2" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
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
                            <select v-model="year_birth" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option v-for="item in 100" value="year-item">@{{year-item}}</option>
                            </select>
                        </div>
                        <div class="text-danger"></div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Готовность к командировкам</label>
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" value="Не готов" id="read_trips1" v-model="read_trips" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="read_trips1">Не готов</label>
                        <input type="radio" class="btn-check" value="Готов" id="read_trips2" v-model="read_trips" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none border-right-none" for="read_trips2">Готов</label>
                        <input type="radio" class="btn-check" value="Иногда" id="read_trips3" v-model="read_trips" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="read_trips3">Иногда</label>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Переезд</label>
                    <div class="mt-0 d-flex">
                        <input type="radio" class="btn-check" value="Невозможен" id="move1" v-model="move" autocomplete="off">
                        <label class="btn btn-outline-secondary border-right-none" for="move1">Невозможен</label>
                        <input type="radio" class="btn-check" value="Возможен" id="move2" v-model="move" autocomplete="off">
                        <label class="btn btn-outline-secondary border-left-none" for="move2">Возможен</label>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-4"> 
                    <label class="col-form-label width-blocks">Гражданство</label>
                    <div class="mt-0 d-flex flex-column">
                        <input type="text" id="name" v-model="citizenship" class="form-control" aria-describedby="passwordHelpInline">
                        <div class="text-danger">@{{citizenship_error}}</div>
                    </div>
                </div>
                <h2>Укажите дополнительные параметры и опции</h2>
                <span>Выберите, чем занимаетесь. Укажите стоимость, чтобы клиенты видели объявление в поиске по цене.</span>
                <div class="d-flex flex-column border border-1 p-4 mt-2 mb-2 w-700">
                    <div class="d-flex-tel-job mb-4">
                        <label class="col-form-label">Название компании</label>
                        <div class="mt-0 w-job">
                            <input type="text" id="name" v-model="company_name" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="d-flex-tel-job mb-4">
                        <label class="col-form-label">Должность</label>
                        <div class="mt-0 w-job">
                            <input type="text" id="name" v-model="post" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="d-flex-tel-job mb-2">
                        <label class="col-form-label">Начало работы</label>
                        <div class="d-flex flex-column mb-3 w-job">
                            <div class="mt-0 d-flex">
                                <select v-model="month_getting_started" class="form-select me-2" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
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
                                <select v-model="year_getting_started" class="form-select" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
                                    <option v-for="item in 60" value="year-item">@{{year-item}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex-tel-job mb-2">
                        <label class="col-form-label">Окончание работы</label>
                        <div class="d-flex flex-column mb-3 w-job">
                            <div class="mt-0 d-flex align-items-center">
                                <select v-model="month_end_work" class="form-select me-2" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
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
                                <select v-model="year_end_work" class="form-select me-2" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
                                    <option v-for="item in 60" value="year-item">@{{year-item}}</option>
                                </select>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="По настоящее время" v-model="until_now" id="defaultCheck1">
                                    <label class="form-check-label small" style="width: 140px;" for="defaultCheck1">
                                        По настоящее время
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex-tel-job">
                        <label class="col-form-label">Обязанности</label>
                        <div class="d-flex flex-column w-job">
                            <div class="form-floating">
                                <textarea class="form-control" v-model="responsibilities" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <span>Учебные заведения</span>
                <div class="d-flex flex-column border border-1 p-4 mt-2 mb-2 w-700">
                    <div class="d-flex-tel-job mb-4">
                        <label class="col-form-label">Название заведения</label>
                        <div class="mt-0 w-job">
                            <input type="text" id="name" class="form-control" v-model="name_institution" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="d-flex-tel-job mb-4">
                        <label class="col-form-label">Специальность</label>
                        <div class="mt-0 w-job">
                            <input type="text" id="name" class="form-control" v-model="specialization" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="d-flex-tel-job mb-2">
                        <label class="col-form-label">Год окончания</label>
                        <div class="d-flex flex-column mb-3 w-job">
                            <div class="mt-0 d-flex align-items-center">
                                <select v-model="year_graduation" class="form-select me-2" aria-label=".form-select-lg example">
                                    <option value="" selected disabled></option>
                                    <option v-for="item in 60" value="5+year-item">@{{5+year-item}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2 w-700">
                    <label class="col-form-label width-blocks">Знание языков</label>
                    <div class="form-floating w-423">
                        <textarea class="form-control" v-model="knowledge_languages" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Пишите языки через запятую</label>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2 w-700">
                    <label class="col-form-label width-blocks">О себе</label>
                    <div class="d-flex flex-column">
                        <div class="form-floating w-423">
                            <textarea class="form-control" v-model="description" placeholder="Чтобы побудить работодателя пригласить именно вас, укажите свои деловые качества и профессиональные навыки. Расскажите про ваши достижения. Напишите, чем вы можете быть полезны компании на этой должности" style="height: 120px"></textarea>
                        </div>
                        <div class="text-danger">@{{description_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Зарплата</label>
                    <div class="mt-0 me-auto">
                        <input type="text" v-model="price" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <h2>Фотографии</h2>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label class="col-form-label">Фотографии <span class="text-muted small">(Максимум
                                5)</span></label>
                    </div>
                    <div class="col-auto mt-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addimage"><span>+</span> Добавить фото</button>
                        <div class="mt-3">
                            <span v-for="(item, id) in images" key="id" style="width:100px;display:inline-block;">
                                <img width="100"
                                    :src="'/storage/jobs_image/{{auth()->user()->id}}/' + item.image"
                                    alt="">
                                <span class="bg-danger pt-2 text-white px-1" style="position: relative;bottom:28px;cursor:pointer;" v-on:click="delete_images_job(id)"><i class="material-icons">delete</i></span>
                            </span>
                        </div>
                    </div>
                </div>
                <h2>Место, рядом с которым вы хотите работать</h2>
                <input type="text" v-model="adres" class="form-control mt-2 w-700" aria-describedby="passwordHelpInline" placeholder="Введите адрес">
                <div class="text-danger mb-2">@{{adres_error}}</div>
                <h2>Контакты</h2>
                <div class="d-flex-tel mb-2">
                    <span for="name" class="col-form-label pt-0 width-blocks">Номер телефона</span>
                    <div class="mt-0 d-flex">
                        <span class="fw-bold">{{auth()->user()->tel}}</span>
                    </div>
                </div>
                <button class="btn btn-primary w-700 mt-3" v-on:click="add_job">Опубликовать</button>
            </div>
            <div v-if="job == 'Вакансии'" class="d-flex flex-column">
                <h2>Параметры</h2>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Название объявления</label>
                    <div class="mt-0">
                        <input type="text" class="form-control" v-model="desired_position" aria-describedby="passwordHelpInline">
                        <div class="text-muted" v-if="desired_position_error == ''">Например, «Продавец-консультант в магазин одежды» или «Водитель такси».</div>
                        <div class="text-danger">@{{desired_position_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">График работы</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="work_schedule" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Вихтовый метод">Вихтовый метод</option>
                                <option value="Неполный день">Неполный день</option>
                                <option value="Полный день">Полный день</option>
                                <option value="Свободный график">Свободный график</option>
                                <option value="Сменный график">Сменный график</option>
                                <option value="Удалённая работа">Удалённая работа</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{work_schedule_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Зарплата</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex w-423">
                            <input type="text" class="form-control border-right-none" v-model="from_price" placeholder="От" aria-describedby="passwordHelpInline">
                            <input type="text" class="form-control border-left-none border-right-none" v-model="before_price" placeholder="До" aria-describedby="passwordHelpInline">
                            <select class="form-select form-select-lg border-left-none" v-model="when_price" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="в месяц">В месяц</option>
                                <option value="в неделю">В неделю</option>
                                <option value="за смену">За смену</option>
                                <option value="за час">За час</option>
                                <option value="сдельная оплата">Сдельная оплата</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-2">
                    <label class="col-form-label width-blocks">Частота выплат</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="frequency_payments" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Почасовая оплата">Почасовая оплата</option>
                                <option value="Каждый день">Каждый день</option>
                                <option value="Дважды в месяц">Дважды в месяц</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex-tel-job mb-4">
                    <label class="col-form-label width-blocks">Где предстоит работать</label>
                    <div class="mt-0">
                        <input type="text" class="form-control" v-model="where_work" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="d-flex-tel-job mb-4 w-700">
                    <label class="col-form-label width-blocks">Описание вакансии и компании</label>
                    <div class="d-flex flex-column">
                        <div class="form-floating w-423">
                            <textarea class="form-control" v-model="description" placeholder="Чтобы побудить работодателя пригласить именно вас, укажите свои деловые качества и профессиональные навыки. Расскажите про ваши достижения. Напишите, чем вы можете быть полезны компании на этой должности" style="height: 120px"></textarea>
                        </div>
                        <div class="text-danger">@{{description_error}}</div>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-4">
                    <div class="col-12 col-lg-4 mt-0">
                        <label class="col-form-label">Логотип или фотография <span class="text-muted small">(Максимум
                                5)</span></label>
                    </div>
                    <div class="col-auto mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addimage"><span>+</span> Добавить фото</button>
                        <div class="mt-3">
                            <span v-for="(item, id) in images" key="id" style="width:100px;display:inline-block;">
                                <img width="100"
                                    :src="'/storage/jobs_image/{{auth()->user()->id}}/' + item.image"
                                    alt="">
                                <span class="bg-danger pt-2 text-white px-1" style="position: relative;bottom:28px;cursor:pointer;" v-on:click="delete_images_job(id)"><i class="material-icons">delete</i></span>
                            </span>
                        </div>
                    </div>
                </div>
                <h2>Место работы</h2>
                <input type="text" v-model="adres" class="form-control mt-2 w-700" aria-describedby="passwordHelpInline" placeholder="Введите адрес">
                <div class="text-danger mb-3">@{{adres_error}}</div>
                <h2>Требования к кандидату</h2>
                <div class="d-flex-tel-job mb-2 mt-2">
                    <label class="col-form-label width-blocks">Опыт работы</label>
                    <div class="d-flex flex-column mb-3">
                        <div class="mt-0 d-flex">
                            <select v-model="work_experience" class="form-select form-select-lg" aria-label=".form-select-lg example">
                                <option value="" selected disabled></option>
                                <option value="Не имеет значения">Не имеет значения</option>
                                <option value="Более 1 года">Более 1 года</option>
                                <option value="Более 3 лет">Более 3 лет</option>
                                <option value="Более 5 лет">Более 5 лет</option>
                                <option value="Более 10 лет">Более 10 лет</option>
                            </select>
                        </div>
                        <div class="text-danger">@{{work_experience_error}}</div>
                    </div>
                </div>
                <div class="d-flex-tel mb-3 mt-1">
                    <label for="name" class="col-form-label width-blocks">В том числе для кандидатов</label>
                    <div class="mt-0 d-flex flex-column">
                        <div>
                            <input class="form-check-input me-2 mb-2" type="checkbox" v-model="over_years_old" id="over_years_old" aria-label="...">
                            <span>Старше 45 лет</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2 mb-2" type="checkbox" v-model="from_years_old" id="from_years_old" aria-label="...">
                            <span>От 14 лет</span>
                        </div>
                        <div>
                            <input class="form-check-input me-2" type="checkbox" v-model="with_violation_health" id="with_violation_health" aria-label="...">
                            <span>С нарушениями здоровья</span>
                        </div>
                    </div>
                </div>
                <h2>Контакты</h2>
                <div class="d-flex-tel mb-2">
                    <span for="name" class="col-form-label pt-0 width-blocks">Номер телефона</span>
                    <div class="mt-0 d-flex">
                        <span class="fw-bold">{{auth()->user()->tel}}</span>
                    </div>
                </div>
                <button class="btn btn-primary w-700 mt-3" v-on:click="add_job">Опубликовать</button>
            </div>
        </div>

          <!-- Начало модального окна добавления фото -->
          <div class="modal fade" id="addimage" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Выберите изображение</h5>
                        <button type="button" id="close_job_image" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form id="form_add_image_job">
                    @csrf
                        <div class="modal-body">
                            <input type="file" name="image" id="file_job" class="w-100">
                            <div class="text-danger">@{{file_job_error}}</div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" v-on:click="add_images_job()">Загрузить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Конец модального окна добавления фото -->

    </div>

    <script>
        const AddJob = {
            data() {
                return {
                    job: '',
                    type_job: '',
                    year: '',
                    desired_position: '',
                    work_schedule: '',
                    work_experience: '',
                    education: '',
                    gender: '',
                    day_birth: '',
                    month_birth: '',
                    year_birth: '',
                    read_trips: '',
                    move: '',
                    citizenship: '',
                    company_name: '',
                    post: '',
                    month_getting_started: '',
                    year_getting_started: '',
                    month_end_work: '',
                    year_end_work: '',
                    until_now: '',
                    responsibilities: '',
                    name_institution: '',
                    specialization: '',
                    year_graduation: '',
                    knowledge_languages: '',
                    description: '',
                    price: '',
                    adres: '',
                    desired_position_error: '',
                    work_schedule_error: '',
                    gender_eror: '',
                    citizenship_error: '',
                    description_error: '',
                    adres_error: '',
                    images: [],
                    images_error: '',
                    file_job_error: '',
                    from_price: '',
                    before_price: '',
                    when_price: '',
                    frequency_payments: '',
                    where_work: '',
                    over_years_old: '',
                    from_years_old: '',
                    with_violation_health: '',
                    my_city: JSON.parse(localStorage.getItem("city")),
                }
            },
            beforeMount() {
                this.all();
            },
            methods: {
                all() {
                    this.year = new Date().getFullYear();
                    var prom = this.images
                    axios({
                        method: 'get',
                        url: '/all_img_job',
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
                choose_job(job) {
                    this.job = job
                },
                choose_type_job(type_job) {
                    this.type_job = type_job
                },
                del_job() {
                    this.job = ''
                },
                back_category() {
                    this.type_job = ''
                },
                add_job() {
                    if(this.job == 'Резюме') {
                        if(this.desired_position != '') {
                            if(this.work_schedule != '') {
                                if(this.gender != '') {
                                    if(this.citizenship != '') {
                                        if(this.description != '') {
                                            if(this.adres != '') {
                                                this.adres_error = ''
                                                this.description_error = ''
                                                this.citizenship_error = ''
                                                this.gender_error = ''
                                                this.work_schedule_error = ''
                                                this.desired_position_error = ''
    
                                                axios({
                                                    method: 'post',
                                                    url: '/add_job_resume',
                                                    responseType: 'json',
                                                    data: {
                                                        type_job: this.type_job,
                                                        desired_position: this.desired_position,
                                                        work_schedule: this.work_schedule,
                                                        work_experience: this.work_experience,
                                                        education: this.education,
                                                        gender: this.gender,
                                                        day_birth: this.day_birth,
                                                        month_birth: this.month_birth,
                                                        year_birth: this.year_birth,
                                                        read_trips: this.read_trips,
                                                        move: this.move,
                                                        citizenship: this.citizenship,
                                                        company_name: this.company_name,
                                                        post: this.post,
                                                        month_getting_started: this.month_getting_started,
                                                        year_getting_started: this.year_getting_started,
                                                        month_end_work: this.month_end_work,
                                                        year_end_work: this.year_end_work,
                                                        until_now: this.until_now,
                                                        responsibilities: this.responsibilities,
                                                        name_institution: this.name_institution,
                                                        specialization: this.specialization,
                                                        year_graduation: this.year_graduation,
                                                        knowledge_languages: this.knowledge_languages,
                                                        description: this.description,
                                                        price: this.price,
                                                        adres: this.adres,
                                                        city: this.my_city,
                                                    },
                                                })
                                                .then(function (response) {
                                                    window.location.href = '/cabinet'
                                                })
                                            } else {
                                                this.adres_error = 'Введите значение параметра'
                                                this.description_error = ''
                                                this.citizenship_error = ''
                                                this.gender_error = ''
                                                this.work_schedule_error = ''
                                                this.desired_position_error = ''
                                            }
                                        } else {
                                            this.description_error = 'Пожалуйста, заполните описание'
                                            this.citizenship_error = ''
                                            this.gender_error = ''
                                            this.work_schedule_error = ''
                                            this.desired_position_error = ''
                                        }
                                    } else {
                                        this.citizenship_error = 'Укажите гражданство'
                                        this.gender_error = ''
                                        this.work_schedule_error = ''
                                        this.desired_position_error = ''
                                    }
                                } else {
                                    this.gender_error = 'Выберите значение из списка'
                                    this.work_schedule_error = ''
                                    this.desired_position_error = ''
                                }
                            } else {
                                this.work_schedule_error = 'Введите значение из списка'
                                this.desired_position_error = ''
                            }
                        } else {
                            this.desired_position_error = 'Введите название объявления'
                        }
                    } else
                    if(this.job == 'Вакансии') {
                        if(this.desired_position != '') {
                            if(this.work_schedule != '') {
                                if(this.description != '') {
                                    if(this.adres != '') {
                                        if(this.work_experience != '') {
                                            this.work_experience_error = ''
                                            this.adres_error = ''
                                            this.description_error = ''
                                            this.work_schedule_error = ''
                                            this.desired_position_error = ''

                                            axios({
                                                method: 'post',
                                                url: '/add_job_openings',
                                                responseType: 'json',
                                                data: {
                                                    type_job: this.type_job,
                                                    desired_position: this.desired_position,
                                                    work_schedule: this.work_schedule,
                                                    frequency_payments: this.frequency_payments,
                                                    where_work: this.where_work,
                                                    description: this.description,
                                                    from_price: this.from_price,
                                                    before_price: this.before_price,
                                                    when_price: this.when_price,
                                                    adres: this.adres,
                                                    work_experience: this.work_experience,
                                                    over_years_old: this.over_years_old,
                                                    from_years_old: this.from_years_old,
                                                    with_violation_health: this.with_violation_health,
                                                    city: this.my_city,
                                                },
                                            })
                                            .then(function (response) {
                                                window.location.href = '/cabinet'
                                            })
                                        } else {
                                            this.work_experience_error = 'Выберите значение из списка'
                                            this.adres_error = ''
                                            this.description_error = ''
                                            this.work_schedule_error = ''
                                            this.desired_position_error = ''
                                        }
                                    } else {
                                        this.adres_error = 'Введите значение параметра'
                                        this.description_error = ''
                                        this.work_schedule_error = ''
                                        this.desired_position_error = ''
                                    }
                                } else {
                                    this.description_error = 'Пожалуйста, заполните описание'
                                    this.work_schedule_error = ''
                                    this.desired_position_error = ''
                                }
                            } else {
                                this.work_schedule_error = 'Введите значение из списка'
                                this.desired_position_error = ''
                            }
                        } else {
                            this.desired_position_error = 'Введите название объявления'
                        }
                    }
                },
                add_images_job() {
                    event.preventDefault();
                    if(document.getElementById('file_job').files.length != 0) {
                        if(this.images.length <= 4) {
                            this.images_error = ''
                            this.file_job_error = ''
                            var form_add_image_job = new FormData($("#form_add_image_job")[0]);

                            var prom = this.images
                            axios({
                                method: 'post',
                                url: '/img_add_job',
                                responseType: 'json',
                                data: form_add_image_job,
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(function (response) {
                                close_job_image.click()
                                prom.push({
                                    id: response.data['id'],
                                    image: response.data['image'],
                                })
                                file_job.value = "";
                            })
                        } else {
                            this.file_job_error = 'Добавлено максимальное количество изображений'
                        }
                    } else {
                        this.file_job_error = 'Вы не выбрали изображение'
                    }
                },
                delete_images_job(id) {
                    var prom = this.images
                    var e_item = prom[id]

                    axios({
                        method: 'get',
                        url: `/img_delete_job/${e_item.id}`,
                        responseType: 'json',
                    })
                    .then(function (response) {
                        prom.splice(id, 1)
                    })
                }
            }
        }
        Vue.createApp(AddJob).mount('#addjob')
    </script>

@endsection