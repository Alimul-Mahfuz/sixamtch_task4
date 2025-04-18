@extends('layouts._layout')
@section('title')
    Create Task
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Create a new Task</div>
        <div class="card-body">
            <form method="POST" action="{{ route('task.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Task Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach(\App\Enum\TaskStatusEnum::cases() as $status)
                            <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline') }}" required>
                    @error('deadline')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="assigned_to_id" class="form-label">Assign To</label>
                    <select name="assigned_to_id" id="assigned_to_id" class="form-control">
                        <option value="" selected>Self</option>
                        @foreach($userList as $user)
                            <option value="{{ $user->id }}" {{ old('assigned_to_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('assigned_to_id')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>
        </div>
    </div>
@endsection
