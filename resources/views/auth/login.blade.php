@extends('layouts.base')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush
@section('content')

    <h1 class="view-title">Login</h1>


    <div class="justify-content-center" style="padding-top: 100px">

        @if (session('status'))
            <div class="alert alert-danger">
                    {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">

            @csrf

            <div class="row mx-auto my-3" style="width: 300px;">
                <div class="col-25">
                <label for="email">Email</label></div>

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
                <label for="password">Password</label></div>

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