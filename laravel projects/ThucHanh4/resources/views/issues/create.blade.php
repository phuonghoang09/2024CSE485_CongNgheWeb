<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sự Cố Mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm Sự Cố Mới</h1>

        <div class="card">
            <div class="card-body">
                <!-- Form thêm sự cố -->
                <form action="{{ route('issues.store') }}" method="POST">
                    @csrf

                    <!-- Người báo cáo -->
                    <div class="mb-3">
                        <label for="reported_by" class="form-label">Người Báo Cáo</label>
                        <input type="text" class="form-control @error('reported_by') is-invalid @enderror" id="reported_by" name="reported_by" value="{{ old('reported_by') }}">
                        @error('reported_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ngày báo cáo -->
                    <div class="mb-3">
                        <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
                        <input type="datetime-local" class="form-control @error('reported_date') is-invalid @enderror" id="reported_date" name="reported_date" value="{{ old('reported_date') }}">
                        @error('reported_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mức độ -->
                    <div class="mb-3">
                        <label for="urgency" class="form-label">Mức Độ</label>
                        <select class="form-select @error('urgency') is-invalid @enderror" id="urgency" name="urgency">
                            <option value="" selected disabled>Chọn mức độ</option>
                            <option value="Low" {{ old('urgency') == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('urgency') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('urgency') == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('urgency')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng Thái</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="" selected disabled>Chọn trạng thái</option>
                            <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Open</option>
                            <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Process</option>
                            <option value="Resolved" {{ old('status') == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Máy tính -->
                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Máy Tính</label>
                        <select class="form-select @error('computer_id') is-invalid @enderror" id="computer_id" name="computer_id">
                            <option value="" selected disabled>Chọn máy tính</option>
                            @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>
                                {{ $computer->computer_name }} ({{ $computer->model }})
                            </option>
                            @endforeach
                        </select>
                        @error('computer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nút Lưu -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('issues.index') }}" class="btn btn-secondary me-2">Hủy</a>
                        <button type="submit" class="btn btn-primary">Lưu Sự Cố</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>