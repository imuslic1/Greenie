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
                        <h2>123</h2>
                        <p>Total CO2 emission saved</p>
                    </div>
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h2>11</h2>
                        <p>Current streak</p>
                    </div>
                    <div class="col text-center d-flex flex-column justify-content-center">
                        <h2>17</h2>
                        <p>Longest streak</p>
                    </div>
                </div>
            </div>

            <div class="row g-2 mt-4">
                <div class="col-12">
                    <table class="table table-bordered text-center">
                        <thead class="position-sticky top-0 bg-light">
                            <tr>
                                <th>Partner</th>
                                <th>Amount</th>
                                <th>Date & time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Data 1</td>
                                <td>Data 2</td>
                                <td>Data 3</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td>Data 1</td>
                                <td>Data 2</td>
                                <td>Data 3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endsection
