@extends('layouts.base')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@section('content')

<div class="container mt-5" style="margin-bottom: 100px; color: #1E555C;" >
    <p class="display-5 mb-5 text-center" style="color: #1E555C; font-weight: bold;">LEADERBOARDS</p>
    <div class="row">
        <div class="col md-6">
            <h3>Users</h3>
            <ul class="list-group">
                <li class="list-group-item text-center align-items-center">
                    <div class="row">
                        <div class="col px-0">No.</div>
                        <div class="col-8 px-0">Name</div>
                        <div class="col px-0">Saved CO<sub>2</sub></div>
                        <div class="col px-0">
                        </div>
                    </div>

                    
                </li>
            </ul>
            <ul class="list-group">
                @foreach($topTenUsers as $index => $user)
                    <li class="list-group-item text-center align-items-center
                        @if($index == 0)
                            gold-bg
                        @elseif($index == 1)
                            silver-bg
                        @elseif($index == 2)
                            bronze-bg
                        @endif">

                        <div class="row">
                            <div class="col px-0">{{ ($index + 1)."." }}</div>
                            <div class="col-8 px-0">{{ $user->name }}</div>
                            <div class="col px-0">{{ $user->total_amount }}</div>
                            <div class="col px-0">
                                @if($index == 0)
                                    <img src="{{ asset('images/medal-gold.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                                @elseif($index == 1)
                                    <img src="{{ asset('images/medal-silver.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                                @elseif($index == 2)
                                    <img src="{{ asset('images/medal-bronze.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                                @endif
                            </div>
                        </div>
                        
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col md-6">
                <h3>Companies</h3>
                <ul class="list-group">
                <li class="list-group-item text-center align-items-center">
                    <div class="row">
                        <div class="col px-0">No.</div>
                        <div class="col-8 px-0">Name</div>
                        <div class="col px-0">Saved CO<sub>2</sub></div>
                        <div class="col px-0">
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="list-group">
                @foreach($topTenCompanies as $index => $company)
                <li class="list-group-item text-center align-items-center
                    @if($index == 0)
                        gold-bg
                        @elseif($index == 1)
                        silver-bg
                        @elseif($index == 2)
                        bronze-bg
                        @endif">  
                        <div class="row">
                            <div class="col px-0">{{ ($index + 1)."." }}</div>
                            <div class="col-8 px-0">{{ $company->name }}</div>
                            <div class="col px-0">{{ $company->total_amount }}</div>
                            <div class="col px-0">
                                @if($index == 0)
                                    <img src="{{ asset('images/medal-gold.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                                @elseif($index == 1)
                                    <img src="{{ asset('images/medal-silver.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                                @elseif($index == 2)
                                    <img src="{{ asset('images/medal-bronze.svg') }}" alt="icon" style="height: 100%; max-height: 30px; width: auto;">
                                @endif
                            </div>
                        </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
