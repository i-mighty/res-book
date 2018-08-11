@extends('layouts.master')
@section('header')
    <div>
        <div class="wow fadeInLeft" data-wow-delay="0.3s">
            <h1 class="h1-responsive font-bold mt-sm-5">Reserve Your Spot</h1>
            <div class="h6">
                Never have to wait in a queue. Book your space long before you need it. Bookings for personal outings and for parties are all
                accepted.
                <br>
                <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="#content">Book Now</a></div>
            </div><br>
    </div>
@endsection
@section('content')
            <div class=" mt-sm-5" id="person">
                <div class="container">
                    <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                        <div class="card-header wow fadeIn">
                            <h2 class="h3 text-black-50 pt-5 pb-3 text-center">Personal Information</h2>
                        </div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('info')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input class="form-control" id="name" type="text" name="name" required="required"/>
                                                    <label for="name">Your name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input class="form-control" id="email" type="text" name="email" required="required"/>
                                                    <label for="email">Your email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="center-on-small-only mb-4">
                                            <button class="btn btn-indigo ml-0" type="submit"><i class="fa fa-arrow-circle-right mr-2"></i> Next </button>
                                        </div>
                                        <p style="font-size: 0.6em"> A table sits a maximum of six persons </p>
                                        <p style="font-size: 0.6em"> Please note that all reservations must be cancelled if they can no longer be meet. </p>
                                        <p style="font-size: 0.6em"> All reservations must be at least a day ahead </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection