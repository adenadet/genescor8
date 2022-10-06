<template>
<section>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-default">
                <div class="inner"><h3>{{new_users}}</h3><p>New Registrations</p></div>
                <div class="icon"><i class="fa fa-user"></i></div>
                <router-link to="/staffs/users/new" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-default">
                <div class="inner"><h3>{{pending_provider}}</h3><p>Pending Providers</p></div>
                <div class="icon"><i class="fa fa-user-md"></i></div>
                <router-link to="/staffs/pending/providers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-default">
                <div class="inner"><h3>{{pending_agency}}</h3><p>Pending Agencies</p></div>
                <div class="icon"><i class="fa fa-building"></i></div>
                <router-link to="/staffs/pend/agencies" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger-outline">
                <div class="inner"><h3>{{pending_stories}}</h3><p>Pending Stories</p></div>
                <div class="icon"><i class="fa fa-comment-alt"></i></div>
                <router-link to="/staffs/pend/stories" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
        </div>
    </div>
    <div class="row">This is a test</div>
</div>
</section>
</template>
<script>
export default {
    data(){
        return {
            new_users: 10,
            pending_agency: 0,
            pending_provider: 0,
            pending_stories: 0,

            form: new Form({}),
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
            axios.get('/api/dashboard/staff').then(response =>{
                this.refreshPage(response);
                this.$Progress.finish();
                toast.fire({
                    icon: 'success',
                    title: 'Dashboard loaded successfully',
                });
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({
                    icon: 'error',
                    title: 'Dashboard not loaded successfully',
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
            this.new_users= response.data.new_users;
            this.pending_agency = response.data.pending_agency;
            this.pending_provider= response.data.pending_provider;
            this.pending_stories= response.data.pending_stories;
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
}
</script>