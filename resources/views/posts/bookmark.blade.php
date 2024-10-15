<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('bookmark') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($bookmarks as $bookmark)
                    <div class="mb-4">
                        <br>
                        <p>--------------------------------------------</p>
                         <h3 class="text-lg font-semibold">{{ $bookmark->title }}</h3>
                            <p>{{ $bookmark->body }}</p>
                            <br>
                            <a href="{{ route('posts.show', $bookmark) }}" class="text-blue-500 hover:underline">もっと読む</a>
                            @endforeach
                        </div>
                    </div>
                    {{ $bookmarks->links() }}
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>