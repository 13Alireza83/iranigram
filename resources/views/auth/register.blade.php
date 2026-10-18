<x-guest-layout>
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-brand-600">ایرانی‌گرام</h1>
        <p class="text-gray-500 text-sm mt-1">حساب جدید بساز</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" value="نام" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="ایمیل" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="رمز عبور" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="تکرار رمز عبور" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-brand-600 hover:underline" href="{{ route('login') }}">
                قبلاً ثبت‌نام کردی؟
            </a>

            <x-primary-button class="bg-brand-600 hover:bg-brand-700">
                ثبت‌نام
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
