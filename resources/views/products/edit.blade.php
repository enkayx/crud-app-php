<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>

<body>
    <div class="container">
        <h2 class="title">Edit Product</h2>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" class="form">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name" class="label">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required class="input" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="price" class="label">Price</label>
                <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required class="input" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="quantity" class="label">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required class="input" placeholder="Enter quantity">
            </div>
            <div class="form-group">
                <label for="description" class="label">Description</label>
                <textarea id="description" name="description" rows="3" class="input" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
            </div>
            <div>
                <button type="submit" class="submit-btn">Update Product</button>
            </div>
        </form>
    </div>
</body>

</html>
