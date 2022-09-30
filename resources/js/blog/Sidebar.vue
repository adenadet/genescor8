<template>
<div class="card card-widget">
    <div class="card-header">
        <h3>Categories</h3>
    </div>
    <div class="card-body">
        <!-- Use bootstrap nav items here-->
        <ul>
            <li v-for="category in blog_categories"><router-link :to="'/blogs/categories/'+category.name">{{category.name}}</router-link></li>
        </ul>
    </div>
</div>
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
        //this.getAllInitials();
        Fire.$on('preliminaryAdd', message =>{
            this.messages.push(message);
        }); 
    },
} 
</script>