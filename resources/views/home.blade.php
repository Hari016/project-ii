@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h3 class="fw-bold">Dashboard</h3>
            <p class="text-muted m-0 fw-bold">Welcome back, {{ Auth::user()->name }}.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="row g-4">

<!-- Put this style block anywhere inside this Blade file (top or bottom) -->
<styl>
    .card-hover {
        transition: transform .2s, box-shadow .2s;
    }

    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.65);
    }
</style>

<!-- Card 1 -->
<div class="col-md-4">
    <a href="{{ route('student.index') }}" class="text-decoration-none text-dark">
        <div class="card shadow-sm border-0 h-100 card-hover">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width:45px; height:45px;">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5 class="ms-3 mb-0">Students</h5>
                </div>
                <p class="text-muted">Manage all registered users in the system.</p>
                <span class="btn btn-outline-primary btn-sm">View More</span>
            </div>
        </div>
    </a>
</div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center" style="width:45px; height:45px;">
                            <i class="bi bi-folder"></i>
                        </div>
                        <h5 class="ms-3 mb-0">Projects</h5>
                    </div>
                    <p class="text-muted">Track ongoing and completed projects.</p>
                    <a href="#" class="btn btn-outline-success btn-sm">Open Projects</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-warning text-white d-flex justify-content-center align-items-center" style="width:45px; height:45px;">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h5 class="ms-3 mb-0">Reports</h5>
                    </div>
                    <p class="text-muted">View system analytics and summaries.</p>
                    <a href="#" class="btn btn-outline-warning btn-sm">View Reports</a>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Quick Overview</div>
                <div class="card-body">
                    <p class="mb-2">You are logged in and ready to go.</p>
                    <small class="text-muted">Use the cards above to explore different sections.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection