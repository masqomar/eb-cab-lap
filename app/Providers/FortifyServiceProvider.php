<?php

namespace App\Providers;

use App\Actions\Fortify\{CreateNewUser, ResetUserPassword, UpdateUserPassword, UpdateUserProfileInformation};
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Str;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', fn(Request $request)  => Limit::perMinute(5)->by($request->session()->get('login.id')));

        Fortify::registerView(fn() => view('auth.register'));

        Fortify::loginView(fn() => view('auth.login'));

        Fortify::confirmPasswordView(fn() => view('auth.confirm-password'));

        Fortify::twoFactorChallengeView(fn() => view('auth.two-factor-challenge'));

        Fortify::requestPasswordResetLinkView(fn() => view('auth.forgot-password'));

        Fortify::resetPasswordView(fn(Request $request) => view('auth.reset-password', ['request' => $request]));

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->phone_number)
                ->orWhere('phone_number', $request->phone_number)
                ->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            }
        });
    }
}
