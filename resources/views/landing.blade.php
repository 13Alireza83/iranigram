<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ایرانی‌گرام — شبکه اجتماعی مینی</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex flex-col bg-white">

{{-- Navbar --}}
<nav class="w-full py-5 px-6 bg-white border-b border-gray-100">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
            <span class="text-2xl font-bold bg-gradient-to-l from-brand-600 to-purple-600 bg-clip-text text-transparent">
                ایرانی‌گرام
            </span>
        <div class="flex gap-3 items-center">
            @auth
                <a href="{{ route('dashboard') }}" class="bg-gradient-to-l from-brand-600 to-purple-600 text-white px-5 py-2 rounded-lg hover:shadow-lg hover:shadow-purple-500/30 transition-all">
                    ورود به فید
                </a>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-brand-600 px-4 py-2 font-medium transition">ورود</a>
                <a href="{{ route('register') }}" class="bg-gradient-to-l from-brand-600 to-purple-600 text-white px-5 py-2 rounded-lg hover:shadow-lg hover:shadow-purple-500/30 transition-all">
                    ثبت‌نام
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- Hero --}}
<main class="relative flex-1 flex items-center justify-center px-6 bg-gradient-to-b from-brand-50 via-white to-purple-50 overflow-hidden">

    {{-- حباب‌های تزئینی --}}
    <div class="absolute top-20 right-20 w-72 h-72 bg-brand-200/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-20 w-72 h-72 bg-purple-200/30 rounded-full blur-3xl"></div>

    <div class="max-w-3xl text-center relative z-10">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur px-4 py-1.5 rounded-full text-sm font-medium mb-6 border border-brand-100 shadow-sm">
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
            <span class="text-gray-600">ساخته‌شده با Laravel 12</span>
        </div>

        <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
                <span class="bg-gradient-to-l from-brand-600 to-purple-600 bg-clip-text text-transparent">
                    ایرانی‌گرام
                </span>
        </h1>

        <p class="text-xl text-gray-700 mb-4 font-medium">
            گفتگوی کوچک، ارتباط بزرگ 🇮🇷
        </p>

        <p class="text-gray-500 mb-10 max-w-xl mx-auto leading-relaxed">
            یک شبکه اجتماعی مینی ساخته‌شده با Laravel 12 — پست بذار، لایک کن، کامنت بذار و با دیگران در ارتباط باش.
        </p>

        <div class="flex gap-4 justify-center flex-wrap">
            @auth
                <a href="{{ route('dashboard') }}" class="bg-gradient-to-l from-brand-600 to-purple-600 text-white px-8 py-3.5 rounded-xl hover:shadow-lg hover:shadow-purple-500/30 transition-all text-lg font-semibold">
                    ورود به فید
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-gradient-to-l from-brand-600 to-purple-600 text-white px-8 py-3.5 rounded-xl hover:shadow-lg hover:shadow-purple-500/30 transition-all text-lg font-semibold">
                    شروع کن
                </a>
                <a href="{{ route('login') }}" class="bg-white text-brand-600 border-2 border-brand-200 px-8 py-3.5 rounded-xl hover:border-brand-600 hover:bg-brand-50 transition-all text-lg font-semibold">
                    ورود
                </a>
            @endauth
        </div>

    </div>
</main>

{{-- Footer --}}
<footer class="py-8 text-center text-sm text-gray-500 bg-gray-50 border-t border-gray-100">
    <p class="mb-2">ایرانی‌گرام — یک پروژه نمونه با Laravel 12</p>
    <a href="https://github.com/13Alireza83/iranigram" target="_blank" class="text-brand-600 hover:text-purple-600 hover:underline font-medium transition">
        GitHub
    </a>
</footer>

</body>
</html>
