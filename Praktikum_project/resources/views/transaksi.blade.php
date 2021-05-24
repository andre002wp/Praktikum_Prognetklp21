@extends('admin.layouts.master')

@section('content')
    {{-- @component('components.breadcrumbs')
    <a href="/">Home</a>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span>Shop</span>
    @endcomponent --}}

    <div class="container">
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>

    <div class="products-section container">
    <div>
        <div class="products-header">
            <h1 class="stylish-heading">{{ $product->name }}</h1>
            <div>
                <strong>Price: </strong>
                <a href="#">Low to High</a> |
                <a href="#">High to Low</a>

            </div>
        </div>

        <div class="products text-center">
            @forelse ($products as $product)
                <div class="product">
                    <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                    <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                    <div class="product-price">{{ $product->presentPrice() }}</div>
                </div>
            @empty
                <div style="text-align: left">No items found</div>
            @endforelse
        </div> <!-- end products -->

        <div class="spacer"></div>
        {{ $products->appends(request()->input())->links() }}
    </div>
    </div>
@endsection