@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-xl font-bold mb-4">Вхід</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Ім'я користувача</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <div class="mb-4">
                <button type="submit"
                        class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                    Увійти
                </button>
            </div>
            
        </form>
    </div>
@endsection
