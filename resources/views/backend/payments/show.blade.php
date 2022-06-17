@extends('backend.layouts.app')

@section('title', __('Payments View'))

@section('content')


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Donor Details</h4>
                                    <b>Donator Name: </b> <a href="{{url('')}}">{{$donor_details->first_name}} {{$donor_details->last_name}}</a>
                                    <b>Email: </b> <a href="{{url('')}}">{{$donor_details->email}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Volunteer Details</h4>
                                    <b>Volunteer Name: </b> <a href="{{url('')}}">{{$agent_details->first_name}} {{$agent_details->last_name}}</a><br>
                                    <b>Email: </b> <a href="{{url('')}}">{{$agent_details->email}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Receiver Details</h4>
                                    <b>Receiver Name: </b> <a href="{{url('')}}">{{$r_details->name}}</a><br>
                                    <b>Phone Number: </b> <a href="{{url('')}}">{{$r_details->phone_number}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            @if($r_details->requirement == 'Other')
                                <b>Package:</b>  Other <br>
                                <b>Amount: </b> Custom Amount
                            @else

                                <h4>
                                    <b>Package:</b> {{\App\Models\Packages::where('id',$r_details->requirement)->first()->name}} <br>
                                </h4>
                                <h3><b>Amount:</b> USD {{ number_format( \App\Models\Packages::where('id',$r_details->requirement)->first()->price,2)}}</h3>

                            @endif

                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Donation Details</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Date:</b> {{$r_details->updated_at}} <br>
                                            <b>Payment Status:</b> {{$r_details->payment_status}}<br>
                                            <b>Admin Status:</b> {{$r_details->status}}<br>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Paid At:</b> {{$r_details->paid_at}} <br>
                                            <b>Address:</b> {{$r_details->address}}<br>
                                            <b>Admin Status:</b> {{$r_details->nick_name}}<br>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--col-->
    </div><!--row-->





@endsection
