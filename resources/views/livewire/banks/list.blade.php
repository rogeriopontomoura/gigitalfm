<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{__('Banks')}}
        </x-slot>
        <x-slot name="description">
            {{__('Banks List')}}
        </x-slot>
        <x-slot name="content">
            <div class="space-y-6">

                <table class="space-y-6 table-auto">
                    <thead class="shadow bg-gray-50 sm:rounded-bl-md sm:rounded-br-md">
                      <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($this->list as $item)

                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
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
