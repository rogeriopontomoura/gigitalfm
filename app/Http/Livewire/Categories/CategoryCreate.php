<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use WireUi\Traits\Actions;

class CategoryCreate extends Component
{

    public $newCategory;

    public $editing;

    use Actions;

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
        $this->editing = false;

        $this->notification()->success(
            $title = 'Category saved',
            $description = 'Your Category was successfull saved'
        );
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
        $this->resetValidation();
        $this->editing = true;
        $this->newCategory = $Category;

    }

    public function editCancel()
    {

        $this->newCategory = new Category();
        $this->resetValidation();
        $this->editing = false;

    }
}
