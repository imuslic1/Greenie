@extends('layouts.base')

@section('content')
    <div class="m-4 mx-auto" style="max-width: 1000px;">

        <div class="row">
            <div class="col-auto bg-dark text-center" style="min-width: 300px; min-height: 200px;">
                <div class="text-light">

                    <h2 class="pt-2">{{ $user->name }}</h2>

                    <p>{{ $user->email }}</p>

                    <h3 class="pb-3 pt-4"> {{ $user->balance . ' tokens' }}</h3>


                </div>
            </div>

            <div class="col bg-light">
                <h2 class="text-center h-25">User stats</h2>
                <div class="row g-2 h-75" style="border: 1px solid black;">
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h2 style="color: {{ $trend > 0 ? 'green' : ($trend < 0 ? 'red' : 'black') }};">{{ $trend . '%' }}
                        </h2>
                        <p>This weeks trend</p>
                    </div>

                    <div class="col text-center d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('images/fire-icon.png') }}" alt="Lit!" style="max-width: 50px;">
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

        <div class="row mt-3">
            <div class="col-auto" style="min-width: 300px; min-height: 200px;">
                <div>

                    @if ($connections->isEmpty())
                        <p>No connections</p>
                    @else
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Connections</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($connections as $connection)
                                    <tr>
                                        <td>
                                            <a href="/users/{{ $connection->slug }}"
                                                style="text-decoration: none;">{{ $connection->name }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>

            @if ($user->transactions->isEmpty())
                <div class="col-8 text-center mt-4">
                    <p>No transactions</p>
                </div>
            @else
                <div class="col">
                    <table class="table table-bordered text-center">
                        <thead class="position-sticky top-0 bg-light">
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

        </div>

    @endsection
