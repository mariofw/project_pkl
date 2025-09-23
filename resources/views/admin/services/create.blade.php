<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="service-form" method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.services._form', ['service' => new App\Models\Service()])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
