<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $index = 1;
    public function definition(): array
    {
        
        return [
            'ma' => $this->faker->regexify('[A-Z]{4}'),
            'ten' => implode(' ', $this->faker->words(5)),
            'hinh_anh' => 'banners/bn'.self::$index++.'.jpg',
            'mo_ta' => $this->faker->paragraph,
            'trang_thai' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
