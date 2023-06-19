@extends('todos.app')

@section('title', "Ver tarea #$todo->id")

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <h3>Número de identificación: {{ $todo->id }}</h3>
        <h3>Nombre de titulo: {{ $todo->title }}</h3>
        <form action="{{ route('todos.destroy', $todo) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger btn-sm" type="submit">
                Delete
            </button>
        </form>
    </div>
@endsection
