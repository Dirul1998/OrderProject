<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Orders</h2>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Order</a>
                    </div>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Outlet</th>
                            <th class="px-4 py-2 text-left">Menu</th>
                            <th class="px-4 py-2 text-left">Customer Name</th>
                            <th class="px-4 py-2 text-left">Customer Phone</th>
                            <th class="px-4 py-2 text-left">Quantity</th>
                            <th class="px-4 py-2 text-left">Total Price</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="border px-4 py-2">{{ $order->id }}</td>
                                <td class="border px-4 py-2">{{ $order->outlet_id }}</td>
                                <td class="border px-4 py-2">{{ $order->menu_id }}</td>
                                <td class="border px-4 py-2">{{ $order->customer_name }}</td>
                                <td class="border px-4 py-2">{{ $order->customer_phone }}</td>
                                <td class="border px-4 py-2">{{ $order->quantity }}</td>
                                <td class="border px-4 py-2">{{ $order->total_price }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('orders.edit', $order) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
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
