<?php

namespace App\Http\Livewire\Banks;

use App\Models\Bank;
use Livewire\Component;
use WireUi\Traits\Actions;

class BankCreate extends Component
{
    public $newBank;

    public $is_editing;

    use Actions;

    protected $listeners = ['editItem' => 'edit'];

    public function mount(Bank $bank)
    {
        $this->newBank = $bank;
    }


    public function store()
    {
        $this->validate([
            'newBank.name' => 'required|unique:banks,name',
            'newBank.code' => 'required',
        ]);

        $this->newBank->save();

        $this->newBank = new Bank();

        $this->emit('created');
        $this->emitTo('banks.bank-list', 'refreshList');
        $this->is_editing = false;

        $this->notification()->success(
            $title = 'Bank saved',
            $description = 'Your Bank was successfull saved'
        );
    }

    protected function rules()
    {
        return [
            'newBank.name' => '',
            'newBank.code' => '',
        ];
    }

    public function render()
    {
        $this->newBank->is_active = true;

        return view('livewire.banks.create');
    }


    public function edit(Bank $bank)
    {
        $this->resetValidation();
        $this->is_editing = true;
        $this->newBank = $bank;

    }

    public function update()
    {
        $this->validate([
            'newBank.name' => 'required|unique:banks,name,'.$this->newBank->id,
            'newBank.code' => 'required',
        ]);

        $this->newBank->save();

        $this->newBank = new Bank();

        $this->emit('updated');
        $this->emitTo('banks.bank-list', 'refreshList');
        $this->is_editing = false;

        $this->notification()->success(
            $title = 'Bank updated',
            $description = 'Your Bank was successfull updated'
        );
    }

    public function editCancel()
    {

        $this->newBank = new Bank();
        $this->resetValidation();
        $this->is_editing = false;

    }
}
