@extends('layouts.base')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@section('content')

    <div class="bg-canvas justify-content-center" style="padding-top: 100px; min-height: 100vh;">
        <h1 class="mt-5 text-center" style="color: #112F33">Login</h2>
        @if (session('status'))
            <div class="alert alert-danger mx-auto" style="width: 300px;">
                    {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">

            @csrf

            <div class="row mx-auto my-3" style="width: 300px;">
                <div class="col-25">
                <label for="email" style="color: #112F33">Email</label></div>

                <div class="col-75">
                    <input id="email" value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mx-auto my-3" style="width: 300px;">
                <div class="col-25">
                <label for="password" style="color: #112F33">Password</label></div>

                <div class="col-75">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mx-auto my-3" style="width: 100px;">
                <button type="submit" class="btn dugme">Log in</button>
            </div>
        </form>
    </div>
@endsection