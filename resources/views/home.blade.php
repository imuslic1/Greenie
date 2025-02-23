@extends('layouts.base')
@section('content')
    <div class="container mt-5 mx-auto">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 text-center"><strong style="color: #1E555C; font-weight: bold;">Earn Rewards for a Greener Future!</strong></h1>
                <h4 class="text-center" style="color: #1E555C; opacity: 60%;">Use eco-friendly services, earn points, and unlock exclusive discounts.</h4>

                <div class="text-center pt-5">
                    <a href="
                        @if (Auth::check())
                            {{ route('users.index', ['user' => Auth::user()->slug]) }}
                        @else
                            {{ route('register') }}
                        @endif" class="btn btn-success btn-lg" style="font-size: 1.7rem; padding: 1rem 2rem;">Start
                        earning now!</a> <!-- Add route to the button -->
                </div>

                <div class="text-center pt-5">
                    <h2 style="color: #1E555C">How it works:</h2>
                    <div class="row justify-content-center pt-4">
                        <div class="col-3">
                            <h4 style="height: 7vh; color: #1E555C">1. Use eco-friendly services</h4>
                            <img src="{{ asset('images/eco-friendly-icon.png') }}" alt="Leaf Icon" class="img-fluid"
                                style="max-width: 15vh;">

                        </div>
                        <div class="col-3">
                            <h4 style="height: 7vh; color: #1E555C">2. Earn points for every service</h4>
                            <img src="{{ asset('images/earn-points-icon.png') }}" alt="Leaf Icon" class="img-fluid"
                                style="max-width: 15vh;">
                        </div>
                        <div class="col-3">
                            <h4 style="height: 7vh; color: #1E555C">3. Unlock exclusive discounts</h4>
                            <img src="{{ asset('images/exclusive-discount-icon.png') }}" alt="Leaf Icon" class="img-fluid"
                                style="max-width: 15vh;">

                        </div>
                    </div>
                </div>

                <!--
                    <div class="text-center pt-5">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-lg"
                                style="font-size: 1.7rem; padding: 0.5rem 1.5rem;">Our Partners</a>
                        </div>
                    </div>
                -->
            </div>
        </div>
    </div>


    <div class="container my-5 mx-auto px-4" style="color: #1E555C">
        <div class="row g-4">
            <h1 class="display-4 text-center pb-4" ><strong>Our Partners</strong></h1>

            @foreach ($partners as $partner)
                <div class="col-md-4 p-1">
                    <div class="card h-100 card-background">
                        @if ($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" class="card-img-top"
                                alt="{{ $partner->name }} Logo">
                        @endif
                        <div class="card-body g-4" style="box-shadow: #1E555C 0px 0px 5px 0px;">
                            <h5 class="card-title" style="color: #1E555C">{{ $partner->name }}</h5>
                            <p class="card-text" style="opacity: 90%; color: #1E555C">Partners for {{ $partner->created_at->diffForHumans(null, true) }}</p>
                            @if ($partner->openOffers)
                                <a href="{{ route('offers.index', ['partner'=> $partner]) }}" class="btn dugme">View Offers</a>
                            @else
                                <p class="card-text" style="opacity: 50%; color: #1E555C">No offers available right now. Check back later!</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
