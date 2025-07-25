@extends('app')
@section('sidebar')
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Study App - Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('users.dashboard')}}">
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    User
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{route('users.index')}}">
        <span>Admin</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('teacher.index')}}">
        <span>Teacher</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('student.index')}}">
        <span>Student</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<div class="sidebar-heading">
    Material
</div>

<li class="nav-item">
    <a class="nav-link" href="{{route('adminmaterial.index')}}">
        <span>Aprroval</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('category.index')}}">
        <span>Category</span></a>
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
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
@endsection