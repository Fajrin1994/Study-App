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
        <h1 class="h3 mb-0 text-gray-800">My Material</h1>
    </div>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Material</h6>
            </div>
            <div class="card-body">
                <a class="btn btn-secondary mb-3" href="{{ route('materials.create') }}">Create</a>
                <div class="table-responsive">
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Approval_status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($materials as $index => $material)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $material->teacher->user->name }}
                                    </td>

                                    <td>
                                        <a href="{{ route('gurumaterial.show', $material->id) }}"
                                            class="text-decoration-none">
                                            {{ $material->title }}
                                        </a>
                                    </td>

                                    <td>
                                        {{ $material->description }}
                                    </td>

                                    <td>
                                        {{ $material->type }}
                                    </td>

                                    <td>
                                        @php
                                            $status = $material->approval_status;
                                            $badgeClass = match ($status) {
                                                'approved' => 'badge-success',
                                                'pending' => 'badge-warning',
                                                'rejected' => 'badge-danger',
                                                default => 'badge-secondary',
                                            };
                                        @endphp

                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary" href="{{ route('materials.edit', $material->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Material Approved</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Desciption</th>
                                <th>Type</th>
                                <th>Approval_status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($materials_approved as $index => $material)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $material->teacher->user->name }}
                                    </td>

                                    <td>
                                        <a href="{{ route('gurumaterial.show', $material->id) }}"
                                            class="text-decoration-none">
                                            {{ $material->title }}
                                        </a>
                                    </td>

                                    <td>
                                        {{ $material->description }}
                                    </td>

                                    <td>
                                        {{ $material->type }}
                                    </td>

                                    <td>
                                        @php
                                            $status = $material->approval_status;
                                            $badgeClass = match ($status) {
                                                'approved' => 'badge-success',
                                                'pending' => 'badge-warning',
                                                'rejected' => 'badge-danger',
                                                default => 'badge-secondary',
                                            };
                                        @endphp

                                        <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
