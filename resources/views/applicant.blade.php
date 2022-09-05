@extends('layouts.user')

@section('content')
<section class="content">
    <router-view></router-view>
    <vue-progress-bar></vue-progress-bar>
</section>
@endsection