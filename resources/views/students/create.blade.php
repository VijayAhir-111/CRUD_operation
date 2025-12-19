<!DOCTYPE html>
<html>

<head>
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add New Student</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>