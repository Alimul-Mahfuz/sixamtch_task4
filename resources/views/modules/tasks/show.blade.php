@extends('layouts._layout')
@section('title')
    View Task
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Task Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $task->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $task->status }}</p>
                    <p class="card-text"><strong>Assigned To:</strong> {{ $task->assignedTo->name ?? 'Not Assigned' }}
                    </p>
                    <p class="card-text"><strong>Deadline:</strong> {{ $task->deadline }}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('task.index') }}" class="btn btn-secondary btn-sm">Back to Task List</a>
                </div>
            </div>
        </div>
    </div>

@endsection
