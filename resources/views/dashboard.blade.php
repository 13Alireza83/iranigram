<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            فید ایرانی‌گرام
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-8 text-center">
        <div class="text-5xl mb-4">🎉</div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">
            خوش آمدی، {{ auth()->user()->name }}!
        </h3>
        <p class="text-gray-500">
            به زودی پست‌ها اینجا نمایش داده می‌شن. فعلاً یه قهوه بخور ☕
        </p>
    </div>
</x-app-layout>
