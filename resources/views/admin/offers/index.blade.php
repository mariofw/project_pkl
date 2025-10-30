<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Offers') }}
        </h2>
    </x-slot>

    @include('admin.offers.partials.index-content')
</x-app-layout>
