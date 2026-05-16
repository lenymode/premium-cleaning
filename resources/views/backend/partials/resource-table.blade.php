<div class="overflow-hidden rounded bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-slate-100">
            <tr>
                @foreach($columns as $column)<th class="px-4 py-3">{{ str($column)->headline() }}</th>@endforeach
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr class="border-t">
                    @foreach($columns as $column)
                        <td class="px-4 py-3">{{ is_bool($item->{$column}) ? ($item->{$column} ? 'Yes' : 'No') : $item->{$column} }}</td>
                    @endforeach
                    <td class="px-4 py-3 text-right">
                        <a class="text-blue-700" href="{{ route($routePrefix.'.show', $item) }}">View</a>
                        @if(\Illuminate\Support\Facades\Route::has($routePrefix.'.edit'))
                            <a class="ml-3 text-blue-700" href="{{ route($routePrefix.'.edit', $item) }}">Edit</a>
                        @endif
                        <form class="ml-3 inline" method="POST" action="{{ route($routePrefix.'.destroy', $item) }}">
                            @csrf @method('DELETE')
                            <button class="text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td class="px-4 py-6 text-slate-500" colspan="{{ count($columns) + 1 }}">No records yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $items->links() }}</div>
</div>
