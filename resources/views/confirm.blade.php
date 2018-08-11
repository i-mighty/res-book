@extends('layouts.master')
@section('header')
    <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
        <div class="card-body black-text p-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Confirm your Reservation</h2>
                    <p>Please confirm your reservations of  tables.</p>
                    <div class="center mb-4">
                        <form class="col-md-6" method="post" action="{{url('/confirm')}}">
                                {{csrf_field()}}
                                <input class="btn btn-indigo ml-0" name="confirm" value="Confirm">
                            </form>
                        <form class="col-md-6" method="post" action="{{url('/confirm')}}">
                                {{csrf_field()}}
                                <input class="btn btn-red ml-0" name="cancel" value="Cancel">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection