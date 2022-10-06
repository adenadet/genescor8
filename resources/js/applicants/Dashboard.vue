<template>
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Hello Aden{{user != null ? user.first_name : "New User"}},</h1>
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image"><img src="/img/profile/default.png" class="img-circle elevation-2"
                                    alt="User Image"></div>
                            <p class="ml-3">Your Profile is 60% complete, <a class="text-danger" href="#">continue
                                    setup</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-8 connectedSortable">
                    <div class="row mb-2">
                        <div class="col-md-6 col-sm-12"><DashboardAppointment :appointment="appointment" /></div>
                        <div class="col-md-6 col-sm-12"><DashboardPrescription :prescription="prescription" /></div>
                        <div class="col-12"><DashboardActivities :activities="activities" /></div>
                    </div>
                </section>
                <section class="col-lg-4 connectedSortable">
                    <DashboardChat />
                </section>
            </div>
        </div>
    </section>
</template>
<script>
import moment from 'moment'
export default {
    data() {
        return {
            activities: [],
            appointment: {},
            birthdays: [],
            contacts: [],
            editMode: false,
            messages: [],
            message_rooms: [],
            month: '',
            new_staffs: [],
            notices: {},
            prescription: {},
            staff_months: [],
            tickets: {},
            settings: {
                suppressScrollY: false,
                suppressScrollX: false,
                wheelPropagation: false
            },
            user: {},
        }
    },
    methods: {
        getAllInitials() {
            axios.get('/api/dashboard')
                .then(response => {
                    this.activities = response.data.activities;
                    this.birthdays = response.data.birthdays;
                    this.contacts = response.data.contacts;
                    this.chats = response.data.chats;
                    this.messages = response.data.messages;
                    this.message_rooms = response.data.chats;
                    this.notices = response.data.notices;
                    this.new_staffs = response.data.new_staffs;
                    this.tickets = response.data.tickets;
                    this.staff_months = response.data.staff_months;
                    this.user = response.data.user;
                })
                .catch(() => {
                    this.$Progress.fail();
                    toast.fire({ icon: 'error', title: 'Dashboard not loaded successfully', });
                });
        },
        scrollHanle(evt) {
            console.log(evt)
        },
    },
    mounted() {
        this.getAllInitials();
    }
}
</script>
<style >
.scroll-area {
    position: relative;
    margin: auto;
    width: 600px;
    height: 400px;
}
</style>