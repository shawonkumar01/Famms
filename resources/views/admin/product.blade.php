<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding: 40px;
        }

        .h2_font {
            font-size: 40px;
            font-weight: bolder;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 2px solid white;

        }
        
    </style>

</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container mt-5" style="max-width: 600px;">
                    <div class="card shadow rounded">
                        <div class="card-header text-white text-center">
                            <h3 class="mb-0">Add Product</h3>
                        </div>

                        <div class="card-body bg-dark text-white">
                            <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" name="product_name" class="form-control"
                                        placeholder="Write a name" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Description</label>
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Give a description of the product" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter price"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Quantity</label>
                                    <input type="number" name="quantity" class="form-control"
                                        placeholder="Enter quantity" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Category</label>
                                    <select name="category" class="form-select" required>
                                        <option disabled selected>Select Category</option>
                                        <option>Shirt</option>
                                        <option>Pants</option>
                                        <option>Shoes</option>
                                        <!-- Or load from DB -->
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success px-5">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @include('admin.script')
        </div>
    </div>
</body>

</html>