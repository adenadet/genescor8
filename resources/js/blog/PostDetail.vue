<template>
<section>
    <div class="card-header">
        <UserCardHeader :user="post.author" />
    </div>
    <img class="card-img-top" :src="'/img/gallery/'+(post.image != null ? post.image : '1.jpg')" alt="Card image cap"/>
    <div class="card-body">
        <h3 class="text-danger">{{post.topic}}</h3>
        <p>{{post.content}}</p>
        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
        <span class="float-right text-muted">{{post.likes_count}} likes - {{post.comments_count}} comments</span>
    </div>
</section>
</template>
<script>
export default {
    data(){
        return {}
    },
    methods:{},
    mounted() {},
    props: {
        post: Object,
    }
} 
</script>