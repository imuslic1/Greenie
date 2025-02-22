<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            @foreach ($partners as $partner)
                <div class="col-md-4">
                    <div class="card h-100 card-background">
                        @if ($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" class="card-img-top" alt="{{ $partner->name }} Logo">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $partner->name }}</h5>
                            <p class="card-text">partners for {{ $partner->created_at->diffForHumans(null, true) }}</p>
                            @if ($partner->openOffers)
                                <h6 class="card-subtitle mb-2 text-muted">Currently Open Offers:</h6>
                                <ul>
                                    @foreach ($partner->offers as $offer)
                                        @if ($offer->active)
                                            <li>{{ "For " }}{{ $offer->amount }} {{ \Illuminate\Support\Str::plural('token', $offer->amount) }}: {{ "You receive" }} {{ $offer->discount_percentage . "% off" }}</li>
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>