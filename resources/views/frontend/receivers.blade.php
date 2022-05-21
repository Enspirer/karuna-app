@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="kindness-section py-5">
    <div class="container">
        <div class="title-block">
            <div class="title">lreKdfõ flakaøh</div>
            <div class="subtitle">The Center for <span>Kindness</span></div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="card-block">
            @foreach(\App\Models\Receivers::all() as $receivers)
                <div class="card">
                    <div class="icon purple">{{substr( $receivers->requirement, 0, 1)}}</div>
                    <div class="name">{{$receivers->name}}</div>
                    <div class="location">{{$receivers->city}}</div>
                    <div class="text">{{$receivers->bio}}</div>
                    @auth()
                        <a href="{{route('frontend.payment',$receivers->id)}}" class="btn-fill">
                            <div class="btn-text">Donate Now</div>
                        </a>
                    @else
                        <a href="{{route('frontend.auth.register')}}" class="btn-fill">
                            <div class="btn-text">Donate Now</div>
                        </a>
                    @endauth

                </div>
            @endforeach
        </div>
{{--        <nav class="pagination-block">--}}
{{--            <ul class="pagination justify-content-end">--}}
{{--                <li class="page-item disabled">--}}
{{--                <a class="page-link">Previous</a>--}}
{{--                </li>--}}
{{--                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item">--}}
{{--                <a class="page-link" href="#">Next</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
    </div>
</section>

@endsection
