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

        Livewire::test(CategoryNew::class, ['category'=>$categoryFake])
        ->call('store')
        ->assertEmitted('created');

        $this->assertDatabaseHas('categories', [
            'title' => $categoryFake->title,
            'type_id' => $categoryFake->type_id,
            'color' => $categoryFake->color,
        ]);

    }
}
