<template>
<form>
<div class="card">
    <alert-error :form="PostData"></alert-error> 
    <div class="card-body row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Topic *</label>
                <input type="text" required class="form-control" id="topic" name="topic" placeholder="First Name *" v-model="PostData.topic" :class="{'is-invalid' : PostData.errors.has('topic') }">
                <has-error :form="PostData" field="topic"></has-error> 
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Category *</label>
                <select class="form-control" id="category_id" name="category_id" placeholder="Enter State / County *" required v-model="PostData.category_id" :class="{'is-invalid' : PostData.errors.has('category_id') }">
                    <option value="">--Select Category--</option>
                    <option v-for="category in categories" v-bind:key="category.id" :value="category.id" >{{category.name}}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Content</label>
                <wysiwyg id="content" name="content" rows="5" v-model="PostData.content" :class="{'is-invalid' : PostData.errors.has('content') }">
                </wysiwyg>
            </div>
        </div>
        <input type="hidden" name="id" id="id" v-model="PostData.id">
        <div class="clear"></div>
    </div>
    <div class="card-footer"><button @click.prevent="editMode ? updatePost() : createPost()" type="submit" name="submit" class="submit btn btn-success">Submit</button></div>
</div>
</form>
</template>
<script>
export default {
    data(){
        return  {
            editMode: true, 
            PostData: new Form({
                category_id: '', 
                content:'', 
                topic:'', 
                id:'', 
            }),
        }
    },
    mounted() {
        Fire.$on('PostDataFill', post =>{
            this.PostData.fill(post);
        });
        Fire.$on('AfterCreation', ()=>{
            //axios.get("api/profile").then(({ data }) => (this.PostData.fill(data)));
        });
    },
    methods:{
        createPost(){
            this.$Progress.start();
            this.PostData.post('/api/blogs/posts')
            .then(response =>{
                this.$Progress.finish();
                Fire.$emit('Reload', response);
                Swal.fire({
                    icon: 'success',
                    title: 'The Post has been added, awaiting Approval',
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
        },
        updatePost(){
            this.$Progress.start();
            this.PostData.put('/api/blogs/posts/'+this.PostData.id)
            .then(response =>{
                this.$Progress.finish();
                Fire.$emit('Reload', response);
                Swal.fire({
                    icon: 'success',
                    title: 'The Post has been updated, awaiting Approval',
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
        },
        getProfilePic(){
            let photo = (this.PostData.image.length >= 150) ? this.PostData.image : "./"+this.PostData.image;
            return photo;
            },
        updateProfilePic(e){
            let file = e.target.files[0];
            let reader = new FileReader();
            if (file['size'] < 2000000){
                reader.onloadend = (e) => {
                    this.PostData.image = reader.result
                    }
                reader.readAsDataURL(file)
            }
            else{
                swal.fire({
                    type: 'error',
                    title: 'File is too large'
                })
            }
        }
    },
    props:{
        areas: Array,
        categories: Array, 
        states: Array,
        user: Object,
        services: Array,
    }
}
</script>