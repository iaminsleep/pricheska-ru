@extends('admin.layouts.layout')

@section('title', 'Список комментариев в блоге')

@section('content')
    <section class="content">
        <div class="card">
            @include('admin.layouts.card-header')
            <div class="card-body">
                @if ($comments->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Автор</th>
                                    <th>Текст</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->author->name }}</td>
                                        <td>{{ $comment->text }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>
                                            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Комментариев пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $comments->links() }}
            </div>
        </div>
    </section>
@endsection
