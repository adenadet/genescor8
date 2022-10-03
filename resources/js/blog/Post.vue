<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card card-widget">
                    <BlogPostDetail :post="post"/>
              
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
                <BlogSidebar />
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