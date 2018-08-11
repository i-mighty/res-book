@extends('layouts.master')
@section('header')
    <div class="wow fadeInLeft" data-wow-delay="0.3s">
        <h1 class="h1-responsive font-bold mt-sm-5">{{$owner->name}}</h1>
        <div class="h6">
            View all your reservations
            <br>
            <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="#content">View All</a></div>
        </div><br>
    </div>
@endsection
@section('content')
    @if($text === 'real')
        <div id="your_res">
            <v-server-table url="{{url('/your_res/'.$owner->email)}}" :columns="columns" :options="options"></v-server-table>
        </div>
    @else
        <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
            <div class="card-header">
                <h2>That was wrong,</h2>
            </div>
            <div class="card-body black-text p-5">
                <div class="row">
                    <div class="col-md-12">
                        <p>Looks like we could not find you.</p>
                        <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="{{url('')}}">Go Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection