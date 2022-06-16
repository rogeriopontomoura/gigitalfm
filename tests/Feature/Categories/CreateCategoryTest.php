<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


/**
 * @group categories
 * @group createCategory
 */

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canCreateCategory()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $categoryFake = Category::factory()->make();
    }
}
