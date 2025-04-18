@extends('layouts._layout')
@section('title')
    Task Index
@endsection
@section('content')
    <div class="row my-3">
        <div class="col-12">
            <a href="{{ route('task.create') }}" class="btn btn-primary">Create New Task</a>
        </div>
    </div>


    <div class="row">
        @foreach ($tasks as $task)
            <div class="col-md-4 mb-4"> <!-- 3 cards per row, with margin bottom -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $task->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $task->description }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $task->status }}</p>
                        <p class="card-text"><strong>Assigned
                                To:</strong> {{ $task->assignedTo->name ?? 'Not Assigned' }}</p>
                        <p class="card-text"><strong>Deadline:</strong> {{ $task->deadline }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('task.show', $task->id) }}" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bootstrap pagination links -->
    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>

@endsection
