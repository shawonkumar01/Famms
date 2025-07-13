<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding: 40px;
        }
        .h2_font{
            font-size: 40px;
            font-weight: bolder;
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
                    <h2 class="h2_font">Add Category</h2>
                    <Form>
                        <input type ='text' name="name" placeholder="Write Category Name">
                        <input type="submit" class= "btn btn-primary" name="submit" value="Add Category"
                    </Form>
                </div>
            </div>
        </div>
        @include('admin.script')
    </div>
</body>

</html>