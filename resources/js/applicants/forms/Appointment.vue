<template>
<div>
<form>
    <alert-error :form="AppointmentData"></alert-error> 
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Applicant *</label>
                <input type="text" required class="form-control" id="first_name" name="first_name" placeholder="First Name *" v-model="AppointmentData.first_name" :class="{'is-invalid' : AppointmentData.errors.has('first_name') }">
                <has-error :form="AppointmentData" field="first_name"></has-error> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Service *</label>
                <select class="form-control" id="service_id" name="service_id" placeholder="Enter State / County *" required v-model="AppointmentData.service_id" :class="{'is-invalid' : AppointmentData.errors.has('service_id') }">
                    <option value="">--Select Service--</option>
                    <option v-for="service in services" v-bind:key="service.id" :value="service.id" >{{service.name}}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control" id="street2" name="street2" placeholder="Enter Street Desc" v-model="AppointmentData.street2" :class="{'is-invalid' : AppointmentData.errors.has('street2') }">
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>Time Slot *</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City *" v-model="AppointmentData.city" :class="{'is-invalid' : AppointmentData.errors.has('city') }">
            </div>
        </div>
        <input type="hidden" name="id" id="id" v-model="AppointmentData.id">
    </div>
    <button @click.prevent="editMode ? updateAppointment() : createAppointment()" type="submit" name="submit" class="submit btn btn-success">Submit</button>
</form>
</div>
</template>
<script>
export default {
    data(){
        return  {
            editMode: true, 
            AppointmentData: new Form({
                patient_id: '', 
                service_id:'', 
                date:'', 
                time_slot:'', 
            }),
        }
    },
    mounted() {
        Fire.$on('AppointmentDataFill', user =>{
            this.AppointmentData.fill(user);
        });
        Fire.$on('AfterCreation', ()=>{
            //axios.get("api/profile").then(({ data }) => (this.AppointmentData.fill(data)));
        });
    },
    methods:{
        createUser(){

            },
        updateAppointmentData(){
            this.$Progress.start();
            this.AppointmentData.post('/api/ums/bios')
            .then(response =>{
                this.$Progress.finish();
                Fire.$emit('Reload', response);
                Swal.fire({
                    icon: 'success',
                    title: 'The Profile details has been updated',
                    showConfirmButton: false,
                    timer: 1500
                    });
                
                })
            .catch(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: 'Please try again later!'
                    });
                this.$Progress.fail();
                });  
                    
        },
        getProfilePic(){
            let photo = (this.AppointmentData.image.length >= 150) ? this.AppointmentData.image : "./"+this.AppointmentData.image;
            return photo;
            },
        updateProfilePic(e){
            let file = e.target.files[0];
            let reader = new FileReader();
            if (file['size'] < 2000000){
                reader.onloadend = (e) => {
                    this.AppointmentData.image = reader.result
                    }
                reader.readAsDataURL(file)
            }
            else{
                swal.fire({
                    type: 'error',
                    title: 'File is too large'
                })
            }
        }
    },
    props:{
        areas: Array,
        branches: Array, 
        states: Array,
        user: Object,
        services: Array,
    }
}
</script>