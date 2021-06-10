<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        $title = $this->faker->unique()->sentence();
        $slug = Str::slug($title, '-');

        return [
            'title' => $title,
            'slug' => $slug,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text(60),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
