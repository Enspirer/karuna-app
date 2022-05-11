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
            <div class="card">
                <div class="icon purple">M</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card active">
                <div class="icon blue">F</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon green">S</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon purple">M</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon blue">F</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon green">S</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
        </div>
        <nav class="pagination-block">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                <a class="page-link">Previous</a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>

@endsection