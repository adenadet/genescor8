<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" :src="'/img/profile/'+(post.author != null ? post.author.image : 'default.png')" alt="User Image">
                            <span class="username"><a class="text-danger">{{post.author.first_name+' '+post.author.last_name}}</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                    </div>
                    <img class="card-img-top" :src="'/img/gallery/'+(post.image != null ? post.image : '1.jpg')" alt="Card image cap"/>
                    <div class="card-body">
                        <p>{{post.content}}</p>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                        <span class="float-right text-muted">{{post.likes_count}} likes - {{post.comments_count}} comments</span>
                    </div>
              
                    <div class="card-footer card-comments">
                        <div class="card-comment" v-for="post_comment in comments">
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
                post: {},
            }
        },
        methods:{
            getAllInitials(){
                axios.get('/api/blogs/posts/'+this.$route.params.id).then(response =>{
                    this.post = response.data.blog;
                    this.comments = response.data.comments;
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
        },
        mounted() {
            this.getAllInitials();
            Fire.$on('preliminaryAdd', message =>{
                this.messages.push(message);
            }); 
        },
    } 
    </script>