<template>
<div class="row mb-0 p-5">
    <div class="features col-md-12">
        <h2>Our Recent <span class="text-primary">Articles</span></h2>
        <p>Find the latest information and daily news from trusted sources</p>
    </div>
    <div class="col-4" v-for="post in posts.data" :key="post.id">    
        <div class="card">
            <img class="card-img-top" :src="'img/gallery/'+(post.image != null ? post.image : '1.jpg')" alt="Card image cap"/>
        </div>
        <p><a href="#" v-html="post.author != null ?post.author.first_name+' '+post.author.last_name:'Unrecognized Author'"></a> | {{post.created_at | excelDate}}</p>
        <h3 v-html="post.topic"></h3>
        <router-link :to="'/blog/post/'+post.id" class="text-danger">Read More </router-link>
    </div>

</div>
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
            axios.get('/api/blogs/posts/initials').then(response =>{
                this.posts = response.data.blogs;
                //toast.fire({icon: 'success',title: 'Blog Posts loaded successfully',});
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({icon: 'error', title: 'Blog Posts not loaded successfully',})
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