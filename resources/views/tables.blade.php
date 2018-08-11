@extends('layouts.master')
@section('header')
    <div class="wow fadeInLeft" data-wow-delay="0.3s">
        <h1 class="h1-responsive font-bold mt-sm-5">View Available tables</h1>
        <div class="h6">
            View all reservations for the next seven days
            <br>
            <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="#content">View All</a></div>
        </div><br>
    </div>
@endsection
@section('content')
    <div id="tables">
        <v-server-table url="{{url('/tables')}}" :columns="columns" :options="options"></v-server-table>
    </div>
@endsection