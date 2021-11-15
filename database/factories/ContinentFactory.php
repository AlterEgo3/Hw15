<?php

namespace Database\Factories;

use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContinentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Continent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $path =database_path('data' . DIRECTORY_SEPARATOR . 'continents.json');

        $content = file_get_contents($path);

        $items=json_decode($content, true);

        $item = array_rand(array_unique($items));

        return [
            'code'=>$items[$item]
        ];
    }
}
