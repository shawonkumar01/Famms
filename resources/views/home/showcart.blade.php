<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
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
    <!-- Custom styles for thome/his template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .img-siz {
            height: 200px;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        <table border="1" cellpadding="10" cellspacing="0"
            style="width: 75%; text-align: center; border-collapse: collapse; font-size: 15px; margin: 20px auto;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalprice = 0; ?>
                @foreach($cart as $item)
                <tr>
                    <td>{{ $item->product_title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                    <td>
                        <img src="{{ asset('storage/product/' . $item->image) }}" alt="Product Image"
                            style="width: 80px; height: auto;">
                    </td>
                    <td>
                        <!-- Example delete button -->
                        
                    </td>
                </tr>
                <?php $totalprice += $item->price ?>
                @endforeach
            </tbody>
        </table>

        <!-- ✅ Centered Total Price -->
        <div style="text-align: center; margin-top: 20px;">
            <h1>Total Price: ${{ $totalprice }}</h1>
        </div>


        <!-- footer start -->
       
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>