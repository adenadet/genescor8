<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4" v-for="post in posts.data" :key="post.id">
                <div class="card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" :src="'/img/profile/'+(post.author != null ? post.author.image : 'default.png')" alt="User Image">
                            <span class="username"><a class="text-danger">{{post.author.first_name+' '+post.author.last_name}}</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                    </div>
                    <img class="card-img-top" :src="'img/gallery/'+(post.image != null ? post.image : '1.jpg')" alt="Card image cap"/>
                    <div class="card-body">
                        <h3><router-link class="text-danger" :to="'/stories/post/'+post.id">{{post.topic}}</router-link></h3>
                        <p>{{post.content | readMore(50, '...')}}</p>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button><br />
                        <span class="float-right text-muted">{{post.likes_count}} likes - {{post.comments_count}} comments</span>
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
            posts: {},
        }
    },
    methods:{
        getAllInitials(){
            axios.get('/api/blogs/posts').then(response =>{
                this.posts = response.data.blogs;
                toast.fire({icon: 'success',title: 'Blog Posts loaded successfully',});
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({
                    icon: 'error',
                    title: 'Blog Posts not loaded successfully',
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