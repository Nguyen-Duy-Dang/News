<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-2" style="width:60%;">
        <h2 class="mb-4">Add New Category</h2>
        <a href="/new">Quay lại</a>
        <form action="/new/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="TenTT">Tên Tin Tức</label>
                <input type="text" class="form-control" name="TenTT" required>
            </div>
            <div class="form-group">
                <label for="HinhAnh">Ảnh</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="NgayTao">Ngày Tạo</label>
                <input type="datetime-local" class="form-control" name="NgayTao" required>
            </div>
            <div class="form-group">
                <label for="MoTa">Mô Tả</label>
                <textarea class="form-control" name="MoTa" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="MaDM">Mã Danh Mục</label>
                <select class="form-control" id="MaDM" name="MaDM" required>
                    <!-- Giả sử bạn có một mảng các danh mục -->
                    @foreach($categorys as $category)
                        <option value="{{ $category->MaDM }}">{{ $category->TenDM }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Thêm mới</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
