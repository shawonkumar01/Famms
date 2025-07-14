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
                
                


            </div>
            @include('admin.script')
        </div>
    </div>
</body>

</html>