<h1>Danh sách sản phẩm</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm mới sản phẩm</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng tồn kho</th>
            <th>Trạng thái</th>
            <th>Danh mục</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                    @else
                        <span>Không có hình ảnh</span>
                    @endif
                </td>
                <td>{{ number_format($product->price, 2, ',', '.') }} VND</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->status ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                <td>
                    @php
                        $category = App\Models\Category::find($product->category_id);
                    @endphp
                    {{ $category ? $category->name : 'Không có danh mục' }}
                </td>
                                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- Hiển thị phân trang --}}
{{ $products->links() }}
