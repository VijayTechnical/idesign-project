{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-base-layout>
    <!-- site__body -->
    <div class="site__body login-register-container">

        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column  mt-4 mt-md-0 mx-auto">
                        <div class="card flex-grow-1 mb-md-0">
                            <div class="card-body">
                                <h3 class="card-title">Login</h3>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email" name="email"
                                            :value="old('email')" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password" required autocomplete="current-password" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <span class="form-check-input input-check"><span
                                                            class="input-check__body"><input class="input-check__input"
                                                                type="checkbox" id="login-remember" name="remember" />
                                                            <span class="input-check__box"></span>
                                                            <svg class="input-check__icon" width="9px" height="7px">
                                                                <use
                                                                    xlink:href="{{ asset('user_assets/images/sprite.svg') }}#check-9x7">
                                                                </use>
                                                            </svg> </span></span><label class="form-check-label"
                                                        for="login-remember">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="form-text text-muted float-right"><a
                                                    href="{{ route('password.request') }}">Forgotten
                                                    Password</a></small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-4">
                                            Login
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-xl-12 text-center items-center justify-center">
                                            <small class="form-text text-muted">Don't have account?<a
                                                    href="{{ route('register') }}"> Register</a></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
</x-base-layout>
