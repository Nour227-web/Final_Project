@extends('layouts.app')

@section('title', 'Show Product')

@section('content')
<style>
    .pv-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        --amber: #B9720F;
        --danger: #B23A2E;
        --danger-dark: #8F2E24;
        font-family: 'Inter', system-ui, sans-serif;
        color: var(--ink);
        background: var(--paper);
        padding: 2.5rem 1.5rem 4rem;
    }
    .pv-scope * { box-sizing: border-box; }
    .pv-back {
        max-width: 760px;
        margin: 0 auto 1.5rem;
        display: block;
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.8rem;
        color: var(--muted);
        text-decoration: none;
    }
    .pv-back:hover { color: var(--accent-dark); }
    .pv-detail {
        max-width: 760px;
        margin: 0 auto;
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        overflow: hidden;
    }
    .pv-detail-img {
        width: 100%;
        max-height: 380px;
        object-fit: cover;
        display: block;
        background: var(--paper);
    }
    .pv-detail-body { padding: 1.75rem 2rem 2rem; }
    .pv-detail-body h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.75rem;
        font-weight: 600;
        letter-spacing: -0.02em;
        margin: 0 0 0.85rem;
    }
    .pv-tags { display: flex; gap: 0.5rem; margin-bottom: 1.25rem; flex-wrap: wrap; }
    .pv-tag {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.85rem;
        font-variant-numeric: tabular-nums;
        padding: 0.3rem 0.65rem;
        border-radius: 5px;
        border: 1px solid var(--line);
    }
    .pv-tag-price { color: var(--amber); border-color: #ECD5A8; background: #FBF3E6; }
    .pv-tag-stock { color: var(--accent-dark); border-color: #BFE3D6; background: #EAF6F2; }
    .pv-desc { color: var(--ink); line-height: 1.65; margin-bottom: 1.5rem; }
    .pv-meta {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
        border-top: 1px solid var(--line);
        padding-top: 1.25rem;
        margin-bottom: 1.5rem;
    }
    .pv-meta-item .pv-eyebrow {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.68rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.2rem;
    }
    .pv-meta-item div:last-child { font-weight: 600; }
    .pv-actions {
        display: flex;
        gap: 0.75rem;
        border-top: 1px solid var(--line);
        padding-top: 1.25rem;
    }
    .pv-btn {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        border: 1px solid var(--line);
        color: var(--ink);
        background: var(--surface);
    }
    .pv-btn:hover { border-color: var(--accent); color: var(--accent-dark); }
    .pv-btn-danger-form { margin: 0; }
    .pv-btn-danger {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        border: 1px solid #F0C9C2;
        color: var(--danger);
        background: #FCEEEC;
    }
    .pv-btn-danger:hover { background: #F9DCD6; }
    .pv-cart-btn {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .pv-cart-btn:hover { background: var(--accent-dark); color: #fff; }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">

<div class="pv-scope">

    <a href="{{ route('products.index') }}" class="pv-back">&larr; Back to Products</a>

    <div class="pv-detail">
        @if ($product->image)
            <img class="pv-detail-img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        @endif

        <div class="pv-detail-body">
            <h1>{{ $product->name }}</h1>

            <div class="pv-tags">
                <span class="pv-tag pv-tag-price">${{ number_format((float) $product->price, 2) }}</span>
                <span class="pv-tag pv-tag-stock">{{ $product->stock }} in stock</span>
            </div>

            <p class="pv-desc">{{ $product->description }}</p>

            <div class="pv-meta">
                <div class="pv-meta-item">
                    <div class="pv-eyebrow">Category</div>
                    <div>{{ $product->category->name }}</div>
                </div>
                <div class="pv-meta-item">
                    <div class="pv-eyebrow">Brand</div>
                    <div>{{ $product->brand->name }}</div>
                </div>
            </div>

            @auth
                @if(auth()->user()->isAdmin())
                    <div class="pv-actions">
                        <a href="{{ route('products.edit', $product->id) }}" class="pv-btn">Edit Product</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="pv-btn-danger-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="pv-btn-danger" onclick="return confirm('Delete this product?')">Delete Product</button>
                        </form>
                    </div>
                @endif

                @if(auth()->user()->isCustomer())
                    <div class="pv-actions">
                        <a href="{{ route('cart.add', $product->id) }}" class="pv-cart-btn">🛒 Add to Cart</a>
                    </div>
                @endif
            @endauth
        </div>
    </div>

</div>
@endsection