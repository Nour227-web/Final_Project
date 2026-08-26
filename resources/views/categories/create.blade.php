@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow">

                <div class="card-body p-4">

                    <h2 class="fw-bold text-center mb-4">
                        Add Category
                    </h2>
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <input type="text" name="name" class="form-control mb-3" placeholder="Category Name">

    <textarea name="description" class="form-control mb-3" placeholder="Description"></textarea>

    <input type="file" name="image" class="form-control mb-3">

    <button type="submit" class="btn btn-primary">
        Add Category
    </button>

</form>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection