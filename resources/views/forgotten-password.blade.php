<html>
@extends('layout.gateway')
@section('content')
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3" style="margin-top: 5%; margin-bottom: 5%">
                <h1 class="text-center">User Login</h1>
                <div class="card">
                    <div class="card-body p-md-5 bg-light">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form class="needs-validation" novalidate role="form" action="{{ url('forgotten-password') }}" method="post" id="form" data-parsley-validate>
                            <input type="hidden" name="_token" value="{{ @csrf_token() }}">
                            <div class="form-group row">
                                <label for="colFormLabelLg">Enter your Email</label>
                                <input type="email" name="email" required placeholder="Email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror">
                                <div class="invalid-feedback">
                                    Please Provide a valid Email
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @error('email')
                                <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <button type="submit" id="submit" class="btn btn-dark  btn-block btn-lg">Login</button>
                            </div>
                            <p>Click <a href="{{ URL::to('login') }}">here</a> to login  </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
</html>
