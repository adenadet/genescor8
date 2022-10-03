<template>
<section class="content">
<div class="card">
    <div class="card-header"><h3 class="card-title">Story Activities</h3></div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Publish Date</span>
                                <span class="info-box-number text-center text-muted mb-0">{{post.published_date}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Approval Status</span>
                                <span class="info-box-number text-center text-muted mb-0">{{post.status}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Submitted Date</span>
                                <span class="info-box-number text-center text-muted mb-0">{{post.created_at | recentDate}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4>Recent Activity</h4>
                        <div class="post" v-for="activity in activities.data">
                            <UserCardHeader :user="activity.author" :activity="activity" />
                            <p v-html="activity.content"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-eye"></i> Post Details as seen</h3>     
                <BlogPostDetail :post="post" />
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
            activities: {},
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
                this.activities = response.data.activities;
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