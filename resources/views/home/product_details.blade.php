<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>

    <!-- ✅ Header section -->
    @include('home.header')


    <!-- ✅ Product card section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <div class="product-card text-center">
                    <div class="img-box mb-3">
                        <img src="storage/product/{{ $product->image }}" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $product->product_name }}
                        </h5>
                        @if($product->discount_price != null)
                        <h6 style="color:green">
                          Discount Price:  ${{ $product->discount_price}}
                        </h6>
                        <h6 style="text-decoration:line-through; color: red;">
                          Product Price:  ${{ $product->price }}
                        </h6>
                        @else
                        <h6>
                           Product Price: ${{ $product->price }}
                        </h6>
                        @endif
                        <h6>
                            Product Catagory: {{ $product->category }}
                        </h6>
                        <h6>
                           Product Description: {{ $product->description }}
                        </h6>
                        <h6>
                            Avaiable Quantity: {{ $product->quantity }}
                        </h6>
                        <a href=""class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Footer -->
    @include('home.footer')

    <!-- Footer copyright -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
    </div>

    <!-- ✅ Scripts -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
</body>

</html>