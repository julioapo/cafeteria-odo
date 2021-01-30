<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name_product = $this->faker->jobTitle();
        return [
            'name_product' => $name_product,
            'type_id' => $this->faker->randomElement([1,2,3]),
            'amount_product' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 200 ),
            'state_product' => 1,
            'category_id' => $this->faker->randomElement([1,2]),
            'product_day' => $this->faker->randomElement([0,1]),
            'slug' => Str::slug($name_product,'-'),
            'photo_file' => $this->faker->image(),
            'commentary' => $this->faker->text(250)
        ];
    }
}
