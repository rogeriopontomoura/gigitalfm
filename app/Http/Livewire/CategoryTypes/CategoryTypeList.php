<?php

namespace App\Http\Livewire\Categorytypes;

use App\Models\CategoryType;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class CategoryTypeList extends Component
{

    use Actions;

    use WithPagination;

    protected $listeners = ['refreshList' => '$refresh'];

    public function edit(CategoryType $categoryType)
    {
        $this->newCategoryType = $categoryType;

        $this->emitTo('categorytypes.category-type-create', 'editItem', $categoryType);

    }

    public function delete(CategoryType $categoryType)
    {
        $this->newCategoryType = $categoryType;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Do you hant do delete $categoryType->title ?",
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'destroy',
                'params' => $this->newCategoryType->id,
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);


    }

    public function destroy($categoryTypeId)
    {
        $this->newCategoryType->delete($categoryTypeId);

        $this->notification()->success(
            $title = 'Category Deleted',
            $description = 'Your category was successfull deleted'
        );

        $this->emit('refreshList');

    }


    public function getListProperty()
    {
        return CategoryType::orderBy('id', 'DESC')->paginate();
    }

    public function render()
    {
        return view('livewire.categorytypes.list');
    }
}
