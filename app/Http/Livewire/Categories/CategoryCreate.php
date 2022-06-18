<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{

    public $newCategory;

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
    }

    protected function rules()
    {
        return [
            'newCategory.title' => 'required',
            'newCategory.category_type_id' => 'required',
            'newCategory.color' => 'required',
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
}
