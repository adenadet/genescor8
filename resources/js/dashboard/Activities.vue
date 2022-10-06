<template>
    <div class="card">
        <div class="card-header"><h3 class="card-title">Recent Activities</h3></div>
        <div class="card-body table-responsive p-0" v-if="(activities != null && activities.length != 0)">
            <table class="table table-striped table-valign-middle">
                <tbody v-if="(activities != null && typeof(activities) != 'undefined')">
                    <tr v-for="activity in activities" :key="activity.id">
                        <td>
                            <UserCardHeader :user="activity.author" :activity="activity"/>
                        </td>
                        <td v-html="activity.content"></td>
                        <td><a href="#" class="text-muted"><i class="fas fa-eye"></i></a></td>
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
            activities: Array,
        },
    }
    </script>