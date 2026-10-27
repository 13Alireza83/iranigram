<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // کاربر دمو (برای تست سریع کارفرما)
        $demo = User::create([
            'name' => 'کاربر دمو',
            'email' => 'demo@iranigram.test',
            'password' => Hash::make('password'),
            'bio' => 'این یک حساب نمونه برای تست ایرانی‌گرام است.',
        ]);

        // ۵ کاربر نمونه
        $users = User::factory(5)->create();

        // ۲۰ پست
        $posts = Post::factory(20)->create();

        // ۴۰ کامنت (روی پست‌های تصادفی)
        Comment::factory(40)->create();

        // ۶۰ لایک (با firstOrCreate برای جلوگیری از تکراری)
        for ($i = 0; $i < 60; $i++) {
            $userId = User::inRandomOrder()->first()->id;
            $postId = Post::inRandomOrder()->first()->id;

            Like::firstOrCreate([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }

        // چند پست برای کاربر دمو (که فیدش خالی نباشه)
        $demo->posts()->createMany([
            ['body' => 'سلام! به ایرانی‌گرام خوش آمدید 🎉 این اولین پست منه.'],
            ['body' => 'ایرانی‌گرام یک شبکه اجتماعی مینی ساخته‌شده با Laravel 12 است.'],
            ['body' => 'دوست دارم نظرتون رو درباره این پروژه بدونم! 💬'],
        ]);
    }
}
