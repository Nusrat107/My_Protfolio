@extends('backend.master')

@section('content')

<style>
/* 🔹 Dark Theme Form & Table */
.highlighted {
    background-color: #2b3035;
    border: 1px solid #dc3545;
    color: #fff;
}
.highlighted:focus {
    background-color: #1e2125;
    border-color: #b71c1c;
    box-shadow: none;
}

/* 🔹 Table */
.table-dark th, .table-dark td {
    vertical-align: middle;
}
.table-dark th {
    background-color: #1e2125;
    color: #fff;
}
.table-dark tbody tr:hover {
    background-color: #2b3035;
}

/* 🔹 Icon Preview */
.icon-preview {
    font-size: 24px;
    color: #dc3545;
}

/* 🔹 Buttons */
.btn-danger, .btn-success, .btn-primary {
    border-radius: 5px;
}
</style>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-light mb-0">🛠 Manage Services</h4>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addServiceModal">➕ Add Service</button>
        </div>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ✅ Services Table --}}
        <table class="table table-dark table-hover align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $key => $service)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><i class="{{ $service->icon }} icon-preview"></i></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ Str::limit($service->description, 60) }}</td>
                    <td>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">✏️</button>
                        <a href="{{ url('/service/delete/'.$service->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">🗑</a>
                    </td>
                </tr>

                {{-- 🔹 Edit Modal --}}
                <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content bg-secondary text-light">
                            <div class="modal-header border-0">
                                <h5 class="modal-title">✏️ Edit Service</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ url('/service/update/'.$service->id) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label class="fw-bold">Service Icon (FontAwesome)</label>
                                    <input type="text" name="icon" class="form-control highlighted" value="{{ $service->icon }}" placeholder="e.g. fa-solid fa-code" required>

                                    <label class="fw-bold mt-3">Service Title</label>
                                    <input type="text" name="title" class="form-control highlighted" value="{{ $service->title }}" required>

                                    <label class="fw-bold mt-3">Description</label>
                                    <textarea name="description" class="form-control highlighted" rows="4" required>{{ $service->description }}</textarea>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="btn btn-danger px-4">💾 Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- 🔹 Add Service Modal --}}
<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-dark text-light border-0 shadow-lg rounded-3">
            
            <div class="modal-header border-0">
                <h5 class="modal-title">➕ Add New Service</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ url('/service/request') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <!-- 🔹 Basic Info -->
                    <h6 class="fw-bold text-danger mb-3">📌 Basic Information</h6>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="fw-bold">Service Icon (FontAwesome)</label>
                            <input type="text" name="icon" class="form-control bg-transparent text-light border-danger"
                                placeholder="e.g. fa-solid fa-code">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Service Title</label>
                            <input type="text" name="title" class="form-control bg-transparent text-light border-danger"
                                placeholder="Enter service title">
                        </div>
                    </div>

                    <label class="fw-bold mt-3">Description</label>
                    <textarea name="description" class="form-control bg-transparent text-light border-danger"
                        rows="3" placeholder="Write short description..."></textarea>

                    <!-- 🔹 Image Upload -->
                    <label class="fw-bold mt-3">Service Image</label>
                    <input type="file" name="image" class="form-control bg-transparent text-light border-danger">

                    <!-- 🔹 What You Get Section -->
                    <hr class="border-danger mt-4 mb-3">
                    <h6 class="fw-bold text-danger mb-3">🎯 What You Get</h6>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Get Item Icon</label>
                            <input type="text" name="get_icon[]" class="form-control bg-transparent text-light border-danger"
                                placeholder="e.g. fa-solid fa-layer-group">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Get Item Title</label>
                            <input type="text" name="get_title[]" class="form-control bg-transparent text-light border-danger"
                                placeholder="e.g. Modern Architecture">
                        </div>
                        <div class="col-md-4">
                            <label class="fw-bold">Get Item Description</label>
                            <textarea name="get_description[]" class="form-control bg-transparent text-light border-danger"
                                rows="2" placeholder="Short description..."></textarea>
                        </div>
                    </div>

                    <!-- Add more with JS later if needed -->

                    <!-- 🔹 Development Workflow -->
                    <hr class="border-danger mt-4 mb-3">
                    <h6 class="fw-bold text-danger mb-3">🧩 Development Workflow</h6>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Step Title</label>
                            <input type="text" name="workflow_title[]" class="form-control bg-transparent text-light border-danger"
                                placeholder="e.g. Strategy & Planning">
                        </div>
                        <div class="col-md-5">
                            <label class="fw-bold">Step Description</label>
                            <textarea name="workflow_description[]" class="form-control bg-transparent text-light border-danger"
                                rows="2" placeholder="Short step description..."></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold">Deadline</label>
                            <input type="text" name="workflow_deadline[]" class="form-control bg-transparent text-light border-danger"
                                placeholder="e.g. 1 week">
                        </div>
                    </div>

                    <!-- 🔹 Technologies & Tools -->
             <hr class="border-danger mt-4 mb-3">
                    <h6 class="fw-bold text-danger mb-3">🛠️ Technologies & Tools</h6>

                    <div class="mb-3">
                        <label class="fw-bold">Frontend Technologies</label>
                        <input type="text" name="frontend" class="form-control highlighted" placeholder="e.g. HTML, CSS, React, Tailwind">
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Backend Technologies</label>
                        <input type="text" name="backend" class="form-control highlighted" placeholder="e.g. PHP, Laravel, Node.js, Express">
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Database Technologies</label>
                        <input type="text" name="database" class="form-control highlighted" placeholder="e.g. MySQL, MongoDB, Firebase">
                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-danger px-4">💾 Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
