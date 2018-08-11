@extends('layouts.master')
@section('header')
    @if($text == 'confirmed')
        <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
            <div class="card-header">
                <h2>Completed!</h2>
            </div>
            <div class="card-body black-text p-5">
                <div class="row">
                    <div class="col-md-12">
                        <p>Your order has been placed successfully</p>
                        <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="{{url('')}}">Go Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($text == 'invalid')
        <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
            <div class="card-header">
                <h2>That was wrong</h2>
            </div>
            <div class="card-body black-text p-5">
                <div class="row">
                    <div class="col-md-12">
                        <p>Your order should be placed at least one day in advance.</p>
                        <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="{{url('')}}">Go Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($text == 'overload')
        <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
            <div class="card-header">
                <h2>Not enough space</h2>
            </div>
            <div class="card-body black-text p-5">
                <div class="row">
                    <div class="col-md-12">
                        <p>Time and space didn't add up.</p>
                        <p>Check out the list of available spaces and try again</p>
                        <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="{{url('')}}">Go Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
            <div class="card-header">
                <h2>All good</h2>
            </div>
            <div class="card-body black-text p-5">
                <div class="row">
                    <div class="col-md-12">
                        <p>Your order was cancelled</p>
                        <p>We hope you come back soon...</p>
                        <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="{{url('')}}">Go Home</a></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('content')@endsection