<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            پست
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto space-y-4">

        {{-- پیام ویرایش موفق --}}
        @if(session('status') === 'post-updated')
            <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-lg">
                ✓ پست ویرایش شد
            </div>
        @endif

        {{-- کارت پست --}}
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">

            {{-- هدر: آواتار + نام + زمان --}}
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

            {{-- عکس پست --}}
            @if($post->image)
                <div class="mt-3 rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full max-h-96 object-cover" alt="عکس پست">
                </div>
            @endif

            {{-- دکمه‌های ویرایش/حذف (فقط صاحب) --}}
            @if(auth()->id() === $post->user_id)
                <div class="mt-4 flex gap-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('posts.edit', $post) }}" class="text-sm text-brand-600 hover:text-brand-700 transition font-medium">
                        ویرایش
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('حذف کنم؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700 transition font-medium">
                            حذف
                        </button>
                    </form>
                </div>
            @endif

        </div>

        {{-- بازگشت --}}
        <a href="{{ route('posts.index') }}" class="inline-block text-sm text-gray-500 hover:text-brand-600 transition">
            ← بازگشت به فید
        </a>

    </div>
</x-app-layout>
