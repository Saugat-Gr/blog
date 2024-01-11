<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            About the post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="pb-8 space-y-1 border-b border-gray-200 dark:border-gray-700 mt-4">
                         <span style="margin-left:500px"><strong>"{{$post->title}}"</strong></span>
                        <dl class="flex justify-between">
                            <div>
                                <dt>Published on</dt>
                                <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                    <time datetime="2021-07-18">{{ $post->created_at->format('d F Y') }}</time>
                                </dd>
                            </div>
                           
                        </dl>
                        <div class="flex flex-col flex-shrink-0 mb-6 md:w-64 md:mb-0">
                            @if($post->image)
                                <img src="{{ asset('storage/uploads/' . $post->image) }}" width="500" height="100" >
                            @else
                                <img src="" alt="">
                            @endif

                    </div>

                    <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                        <div class="pt-10 pb-8 prose max-w-none">
                            {!! nl2br($post->description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
