@extends('layouts.base')

@section('content')
    <div class="m-4">

        <div class="row">
            <div class="col-auto bg-dark" style="min-width: 300px; min-height: 200px;">
                <div class="text-light">

                    <h2 class="pt-2">Username</h2>
                    <h4 class="pb-3 pt-2">Balance: 0 tokens</h4>
                    <p>email: example@mail.com</p>

                </div>
            </div>
            <div class="col bg-light">
                <h2 class="text-center h-25">User stats</h2>
                <div class="row g-2 h-75" style="border: 1px solid black;">
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h3>123</h3>
                        <p>Total CO2 emission saved</p>
                    </div>
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h3>11</h3>
                        <p>Current streak</p>
                    </div>
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h3>17</h3>
                        <p>Longest streak</p>
                    </div>
                </div>
            </div>

        </div>
    @endsection
