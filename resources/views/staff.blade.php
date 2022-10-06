@extends('layouts.staff')

@section('content')
<section class="content">
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
            <div class="row">
        <!--<div class="col-md-3">
            
        </div>
        <div class="col-md-9">    </div>-->
    </div>
</section>
@endsection