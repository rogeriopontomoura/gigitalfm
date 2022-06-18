<?php

namespace Tests\Feature\Categories;

use App\Http\Livewire\Categories\CategoryList;
use Livewire\Livewire;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


/**
 * @group categories
 * @group CategoryList
 */

class CategoryListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function canDisplayPaginateCategory()
    {
        Category::factory(30)->create();

        Livewire::withQueryParams(['page' => 2])
            ->test(CategoryList::class)
            ->assertPayloadSet('page', 2);

    }
}
