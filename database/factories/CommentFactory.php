<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        $comments = [
            'عالیه! 🔥',
            'موافقم 👌',
            'خیلی خوب گفتی',
            'منم همین نظر رو دارم',
            'دقیقاً!',
            'چقدر جالب',
            'ادامه بده 💪',
            'ممنون از اشتراک‌گذاری',
            'خیلی مفید بود 🙏',
            'لایک 👍',
            'به به! 👏',
            'عالی بود، ممنون',
            'حرف دلم رو زدی',
            'چقدر قشنگ نوشتی ✍️',
            'منم تجربه مشابهی داشتم',
            'دقیقاً همینطوره',
            'چه پروژه جالبی! 🚀',
            'خسته نباشی ❤️',
            'موفق باشی 🌟',
            'دلم هوای این کار رو کرد',
        ];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'post_id' => Post::inRandomOrder()->first()->id,
            'body' => fake()->randomElement($comments),
        ];
    }
}
