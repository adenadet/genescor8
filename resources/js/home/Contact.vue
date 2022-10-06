<template>
<section>
    <div>Bread Crumb Here, Stating Contact Page</div>
    <div class="card">
        <div class="card-head"><h3>Contact Information</h3></div>
        <div class="card-body row">
            <div class="col-md-7 col-xs-12 col-sm-6">
                <form id="register_form">    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>First Name *</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name *" required  v-model="contactForm.first_name" :class="{'is-invalid' : contactForm.errors.has('first_name') }">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Last Name *</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name *" required v-model="contactForm.last_name" :class="{'is-invalid' : contactForm.errors.has('last_name') }">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Email Address *</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address *" required  v-model="contactForm.email" :class="{'is-invalid' : contactForm.errors.has('email') }">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Phone *</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone *" required v-model="contactForm.phone" :class="{'is-invalid' : contactForm.errors.has('phone') }">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="subject *" required v-model="contactForm.subject" :class="{'is-invalid' : contactForm.errors.has('subject') }">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Type</label>
                                <select type="text" class="form-control" id="contact_type" name="contact_type" required v-model="contactForm.contact_type" :class="{'is-invalid' : contactForm.errors.has('contact_type') }">
                                    <option value=''>--Select Contact Type--</option>
                                    <option value='Complaint'>Complaints</option>
                                    <option value='Feedback'>Feedback</option>
                                    <option value='Collaboration'>Request to Collaborate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Message</label>
                                <wysiwyg rows="5" id="message" name="message" placeholder="Enter message *" required v-model="contactForm.message" :class="{'is-invalid' : contactForm.errors.has('message') }" />
                            </div>
                        </div>
                    </div>    
                    <button @click.prevent="contactSubmit" type="button" name="submit" class="submit btn btn-danger">Submit </button>
                </form>
            </div>
            <div class="card col-md-5 col-xs-12 col-sm-6 p-1 pl-3 pr-3 bg-dark" style="background: purple !important">
                <div>
                    <p>Fill up the form and our Team will get back to you within 24 hours.</p>

                    <p><i class="fa fa-phone-alt fa-lg mr-3"></i> +2348012341234</p>
                    <p><i class="fa fa-envelope fa-lg mr-3"></i> info@genescor.com</p>
                    <p><i class="fa fa-home fa-lg mr-3"></i> 123, Estate, Allen Avenue, Ikeja, Lagos</p>
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
            contactForm: new Form({
                id:'',
                first_name:'',
                last_name:'',
                contact_type:'',
                message:'',
                email:'',
                phone:'',
                subject: '',
            }),
            editMode:false,
        }
    },
    methods:{
        contactSubmit(){
            this.$Progress.start();
            this.contactForm.post('/api/contact')
            .then(response =>{
                this.$Progress.finish();
                Swal.fire({
                    icon: 'success',
                    title: 'Your message has been sent, a representative would get back to you within the next 24 hours',
                    showConfirmButton: false,
                    timer: 5000,
                });
                this.contactForm.reset();
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
    },
    mounted() {},
    props:{},
}
</script>