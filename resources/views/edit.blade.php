<!DOCTYPE html>
<html>

<head>
    <!-- Thêm đường dẫn đến Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <style>
        .header_title {
            color: red;
            background-color: aqua;
            text-align: center;
            padding: 10px;
            margin-top: 200px;
        }

        .margin-top {
            margin-top: 32px;
        }

        .color {
            color: rgba(243, 239, 239, 0.868);
        }
    </style>
</head>

<body>
    <script>
        @if (session('errorMessage'))
            Swal.fire({
                icon: 'error',
                text: '{{ session('errorMessage') }}',
                confirmButtonText: 'Đóng'
            });
        @endif
    </script>
    <h2 class="header_title container">Chỉnh sửa</h2>
    <form action="{{ route('products.update',$product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row col-12">
                <div class="col-4">
                    <label for="fname">Tên sách:</label>
                    <input type="text" id="fname" name="name" class="form-control"
                    value="{{ $product->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Tác giả:</label>
                   <select name="author" id="lname" class="form-control">
                        <option value="Nguyễn Bolt"<?php echo $product->author == 'Nguyễn Bolt' ? 'selected' : ''; ?>>Nguyễn Bolt</option>
                        <option value="Nguyễn Hack"<?php echo $product->author == 'Nguyễn Hack' ? 'selected' : ''; ?>>Nguyễn Hack</option>
                        <option value="Nguyễn Helu"<?php echo $product->author == 'Nguyễn Helu' ? 'selected' : ''; ?>>Nguyễn Helu</option>
                        <option value="Nguyễn Change"<?php echo $product->author == 'Nguyễn Change' ? 'selected' : ''; ?>>Nguyễn Change</option>
                        <option value="Nguyễn Tan"<?php echo $product->author == 'Nguyễn Tan' ? 'selected' : ''; ?>>Nguyễn Tan</option>
                    </select>
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Thể loại:</label>
                    <select name="genre" id="lname" class="form-control">
                        <option value="Trinh thám"<?php echo $product->genre == 'Trinh thám' ? 'selected' : ''; ?>>Trinh thám</option>
                        <option value="Viễn tưởng"<?php echo $product->genre == 'Viễn tưởng' ? 'selected' : ''; ?>>Viễn tưởng</option>
                        <option value="Kinh dị"<?php echo $product->genre == 'Kinh dị' ? 'selected' : ''; ?>>Kinh dị</option>
                        <option value="Kiếm hiệp"<?php echo $product->genre == 'Kiếm hiệp' ? 'selected' : ''; ?>>Kiếm hiệp</option>
                        <option value="Tình yêu"<?php echo $product->genre == 'Tình yêu' ? 'selected' : ''; ?>>Tình yêu</option>
                    </select>
                    @error('genre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Số trang:</label>
                    <input type="text" id="fname" name="page" class="form-control"
                    value="{{ $product->page }}">
                    @error('page')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Năm xuất bản:</label>
                    <input type="date" id="fname" name="year" class="form-control"
                    value="{{ $product->year }}">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-1">
                    <div class="margin-top">
                        <button type="submit" class="form-control btn btn-outline-success">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Thêm đường dẫn đến Bootstrap JS (nếu cần) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>