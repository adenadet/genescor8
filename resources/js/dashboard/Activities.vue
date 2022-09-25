<template>
    <div class="card">
        <div class="card-header"><h3 class="card-title">Recent Activities</h3></div>
        <div class="card-body table-responsive p-0" v-if="(activities != null && activites.length != 0)">
            <table class="table table-striped table-valign-middle">
                <tbody>
                    <tr v-for="activity in activities" :key="activity.id">
                        <td>
                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Some Product
                        </td>
                        <td>$13 USD</td>
                        <td><small class="text-success mr-1"><i class="fas fa-arrow-up"></i>12%</small>12,000 Sold</td>
                        <td><a href="#" class="text-muted"><i class="fas fa-search"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body" v-else><h2>No recent activities on your account</h2></div>
    </div>
    </template>
    <script>
    export default {
        data(){
            return {}
        },
        methods:{
            
        },
        mounted() {
            
        },
        props:{
            'activities': Array,
        },
    }
    </script>