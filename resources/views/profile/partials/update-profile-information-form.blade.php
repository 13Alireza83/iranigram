<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            اطلاعات پروفایل
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            نام، ایمیل، بیو و عکس‌های پروفایلت رو ویرایش کن.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- کاور --}}
        <div>
            <x-input-label value="عکس کاور" />
            <div class="mt-2 relative">
                <div class="w-full h-40 rounded-xl overflow-hidden bg-gradient-to-br from-brand-500 to-brand-700">
                    @if($user->cover)
                        <img src="{{ asset('storage/' . $user->cover) }}" class="w-full h-full object-cover" alt="کاور">
                    @endif
                </div>
                <input type="file" name="cover" accept="image/*"
                       class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white hover:file:bg-brand-700 file:cursor-pointer">
            </div>
            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
        </div>

        {{-- آواتار --}}
        <div>
            <x-input-label value="عکس پروفایل" />
            <div class="mt-2 flex items-center gap-4">
                <div class="w-20 h-20 rounded-full overflow-hidden bg-gray-200 border-2 border-white shadow">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" class="w-full h-full object-cover" alt="آواتار">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-2xl">
                            {{ mb_substr($user->name, 0, 1) }}
                        </div>
                    @endif
                </div>
                <input type="file" name="avatar" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand-600 file:text-white hover:file:bg-brand-700 file:cursor-pointer">
            </div>
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        {{-- نام --}}
        <div>
            <x-input-label for="name" value="نام" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- ایمیل --}}
        <div>
            <x-input-label for="email" value="ایمیل" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        {{-- بیو --}}
        <div>
            <x-input-label for="bio" value="درباره من" />
            <textarea id="bio" name="bio" rows="3"
                      class="mt-1 block w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500"
                      placeholder="چند خط درباره خودت بنویس...">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-brand-600 hover:bg-brand-700">
                ذخیره
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600">
                    ✓ ذخیره شد
                </p>
            @endif
        </div>
    </form>
</section>
