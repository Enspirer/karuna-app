@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div class="table-container">
    <table class="db-table paymetn-history-table">
        <thead>
            <tr class="db-tr">
                <th class="db-th"></th>
                <th class="db-th"></th>
                <th class="db-th">Donor</th>
                <th class="db-th">Date</th>
                <th class="db-th">To Whom</th>
                <th class="db-th">Requirement</th>
                <th class="db-th">Amount</th>
                <th class="db-th"></th>
            </tr>
        </thead>
        <tbody>
            @if(count(App\Models\DonationInvoice::where('agent_id',auth()->user()->id)->get()) == 0)
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'No any Payments found',
                    'not_found_description' => null,
                    'not_found_button_caption' => null
                ])
            @else
                @foreach(App\Models\DonationInvoice::where('agent_id',auth()->user()->id)->orderBy('id','desc')->get() as $key => $payment)

                    <tr class="db-tr">
                        <td class="db-td">
                            <i class="bi bi-arrow-down-up"></i>
                        </td>
                        <td class="db-td">
                            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                        </td>
                        <td class="db-td">
                            @if(App\Models\Auth\User::where('id',$payment->donor_id)->first() != null)
                                <div class="text">{{App\Models\Auth\User::where('id',$payment->donor_id)->first()->name}}</div>
                            @endif
                        </td>
                        <td class="db-td">{{$payment->created_at->toDateString()}}</td>
                            @if(App\Models\Receivers::where('id',$payment->receiver_id)->first() != null)
                                <td class="db-td">{{App\Models\Receivers::where('id',$payment->receiver_id)->first()->name}}
                            @endif
                        </td>
                        <td class="db-td">Health Food</td>
                        <td class="db-td">USD {{$payment->amount}}</td>
                        <td class="db-td">
                            <a href="#" class="db-tbtn btn-outline">
                                <div class="btn-text">View Donation</div>
                            </a>
                        </td>
                    </tr>
                
                @endforeach
            @endif
            
            
        </tbody>
    </table>
</div>

@endsection

@push('after-scripts')

@endpush