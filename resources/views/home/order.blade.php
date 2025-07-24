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
    <table border="1" cellpadding="10" cellspacing="0"
            style="width: 75%; text-align: center; border-collapse: collapse; font-size: 15px; margin: 20px auto;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment status</th>
                    <th>Delivery status</th>
                     <th>Image</th>
                </tr>
            </thead>

            <tbody>
                @foreach($order as $item)
                    <tr>
                        <td>{{ $item->product_title }}</td>
                        <td>{{ $item->quantity }}</td>
                         <td>${{ $item->price }}</td>
                        <td>{{$item->payment_status}}</td>
                        <td>{{$item->delivery_status}}</td>
                       
                        <td>
                            <img src="{{ asset('storage/product/' . $item->image) }}" alt="Product Image"
                                style="width: 80px; height: auto;">
                        </td>
                       
                    </tr>
                   
                @endforeach
                
            </tbody>
        </table>

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