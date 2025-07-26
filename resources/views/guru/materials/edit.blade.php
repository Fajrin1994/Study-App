@extends('app')
@section('sidebar')
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Study App - Teacher</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('guru.dashboard') }}">
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Material
    </div>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('materials.index') }}">
            <span>My Material</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Material - Edit</h1>
    </div>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Material</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $material->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $material->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $cat->id == $material->category_id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="ebook" {{ $material->type == 'ebook' ? 'selected' : '' }}>E-Book</option>
                            <option value="audio" {{ $material->type == 'audio' ? 'selected' : '' }}>Audio</option>
                            <option value="video" {{ $material->type == 'video' ? 'selected' : '' }}>Video</option>
                            <option value="image" {{ $material->type == 'image' ? 'selected' : '' }}>Image</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload New File (optional)</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                        @if ($material->file_path)
                            <small class="form-text text-muted">Current file: {{ $material->file_path }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update Material</button>
                </form>
            </div>
        </div>
    </div>
@endsection
