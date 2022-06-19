<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{__('Category Types')}}
        </x-slot>
        <x-slot name="description">
            {{__('Category Types List')}}
        </x-slot>
        <x-slot name="content">
            <div class="space-y-6">

                <table class="space-y-6 table-auto">
                    <thead class="shadow bg-gray-50 sm:rounded-bl-md sm:rounded-br-md">
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Color</th>
                        <th>Active</th>
                        <th>{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($this->list as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <svg height="10" width="10">
                                    <circle cx="5" cy="5" r="5" fill="{{ $item->color }}"/>
                                </svg>
                            <td>
                                {{ ($item->is_active === 1) ? __('Yes') : __('No') }}
                            <td>
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <x-button primary icon="pencil" wire:click="edit({{$item}})" wire:key="$item->id" wire:loading.attr="disabled"/>
                                    <x-button negative icon="x" wire:click="delete({{ $item }})" wire:key="$item->id" wire:loading.attr="disabled"/>
                                </div>
                            </td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
            </table>
                {{ $this->list->links() }}

            </div>

        </x-slot>
    </x-jet-action-section>

</div>
