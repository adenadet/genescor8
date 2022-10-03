<template>
<section class="content-header">
    <div class="container-fluid">
        <div class="modal fade" id="postModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-show="editMode">Edit Post</h4>
                        <h4 class="modal-title" v-show="!editMode">New Post</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <BlogFormPost :post="post" :categories="blog_categories" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card col-12">
                    <div class="card-header">
                        <h3 class="card-title">All Stories</h3>
                        <div class="card-tools">
                            <button class="btn btn-sm btn-danger" @click="newPost"><i class="fa fa-calendar-plus"></i> Book
                                Post</button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Topic</th>
                                    <th>Submitted</th>
                                    <th>Status</th>
                                    <th>Status Date</th>
                                    <th>Comments</th>
                                    <th>Likes</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody v-if="posts.data == null || posts == null">
                                <tr>
                                    <td colspan="6" class="text-center">You have not made any Posts yet</td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr v-for="(post, index) in posts.data" :key="post.id" >
                                    <td>{{index | addOne }}</td>
                                    <td>
                                        <img class="img-fluid img-sm" :src="'/img/gallery/'+(post.image != null ? post.image : '1.jpg')" alt="Card image cap"/>
                                        <span v-html="post.topic"></span>
                                    </td>       
                                    <td>{{post.updated_at | excelDate}}</td>
                                    <td><span class="tag tag-success">{{post.status == 0 ? 'Unapproved' :(post.status == 1 ? 'Approved' :(post.status == 2 ? 'Rejected' : (post.status == 3 ? 'Not Published' : 'No Status')))}}</span></td>
                                    <td>{{post.approval_date}}</td>
                                    <td>{{post.comments_count}} comments</td>
                                    <td>{{post.likes_count}} likes </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <router-link :to="'/app/stories/'+post.id"><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></router-link>
                                            <button class="btn btn-success btn-sm" title="Edit Post"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm" title="Delete Post"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            editMode: false,
            post: {},
            posts: {},
            blog_categories: [],
        }
    },
    methods:{
        getAllInitials(){
            axios.get('/api/blogs/posts/mine').then(response =>{
                this.refreshPage(response);
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
        newPost(post){
            this.$Progress.start();
            Fire.$emit('PostDataFill', post);
            $('#postModal').modal('show');
            this.$Progress.finish();
        },
        refreshPage(response){
            this.posts = response.data.blogs;
            this.blog_categories = response.data.blog_categories;
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