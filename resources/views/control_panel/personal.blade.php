@extends('control_panel.layout')
@section('admin_main')
<div id="container" class="container-fluid px-admin-laptop px-admin-tel py-2 mb-3 pe-lg-5 mx-0">
    <div class="d-flex">
        <h1 class="mt-1">Персонал</h1>
    </div>
    <div class="d-flex flex-column bg-light shadow-sm rounded-3 px-3 py-2 mt-3 tel-scroll" id="personal">
        <h5 class="mb-0">Администраторы</h5>
        <div class="d-flex mt-2 rounded-3 px-3 w-1000" style="background-color: rgba(0, 0, 0, 0.150);">
            <div class="d-flex" style="width: 100px;">
                <span>Id</span>
            </div>
            <div class="d-flex" style="width: 200px;">
                <span>Email</span>
            </div>
            <div class="d-flex ms-3" style="width: 400px;">
                <span>Телефон</span>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column px-3 w-1000 gap-3">
            <div v-for="(item, ib) in personal" :key="item">
                <div v-if="item.status == 9" class="d-flex align-items-center">
                    <div class="d-flex" style="width: 100px;">
                        <span>@{{item.id}}</span>
                    </div>
                    <div class="d-flex" style="width: 200px;">
                        <span>@{{item.email}}</span>
                    </div>
                    <div class="d-flex gap-3 ms-3" style="width: 400px;">
                        <span>@{{item.tel}}</span>
                        <span>@{{item.name}}</span>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mb-0 mt-3">Модераторы</h5>
        <div class="d-flex mt-2 rounded-3 px-3 w-1000" style="background-color: rgba(0, 0, 0, 0.150);">
            <div class="d-flex" style="width: 100px;">
                <span>Id</span>
            </div>
            <div class="d-flex" style="width: 200px;">
                <span>Email</span>
            </div>
            <div class="d-flex ms-3" style="width: 400px;">
                <span>Телефон</span>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column px-3 w-1000">
            <div v-for="(item, ib) in personal" :key="item">
                <div v-if="item.status == 6" class="d-flex align-items-center">
                    <div class="d-flex" style="width: 100px;">
                        <span>@{{item.id}}</span>
                    </div>
                    <div class="d-flex" style="width: 200px;">
                        <span>@{{item.email}}</span>
                    </div>
                    <div class="d-flex gap-3 ms-3" style="width: 400px;">
                        <span>@{{item.tel}}</span>
                        <span>@{{item.name}}</span>
                    </div>
                    <div class="d-flex ms-auto" style="width: 270px;">
                        <button class="btn btn-danger d-flex align-items-center justify-content-center w-100" v-on:click="lower(ib)"><i class="fas fa-arrow-down me-2"></i>Понизить</button>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mb-0 mt-3">Пользователи</h5>
        <div class="d-flex mt-2 rounded-3 px-3 w-1000" style="background-color: rgba(0, 0, 0, 0.150);">
            <div class="d-flex" style="width: 100px;">
                <span>Id</span>
            </div>
            <div class="d-flex" style="width: 200px;">
                <span>Email</span>
            </div>
            <div class="d-flex ms-3" style="width: 400px;">
                <span>Телефон</span>
            </div>
        </div>
        <div class="d-flex mt-3 flex-column px-3 w-1000">
            <div v-for="(item, ib) in personal" :key="item">
                <div v-if="item.status == 0" class="d-flex align-items-center">
                    <div class="d-flex" style="width: 100px;">
                        <span>@{{item.id}}</span>
                    </div>
                    <div class="d-flex" style="width: 200px;">
                        <span>@{{item.email}}</span>
                    </div>
                    <div class="d-flex gap-3 ms-3" style="width: 400px;">
                        <span>@{{item.tel}}</span>
                        <span>@{{item.name}}</span>
                    </div>
                    <div class="d-flex gap-2 ms-auto" style="width: 270px;">
                        <button class="btn btn-success d-flex align-items-center justify-content-center w-100" v-on:click="increase(ib)"><i class="fas fa-arrow-up me-2"></i>Повысить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
const Personal = {
    data() {
        return {
            personal: [],
        }
    },
    beforeMount(){
        this.all()
    },
    methods: {
        increase(ib) {
            var prom = this.personal
            var e_item = prom[ib]
            $.ajax({
                type: "get", //Метод отправки
                url: `/increase/${e_item.id}`,
                method: 'get',
                success: function(data) {
                    if(e_item.status == 0) {
                        e_item.status = 6 
                    }
                }
            });
        },
        lower(ib) {
            var prom = this.personal
            var e_item = prom[ib]
            $.ajax({
                type: "get", //Метод отправки
                url: `/lower/${e_item.id}`,
                method: 'get',
                success: function(data) {
                    if(e_item.status == 6) {
                        e_item.status = 0 
                    }
                }
            });
        },
        all() {
            var prom = this.personal
            $.ajax({    
                type: "GET", 
                url: '/all_personal',
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(elem) {
                        prom.push({
                            id: elem['id'],
                            status: elem['status'],
                            name: elem['name'],
                            email: elem['email'],
                            tel: elem['tel'],
                        })
                    })
                }
            })
        }
    }
}
Vue.createApp(Personal).mount('#personal')
</script>
@endsection