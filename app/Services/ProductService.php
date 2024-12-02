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

    public function create($params)
    {
        try {
            $params['status'] = 1;

            return $this->model->create($params);
        } catch (Exception $exception) {
            Log::error($exception);
            
            return false;
        }
    }

    public function update($product, $param)
    {
        $param['status'] = 0;
        return $product->update($param);
    }

    public function getList()
    {
        return $this->model
            ->where('status', 1)
            ->orderBy('created_at', 'DESC');
    }
}
