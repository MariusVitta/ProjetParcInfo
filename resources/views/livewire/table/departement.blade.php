<div>
    <x-data-table :data="$data" :model="$depatements">
        <x-slot name="head">
            <tr>

                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($departements as $departement)
                <tr x-data="window.__controller.dataTableController({{ $departement->id }})">
                    <td>{{ $departement->id }}</td>

                    <td>{{ $departement->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/user/edit/{{ $departement->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
