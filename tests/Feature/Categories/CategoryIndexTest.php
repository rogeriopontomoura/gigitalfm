<?php

namespace Tests\Feature\Categories;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


/**
 * @group categories
 * @group CategoryIndex
 */

class CategoryIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function existsComponentsCategory()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create())
            ->get(route('categories.index'))
            ->assertSeeLivewire('categories.category-create')
            ->assertSeeLivewire('categories.category-list');

    }
}
