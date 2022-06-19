<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class CategoryList extends Component
{

    use Actions;

    use WithPagination;

    protected $listeners = ['refreshList' => '$refresh'];

    public function edit(Category $category)
    {
        $this->newCategory = $category;

        $this->emitTo('categories.category-create', 'editItem', $category);

    }

    public function delete(Category $category)
    {
        $this->newCategory = $category;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Do you hant do delete $category->title ?",
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'destroy',
                'params' => $this->newCategory->id,
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);

    }

    public function destroy($categoryId)
    {
        $this->newCategory->delete($categoryId);

        $this->notification()->success(
            $title = 'Category Deleted',
            $description = 'Your category was successfull deleted'
        );

        $this->emit('refreshList');

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
