<h1>Chỉnh sửa sản phẩm</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Thêm method PUT cho form chỉnh sửa -->

    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
    </div>

    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
        @endif
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục sản phẩm</label>
        <select name="category_id" class="form-control" required>
            <option value="">Chọn danh mục</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control">
            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Kích hoạt</option>
            <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Không kích hoạt</option>
        </select>
    </div>

    <div class="form-group">
        <label for="stock">Số lượng tồn kho</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
</form>
