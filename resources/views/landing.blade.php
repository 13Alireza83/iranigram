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

        <p class="text-gray-500 mb-8 max-w-xl mx-auto leading-relaxed">
            یک شبکه اجتماعی مینی ساخته‌شده با Laravel 12 — پست بذار، لایک کن، کامنت بذار و با دیگران در ارتباط باش.
        </p>

        {{-- آمار --}}
        <div class="flex justify-center gap-10 mb-10 text-center">
            <div>
                <div class="text-3xl font-bold text-brand-600">{{ \App\Models\User::count() }}</div>
                <div class="text-sm text-gray-500 mt-1">کاربر</div>
            </div>
            <div class="w-px bg-gray-200"></div>
            <div>
                <div class="text-3xl font-bold text-brand-600">{{ \App\Models\Post::count() }}</div>
                <div class="text-sm text-gray-500 mt-1">پست</div>
            </div>
            <div class="w-px bg-gray-200"></div>
            <div>
                <div class="text-3xl font-bold text-brand-600">{{ \App\Models\Comment::count() }}</div>
                <div class="text-sm text-gray-500 mt-1">کامنت</div>
            </div>
        </div>

        {{-- دکمه‌ها --}}
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

        {{-- دکمه کاربر دمو --}}
        @guest
            <div class="mt-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="email" value="demo@iranigram.test">
                    <input type="hidden" name="password" value="password">
                    <button type="submit" class="text-sm text-brand-600 hover:text-brand-700 underline transition">
                        یا با کاربر دمو وارد شو (بدون ثبت‌نام)
                    </button>
                </form>
            </div>
        @endguest

    </div>
</main>

{{-- Footer --}}
<footer class="py-10 text-center text-sm text-gray-500 bg-gray-50 border-t border-gray-100">

    {{-- شبکه‌های اجتماعی --}}
    <div class="flex justify-center gap-4 mb-5">
        <a href="https://github.com/13Alireza83/iranigram" target="_blank"
           class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:border-brand-600 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
        </a>

        <a href="https://linkedin.com/in/YOUR-LINKEDIN" target="_blank"
           class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:border-brand-600 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
        </a>

        <a href="https://t.me/YOUR-TELEGRAM" target="_blank"
           class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:border-brand-600 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0a12 12 0 0 0 0 24 12 12 0 0 0 0-24zm4.95 8.228l-1.826 8.602c-.137.61-.498.76-1.008.473l-2.786-2.053-1.344 1.293c-.15.15-.275.275-.562.275l.2-2.843 5.176-4.676c.225-.2-.05-.312-.348-.112l-6.394 4.024-2.752-.86c-.598-.187-.61-.598.125-.885l10.762-4.15c.498-.18.934.112.757.912z"/></svg>
        </a>

        <a href="mailto:YOUR-EMAIL@example.com"
           class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-brand-600 hover:border-brand-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </a>
    </div>

    <p class="mb-2">ایرانی‌گرام — یک پروژه نمونه با Laravel 12</p>
    <p class="text-xs text-gray-400">ساخته‌شده با ❤️ توسط علیرضا</p>
</footer>

</body>
</html>
