@extends('layouts.master')
@section('header')
        <div class="wow fadeInLeft" data-wow-delay="0.3s">
            <h1 class="h1-responsive font-bold mt-sm-5">{{$person->name}}</h1>
            <div class="h6">
                You are just steps from completing your reservation
                <br>
                <div class="wow fadeInLeft" data-wow-delay="0.3s"><a class="btn btn-outline-white" href="#content">Continue</a></div>
            </div><br>
        </div>
@endsection
@section('content')
            <div class=" mt-sm-5" id="res">
                <div class="container">
                    <div class="wow fadeIn">
                        <h2 class="h3 text-black-50 pt-5 pb-3 text-center">Reservation Information</h2>
                    </div>
                    <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s" id="resForm">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{url('/store')}}" id="resForm" method="POST" onsubmit="return validateReservation()">
                                        {{csrf_field()}}
                                        <div class="row" id="">
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input v-model.number="folks" class="form-control" id="folks" type="number" name="head_count" required="required" min="0" oninput="validity.valid||(value='');"/>
                                                    <label for="folks">Number of People</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input v-model.number="tables" class="form-control" type="number" id="tabs" name="tab_count" required disabled>
                                                    <label for="tabs">Number of Tables</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input class="form-control c-datepicker-input" name="date_time" id="datetimepicker4" type="text" />
                                                    <label for="date_time">Date and Time</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="md-form">
                                                    <input class="form-control" name="duration" id="age" type="number" min="0" oninput="validity.valid||(value='');"/>
                                                    <label for="date_time">Duration (in hours)</label>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('moreScripts')
    <script>
        function validateReservation() {
            return false;
        }
    </script>
@endsection