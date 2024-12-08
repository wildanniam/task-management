@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h1 class="fw-bold">Task Management</h1>
</div>

@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="card mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0">Add New Task</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Task Name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Task Description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Task List</h5>
    </div>
    <div class="card-body">
        @foreach ($tasks as $task)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <!-- Link menuju halaman edit -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-decoration-none">
                            <h6 class="fw-bold mb-0">{{ $task->name }}</h6>
                            <p class="mb-0 text-muted">{{ $task->description }}</p>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Status dengan efek stabilo -->
                        <span class="badge me-3" 
                            style="background-color: 
                                {{ $task->status === 'pending' ? '#f9c74f' : ($task->status === 'doing' ? '#4cc9f0' : '#90be6d') }}; 
                                color: white; 
                                padding: 0.5rem 1rem; 
                                font-size: 0.9rem; 
                                border-radius: 0.5rem;">
                            {{ ucfirst($task->status) }}
                        </span>
                        <!-- Tombol Delete -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
