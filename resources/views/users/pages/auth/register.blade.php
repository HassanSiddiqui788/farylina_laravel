@extends('users.layout.layout')

@section('title', '1212med | Register')

@section('root')

    <section class="reg7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                    <form action="{{ route('registersec.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="reg2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="reg8">
                                        <img src="{{ url('user-assets') }}/images/pic34.png" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="login2">
                                        <h4>Create an Account</h4>
                                        <div class="mb-3 reg3">
                                            <label for="exampleInputname" class="form-label">Full Name:</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Full name">
                                        </div>
                                        <div class="mb-3 reg3">
                                            <label for="exampleInputemail" class="form-label">Email Address:</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Example@gmail.com">
                                        </div>
                                        <div class="mb-3 reg3">
                                            <label for="exampleInputpassword" class="form-label">Password:</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter at least 8+ characters">
                                        </div>
                                        <div class="mb-3 reg3">
                                            <label for="exampleInputpassword" class="form-label">Confirm Password:</label>
                                            <input type="password" name="cpassword" class="form-control"
                                                placeholder="Enter at least 8+ characters">
                                        </div>
                                        <div class="reg3">
                                            <a href="{{ route('loginsec.get') }}">Already have account ?</a>
                                        </div>
                                        <div class="mb-3 reg3">
                                            <button type="submit" class="btn">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="reg9 mt-3">
                                        <a href="#"><i class="fa-brands fa-apple"></i>&nbsp; &nbsp; &nbsp; Continue
                                            with Apple</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="reg10 mt-3">
                                        <a href="#"><i class="fa-brands fa-google"></i>&nbsp; &nbsp; &nbsp; Continue
                                            with Google</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
