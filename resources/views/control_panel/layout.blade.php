<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Assets Icon -->
    <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <!-- Мои стили -->
    <link rel="stylesheet" href="/admin.css">
    <link rel="stylesheet" href="/assets/style.css">
    <!-- Ajax -->
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Vue js -->
    <script src="https://unpkg.com/vue@next"></script>
</head>
<body id="admin_body" class="pt-main bg-admin" style="overflow-x: hidden;">
    <header class="container-fluid bg-dark text-white py-2 px-lg-5 fixed-top" style="z-index: 300;">
        <div class="d-flex">
            <div class="d-flex align-items-center me-2">
                <button id="admin_menu_laptop" onclick="admin_menu_laptop()" class="btn bg-light py-1 px-3 tel-d-none"><i class="fas fa-bars fs-5 py-2"></i></button>
                <button id="admin_menu_tel" onclick="admin_menu_tel()" class="btn bg-light py-1 px-3 laptop-d-none"><i class="fas fa-bars fs-5 py-2"></i></button>
            </div>
            <a href="/control_panel" class="mb-0 text-white text-decoration-none d-flex align-items-center">
                <h2 class="text-white mb-0">Управление</h2>
            </a>
            <div class="ms-auto">
                <a href="/" class="btn py-2 px-btn">
                    <i class="bi bi-box-arrow-right text-white fs-4"></i>
                </a>
            </div>
        </div>
    </header>
    @yield('admin_main')



<div id="admin_canvas" class="admin_canvas border-0 shadow-sm bg-white pt-3 px-3 d-canvas-block d-canvas-none pb-3" style="z-index: 100; overflow-y: scroll; height: 92vh; scrollbar-width: none;">
    <div class="d-flex flex-column">
        <a href="/control_panel" class="btn text-start btn-lightdark mb-2 fs-6"><i class="bi bi-grid me-2 fs-6"></i> Главная</a>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item border-0">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed accardion-px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="bi bi-gear me-2"></i> Администрирование
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body px-0 py-0">
                        <div>
                            <a href="/cp_adv" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-aspect-ratio me-2"></i>Объявления</a>
                        </div>
                        @if(auth()->user()->status == 9)
                            <div>
                                <a href="/cp_personal" class="text-dark text-decoration-none py-3 accordionbody-pl d-block w-100 ps-5"><i class="bi bi-aspect-ratio me-2"></i>Персонал</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="blackout" class="blackout d-none"></div>

 <!-- Modal Tel Search -->
 <div class="modal fade" id="edtelSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down" id="vuetelsearch">
        <div class="modal-content">
            <div class="modal-header d-flex gap-3 border-0 pb-0">
                <input type="search" class="tel-search py-2 px-2" v-on:input="tellsearch()" v-model="telwrite">
                <button type="button" class="btn btn-dark" id="closeAddModal" data-mdb-dismiss="modal" aria-label="Close"><i class="fas fa-times fs-5"></i></button>
            </div>
            <div class="modal-body d-flex flex-column">
                <div v-for="item in telcatalogsarray">
                    <a :href="item.link" class="text-dark py-2 w-100 d-block px-3">@{{item.name}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tel Search -->

<script src="/admin.js"></script>
</body>
</html>