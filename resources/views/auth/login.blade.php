<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-brand-600">ایرانی‌گرام</h1>
        <p class="text-gray-500 text-sm mt-1">به حسابت وارد شو</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="ایمیل" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="رمز عبور" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brand-600 shadow-sm focus:ring-brand-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">مرا به خاطر بسپار</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-brand-600 hover:underline" href="{{ route('password.request') }}">
                    رمزت رو فراموش کردی؟
                </a>
            @endif

            <x-primary-button class="bg-brand-600 hover:bg-brand-700">
                ورود
            </x-primary-button>
        </div>

        <p class="text-center text-sm text-gray-500 mt-6">
            حساب نداری؟
            <a href="{{ route('register') }}" class="text-brand-600 hover:underline">ثبت‌نام کن</a>
        </p>
    </form>
</x-guest-layout>
