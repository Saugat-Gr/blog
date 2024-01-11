<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Latest New
        </h2>
    </x-slot>

    <div class="py-12 mr-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="-my-8 divide-y-2 divide-gray-100">

                        @foreach ($posts as $post)
                            <div class="flex flex-wrap py-8 md:flex-nowrap">
                                <div class="flex flex-col flex-shrink-0 mb-6 md:w-64 md:mb-0">
                                    @if($post->image)
                                        <img src="{{ asset('storage/uploads/' . $post->image) }}" width="100" height="100">
                                    @else
                                        <img src="{{ asset('no_image.jpg') }}" width="100" height="100">
                                    @endif
                                    <span
                                        class="font-semibold text-gray-700 title-font">{{ $post->category->name }} </span>
                                    <span
                                        class="mt-1 text-sm text-gray-500">{{ $post->created_at->format('d F Y') }}</span>
                                </div>
                                <div class="md:flex-grow ">
                                    <div class="space-y-6">
                                        <div>
                                            <h2 class="text-2xl font-medium tracking-tight text-gray-900 title-font" style="padding-left: 300px"><strong>"{{$post->title}}" </strong></h2>
                                        </div>
                                        
                                        <div>
                                        
                                            <p class="leading-relaxed" style="padding-left: 300px">{{ $post->description }} </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('posts.show', $post) }}" style="padding-left: 300px; color:green;" >Read More
                                      
                                    </a>
                                </div>

                            </div>
                            <hr><hr>
                        @endforeach
  <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
