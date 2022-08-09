<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $category = DB::table('categories')->inRandomOrder()->limit(1)->first(['id']);
        $category = Category::inRandomOrder()->limit(1)->first('id');
        $status = ['active', 'archived'];
        $name = $this->faker->name(2, true);
    
        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'parent_id'   => $category? $category->id : null,
            'description' => $this->faker->words(10 ,true),
            'image_path'  => $this->faker->imageUrl(),
            'status'      => $status[rand(0, 1)],
        ];
    }
}
