@extends('layouts.base')
@section('content')
    <div class="container mt-5">

        <div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4>Development Team</h4>
                    <p><strong>Mirza Mahmutović</strong><br>
                        Lead Developer<br>
                        in/mirza-mahmutovic-882b72292</p>
                    <p><strong>Ismar Muslić</strong><br>
                        Frontend Developer<br>
                        in/ismar-muslić-223991217</p>
                    <p><strong>Haris Mališević</strong><br>
                        Junior Developer<br>
                        in/haris-malisevic</p>
                </div>
                <div class="col-md-6">
                    <h4>Product Owner</h4>
                    <p><strong>Emily Johnson</strong><br>
                        Product Owner<br>
                        emily.johnson@example.com</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2>Contact Us</h2>
                    <form action="/contact" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    @endsection
