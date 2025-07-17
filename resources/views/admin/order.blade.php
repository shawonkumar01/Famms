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

        .order-table {
            width: 95%;
            margin: 30px auto;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        .order-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        .order-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            vertical-align: middle;
        }

        .order-table tr:last-child td {
            border-bottom: none;
        }

        .order-table tr:hover {
            background-color: var(--secondary-color);
        }

        .order-image {
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
            .order-table {
                width: 100%;
                display: block;
                overflow-x: auto;
            }
        }

        .table-responsive {
            overflow-x: auto;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-8 text-center">
                            <h2 class="h2_font">All Orders</h2>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-6">
                            <form action="{{ route('admin.order_search') }}" method="get" class="d-flex gap-2">
                                @csrf
                                <input type="text" name="search" class="form-control" placeholder="Search for order">
                                <input type="submit" value="Search" class="btn btn-primary">
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Category</th>
                                        <th>Phone</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                        <th>Image</th>
                                        <th>Delivery</th>
                                        <th>Download</th>
                                        <th>Send Mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order as $orders)
                                        <tr>
                                            <td>{{ $orders->name }}</td>
                                            <td>{{ $orders->email }}</td>
                                            <td>{{ $orders->address }}</td>
                                            <td>{{ $orders->product_title }}</td>
                                            <td>{{ $orders->phone }}</td>
                                            <td>{{ $orders->quantity }}</td>
                                            <td>{{ $orders->price }}</td>
                                            <td>{{ $orders->payment_status }}</td>
                                            <td>{{ $orders->delivery_status }}</td>
                                            <td>
                                                <img src="{{ asset('storage/product/' . $orders->image) }}"
                                                    class="order-image" alt="{{ $orders->name }}">
                                            </td>
                                            <td>
                                                @if ($orders->delivery_status == 'processing')
                                                    <a href="{{ route('admin.delivery', $orders->id) }}"
                                                        class="btn btn-warning">Delivery</a>
                                                @else
                                                    <span style="color: green;">Delivered</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.print_pdf', $orders->id) }}"
                                                    class="btn btn-success">Print PDF</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.send_email', $orders->id) }}"
                                                    class="btn btn-primary">Send</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- partial -->

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>