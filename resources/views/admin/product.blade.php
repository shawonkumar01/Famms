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
                            <form action="{{ route('admin.store_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" name="product_name" class="form-control bg-white text-dark"
                                        placeholder="Write a name" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Description</label>
                                    <input type="text" name="description" class="form-control bg-white text-dark"
                                        placeholder="Give a description of the product" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Price</label>
                                    <input type="text" name="price" class="form-control bg-white text-dark"
                                        placeholder="Enter price" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Quantity</label>
                                    <input type="number" name="quantity" class="form-control bg-white text-dark"
                                        placeholder="Enter quantity" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Discount Price</label>
                                    <input type="number" name="discount_price" class="form-control bg-white text-dark"
                                        placeholder="Enter quantity" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Category</label>
                                    <select name="category" class="form-select bg-white text-dark" required>
                                        <option disabled selected>Select Category</option>
                                        
                                        @foreach($categories as $cat)
                                        <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Product Image</label>
                                    <input type="file" name="image" required>
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