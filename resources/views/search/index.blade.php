<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            جستجو
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto space-y-6">

        {{-- فرم جستجو --}}
        <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
            <form method="GET" action="{{ route('search.index') }}" class="flex gap-2">
                <input type="text" name="q" value="{{ $query }}" placeholder="جستجوی کاربر یا پست..."
                       class="flex-1 rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500">
                <button type="submit" class="bg-brand-600 text-white px-6 py-2 rounded-lg hover:bg-brand-700 transition font-medium">
                    جستجو
                </button>
            </form>
        </div>

        {{-- حالت خالی --}}
        @if(!$query)
            <div class="bg-white shadow-sm sm:rounded-2xl p-10 border border-gray-100 text-center">
                <div class="text-5xl mb-3">🔍</div>
                <p class="text-gray-500">عبارت جستجو رو وارد کن...</p>
            </div>
        @else

            {{-- کاربران --}}
            <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4">
                    کاربران ({{ $users->count() }})
                </h3>

                @forelse($users as $user)
                    <a href="{{ route('profile.show', $user) }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-brand-100 flex-shrink-0">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-full h-full object-cover" alt="آواتار">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-brand-600 font-bold">
                                    {{ mb_substr($user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-gray-800">{{ $user->name }}</p>
                            @if($user->bio)
                                <p class="text-sm text-gray-500 line-clamp-1">{{ $user->bio }}</p>
                            @endif
                        </div>
                    </a>
                @empty
                    <p class="text-sm text-gray-400">کاربری پیدا نشد</p>
                @endforelse
            </div>

            {{-- پست‌ها --}}
            <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4">
                    پست‌ها ({{ $posts->count() }})
                </h3>

                @forelse($posts as $post)
                    <a href="{{ route('posts.show', $post) }}" class="block p-3 rounded-lg hover:bg-gray-50 transition border-b border-gray-50 last:border-0">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-7 h-7 rounded-full overflow-hidden bg-brand-100 flex-shrink-0">
                                @if($post->user->avatar)
                                    <img src="{{ asset('storage/' . $post->user->avatar) }}" class="w-full h-full object-cover" alt="">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-brand-600 text-xs font-bold">
                                        {{ mb_substr($post->user->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ $post->user->name }}</span>
                            <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-700 text-sm line-clamp-2">{{ $post->body }}</p>
                    </a>
                @empty
                    <p class="text-sm text-gray-400">پستی پیدا نشد</p>
                @endforelse
            </div>

        @endif

    </div>
</x-app-layout>
