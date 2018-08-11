@extends('layouts.master')
@section('header')
    <div class="wow fadeInLeft" data-wow-delay="0.3s">
        <h1 class="h1-responsive font-bold mt-sm-5">Your reservations</h1>
        <div class="h6">
            View all your reservations
            <br>
            <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="#content">Go</a></div>
        </div><br>
    </div>
@endsection
@section('content')
    <div class=" mt-sm-5" id="person">
        <div class="container">
            <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-header wow fadeIn">
                    <h2 class="h3 text-black-50 pt-5 pb-3 text-center">Your Email Address</h2>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('c_res')}}" method="POST">
                                {{csrf_field()}}
                                <div class="row">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection