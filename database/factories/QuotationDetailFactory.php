<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotationDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'amount' => $this->faker->numberBetween(1, 3),
            'price' => $this->faker->numberBetween(100, 1000),
            'remark' => "",
            'quotation_id' => Quotation::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
