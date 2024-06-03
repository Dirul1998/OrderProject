<x-guest-layout>
    <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autocomplete="price" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        
        <div class="mt-4">
            <x-input-label for="outlet_id" :value="__('Outlet')" />
            <select id="outlet_id" class="block mt-1 w-full" name="outlet_id" required autocomplete="outlet_id">
                @foreach($outlets as $outlet)
                    <option value="{{ $outlet->id }}" {{ old('outlet_id') == $outlet->id ? 'selected' : '' }}>
                        {{ $outlet->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('outlet_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
