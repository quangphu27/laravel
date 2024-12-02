<?php
namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService {
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * Tạo mới một sản phẩm
     *
     * @param array $params
     * @return Product|bool
     */
    public function create(array $params)
    {
        try {
            $params['status'] = $params['status'] ?? 1;

            return $this->model->create($params);
        } catch (Exception $exception) {
            Log::error("Error creating product: " . $exception->getMessage());

            return false;
        }
    }

    /**
     * Cập nhật thông tin sản phẩm
     *
     * @param Product $product
     * @param array $params
     * @return bool
     */
    public function update(Product $product, array $params)
    {
        try {
            if (!$product) {
                throw new Exception("Invalid product instance");
            }

            return $product->update($params);
        } catch (Exception $exception) {
            Log::error("Error updating product: " . $exception->getMessage());

            return false;
        }
    }

    /**
     * Lấy danh sách sản phẩm
     *
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function getList($perPage = 10)
    {
        return $this->model
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate($perPage);
    }
}
