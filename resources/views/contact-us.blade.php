@extends('layouts.base')
@section('content')
    <div class="container mt-5" style="color: #1E555C">

        <div >
            <div class="row mb-4">
                <div class="col-md-6">
                    <h1 class="mt-5" style="color: #1E555C">Development Team</h2>
                </div>
            </div>

            <div class="accordion accordion-flush my-5">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Mirza Mahmutović
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"> Developer<br>
                        in/mirza-mahmutovic-882b72292</p></div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Ismar Muslić
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"> Developer<br>
                        in/ismar-muslić-223991217</p>
                   </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Haris Mališević
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"> Developer<br>
                        in/haris-malisevic</p></div>
                  </div>
                </div>
              </div>

            <div class="mb-5 mx-0 d-flex justify-content-between">
                <div>
                    <h2>Contact Us</h2>
                    <form action="/contact" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" style="width: 400px" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn dugme mt-3">Submit</button>
                    </form>
                </div>
                <div>
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo">

                </div>
            </div>
        </div>
    @endsection
