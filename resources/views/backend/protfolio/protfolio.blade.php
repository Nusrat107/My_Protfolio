@extends('backend.master')
<style>
    /* হাইলাইট স্টাইল */
.highlighted {
    border: 2px solid #dc3545 !important; /* লাল হাইলাইট */
    box-shadow: 0 0 5px #dc3545; /* হালকা শেড */
    transition: all 0.3s ease;
}
    .top{
        margin-bottom:15px ;!important
    }
    .note-editor.note-frame {
    background-color: #000 !important;   /* black background */
    border: 2px solid #dc3545 !important; /* red border */
    box-shadow: 0 0 6px #ffcdd2 !important;
    border-radius: 6px !important;
}

.note-editable {
    background-color: #000 !important; /* editable area black */
    color: #fff !important;            /* text white */
}
    /* Highlighted input for About & Skills */
    #about-section .highlighted,
    #skillContainer .highlighted {
        background-color: #000 !important;
        color: #fff !important;
        border: 2px solid #dc3545 !important;
        box-shadow: 0 0 6px #ffcdd2 !important;
        border-radius: 6px !important;
        transition: all 0.3s ease;
        padding: 10px !important;
    }

    /* Focus Highlight */
    #about-section .highlighted:focus,
    #skillContainer .highlighted:focus {
        border-color: #b71c1c !important;
        box-shadow: 0 0 12px #ffebee !important;
        outline: none;
    }

    /* Highlighted input */
    #about-section .highlighted {
        background-color: #000;
        color: #fff;
        border: 2px solid #dc3545;
        box-shadow: 0 0 6px #ffcdd2;
        border-radius: 6px;
        transition: all 0.3s ease;
        padding: 10px;
    }

    /* Focus Highlight */
    #about-section .highlighted:focus {
        border-color: #b71c1c;
        box-shadow: 0 0 12px #ffebee;
        outline: none;
    }

    /* Footer Fix inside Blade */
    html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    #about-section {
        flex: 1;
    }

    footer {
        background-color: #222;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }
</style>
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-light mb-0">Manage Portfolio Projects</h4>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                ➕ Add New Project
            </button>
        </div>

        {{-- ✅ Existing Projects Table --}}
        <table class="table table-dark table-striped align-middle text-center">
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Project Name</th>
                    <th>Category</th>
                    <th>Tools Used</th>
                    <th>Live Link</th>
                    <th>GitHub</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($protfolios as $protfolio)
                <tr>
                    <td><img src="{{ asset('uploads/protfolios/'.$protfolio->image) }}" alt="" width="70" class="rounded"></td>
                    <td>{{ $protfolio->name }}</td>
                    <td>{{ $protfolio->category }}</td>
                    <td>{{ $protfolio->tools }}</td>
                    <td>
                        @if($protfolio->live_link)
                            <a href="{{ $protfolio->live_link }}" target="_blank" class="text-info">Visit</a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        @if($protfolio->github_link)
                            <a href="{{ $protfolio->github_link }}" target="_blank" class="text-warning">GitHub</a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/protfolio/edit/'.$protfolio->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ url('/protfolio/delete/'.$protfolio->id) }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this protfolio?')">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No protfolios added yet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ✅ Add Project Modal --}}
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="addProjectModalLabel">➕ Add New Project</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ url('/protfolio/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Project Name</label>
                        <input type="text" name="name" class="form-control highlighted" placeholder="Enter protfolio name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" class="form-control highlighted" required>
                            <option value="">Select Category</option>
                            <option>Web Design</option>
                            <option>UI/UX</option>
                            <option>Branding</option>
                            <option>Development</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tools Used</label>
                        <input type="text" name="tools" class="form-control highlighted" placeholder="e.g. HTML, CSS, JS, Laravel">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" id="summernote1" class="form-control highlighted summernote" rows="4" placeholder="Write short description..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Live Link</label>
                            <input type="url" name="live_link" class="form-control highlighted" placeholder="https://example.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">GitHub Link</label>
                            <input type="url" name="github_link" class="form-control highlighted" placeholder="https://github.com/...">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Project Image</label>
                        <input type="file" name="image" class="form-control highlighted" accept="image/*" required>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Cancel</button>
                    <button type="submit" class="btn btn-danger">💾 Save Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
    <!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var addProjectModal = document.getElementById('addProjectModal');

    // যখন modal open হবে
    addProjectModal.addEventListener('show.bs.modal', function () {
        // সব ইনপুট, সিলেক্ট ও টেক্সটএরিয়া হাইলাইট কর
        var inputs = addProjectModal.querySelectorAll('input, select, textarea');
        inputs.forEach(function(input) {
            input.classList.add('highlighted');
        });
    });

    // modal close হলে হাইলাইট রিমুভ করতে চাইলে
    addProjectModal.addEventListener('hidden.bs.modal', function () {
        var inputs = addProjectModal.querySelectorAll('input, select, textarea');
        inputs.forEach(function(input) {
            input.classList.remove('highlighted');
        });
    });
});
</script>


<script>
    $(document).ready(function() {
  $('#summernote1').summernote();
});
</script>
@endpush