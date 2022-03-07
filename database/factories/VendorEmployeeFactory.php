<?php

namespace Database\Factories;

use App\Entities\Vendor;
use App\Entities\VendorEmployee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VendorEmployee::class;

    public function configure()
    {
        return $this->afterCreating(function (VendorEmployee $employee){
            User::factory(1)->create([
                'userable_type' => 'App\Entities\VendorEmployee',
                'userable_id' => $employee->id,
            ]);
            $employee->assignRole('vendor');
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'is_owner' => 1,
            'vendor_id' => $this->faker->unique()->randomElement($this->getVendorIds()),
        ];
    }

    public function getVendorIds()
    {
        return Vendor::pluck('id');
    }
}
