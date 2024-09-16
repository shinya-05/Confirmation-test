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
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tell1' => $this->faker->randomNumber(3),
            'tell2' => $this->faker->randomNumber(3),
            'tell3' => $this->faker->randomNumber(3),
            'address' => $this->faker->address,
            'detail' => $this->faker->text(120),
    ];
  }
}
