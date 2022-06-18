<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{__('Categories')}}
        </x-slot>
        <x-slot name="description">
            {{__('Categories List')}}
        </x-slot>
        <x-slot name="content">
            <div class="space-y-6">

                <table class="space-y-6 table-auto">
                    <thead class="shadow bg-gray-50 sm:rounded-bl-md sm:rounded-br-md">
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Active</th>
                        <th>{{ __('Actions') }}</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($this->list as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->category_type_id }}</td>
                            <td>{{ $item->is_active }}</td>
                            <td>
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <x-button primary icon="pencil" wire:click="edit({{$item}})"/>
                                    <x-button negative icon="x" wire:click="confirmDelete({{ $item }})"/>
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
