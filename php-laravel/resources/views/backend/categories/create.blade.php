@extends('layouts.master')
@section('title', 'Create new category')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a class="btn btn-sm btn-outline-secondary" href="{{route('categories.create')}}">Create new
                    category</a>

                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <form method="post" action="{{route('categories.store')}}">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Category name</label>
                <input type="text" name="name" value="{{old('name', '')}}"
                    class="form-control @error('name') is-invalid @enderror" id="nameInput">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@stop
