<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Contact::class;


  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tell1' => $this->faker->numberBetween(1,5),
            'tell2' => $this->faker->numberBetween(1,5),
            'tell3' => $this->faker->numberBetween(1,5),
            'address' => $this->faker->text,
            'building' => $this->faker->text,
            'detail' => $this->faker->text(120),
    ];
  }
}
