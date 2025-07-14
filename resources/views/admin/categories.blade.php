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
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="div_center">

                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf <!-- CSRF Protection - REQUIRED in Laravel -->
                        <div class="mb-2">
                            <input type="text" name="name" class="form-control bg-dark text-white"
                                placeholder="Write Category Name" required style="border-color: #6c757d;">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <td>Category Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)
                        <tr>
                            <td>{{$data->category_name}}</td>
                            <td>
                                <form action="{{ route('delete_category', $data->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are You Sure To Delete This!!!');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
        @include('admin.script')
    </div>
</body>

</html>