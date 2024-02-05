<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  

        return [

            'user_id'=> $this->faker->numberBetween(1,10),
            'shop_id'=> $this->faker->numberBetween(1,20),
            'reserve_datetime' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'reserve_number' => $this->faker->numberBetween(1,10),
            
        ];
    }
 
}
