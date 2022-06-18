<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{

    use WithPagination;

    protected $listeners = ['refreshList' => '$refresh'];


    public function edit(Category $category)
    {
        $this->newCategory = $category;

        $this->emitTo('categories.category-create', 'editItem', $category);

        //dd($newCategory->title);
    }


    public function getListProperty()
    {
        return Category::orderBy('id', 'DESC')->paginate();
    }

    public function render()
    {
        return view('livewire.categories.list');
    }
}
