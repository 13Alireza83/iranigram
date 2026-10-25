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

        @if(session('status') === 'post-deleted')
            <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded-lg">
                پست حذف شد
            </div>
        @endif

        {{-- فرم ارسال پست --}}
        <div class="bg-white shadow-sm sm:rounded-2xl p-6 border border-gray-100">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
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

                        {{-- فیلد عکس --}}
                        <div class="mt-2">
                            <input type="file" name="image" accept="image/*"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white hover:file:bg-brand-700 file:cursor-pointer">
                            <x-input-error :messages="$errors->get('image')" class="mt-1" />
                        </div>

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

                    {{-- عکس پست --}}
                    @if($post->image)
                        <div class="mt-3 rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full max-h-96 object-cover" alt="عکس پست">
                        </div>
                    @endif

                    {{-- نوار پایین: لایک + حذف --}}
                    <div class="mt-3 flex items-center gap-4 pt-3 border-t border-gray-100">

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

                        {{-- حذف (فقط صاحب) --}}
                        @if(auth()->id() === $post->user_id)
                            <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('حذف کنم؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:text-red-700 transition">
                                    حذف
                                </button>
                            </form>
                        @endif

                    </div>

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
