<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="modal fade" id="paymentModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Make Payment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <ApplicantPaymentForm />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" src="" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" title="Mark as read"><i class="far fa-circle"></i></button>
                            <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid pad" src="" alt="Photo">

                        <p>I took this photo this morning. What do you guys think?</p>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                        <span class="float-right text-muted">127 likes - 3 comments</span>
                    </div>
              
                    <div class="card-footer card-comments">
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="" alt="User Image">
                            <div class="comment-text">
                                <span class="username">Maria Gonzales<span class="text-muted float-right">8:03 PM Today</span></span>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                        </div>
                        <div class="card-comment">
                            <img class="img-circle img-sm" src="" alt="User Image">
                            <div class="comment-text">
                                <span class="username">Luna Stark<span class="text-muted float-right">8:03 PM Today</span></span>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="#" method="post">
                            <img class="img-fluid img-circle img-sm" src="img/user4-128x128.jpg" alt="Alt Text">
                            <div class="img-push">
                                <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                            </div>
                        </form>
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
                blog: {},
            }
        },
        methods:{
            getAllInitials(){
                axios.get('/api/blogs/posts/'+this.$route.params.id).then(response =>{
                    this.blog = response.data.blog;
                    toast.fire({icon: 'success',title: 'Appointment loaded successfully',});
                })
                .catch(()=>{
                    this.$Progress.fail();
                    toast.fire({
                        icon: 'error',
                        title: 'Appointment not loaded successfully',
                    })
                });
            },
            makePayment(appointment){
                this.$Progress.start();
                this.paySpecific = true;
                Fire.$emit('PaymentDataFill', appointment);
                $('#paymentModal').modal('show');
                this.$Progress.finish();
            },
        },
        mounted() {
            this.getAllInitials();
            Fire.$on('preliminaryAdd', message =>{
                this.messages.push(message);
            }); 
        },
    } 
    </script>