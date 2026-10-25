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

            {{-- نوار پایین: لایک + ویرایش/حذف --}}
            <div class="mt-4 flex items-center gap-4 pt-4 border-t border-gray-100">

                {{-- لایک --}}
                <form method="POST" action="{{ route('posts.like', $post) }}">
                    @csrf
                    @php
                        $liked = $post->likes->contains('user_id', auth()->id());
                    @endphp
                    <button type="submit" class="flex items-center gap-1.5 text-sm transition {{ $liked ? 'text-red-500' : 'text-gray-400 hover:text-red-500' }}">
                        <span class="text-lg">{{ $liked ? '❤️' : '🤍' }}</span>
                        <span>{{ $post->likes->count() }}</span>
                    </button>
                </form>

                {{-- ویرایش/حذف (فقط صاحب) --}}
                @if(auth()->id() === $post->user_id)
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
                @endif

            </div>

            {{-- کامنت‌ها --}}
            <div class="mt-4 pt-4 border-t border-gray-100">
                <h3 class="text-sm font-bold text-gray-700 mb-3">
                    کامنت‌ها ({{ $post->comments->count() }})
                </h3>

                @if($post->comments->count() > 0)
                    <div class="space-y-2 mb-4">
                        @foreach($post->comments as $comment)
                            <div class="flex items-start gap-2 text-sm">
                                <div class="w-8 h-8 rounded-full overflow-hidden bg-brand-100 flex-shrink-0">
                                    @if($comment->user->avatar)
                                        <img src="{{ asset('storage/' . $comment->user->avatar) }}" class="w-full h-full object-cover" alt="">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-brand-600 text-xs font-bold">
                                            {{ mb_substr($comment->user->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-1 bg-gray-50 rounded-lg px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('profile.show', $comment->user) }}" class="font-medium text-gray-800 text-xs">
                                            {{ $comment->user->name }}
                                        </a>
                                        <div class="flex items-center gap-2">
                                            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                            @if(auth()->id() === $comment->user_id)
                                                <form method="POST" action="{{ route('comments.destroy', $comment) }}" onsubmit="return confirm('حذف کنم؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-xs text-red-400 hover:text-red-600">حذف</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="text-gray-700 mt-1">{{ $comment->body }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 mb-4">هنوز کامنتی نیست. اولین کامنت رو تو بذار!</p>
                @endif

                {{-- فرم کامنت --}}
                <form method="POST" action="{{ route('comments.store', $post) }}" class="flex gap-2">
                    @csrf
                    <input type="text" name="body" placeholder="کامنت بنویس..."
                           class="flex-1 rounded-lg border-gray-300 text-sm focus:border-brand-500 focus:ring-brand-500">
                    <button type="submit" class="bg-brand-600 text-white px-4 py-2 rounded-lg hover:bg-brand-700 transition text-sm">
                        ارسال
                    </button>
                </form>
                <x-input-error :messages="$errors->get('body')" class="mt-1" />
            </div>

        </div>

        {{-- بازگشت --}}
        <a href="{{ route('posts.index') }}" class="inline-block text-sm text-gray-500 hover:text-brand-600 transition">
            ← بازگشت به فید
        </a>

    </div>
</x-app-layout>
