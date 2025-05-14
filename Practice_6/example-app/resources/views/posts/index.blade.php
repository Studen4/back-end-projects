@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <h2 class="text-xl font-semibold text-gray-900">Список постів</h2>

            @foreach($posts as $post)
                <div class="p-4 border-b">
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500">{{ $post->title }}</a>
                    <p class="text-gray-600">{{ Str::limit($post->content, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection