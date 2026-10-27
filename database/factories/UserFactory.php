<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $firstNames = ['علی', 'رضا', 'محمد', 'حسین', 'سارا', 'مریم', 'زهرا', 'نرگس', 'امیر', 'مهدی', 'پریسا', 'شیرین'];
        $lastNames = ['محمدی', 'رضایی', 'حسینی', 'کریمی', 'احمدی', 'موسوی', 'جعفری', 'صادقی', 'نوری', 'اکبری'];

        $name = fake()->randomElement($firstNames) . ' ' . fake()->randomElement($lastNames);

        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'bio' => fake()->randomElement([
                'برنامه‌نویس وب',
                'عاشق تکنولوژی',
                'طراح گرافیک',
                'دانشجوی کامپیوتر',
                'موسیقی‌دوست',
                'کتاب‌خوان',
                'عکاس',
                'ورزشکار',
                null,
            ]),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
