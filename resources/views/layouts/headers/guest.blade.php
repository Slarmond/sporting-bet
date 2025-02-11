<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <h1 class="text-white">{{ __('Welcome to ') }}{{ env('APP_NAME')}}</h1>

                    <p class="text-lead text-light mt-3 mb-0">
                        {{ __('Log in and see the last matches\' results of your favourite team.') }}
                        @include('alerts.migrations_check')
                    </p>
                </div>
                @if (isset($infoLogin))
                <div class="col-lg-5 col-md-6">
                        <h3 class="text-lead text-white mt-5 mb-0">
                            <strong>{{ __('You can log in with 3 user accounts:') }}</strong>
                        </h3>
                        <ol class="text-lead text-light mt-3 mb-0">
                            <li>{{ __('Username1') }} <b>jsmith@degenerates.com</b> </li>
                            <li>{{ __('Username2') }} <b>jbrown@degenerates.com</b> </li>
                            <li>{{ __('Username3') }} <b>gdavis@degenerates.com</b> </li>
                            {{ __('Password') }} <b>secret</b>
                        </ol>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>