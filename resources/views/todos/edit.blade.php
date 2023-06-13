@extends('todos.app')

@section('title', "Editar tarea #$todo->id")

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <h3>Editando tarea #{{ $todo->id }} - {{ $todo->title }}</h3>
        <form action="{{ route('todos.update', $todo) }}" method="POST">
            @method('put')
            <x-todo-form-body :todo="$todo" />
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
