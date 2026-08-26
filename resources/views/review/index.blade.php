@extends('layouts.app')

@section('title', 'Reviews')

@section('content')

<div class="container mt-5">

    <h1 class="mb-4">
        Reviews for {{ $prodact->title }}
    </h1>

    @if(session('Success'))
        <div class="alert alert-success">
            {{ session('Success') }}
        </div>
    @endif

    {{-- Add Review --}}
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0">Add Review</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                {{-- Product ID automatically --}}
                <input
                    type="hidden"
                    name="prodact_id"
                    value="{{ $prodact->id }}"
                >

                <div class="mb-3">
                    <label class="form-label">Rating:</label>

                    <select name="rating" class="form-select" required>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Comment:</label>

                    <textarea
                        name="comment"
                        class="form-control"
                        rows="4"
                        required
                    ></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Add Review
                </button>

            </form>

        </div>
    </div>


    {{-- Show Reviews --}}
    <h2 class="mb-3">Reviews</h2>

    @if($reviews->count() > 0)

        @foreach($reviews as $review)

            <div class="card mb-3">

                <div class="card-body">

                    <p>
                        <strong>User:</strong>
                        {{ $review->user->name ?? 'User' }}
                    </p>

                    <p>
                        <strong>Rating:</strong>
                        {{ $review->rating }} ⭐
                    </p>

                    <p>
                        <strong>Comment:</strong>
                        {{ $review->comment }}
                    </p>

                    @if($review->user_id == auth()->id())

                        <a
                            href="{{ route('reviews.edit', $review->id) }}"
                            class="btn btn-warning"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('reviews.destroy', $review->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Delete
                            </button>
                        </form>

                    @endif

                </div>

            </div>

        @endforeach

    @else

        <div class="alert alert-info">
            No reviews for this product yet.
        </div>

    @endif

</div>

@endsection