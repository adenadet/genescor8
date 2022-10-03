<template>
<section>
<div class="card card-widget">
    <div class="card-header">
        <h4>Story Categories</h4>
    </div>
    <div class="card-body">
        <!-- Use bootstrap nav items here-->
        <ul>
            <li v-for="category in blog_categories"><router-link :to="'/blogs/categories/'+category.name">{{category.name}}</router-link></li>
        </ul>
    </div>
</div>
<div class="card card-widget">
    <div class="card-header">
        <h4>Recent Stories</h4>
    </div>
    <div class="card-body">
        <div class="card card-widget" v-for="story in recent_stories">
            <div class="row">
                <div class="col-md-5"><img class="card-img-top img-fluid" :src="'/img/gallery/'+(story.image != null ? story.image : '1.jpg')" :alt="story.topic" :title="story.topic"></div>
                <div class="col-md-7">
                    <a :href="'/stories/post/'+story.id"><h6 class="text-danger">{{story.topic}}</h6></a> 
                    <div class="user-block" v-if="(story.author != null && typeof(story.author) != 'undefined')">
                        <img class="img-sm img-circle img-fluid" :src="'/img/profile/'+(story.author != null ? story.author.image : 'default.png')" alt="User Image">
                        <span class="username"><a class="text-danger">{{(story.author.first_name+' '+story.author.last_name) | readMore(10, '..')}}</a></span>
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
            commentForm: new Form({
                content: '',
            }),
            comments: {},
            blog_categories: [],
            recent_stories: [],
            user: {},
        }
    },
    methods:{
        getAllInitials(){
            axios.get('/api/blogs/posts/initials').then(response =>{
                this.blog_categories = response.data.blog_categories;
                this.recent_stories = response.data.recent_stories;
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