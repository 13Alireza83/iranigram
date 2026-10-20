<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            فید ایرانی‌گرام
        </h2>
    </x-slot>

    <div class="space-y-6">

        {{-- پیام موفقیت --}}
        @if(session('status') === 'post-created')
            <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-lg">
                ✓ پست شما منتشر شد
            </div>
        @endif

        {{-- فرم ارسال پست --}}
        <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                <div class="flex gap-3">
                    {{-- آواتار کاربر --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-brand-100 flex-shrink-0">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-full h-full object-cover" alt="آواتار">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-brand-600 font-bold">
                                {{ mb_substr(auth()->user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>

                    {{-- متن پست --}}
                    <div class="flex-1">
                        <textarea name="body" rows="3"
                                  class="w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500 resize-none"
                                  placeholder="چه خبر؟...">{{ old('body') }}</textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-1" />

                        <div class="flex justify-end mt-2">
                            <button type="submit" class="bg-brand-600 text-white px-6 py-2 rounded-lg hover:bg-brand-700 transition font-medium">
                                منتشر کن
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- لیست پست‌ها --}}
        <div class="space-y-4">
            @forelse($posts as $post)
                <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">

                    {{-- هدر پست: آواتار + نام + زمان --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('profile.show', $post->user) }}" class="w-12 h-12 rounded-full overflow-hidden bg-brand-100 flex-shrink-0">
                            @if($post->user->avatar)
                                <img src="{{ asset('storage/' . $post->user->avatar) }}" class="w-full h-full object-cover" alt="آواتار">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-brand-600 font-bold">
                                    {{ mb_substr($post->user->name, 0, 1) }}
                                </div>
                            @endif
                        </a>

                        <div>
                            <a href="{{ route('profile.show', $post->user) }}" class="font-bold text-gray-800 hover:text-brand-600 transition">
                                {{ $post->user->name }}
                            </a>
                            <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    {{-- متن پست --}}
                    <p class="mt-4 text-gray-800 leading-relaxed whitespace-pre-line">{{ $post->body }}</p>

                </div>
            @empty
                <div class="bg-white shadow-sm sm:rounded-2xl p-10 border border-gray-100 text-center">
                    <div class="text-5xl mb-3">📝</div>
                    <p class="text-gray-500">هنوز پستی نیست. اولین پست رو تو بذار! 🎉</p>
                </div>
            @endforelse
        </div>

        {{-- صفحه‌بندی --}}
        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>
</x-app-layout>
