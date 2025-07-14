<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --text-color: #5a5c69;
            --border-color: #e3e6f0;
        }

        .div_center {
            text-align: center;
            padding: 40px;
        }

        .h2_font {
            font-size: 40px;
            font-weight: bolder;
            color: white;
            margin-bottom: 30px;
        }

        .product-table {
            width: 95%;
            margin: 30px auto;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        .product-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        .product-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            vertical-align: middle;
        }

        .product-table tr:last-child td {
            border-bottom: none;
        }

        .product-table tr:hover {
            background-color: var(--secondary-color);
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid var(--border-color);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-edit {
            background-color: #f6c23e;
            color: white;
            border: none;
        }

        .btn-delete {
            background-color: #e74a3b;
            color: white;
            border: none;
        }

        .btn-view {
            background-color: #36b9cc;
            color: white;
            border: none;
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background-color: #1cc88a;
            color: white;
        }

        .status-inactive {
            background-color: #e74a3b;
            color: white;
        }

        @media (max-width: 768px) {
            .product-table {
                width: 100%;
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h2 class="h2_font">All Products</h2>
                </div>

                <!-- resources/views/admin/show_product.blade.php -->

                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ Str::limit($product->description, 50) }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->category}}</td>
                                                <td>${{ number_format((float) $product->price, 2) }}</td>
                                                <td>
                                                    ${{ $product->discount_price
                            ? number_format((float) $product->discount_price, 2)
                            : 'N/A' }}
                                                </td>
                                                <!-- Image column moved to correct position -->
                                                <td>
                                                    @if($product->image)
                                                        <img src="{{ asset('storage/product/' . $product->image) }}" class="product-image"
                                                            alt="{{ $product->product_name }}">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <!-- Add delete and edit buttons -->
                                                <td>
                                                    <form action="{{ route('admin.delete_product', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-delete"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                <a href="{{ route('admin.edit_product', $product->id) }}" class="btn btn-edit">Edit</a>
                                                </td>
                                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.script')
    </div>
</body>

</html>