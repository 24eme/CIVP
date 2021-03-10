<?php

namespace Database\Factories;

use App\Models\Evenement;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvenementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evenement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(Faker $faker)
    {
        return [
          'id' => $faker->unique->id,
          'title' => $faker->sentence,
          'description' => $faker->text(),
          'start' => dateTimeBetween($startDate = '-1 months', $endDate = 'now'),
          'end' => dateTimeBetween($startDate = 'now', $endDate = '+6 months'),
          'profil_id' => factory(Profil::class)->create()->id,,
          'organisme_id' => factory(Organisme::class)->create()->id,,
          'textedeloi' => $faker->unique()->safeEmail,
          'liendeclaration' => $faker->unique()->url,
          'rrule' => $faker->text(),
        ];
    }
}
