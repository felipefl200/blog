<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $PostandSlug = $this->faker->sentence();
        return [
            'title' => $PostandSlug,
            'content' => $this->faker->paragraphs(3, true),
            'slug' => Str::slug($PostandSlug),
            'image' => 'https://picsum.photos/300/150',
            'status' => $this->faker->boolean(),
            'like' => random_int(0,70),
            'author_id' => \App\Models\User::all()->random()
        ];
    }
}
