<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Banks') }}
        </h2>
        <div>
            <x-notifications/>
            <x-dialog z-index="z-50" blur="md" align="center" />
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

            @livewire('banks.bank-create')

        </div>

        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

            @livewire('banks.bank-list')

        </div>
    </div>
</x-app-layout>
