<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('name'); // Tên sản phẩm
            $table->string('image')->nullable(); // Đường dẫn hình ảnh sản phẩm
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->integer('stock')->default(0); // Số lượng tồn kho
            $table->boolean('status')->default(true); // Trạng thái sản phẩm (còn bán hay không)
            $table->unsignedBigInteger('category_id')->nullable(); // Thêm cột category_id
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
