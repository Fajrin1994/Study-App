@extends('app')
@section('sidebar')
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Study App - Student</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Material
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('muridmaterials.index') }}">
            <span>All Material</span>
        </a>
    </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('muridmaterials.mine') }}">
            <span>My Material</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Discussions
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#">
        <span>Discussions</span></a>
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
        <h1 class="h3 mb-0 text-gray-800">My Material - Preview</h1>
    </div>
    <!-- PDF Preview -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <iframe 
                src="{{ asset($material->file_path) }}" 
                width="100%" 
                height="600px"
                style="border: none;"
            ></iframe>
        </div>
    </div>
@endsection
