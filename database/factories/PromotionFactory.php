<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement([
                'Big Sale on Electronics!',
                'Limited Time Offer: 50% Off!',
                'Buy One Get One Free!',
                'Exclusive Deals for Members!',
                'Hurry! Sale Ends Soon!',
            ]),
            'description' => $this->faker->paragraphs(3, true),
            'image' => 'promotions/' . $this->faker->numberBetween(1, 10) . '.jpg',
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}