<template>
<section>
    <div class="row">
        <div class="m-3 mt-5 p-3 card col-md-12">
            <div class="card-body row">
                <div class="col-sm-12">
                    <div class="card-body login-card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <p class="new_auth">I am Validating:</p>
                                <ul class="nav nav-pills" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item auth-item">
                                        <a class="nav-link active" id="doctor-tab" data-toggle="pill" href="#doctor" role="tab" aria-controls="doctor" aria-selected="true">Doctor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="hospital-tab" data-toggle="pill" href="#hospital" role="tab" aria-controls="hospital" aria-selected="false">Hospital</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="doctor" role="tabpanel" aria-labelledby="doctor-tab"><ApprovalDoctors :list="doctor_approvals" /></div>
                            <div class="tab-pane fade" id="hospital" role="tabpanel" aria-labelledby="hospital-tab"><ApprovalDoctors :list="hospital_approvals" /></div>
                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>
<script>
export default {
    data(){
        return {
            //doctor_approvals:{},
            //hospital_approvals:{},
        }
    },
    methods:{
        addUser(){
            this.editMode = false;
            this.user = {};
            Fire.$emit('BioDataFill', this.user);
            $('#userModal').modal('show');

            this.$Progress.finish();
        },
        deleteUser(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                })
            .then((result) => {
                //Send Delete request
                if(result.value){
                    this.form.delete('/api/ums/users/'+id)
                    .then(response=>{
                        Swal.fire('Deleted!', response.data.message, 'success');
                        this.refreshPage(response);   
                    })
                    .catch(()=>{
                        Swal.fire({icon: 'error', title: 'Oops...', text: 'Something went wrong!', footer: '<a href>Why do I have this issue?</a>'});
                    });
                }
            });  
        },
        editUser(user){
            this.$Progress.start();
            this.editMode = true;
            this.user = user;
            Fire.$emit('BioDataFill', user);
            $('#userModal').modal('show');

            this.$Progress.finish();
        },
        getAllInitials(){
            this.$Progress.start();
            axios.get('/api/ums/users').then(response =>{
                this.refreshPage(response);
                this.$Progress.finish();
                toast.fire({
                    icon: 'success',
                    title: 'Users loaded successfully',
                });
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({
                    icon: 'error',
                    title: 'Users not loaded successfully',
                })
            });
        },
        getUser(page=1){
            axios.get('/api/ums/users?page='+page)
            .then(response=>{
                this.users = response.data.users;   
            });
        },
        refreshPage(response){
            this.areas = response.data.areas;
            this.branches = response.data.branches;
            this.departments = response.data.departments;
            this.states = response.data.states;
            this.users = response.data.users;
        },
        setUserRole(user){
            this.$Progress.start();
            this.user = user;
            Fire.$emit('userRoleUpdate', user);
            $('#roleModal').modal('show');
            this.$Progress.finish();
        },
    },
    mounted(){ 
        this.getAllInitials();
        Fire.$on('searchInstance', ()=>{
            let query = this.$parent.search;
            axios.get('/api/ums/users/search?q='+query)
            .then((response ) => {this.users = response.data.users;})
            .catch(()=>{});
        });
        Fire.$on('userRoleReload', response =>{});
        Fire.$on('Reload', response =>{
            $('#userModal').modal('hide'); 
            $('#roleModal').modal('hide');
            this.users = response.data.users;
        });
    },
    props:{
        doctor_approvals: Object,
        hospital_approvals: Object,
    }
}
</script>