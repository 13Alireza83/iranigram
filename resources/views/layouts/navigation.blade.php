<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            {{-- لوگو --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-brand-600">
                    ایرانی‌گرام
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-brand-600 font-medium">
                        فید
                    </a>
                @endauth
            </div>

            {{-- سمت چپ --}}
            <div class="flex items-center gap-3">
                @auth
                  <a href="{{route('profile.show', auth()->user())}}" class="text-gray-700 hover:text-brand-600">
                      {{auth()->user()->name}}

                  </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                            خروج
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-brand-600">ورود</a>
                    <a href="{{ route('register') }}" class="bg-brand-600 text-white px-4 py-2 rounded-lg hover:bg-brand-700">
                        ثبت‌نام
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>
