
<div class="card-body p-5 text-center">

    <div class="md-2 mt-md-4 pb-5">

    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
    <p class="text-white-50 mb-4">Please enter your login and password!</p>
    <x-alert />

    <div class="form-outline form-white mb-4">
        <input wire:model="email" type="email" id="typeEmailX" class="form-control form-control-lg" />
        <label class="form-label" for="typeEmailX">Email</label>
        <x-error field="email" />
    </div>

    <div class="form-outline form-white mb-4">
        <input wire:model="password" type="password" id="typePasswordX" class="form-control form-control-lg" />
        <label class="form-label" for="typePasswordX">Password</label>
        <x-error field="password" />
    </div>

    <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

    <button wire:click="login" class="btn btn-outline-light btn-lg px-5" type="button">Login</button>
    
    <hr class="my-4">

    <button class="btn btn-lg btn-block btn-primary" style="background-color: #395fdd;"
        type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>

    </div>

    <div>
    <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
    </p>
    </div>

</div>
          

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#togglePassword').on('click', function() {
                var passwordInput = $('#password');
                var passwordType = passwordInput.attr('type');
                
                if (passwordType === 'password') {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });
        });
    </script>
@endpush