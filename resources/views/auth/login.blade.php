@extends('auth.layout', ['title' => "Login"])
@section('content')
    <div class="card-body p-5 text-center">

        <div class="md-2 mt-md-4 pb-5">

        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
        <p class="text-white-50 mb-4">Please enter your login and password!</p>
        <div class="alert alert-danger alert_message" style="display: none;"></div>

        <form method="POST" action="{{route('login.check')}}" id="login_form">
            @csrf
            <div class="mb-4">
                <div class="form-outline form-white">
                    <input name="email" type="email" id="typeEmailX" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX">Email</label>
                </div>
                <span class="text-danger error-text email_error"></span>
            </div>
            <div class="mb-4">
                <div class="form-outline form-white">
                    <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Password</label>
                </div>
                <span class="text-danger error-text password_error"></span>
            </div>

            <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

            <button wire:click="login" class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
        </form>
        <hr class="my-4">

        <button class="btn btn-lg btn-block btn-primary" style="background-color: #395fdd;"
            type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>

        </div>

        <div>
        <p class="mb-0">Don't have an account? <a href="{{route('register')}}" class="text-white-50 fw-bold">Sign Up</a>
        </p>
        </div>

    </div>
@endsection
          

@push('scripts')
    <script>
        $("#login_form").submit(function(e){
         e.preventDefault();
         $('.alert_message').hide()

         console.log($(this).serialize());
        var all = $(this).serialize();

        $.ajax({
            url:  $(this).attr('action'),
            type: "POST",
            data: all,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            //validate form with ajax. This will be communicating with your LoginController
            success: function(data){
                console.log('success');
                console.log(data);
                if (data.success===false) {
                    $('.alert_message').show().text(data.message);
                }
                
                if(data.success === true){
                    $('.alert_message').show().text(data.message);
                    window.location.replace(
                     '{{route("dashboard")}}'
                    );
                }
            },
            error: function(xhr, error){
                
                if(xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('.alert_message').show().text('An orror occured');
                }
            },

            })

        });
    </script>
@endpush