<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="user-block" v-if="(post.author != null && typeof(post.author) != 'undefined')">
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
              
                    <div class="card-footer card-comments" v-if="(comments.data != null && typeof(comments.data) != 'undefined')">
                        <div class="card-comment" v-for="post_comment in comments.data" :key="post_comment.id">
                            <img class="img-circle img-sm" :src="'/img/profile/'+post_comment.author.image" :alt="post_comment.author.first_name+' '+post_comment.author.last_name">
                            <div class="comment-text">
                                <span class="username">{{post_comment.author.first_name+' '+post_comment.author.last_name}}<span class="text-muted float-right">8:03 PM Today</span></span>
                                <p>{{post_comment.message}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="#" method="post" v-if="user != null" @submit.prevent="submitComment() ">
                            <img class="img-fluid img-circle img-sm" :src="'/img/profile/'+(user.image != null ? user.image : 'default.png')" :alt="user.first_name+' '+user.last_name">
                            <div class="img-push">
                                <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment" v-model="commentForm.content">
                            </div>
                        </form>
                        <div v-else>You need to be a User to Comment. <a class="text-danger" href="/login">Login Here</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class=""></div>
            </div>
        </div>
    </div>
</section>
</template>
<script>
export default {
    data(){
        return {
            commentForm: new Form({
                content: '',
            }),
            comments: {},
            post: {},
            user: {},
        }
    },
    methods:{
        getAllInitials(){
            axios.get('/api/blogs/posts/'+this.$route.params.id).then(response =>{
                this.post = response.data.blog;
                this.comments = response.data.comments;
                this.user = response.data.user;
                this.commentForm.user_id = this.user != null ? this.user.id : '';
                this.commentForm.post_id = this.post.id;

                toast.fire({icon: 'success',title: 'Blog Post loaded successfully',});
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({
                    icon: 'error',
                    title: 'Blog Post not loaded successfully',
                })
            });
        },
        submitComment(){
            this.$Progress.start();
            this.commentForm.post('/api/blogs/posts/'+this.$route.params.id+'/comments')
            .then(response =>{
                Fire.$emit('BranchRefresh', response);
                Swal.fire({
                    icon: 'success',
                    title: 'The Comment has been submitted',
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
            this.$Progress.finish();

        }
    },
    mounted() {
        this.getAllInitials();
        Fire.$on('preliminaryAdd', message =>{
            this.messages.push(message);
        }); 
    },
} 
</script>