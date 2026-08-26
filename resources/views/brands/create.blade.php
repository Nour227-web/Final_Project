@extends('layouts.app')

@section('title', 'Add Brand')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <h2 class="fw-bold text-center mb-4">
                        Add Brand
                    </h2>

                    <form action="{{ route('brands.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <label class="form-label">
                            Brand Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control mb-3"
                               placeholder="Enter brand name"
                               required>

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control mb-3"
                                  rows="4"
                                  placeholder="Brand description"></textarea>

                        <label class="form-label">
                            Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control mb-4">

                        <button type="submit"
                                class="btn btn-primary">
                            Add Brand
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