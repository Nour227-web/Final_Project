@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow">

                <div class="card-body p-4">

                    <h2 class="fw-bold text-center mb-4">
                        Edit Category
                    </h2>

                    <form action="{{ route('categories.update', $category) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <label class="form-label">
                            Category Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control mb-3"
                               value="{{ $category->name }}">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control mb-3"
                                  rows="4">{{ $category->description }}</textarea>

                        @if($category->image)

                            <div class="mb-3">
                                <label class="form-label">
                                    Current Image
                                </label>

                                <br>

                                <img src="{{ asset('storage/' . $category->image) }}"
                                     class="img-thumbnail"
                                     width="150">
                            </div>

                        @endif

                        <label class="form-label">
                            New Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control mb-4">

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary">
                                Update Category
                            </button>

                            <a href="{{ route('categories.index') }}"
                               class="btn btn-secondary">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection