<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_to_add_user()
    {
        $user = User::factory()->create();

        $this->assertModelExists($user);
    }

    public function test_to_edit_created_user()
    {
        $user = User::factory()->create();
        $user->update(['name' => 'Test User ' .rand(1,50)]);

        $this->assertModelExists($user);
    }

    public function test_to_delete_created_user()
    {
        $user = User::factory()->create();

        $user->delete();

        $this->assertDeleted($user);
    }



}
