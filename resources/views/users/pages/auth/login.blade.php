@extends('users.layout.layout')

@section('title', '1212med | login')

@section('root')

    <section class="reg7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                    <form action="{{ route('loginsec.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="reg2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="reg8">
                                        <img src="{{ url('user-assets') }}/images/pic34.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="login2">
                                        <h4>Login</h4>
                                        <div class="mb-3 reg3">
                                            <label for="exampleInputemail" class="form-label">Email Address:</label>
                                            <input type="email" name="email" class="form-control" placeholder="Example@gmail.com">
                                        </div>
                                        <div class="mb-3 reg3">
                                            <label for="exampleInputpassword" class="form-label">Password:</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter at least 8+ characters">
                                        </div>
                                        <div class="reg3">
                                            <a href="{{ route('forgotsec.get')}}">Forget Password ?</a>
                                        </div>
                                        <div class="mb-3 reg3">
                                            <button type="submit" class="btn btn-secondary">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
