<x-app-layout>
    <x-slot name="header">
        Posts list
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{route('blog.posts.create')}}" style="color: green">Create A post</a>
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                #
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Title
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">
                                Category
                            </th>
                            <th class="px-6 py-4 text-sm font-bold uppercase bg-gray-100 border-b text-gray-dark border-gray-light">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $key=>$post)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200">{{ $key+1 }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $post->title }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $post->category->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">

                                   <a href="{{ route('blog.posts.edit', $post->id) }}" style="color:#008000;">Edit</a>

                                   <a href="{{route('blog.posts.show', $post->id)}}" style="color: blue"> Show</a>
                                    <form action="{{ route('blog.posts.destroy', $post->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button style="color: red; ">Delete</button>
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
