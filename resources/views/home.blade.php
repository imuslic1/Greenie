@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-md-4">
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
