<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{

    public $newCategory;

    public $editing;

    protected $listeners = ['editItem' => 'editing'];

    public function mount(Category $category)
    {
        $this->newCategory = $category;
    }


    public function store()
    {
        $this->validate();

        $this->newCategory->save();

        $this->newCategory = new Category();

        $this->emit('created');
        $this->emitTo('categories.category-list', 'refreshList');
    }

    protected function rules()
    {
        return [
            'newCategory.title' => 'required',
            'newCategory.category_type_id' => 'required',
            'newCategory.is_active' => 'required',
            'newCategory.description' => 'required',
        ];
    }

    public function render()
    {
        $this->newCategory->is_active = true;
        $this->newCategory->color = '#FFF';

        return view('livewire.categories.create');
    }


    public function editing(Category $Category)
    {
        $this->editing = true;
        $this->newCategory = $Category;

    }
}
