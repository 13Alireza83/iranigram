<x-app-layout>
    <div class="max-w-3xl mx-auto">

        {{-- کاور --}}
        <div class="h-48 rounded-2xl overflow-hidden bg-gradient-to-br from-brand-500 to-brand-700 shadow-md">
            @if($user->cover)
                <img src="{{ asset('storage/' . $user->cover) }}" class="w-full h-full object-cover" alt="کاور">
            @endif
        </div>

        {{-- آواتار + نام + بیو --}}
        <div class="px-6 -mt-12 relative">
            <div class="flex items-end gap-4">

                {{-- آواتار --}}
                <div class="w-24 h-24 rounded-full border-4 border-white shadow-lg overflow-hidden bg-brand-100 flex-shrink-0">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="w-full h-full object-cover" alt="آواتار">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-brand-600 text-3xl font-bold">
                            {{ mb_substr($user->name, 0, 1) }}
                        </div>
                    @endif
                </div>

                {{-- دکمه ویرایش --}}
                @if(auth()->id() === $user->id)
                    <div class="ml-auto mb-2">
                        <a href="{{ route('profile.edit') }}" class="bg-brand-600 text-white px-5 py-2 rounded-lg hover:bg-brand-700 transition text-sm font-medium">
                            ویرایش پروفایل
                        </a>
                    </div>
                @endif

            </div>

            {{-- نام و بیو --}}
            <div class="mt-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>

                @if($user->bio)
                    <p class="text-gray-600 mt-2 leading-relaxed">{{ $user->bio }}</p>
                @else
                    <p class="text-gray-400 mt-2 text-sm">هنوز بیویی ننوشته...</p>
                @endif

                <p class="text-gray-400 text-sm mt-3">
                    عضو از {{ $user->created_at->format('Y/m/d') }}
                </p>
            </div>
        </div>

    </div>
</x-app-layout>
