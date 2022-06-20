<x-jet-form-section submit="{{ ($is_editing) ? 'update' : 'store' }}">
    <x-slot name="title">
        {{ __('Create Bank') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new Bank to alocate expenses.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newBank.name" value="{{ __('Bank name') }}" />
            <x-jet-input id="newBank.name"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newBank.name"
                autofocus />
            <x-jet-input-error for="newBank.name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newBank.code" value="{{ __('Bank code') }}" />
            <x-jet-input id="newBank.code"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newBank.code"
                autofocus />
            <x-jet-input-error for="newBank.code" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="created">
            {{__('Bank Created.')}}
        </x-jet-action-message>

        @if ($is_editing)
            <x-jet-button class="mr-3" >
                    {{ __('Save') }}
            </x-jet-button>
            <x-jet-secondary-button wire:click="editCancel" class="mr-3" >
                {{ __('Cancel') }}
        </x-jet-button>
        @else
            <x-jet-button>
                {{ __('Create') }}
            </x-jet-button>
        @endif

    </x-slot>
</x-jet-form-section>
