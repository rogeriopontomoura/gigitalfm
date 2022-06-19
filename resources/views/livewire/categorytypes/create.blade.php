<x-jet-form-section submit="{{ ($is_editing) ? 'update' : 'store' }}">
    <x-slot name="title">
        {{ __('Create Category type') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new category type to group expenses.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategoryType.title" value="{{ __('Category Title') }}" />
            <x-jet-input id="newCategoryType.title"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newCategoryType.title"
                autofocus />
            <x-jet-input-error for="newCategoryType.title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategoryType.description" value="{{ __('Category Description') }}" />
            <x-jet-input id="newCategoryType.description"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newCategoryType.description"
                autofocus />
            <x-jet-input-error for="newCategoryType.description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="newCategoryType.color" value="{{ __('Category color') }}" />
            <x-jet-input id="newCategoryType.color"
                type="text"
                class="block w-full mt-1"
                wire:model.defer="newCategoryType.color"
                autofocus />
            <x-jet-input-error for="newCategoryType.color" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-checkbox left-label="Is Active?" id="newCategoryType.is_active" wire:model.defer="newCategoryType.is_active" md />
            <x-jet-input-error for="newCategoryType.is_active" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="created">
            {{__('Category Created.')}}
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
