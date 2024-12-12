@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">IT Centers and Devices</h1>

    @forelse ($itCenters as $center)
    <div class="card mb-3">
        <div class="card-header">
            <h2>{{ $center->name }}</h2>
            <p>{{ $center->location }}</p>
        </div>
        <div class="card-body">
            <h4>Devices:</h4>

            <!-- Nút thêm thiết bị mới -->
            <a href="{{ route('devices.create') }}" class="btn btn-primary mb-3">Add New Device</a>

            @if ($center->devices->isEmpty())
            <p>No devices available in this center.</p>
            @else
            <ul>
                @foreach ($center->devices as $device)
                <li>
                    {{ $device->device_name }} ({{ $device->type }}) -
                    @if ($device->status)
                    <span class="text-success">Active</span>
                    @else
                    <span class="text-danger">Inactive</span>
                    @endif

                    <!-- Nút sửa thiết bị -->
                    <a href="{{ route('devices.edit', $device) }}" class="btn btn-warning btn-sm ml-2">Edit</a>

                    <!-- Nút xóa thiết bị -->
                    <form action="{{ route('devices.destroy', $device) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    @empty
    <p>No IT Centers available.</p>
    @endforelse
</div>
@endsection