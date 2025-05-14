@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Заголовок посту -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h2>{{ $post->title }}</h2>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Створено: {{ $post->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Форма для додавання коментаря -->
        @auth
            <div class="row mb-4">
                <div class="col-md-8 offset-md-2">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4>Додати коментар</h4>
                        </div>
                        <div class="card-body">
                            <form id="comment-form" method="POST" action="/posts/1/comments">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Ваш коментар</label>
                                    <textarea name="content" id="message" class="form-control" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Додати коментар</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                Щоб додати коментар, вам потрібно <a href="{{ route('login') }}">увійти</a>.
            </div>
        @endauth

        <hr>

        <!-- Виведення всіх коментарів -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>Коментарі</h4>
                    </div>
                    <div class="card-body">
                        @if($post->comments->count() > 0)
                            <ul id="comments-list" class="list-group list-group-flush">
                                @foreach($post->comments as $comment)
                                    <li class="list-group-item">
                                        <strong>{{ $comment->user->username }}</strong> 
                                        <small class="text-muted">({{ $comment->created_at->diffForHumans() }})</small>
                                        <p>{{ $comment->content }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center text-muted">Коментарів ще немає.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // При відправці форми
            $('#comment-form').submit(function (e) {
                e.preventDefault();

                var formData = $(this).serialize();  // Збираємо дані форми

                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });

                $.ajax({
                    url: "{{ route('comments.store', $post->id) }}",  // Динамічно вставляємо маршрут
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        // Додаємо новий коментар на сторінку без перезавантаження
                        $('#comments-list').append(`
                            <li class="list-group-item">
                                <strong>${data.user}</strong>
                                <small class="text-muted">(${data.created_at})</small>
                                <p>${data.content}</p>
                            </li>
                        `);

                        // Очищаємо поле для введення
                        $('#message').val('');
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Щось пішло не так!');
                    }
                });
            });
        });
    </script> -->
@endsection
