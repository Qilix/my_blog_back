<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Common\Models\Article;
use App\Common\Models\User;
use App\Common\Models\Comment;
use Database\Generators\StringGenerator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // User::factory()->count(10)->create();
        // Article::factory()->count(10)->create();
        // Comment::factory()->count(50)->create();

        $string = new StringGenerator;
        foreach (range(1, 10) as $i) {
            User::create([
                'name' => $string::generate_string(5),
                'email' => $string::generate_string(7) . "@mail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => $string::generate_string(20),
            ]);
        }
        foreach (range(1, 15) as $i) {
            Article::create([
                'title' => $string::generate_string(10),
                'text' => $string::generate_string(50),
                'sub_only' => rand(0, 1),
                'author' => User::get()->random()->id,
            ]);
        }
        foreach (range(1, 50) as $i) {
            Comment::create([
                'body' => $string::generate_string(30),
                'article_id' => Article::get()->random()->id,
                'author' => User::get()->random()->id,
            ]);
        }
    }
}
