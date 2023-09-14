<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-nav-link :href="route('admintoko.products.index')" >{{ __('Kembali') }}</x-nav-link>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                   
                            <x-label for="name" :value="__('Name')" />
    
                            <x-input id="name" class="block mt-1 w-3/6" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
