@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">My Receivers</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="table-section">
    <div class="mobile-container">
        <table class="mobile-table payment-history-table">
            <tbody>

                @if(count(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->get()) == 0)
                    <section class="section-no-data">
                        <div class="mobile-container">
                            <div class="inner-wrapper">
                                <img src="{{url('images/not-found.png')}}" alt="">
                                <div class="text">No data foud</div>
                            </div>
                        </div>
                    </section>
                @else
                    @foreach(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->orderBy('id','desc')->get() as $key => $receiver)                       
                        <tr class="m-tr clickable-tr" data-href="{{route('frontend.mobile.receiver_agent',$receiver->id)}}">
                            <td class="m-td">
                                @if($receiver->profile_image == null)
                                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                                @else
                                    <img src="{{uploaded_asset($receiver->profile_image)}}" alt="">
                                @endif
                            </td>
                            <td class="m-td">
                                <div class="name">{{$receiver->name}}</div>
                            </td>
                            <td class="m-td">
                                <div class="name">{{$receiver->occupation}}</div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                
            </tbody>
        </table>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush