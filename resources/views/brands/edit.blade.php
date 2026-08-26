@extends('layouts.app')

@section('title', 'Edit Brand')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h2 class="fw-bold text-center mb-4">
                        Edit Brand
                    </h2>

                    <form action="{{ route('brands.update', $brand) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <label class="form-label">
                            Brand Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control mb-3"
                               value="{{ $brand->name }}"
                               required>

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control mb-3"
                                  rows="4">{{ $brand->description }}</textarea>

                        @if($brand->image)

                            <label class="form-label">
                                Current Image
                            </label>

                            <br>

                            <img src="{{ asset('storage/' . $brand->image) }}"
                                 width="150"
                                 class="img-thumbnail mb-3">

                        @endif

                        <label class="form-label">
                            New Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control mb-4">

                        <button type="submit"
                                class="btn btn-primary">
                            Update Brand
                        </button>

                        <a href="{{ route('brands.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection