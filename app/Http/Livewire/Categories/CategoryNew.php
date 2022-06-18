<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoryNew extends Component
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
            'newCategory.type_id' => 'required',
            'newCategory.color' => 'required',
            'newCategory.is_active' => 'required',
            'newCategory.description' => 'required',
        ];
    }

    public function render()
    {
        return view('categories.new');
    }
}
