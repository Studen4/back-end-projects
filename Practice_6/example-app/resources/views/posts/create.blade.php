@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-xl font-bold mb-4">Створити новий пост</h1>

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
                <input type="text" id="title" name="title" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Контент</label>
                <textarea id="content" name="content" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Опублікувати</button>
            </div>
        </form>
    </div>
@endsection