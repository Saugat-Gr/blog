<x-app-layout>
    <x-slot name="header">
        Edit category
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('blog.categories.update', $category->id) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <label class="block text-sm text-gray-600" for="name">Name
                            <input id="name" class="block w-full mt-1" name="name" type="text" value="{{ $category->name }}" required/>
                            @error('name')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <button>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

