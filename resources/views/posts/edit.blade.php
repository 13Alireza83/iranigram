<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ویرایش پست
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">

            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- متن پست --}}
                <div>
                    <x-input-label for="body" value="متن پست" />
                    <textarea id="body" name="body" rows="4"
                              class="mt-1 block w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500 resize-none"
                              placeholder="چه خبر؟...">{{ old('body', $post->body) }}</textarea>
                    <x-input-error :messages="$errors->get('body')" class="mt-1" />
                </div>

                {{-- عکس فعلی --}}
                @if($post->image)
                    <div class="mt-4">
                        <x-input-label value="عکس فعلی" />
                        <div class="mt-2 rounded-xl overflow-hidden max-w-xs">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto object-cover" alt="عکس پست">
                        </div>
                    </div>
                @endif

                {{-- آپلود عکس جدید --}}
                <div class="mt-4">
                    <x-input-label value="عکس جدید (اختیاری)" />
                    <input type="file" name="image" accept="image/*"
                           class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white hover:file:bg-brand-700 file:cursor-pointer">
                    <x-input-error :messages="$errors->get('image')" class="mt-1" />
                </div>

                {{-- دکمه‌ها --}}
                <div class="flex items-center gap-4 mt-6">
                    <x-primary-button class="bg-brand-600 hover:bg-brand-700">
                        ذخیره
                    </x-primary-button>

                    <a href="{{ route('posts.show', $post) }}" class="text-sm text-gray-500 hover:text-brand-600 transition">
                        انصراف
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
