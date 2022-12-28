<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = Category::inRandomOrder()->limit(1)->first('id');
        $status = ['active', 'draft'];
        $name = $this->faker->name(2, true);

        return [
            'name'          => $name,
            'slug'          => Str::slug($name),
            'user_id'       => rand(1,3),
            'category_id'   => $category? $category->id : null,
            'description'   => $this->faker->words(5 ,true),
            'image_path'    => $this->faker->imageUrl(760,760),
            'status'        => $status[rand(0, 1)],
            'price'         => $this->faker->randomFloat(2, 50, 1000),
            'quantity'      => $this->faker->randomFloat(0, 0, 30),
            'sku'           => $this->faker->unique()->numberBetween(1, 1000),
            'height'        => $this->faker->numberBetween(1, 99),
            'width'         => $this->faker->numberBetween(1, 99),
            'weight'        => $this->faker->numberBetween(1, 99),
            'length'        => $this->faker->numberBetween(1, 99),
        ];
    }
}
