@extends('layouts.base')

@section('content')
    <div class="m-4 mx-5" >

        <div class="row border border-2 rounded p-3">
            <div class="col-auto text-center" style="min-width: 300px; min-height: 200px; color: #112F33;">
                <div style="color: #112F33;">

                    <h1 class="text-center h-25">{{ $user->name }}</h2>

                    <p>{{ $user->email }}</p>

                    <div class="row">
                        <div class="col">
                            <h3 class="pb-3 pt-4 text-nowrap">Balance: </h3>
                        </div>
                        <div class="col d-flex align-items-center gap-2">

                            <h3 class="mb-0">{{ $user->balance }}</h3>
                            <img src="{{ asset('images/coin-icon.png') }}" alt="Novčić!" style="max-width: 30px;">
                        </div>
                    </div>


                </div>
            </div>

            <div class="col" style="background-color: #fff;">
                <h2 class="text-center h-25">Stats</h2>
                <div class="row g-2 h-75">
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center">
                            @if ($trend > 0)
                                <img src="{{ asset('images/trend-up.png') }}" alt="Lit!" style="max-width: 50px; padding: 3%">
                            @elseif ($trend < 0)
                                <img src="{{ asset('images/trend-down.png') }}" alt="Lit!" style="max-width: 50px; padding: 3%">    
                            @endif
                        </div>
                        <h2 style="color: {{ $trend > 0 ? 'green' : ($trend < 0 ? 'red' : 'black') }};">{{ $trend . '%' }}</h2>
                        <p>This week's trend</p>
                    </div>

                    <div class="col text-center d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('images/fire-icon.png') }}" alt="Lit!" style="max-width: 50px; padding: 3%">
                        </div>
                        <h2>{{ $user->current_streak }}</h2>
                        <p>Current streak</p>
                    </div>

                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h2>{{ $user->longest_streak }}</h2>
                        <p>Longest streak</p>
                    </div>
                </div>
            </div>


        </div>

        <div class="row mt-3 ">
            <div class="col-auto border border-2 rounded p-3" style="min-width: 300px; min-height: 200px; margin-right: 15px;">
                <div>
                    @if ($connections->isEmpty())
                        <h2 class="text-center h-25">Connections</h2>
                        <p class="opacity-50">No connections to show.</p>
                    @else
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th><h2 class="text-center h-25">Connections</h2></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($connections as $connection)
                                    <tr>
                                        <td>
                                            <a href="/users/{{ $connection->slug }}"
                                                class="text-decoration-none darken-hover">
                                                {{ $connection->name }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>

           
            @if (Auth::user()->id == $user->id)
                @if ($user->transactions->isEmpty())
                    <div class="col border border-2 rounded p-3">
                        <h2 class="text-center h-25">Recent Transactions</h2>
                        <p class="opacity-50">No recent transactions.</p>
                    </div>      
                @else   
                    <div class="col border border-2 rounded p-3">
                        <h2 class="text-center h-25">Recent Transactions</h2>
                        <table class="table transakcije-tabela">
                            <thead>
                                <tr>
                                    <th>Partner</th>
                                    <th>Amount</th>
                                    <th>Date & time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user->transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->partner->name }}</td> <!-- Dodati link na stranicu partnera -->
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endif

        </div>

    @endsection
