<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use WireUi\Traits\Actions;

class CategoryCreate extends Component
{

    public $newCategory;

    public $is_editing;

    use Actions;

    protected $listeners = ['editItem' => 'edit'];

    public function mount(Category $category)
    {
        $this->newCategory = $category;
    }


    public function store()
    {
        $this->validate([
            'newCategory.title' => 'required|unique:categories,title',
            'newCategory.category_type_id' => 'required',
            'newCategory.is_active' => 'required',
            'newCategory.description' => 'required',
        ]);

        $this->newCategory->save();

        $this->newCategory = new Category();

        $this->emit('created');
        $this->emitTo('categories.category-list', 'refreshList');
        $this->is_editing = false;

        $this->notification()->success(
            $title = 'Category saved',
            $description = 'Your Category was successfull saved'
        );
    }

    protected function rules()
    {
        return [
            'newCategory.title' => '',
            'newCategory.category_type_id' => '',
            'newCategory.is_active' => '',
            'newCategory.description' => '',
        ];
    }

    public function render()
    {
        $this->newCategory->is_active = true;

        return view('livewire.categories.create');
    }


    public function edit(Category $Category)
    {
        $this->resetValidation();
        $this->is_editing = true;
        $this->newCategory = $Category;

    }

    public function update()
    {
        $this->validate([
            'newCategory.title' => 'required|unique:categories,title,'. $this->newCategory->id,
            'newCategory.category_type_id' => 'required',
            'newCategory.is_active' => 'required',
            'newCategory.description' => 'required',
        ]);

        $this->newCategory->save();

        $this->newCategory = new Category();

        $this->emit('updated');
        $this->emitTo('categories.category-list', 'refreshList');
        $this->is_editing = false;

        $this->notification()->success(
            $title = 'Category updated',
            $description = 'Your Category was successfull updated'
        );
    }

    public function editCancel()
    {

        $this->newCategory = new Category();
        $this->resetValidation();
        $this->is_editing = false;

    }
}
