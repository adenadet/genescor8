<template>
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="row clearfix">
                <div class="modal fade" id="userModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" v-show="editMode">Edit User: {{user.unique_id}}</h4>
                                <h4 class="modal-title" v-show="!editMode">New User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <UserFormUser :areas="areas" :branches="branches" :departments="departments" :editMode="editMode" :states="states" :user="user"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="roleModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" v-show="!editMode">Assign User Roles</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <UserFormAssignRole :user="user"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Newly Registered Users</h3>
                            <div class="card-tools">
                                <button class="btn btn-sm btn-primary float-sm-right" @click="addUser()">Add New User <i class="fa fa-user-add"></i></button>
                            </div>
                        </div>
                        <div v-if="typeof(users.data) != 'undefined' && users.data != null && users.data.length != 0" class="card-body table-responsive p-0" style="max-height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead><tr><th></th><th>User</th><th>Reg. Date</th><th>Status</th><th></th></tr></thead>
                                <tbody>
                                    <tr v-for="(user, index) in users.data" :key="index">
                                    <td>{{index | addOne}}</td>
                                    <td>{{user.first_name}} {{user.middle_name}} {{user.last_name}}</td>
                                    <td>{{user.created_at | excelDate}}</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td><div class="button-group">
                                                <button class="btn btn-sm btn-success" @click="setUserRole(user)" title="Set Staff Role"><i class="fa fa-user-cog"></i></button>
                                                <button class="btn btn-sm btn-primary" @click="editUser(user)" title="Edit Staff"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger" @click="deleteUser(user.id)" title="Delete Staff"><i class="fa fa-trash"></i></button>
                                        </div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="card-body table-responsive p-10" style="max-height: 500px;">
                            <p>No New User has registered in the last 2 weeks</p>
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
            areas:[],
            branches:[],
            departments:[],
            editMode: false,
            savings:{},
            states:[],
            user:{},
            users:{},
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
            axios.get('/api/ums/users/new').then(response =>{
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
}
</script>
