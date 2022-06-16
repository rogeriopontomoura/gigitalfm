<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryNew extends Component
{

    public Category $newCategory;

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
            'newCategory.type_id' => 'required',
            'newCategory.color' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.categories.new');
    }
}
