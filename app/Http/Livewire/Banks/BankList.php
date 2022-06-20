<?php

namespace App\Http\Livewire\Banks;

use App\Models\Bank;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class BankList extends Component
{

    use Actions;

    use WithPagination;

    protected $listeners = ['refreshList' => '$refresh'];

    public function edit(Bank $bank)
    {
        $this->newBank = $bank;

        $this->emitTo('banks.bank-create', 'editItem', $bank);

    }

    public function delete(Bank $bank)
    {
        $this->newBank = $bank;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => "Do you hant do delete $bank->title ?",
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'destroy',
                'params' => $this->newBank->id,
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);

    }

    public function destroy($bankId)
    {
        $this->newBank->delete($bankId);

        $this->notification()->success(
            $title = 'Bank Deleted',
            $description = 'Your Bank was successfull deleted'
        );

        $this->emit('refreshList');

    }


    public function getListProperty()
    {
        return Bank::orderBy('id', 'DESC')->paginate();
    }

    public function render()
    {
        return view('livewire.banks.list');
    }
}
