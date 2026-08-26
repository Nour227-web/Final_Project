@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">
                    <h3 class="mb-0">Edit Review</h3>
                </div>

                <div class="card-body">

                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">
                                Rating
                            </label>

                            <select name="rating" class="form-select" required>

                                <option value="1"
                                    {{ $review->rating == 1 ? 'selected' : '' }}>
                                    ⭐
                                </option>

                                <option value="2"
                                    {{ $review->rating == 2 ? 'selected' : '' }}>
                                    ⭐⭐
                                </option>

                                <option value="3"
                                    {{ $review->rating == 3 ? 'selected' : '' }}>
                                    ⭐⭐⭐
                                </option>

                                <option value="4"
                                    {{ $review->rating == 4 ? 'selected' : '' }}>
                                    ⭐⭐⭐⭐
                                </option>

                                <option value="5"
                                    {{ $review->rating == 5 ? 'selected' : '' }}>
                                    ⭐⭐⭐⭐⭐
                                </option>

                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">
                                Comment
                            </label>

                            <textarea
                                name="comment"
                                class="form-control"
                                rows="5"
                                required>{{ $review->comment }}</textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">
                            Update Review
                        </button>

                        <a
                            href="{{ route('reviews.index', $review->prodact_id) }}"
                            class="btn btn-secondary"
                        >
                            Back
                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection