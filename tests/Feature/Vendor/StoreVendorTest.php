<?php

namespace Tests\Feature\Vendor;

use App\Entities\Vendor;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class StoreVendorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function store_vendor_and_owner_values_when_valid()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class, Authenticate::class]);
        $vendor = [
            'name' => 'test vendor',
            'email' => 'b@d.com',
            'website' => 'https://www.website.com',
            'description' => 'new description',
            'owner' =>
            [
                'name' => 'Ahmed Badawy',
                'email' => 'Ahmed@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ],
        ];
        $response = $this->post(config('antique.dashboard-prefix').'/vendors', $vendor);


        $response->assertSessionHasNoErrors();
        //Redirect After Created
        $response->assertStatus(302);

        //Check Vendor Name
        $this->assertEquals('test vendor', Vendor::first()->name);

        // Check Owner Name
        $this->assertEquals('Ahmed Badawy' , Vendor::first()->owner->user->name);
    }

    /** @test */
    public function it_should_not_create_vendor_if_email_not_valid()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class, Authenticate::class]);
        $vendor = [
            'name' => 'test vendor',
            'email' => 'b@d.com',
            'website' => 'https://www.website.com',
            'description' => 'new description',
            'owner' =>
                [
                    'name' => 'Ahmed Badawy',
                    'email' => 'Ahmed@gmail.com',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ],
        ];
        $create = $this->post(config('antique.dashboard-prefix').'/vendors', $vendor);
        $new_vendor = [
            'name' => 'test vendor',
            'email' => 'b@d.com',
            'website' => 'https://www.website.com',
            'description' => 'new description',
            'owner' =>
                [
                    'name' => 'Ahmed Badawy',
                    'email' => 'Ahmed@gmail.com',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                ],
        ];
        $response = $this->post(config('antique.dashboard-prefix').'/vendors', $new_vendor);
        $response->assertSessionHasErrors(['owner.email']);
    }
}
