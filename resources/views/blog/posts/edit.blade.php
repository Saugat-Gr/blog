<x-app-layout>
    <x-slot name="header">
        Create category
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('blog.posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title">Title</label>
                            <input id="title" class="block w-full mt-1" name="title" required value="{{ old('title', $post->title) }}" type="text"/>
                            @error('title')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
 
                        @if($post->image)
                        <div>
                            <img style="width: 200px" src="{{ asset('storage/uploads/'.$post->image)}}" alt="" width="100" height="100">
                            </div>
                            @else
                            <img src="" alt="">
                          @endif
                        
                        <div class="mb-4">
                            <label for="image">Image</label>
                            <input id="image" class="block w-full mt-1" name="image" type="file"/>
                            @error('image')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="mb-4">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="block w-full mt-1">
                                <option value="#">--- SELECT CATEGORY ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="font-medium text-red-600" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600" for="description">Description</label>
                            <textarea id="post" class="block w-full mt-1" name="description" required rows="6">{{  $post->description }}</textarea>
                            @error('post')
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

