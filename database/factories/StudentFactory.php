<?php

namespace Database\Factories;

use App\Models\Career;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genre = $this->faker->randomElement( ['Female', 'Male', 'Other']);
        $firstName = $genre != 'Other' ? $this->faker->firstName($genre) : $this->faker->firstName;
        $career = Career::count() > 0 ? Career::all()->random()->id : NULL;
        return [
            'first_name' => $firstName,
            'last_name' => $this->faker->lastName,
            'id_type' => $this->faker->randomElement(['DNI', 'Passport']),
            'id_number' => $this->faker->randomNumber,
            'genre' => $genre,
            'date_of_birth' => $this->faker->date,
            'career_id' => $career,
            'email_address' => $this->faker->email,
            'phone_number' => $this->faker->e164PhoneNumber
        ];
    }
}
