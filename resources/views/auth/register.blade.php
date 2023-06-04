@extends('layouts.app')
@section('title' , 'Register')

@section('content')
<div class="conteiner-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="fw-bold text-secondary">Register</h2>
                </div>
                <div class="card-body p-5">
                    <div id="show_success_alert"></div>
                    <form action="#" method="post" id="register_form">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-mail">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="cpassword" id="cpassword" class="form-control rounded-0" placeholder="Confirm Password">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="mb-3 d-grid">
                            <input type="submit" value="Register" class="btn btn-dark rounded-0" id="register_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <dir>Already have an acoount?
                                <a href="/" class="text-decoration-none">
                                    Login Here
                                </a>
                            </dir>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(function () {
        $("#register_form").submit(function (e) {
            e.preventDefault();
            $("#register_btn").val('Please Wait...');
            $.ajax({
                method: "post",
                url: "{{route('auth.register')}}",
                data: $(this).serialize(),
                // dataType: "json",
                success: function (response) {
                    if(res.status == 400){
                        showError('name', res.message.name);
                        showError('email', res.message.email);
                        showError('password', res.message.password);
                        showError('cpasswprd', res.message.cpasswprd);
                          $("#register_btn").val('Register');


                    }else if(res.status == 200){
                        $("#show_success_alert").html(showMessage('seccess',res.message));
                        $("register_btn").val('Register');
                        removeValidationClasses("register_form");
                        $("#register_btn").val('Register');


                    }
                }
            });


        });
    });
</script>
@endsection
