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
    <h2 class="header_title container">Thêm mới</h2>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="container">
            <div class="row col-12">
                <div class="col-4">
                    <label for="fname">Tên sách:</label>
                    <input type="text" id="fname" name="name" class="form-control"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Tác giả:</label>
                   <select name="author" id="lname" class="form-control">
                        <option value="Nguyễn Bolt">Nguyễn Bolt</option>
                        <option value="Nguyễn Hack">Nguyễn Hack</option>
                        <option value="Nguyễn Helu">Nguyễn Helu</option>
                        <option value="Nguyễn Change">Nguyễn Change</option>
                        <option value="Nguyễn Tan">Nguyễn Tan</option>
                    </select>
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Thể loại:</label>
                    <select name="genre" id="lname" class="form-control">
                        <option value="Trinh thám">Trinh thám</option>
                        <option value="Viễn tưởng">Viễn tưởng</option>
                        <option value="Kinh dị">Kinh dị</option>
                        <option value="Kiếm hiệp">Kiếm hiệp</option>
                        <option value="Tình yêu">Tình yêu</option>
                    </select>
                    @error('genre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Số trang:</label>
                    <input type="text" id="fname" name="page" class="form-control"
                        value="{{ old('page') }}">
                    @error('page')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="fname">Năm xuất bản:</label>
                    <input type="date" id="fname" name="year" class="form-control"
                        value="{{ old('year') }}">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-1">
                    <div class="margin-top">
                        <button type="submit" class="form-control btn btn-outline-success">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Thêm đường dẫn đến Bootstrap JS (nếu cần) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>