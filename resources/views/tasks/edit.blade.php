@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h1 class="fw-bold">Edit Task</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="doing" {{ $task->status === 'doing' ? 'selected' : '' }}>Doing</option>
                    <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
