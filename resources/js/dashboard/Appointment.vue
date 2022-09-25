<template>
<div class="card">
    <div class="card-header"><h3 class="card-title">Next Appointment</h3></div>
    <div class="card-body p-0" v-if="appointment != null && appointment.doctor != null && typeof (appointment.doctor) != 'undefined'">
        <h3 class="ml-3">{{appointment.date | excelDate}}</h3>
        <ul class="nav flex-column">
            <li class="nav-item d-flex"><a href="#" class="nav-link"><i class="far fa-clock text-primary mr-1"></i>{{appointment.time}} (30 mins)</a></li>
            <li class="nav-item d-flex"><a href="#" class="nav-link"><i class="fas fa-handshake text-primary mr-1"></i> Tasks </a></li>
        </ul>
        <div class="ml-3 mt-1 user-block">
            <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Image">
            <span class="username">Dr. Rashid Mohammed</span>
            <span class="description">Shared publicly - 7:30 PM Today</span>
        </div>
    </div>
    <div class="card-body" v-else>
        <h2>You don't have any future appointments planned</h2>
    </div>
    <div class="card-footer text-center">
        <a href="/app/appointments" class="text-danger">Manage Appointment</a>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {}
    },
    methods:{
        
    },
    mounted() {
        
    },
    props:{
        'appointment': Object,
        'user': Object,
    },
}
</script>