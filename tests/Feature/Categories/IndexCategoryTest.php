<?php

namespace Tests\Feature\Categories;

use Livewire\Livewire;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Livewire\Categories\CategoryNew;


/**
 * @group categories
 * @group indexCategory
 */

class IndexCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function existsComponentsCategory()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create())
            ->get(route('categories.index'))
            ->assertSeeLivewire('categories.category-new');

    }
}
