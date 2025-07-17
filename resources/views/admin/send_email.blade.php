<!DOCTYPE html>
<html lang="en">

<head>
   
    @include('admin.css')
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
                    <!-- ✅ Add your page content here -->
                    <h2>Welcome to Admin Dashboard</h2>
                </div>

                <!-- ✅ Optional footer if you have -->
                <!-- @include('admin.footer') -->

            </div> <!-- end of main-panel -->
        </div> <!-- end of container-fluid -->
    </div> <!-- end of container-scroller -->

    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
