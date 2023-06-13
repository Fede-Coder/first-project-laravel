@extends('todos.app')

@section('title', "Lista de tareas")

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                        <th scope="row">{{ $todo->id }}</th>
                        <td>{{ $todo->title }}</td>
                        <td>
                            <a href="{{ route('todos.edit', $todo) }}">Edit</a>
                            <a href="{{ route('todos.show', $todo) }}">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
