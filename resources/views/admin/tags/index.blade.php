@extends('admin.layouts.layout')

@section('title', 'Список тэгов')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">
                    Добавить тэг
                </a>
                @if ($tags->count())
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Наименование</th>
                                    <th>Slug</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>
                                            <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}"
                                                class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="post"
                                                class="float-left">
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
                    <p>Тэгов пока нет...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $tags->links() }}
            </div>
        </div>
    </section>
@endsection
