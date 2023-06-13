@extends('todos.app')

@section('title', "Registrar tarea")

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos.store') }}" method="POST">
            <x-todo-form-body/>
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
