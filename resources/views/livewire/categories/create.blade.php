<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Create Category') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new category to alocate expenses.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.title" value="{{ __('Category Title') }}" />
            <x-jet-input id="newCategory.title"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newCategory.title"
                autofocus />
            <x-jet-input-error for="newCategory.title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.description" value="{{ __('Category Description') }}" />
            <x-jet-input id="newCategory.description"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newCategory.description"
                autofocus />
            <x-jet-input-error for="newCategory.description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">


            <x-select
                label="Select Category Type"
                placeholder="Select one Category"
                :options="[
                    ['name' => 'Income',  'id' => 1],
                    ['name' => 'Expense',  'id' => 1],
                    ]"
                    option-label="name"
                    option-value="id"
                wire:model.defer="newCategory.category_type_id"
            />

        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategory.color" value="{{ __('Category color') }}" />
            <x-jet-input id="newCategory.color"
            type="text"
            class="block w-full mt-1"
            wire:model.defer="newCategory.color"
            autofocus
            disabled/>
            <x-jet-input-error for="newCategory.color" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-checkbox left-label="Is Active?" id="newCategory.is_active" wire:model.defer="newCategory.is_active" md />
            <x-jet-input-error for="newCategory.is_active" class="mt-2" />
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