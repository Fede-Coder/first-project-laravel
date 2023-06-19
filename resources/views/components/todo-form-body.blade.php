@csrf
<div class="mb-3">
    <label for="title" class="form-label">Titulo</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $todo->title) }}">
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
