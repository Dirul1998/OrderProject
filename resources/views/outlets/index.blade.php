<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Outlets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Outlets</h2>
                        <a href="{{ route('outlets.create') }}" class="btn btn-primary">Add Outlet</a>
                    </div>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Address</th>
                            <th class="px-4 py-2 text-left">Phone</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outlets as $outlet)
                            <tr>
                                <td class="border px-4 py-2">{{ $outlet->id }}</td>
                                <td class="border px-4 py-2">{{ $outlet->name }}</td>
                                <td class="border px-4 py-2">{{ $outlet->address }}</td>
                                <td class="border px-4 py-2">{{ $outlet->phone }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('outlets.edit', $outlet) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('outlets.destroy', $outlet) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
