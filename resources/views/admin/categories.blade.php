<!DOCTYPE html>
<html>

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

        .form-container {
            width: 95%;
            margin: 0 auto 30px;
        }

        .form-control {
            padding: 10px;
            border-radius: 6px;
            font-size: 16px;
        }

        .btn {
            padding: 8px 20px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .category-table {
            width: 95%;
            margin: 0 auto 50px;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .category-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 14px;
        }

        .category-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .category-table tr:hover {
            background-color: var(--secondary-color);
        }

        .btn-delete {
            background-color: #e74a3b;
            color: white;
            border: none;
        }

        .alert {
            width: 95%;
            margin: 20px auto;
        }

        @media (max-width: 768px) {
            .category-table {
                width: 100%;
                display: block;
                overflow-x: auto;
            }
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
                </div>

                <div class="form-container">
                    <form action="{{ route('admin.categories') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control bg-dark text-white"
                                placeholder="Write Category Name" required style="border: 1px solid var(--border-color);">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="category-table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <form action="{{ route('delete_category', $item->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are You Sure To Delete This Category?');">
                                            @csrf
                                            <button type="submit" class="btn btn-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @include('admin.script')
    </div>
</body>

</html>
