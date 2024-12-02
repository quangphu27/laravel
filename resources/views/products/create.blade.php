<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="stock">Số lượng tồn kho</label>
        <input type="number" name="stock" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục sản phẩm</label>
        <select name="category_id" class="form-control" required>
            <option value="">Chọn danh mục</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control">
            <option value="1">Kích hoạt</option>
            <option value="0">Không kích hoạt</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>
