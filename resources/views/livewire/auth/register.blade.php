
<div class="card-body p-5 text-center">

    <div class="md-2 mt-md-4 pb-5">

    <h2 class="fw-bold mb-2 text-uppercase">Registration</h2>
    <p class="text-white-50 mb-4">Please enter your login and password!</p>

    <div class="form-outline form-white mb-4">
        <input wire:model="first_name" type="text" id="typeName" class="form-control form-control-lg" />
        <label class="form-label" for="typeName">Name</label>
        <x-error field="first_name" />
    </div>

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

    <div class="form-outline form-white mb-4">
        <input wire:model="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-lg" />
        <label class="form-label" for="password_confirmation">Confirm</label>
    </div>

    <button wire:click="register" class="btn btn-outline-light btn-lg px-5" type="button">Register</button>
    
    <hr class="my-4">

    <button class="btn btn-lg btn-block btn-primary" style="background-color: #395fdd;"
        type="submit"><i class="fab fa-google me-2"></i> Sign up with google</button>
    </div>

    <div>
    <p class="mb-0">Have an account? <a href="{{route('login')}}" class="text-white-50 fw-bold">Sign In</a>
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