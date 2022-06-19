<?php

namespace App\Http\Livewire\Categorytypes;

use App\Models\CategoryType;
use Livewire\Component;
use WireUi\Traits\Actions;

class CategoryTypeCreate extends Component
{

    public $newCategoryType;

    public $is_editing;

    use Actions;

    protected $listeners = ['editItem' => 'edit'];

    public function mount(CategoryType $categoryType)
    {
        $this->newCategoryType = $categoryType;
    }

    public function store()
    {

        $this->validate([
            'newCategoryType.title' => "required|unique:category_types,title",
            'newCategoryType.color' => 'required',
            'newCategoryType.is_active' => 'required',
            'newCategoryType.description' => 'required',
        ]);

        $this->newCategoryType->save();

        $this->newCategoryType = new CategoryType();

        $this->emit('created');
        $this->emitTo('categorytypes.category-type-list', 'refreshList');

        $this->is_editing = false;

        $this->notification()->success(
            $title = 'Category saved',
            $description = 'Your Category was successfull saved'
        );

    }

    protected function rules()
    {
        return [
            'newCategoryType.title' => "",
            'newCategoryType.color' => '',
            'newCategoryType.is_active' => '',
            'newCategoryType.description' => '',
        ];
    }

    public function edit(CategoryType $CategoryType)
    {
        $this->resetValidation();
        $this->is_editing = true;
        $this->newCategoryType = $CategoryType;

    }

    public function update()
    {

        $this->validate([
            'newCategoryType.title' => "required|unique:category_types,title,". $this->newCategoryType->id,
            'newCategoryType.title' => "required",
            'newCategoryType.color' => 'required',
            'newCategoryType.is_active' => 'required',
            'newCategoryType.description' => 'required',
        ]);

        $this->newCategoryType->save();

        $this->newCategoryType = new CategoryType();

        $this->emit('updated');
        $this->emitTo('categorytypes.category-type-list', 'refreshList');

        $this->is_editing = false;

        $this->notification()->success(
            $title = 'Category saved',
            $description = 'Your Category was successfull saved'
        );

    }

    public function editCancel()
    {

        $this->newCategoryType = new CategoryType();
        $this->resetValidation();
        $this->is_editing = false;

    }

    public function render()
    {
        $this->newCategoryType->is_active = true;

        return view('livewire.categorytypes.create');
    }
}
