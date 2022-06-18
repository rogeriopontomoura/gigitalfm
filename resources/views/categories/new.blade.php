<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Create Category') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new category to alocate expenses.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.title" value="{{ __('Category title') }}" />
            <x-jet-input id="newCategory.title"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="newCategory.title"
                autofocus />
            <x-jet-input-error for="newCategory.title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.description" value="{{ __('Category description') }}" />
            <x-jet-input id="newCategory.description"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="newCategory.description"
                autofocus />
            <x-jet-input-error for="newCategory.description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.type_id" value="{{ __('Category type_id') }}" />
            <x-jet-input id="newCategory.type_id"
            type="text" class="mt-1 block w-full"
            wire:model.defer="newCategory.type_id"
            autofocus />
            <x-jet-input-error for="newCategory.type_id" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.is_active" value="{{ __('Category is_active') }}" />
            <x-jet-input id="newCategory.is_active"
            type="text" class="mt-1 block w-full"
            wire:model.defer="newCategory.is_active"
            autofocus />
            <x-jet-input-error for="newCategory.is_active" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.color" value="{{ __('Category color') }}" />
            <x-jet-input id="newCategory.color"
            type="text"
            class="mt-1 block w-full"
            wire:model.defer="newCategory.color"
            autofocus />
            <x-jet-input-error for="newCategory.color" class="mt-2" />
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
