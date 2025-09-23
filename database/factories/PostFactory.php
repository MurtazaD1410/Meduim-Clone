<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $content = fake()->paragraph(5);
        $image = fake()->imageUrl();
        $category_id = Category::inRandomOrder()->first()->id;
        $user_id = 1;
        $published_at = fake()->optional()->dateTime();


        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $content,
            'image' => $image,
            'category_id' => $category_id,
            'user_id' => $user_id,
            'published_at' => $published_at,
        ];
    }
}
