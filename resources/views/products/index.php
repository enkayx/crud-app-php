<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTS</title>
    <link rel="stylesheet" href="/css/products.css">
</head>

<body>


    <table class="products-table">
        <thead>
            <tr>
            </tr>
            <tr>
                <th colspan="4" class="table-title">Products List</th>
                <th><a href="/product/add" class="create-btn">+ Create</a></th>
            </tr>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($products) && count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product->name); ?></td>
                        <td>$<?php echo number_format($product->price, 2); ?></td>
                        <td><?php echo $product->quantity; ?></td>
                        <td><?php echo htmlspecialchars($product->description); ?></td>
                        <td>
                            <a href="<?php echo route('product.edit', ['id' => $product->id]); ?>" class="edit-btn">Edit</a>

                            <form action="<?php echo route('product.delete', ['id' => $product->id]); ?>" method="POST" class="inline-form">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-products">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>