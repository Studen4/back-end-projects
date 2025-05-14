<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Метод для показу списку постів
    public function index()
    {
        $posts = Post::latest()->get();  // Отримуємо всі пости, відсортовані за датою
        return view('posts.index', compact('posts'));
    }

    // Метод для показу окремого поста
    public function show(Post $post)
    {
        // Завантажуємо коментарі для конкретного поста
        $comments = $post->comments;
        return view('posts.show', compact('post', 'comments'));
    }

    // Метод для створення нового поста
    public function create()
    {
        return view('posts.create');
    }

    // Метод для збереження нового поста
    public function store(Request $request)
    {
        // Валідація введених даних
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Створення нового поста
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Використовуємо поточного користувача
        $post->save();  // Зберігаємо пост у базу даних

        // Перенаправляємо з повідомленням про успіх
        return redirect()->route('posts.index')->with('success', 'Пост успішно опубліковано!');
    }
}