<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ویرایش پروفایل
        </h2>
    </x-slot>
    <div class="space-y-6">
        {{-- فرم اطلاعات پروفایل --}}
        <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- فرم تغییر رمز --}}
        <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
            @include('profile.partials.update-password-form')
        </div>

        {{-- حذف حساب --}}
        <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-app-layout>
