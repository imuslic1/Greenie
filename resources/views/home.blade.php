@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 text-center "><strong>Earn Rewards for a Greener Future!</strong></h1>
                <h4 class="text-center">Use eco-friendly services, earn points, and unlock exclusive discounts.</h4>

                <div class="text-center pt-5">
                    <a href="/register" class="btn btn-success btn-lg" style="font-size: 1.7rem; padding: 1rem 2rem;">Start
                        earning now!</a> <!-- Add route to the button -->
                </div>

                <div class="text-center pt-5">
                    <h2>How it works:</h2>
                    <div class="row justify-content-center pt-4">
                        <div class="col-3">
                            <h4 style="height: 7vh">1. Use eco-friendly services</h4>
                            <img src="{{ asset('images/eco-friendly-icon.png') }}" alt="Leaf Icon" class="img-fluid"
                                style="max-width: 15vh;">

                        </div>
                        <div class="col-3">
                            <h4 style="height: 7vh">2. Earn points for every service</h4>
                            <img src="{{ asset('images/earn-points-icon.png') }}" alt="Leaf Icon" class="img-fluid"
                                style="max-width: 15vh;">
                        </div>
                        <div class="col-3">
                            <h4 style="height: 7vh">3. Unlock exclusive discounts</h4>
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


    <div class="container mt-5" style="max-width: 1024px">
        <div class="row">
            <h1 class="display-4 text-center pb-4"><strong>Offers by our partners:</strong></h1>

            @foreach ($partners as $partner)
                <div class="col-md-4 p-1">
                    <div class="card h-100 card-background">
                        @if ($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" class="card-img-top"
                                alt="{{ $partner->name }} Logo">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $partner->name }}</h5>
                            <p class="card-text">partners for {{ $partner->created_at->diffForHumans(null, true) }}</p>
                            @if ($partner->openOffers)
                                <h6 class="card-subtitle mb-2 text-muted">Currently Open Offers:</h6>
                                <ul>
                                    @foreach ($partner->offers as $offer)
                                        @if ($offer->active)
                                            <li>{{ 'For ' }}{{ $offer->amount }}
                                                {{ \Illuminate\Support\Str::plural('token', $offer->amount) }}:
                                                {{ 'You receive' }} {{ $offer->discount_percentage . '% off' }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p class="card-text">Unfortunately there are no offers available at the moment.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
