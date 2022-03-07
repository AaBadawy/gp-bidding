<?php

namespace Tests\Feature\Vendor;

use App\Entities\Vendor;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateVendorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function update_vendor_and_owner_when_valid()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class, Authenticate::class]);
        $vendor = [
            'name' => 'vendor',
            'email' => 'vendor@antique.com',
            'website' => 'https://www.website.com',
            'description' => 'This IS My Last Descritption',
            'owner' => [
                'name' => 'Ahmed Badawy',
                'email' => 'ahmeddd@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        ];
        $response = $this->post(config('antique.dashboard-prefix').'/vendors', $vendor);
        $response->assertSessionHasNoErrors();
        $updated_vendor = [
            'name' => 'vendor updated',
            'email' => 'vendor@gmail.com',
            'website' => 'https://www.website.com',
            'description' => '',
            'owner' =>
            [
                'name' => 'Ahmed Badawy',
                'email' => 'ahmed@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]
        ];

        $vendor = Vendor::first();
        $response = $this->put(config('antique.dashboard-prefix')."/vendors/$vendor->id", $updated_vendor);
        $response->assertStatus(302);
    }
}
