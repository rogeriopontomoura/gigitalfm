<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Create Category') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new category to alocate expenses.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.name" value="{{ __('Category newCategory.name') }}" />
            <x-jet-input id="newCategory.name"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="state.newCategory.name"
                autofocus />
            <x-jet-input-error for="newCategory.name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.description" value="{{ __('Category newCategory.description') }}" />
            <x-jet-input id="newCategory.description"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="state.newCategory.description"
                autofocus />
            <x-jet-input-error for="newCategory.description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.type_id" value="{{ __('Category newCategory.type_id') }}" />
            <x-jet-input id="newCategory.type_id"
            type="text" class="mt-1 block w-full"
            wire:model.defer="state.newCategory.type_id"
            autofocus />
            <x-jet-input-error for="newCategory.type_id" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.is_active" value="{{ __('Category newCategory.is_active') }}" />
            <x-jet-input id="newCategory.is_active"
            type="text" class="mt-1 block w-full"
            wire:model.defer="state.newCategory.is_active"
            autofocus />
            <x-jet-input-error for="newCategory.is_active" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="color" value="{{ __('Category color') }}" />
            <x-jet-input id="color"
            type="text"
            class="mt-1 block w-full"
            wire:model.defer="state.color"
            autofocus />
            <x-jet-input-error for="color" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="created">
            {{__('Category Created.')}}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
