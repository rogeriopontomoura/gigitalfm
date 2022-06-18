<?php

namespace Tests\Feature\Categories;

use Livewire\Livewire;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Livewire\Categories\CategoryCreate;


/**
 * @group categories
 * @group CategoryCreate
 */

class CategoryCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canCategoryCreate()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $categoryFake = Category::factory()->make();

        Livewire::test(CategoryCreate::class, ['category'=>$categoryFake])
        ->call('store')
        ->assertEmitted('created')
        ->assertEmitted('refreshList');

        $this->assertDatabaseHas('categories', [
            'title' => $categoryFake->title,
            'category_type_id' => $categoryFake->category_type_id,
            'description' => $categoryFake->description,
        ]);

    }
}
