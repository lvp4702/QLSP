<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::orderByDesc('id')->paginate(3);

        return response()->json(['products' => $products], 200);
    }

    public function list()
    {
        $products = Products::orderByDesc('id')->paginate(3);

        return view('product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();

        //check name
        if (!$body['name']) {
            return response([
                'error' => 'Vui lòng nhập tên sản phẩm !'
            ], 422);
        }
        $product = Products::where('name', $body['name'])->first();
        if ($product) {
            return response([
                'error' => 'Tên sản phẩm đã tồn tại!'
            ], 409);
        }

        //check price
        if (!$body['price']) {
            return response([
                'error' => 'Vui lòng nhập giá phòng !'
            ], 422);
        }
        if (!is_numeric($body['price']) || $body['price'] <= 0) {
            return response([
                'error' => 'Giá sản phẩm phải là một số lớn hơn 0 !'
            ], 422);
        }

        //check describe
        if (!$body['describe']) {
            return response([
                'error' => 'Vui lòng nhập mô tả !'
            ], 422);
        }

        //image
        if ($request->hasFile('img')) {
            $ext = $request->file('img')->extension();
            $generate_unique_file_name = md5(time()) . '.' . $ext;
            $request->file('img')->move('images', $generate_unique_file_name, 'local');

            $body['img'] = 'images/' . $generate_unique_file_name;
        }
        else{
            return response([
                'error' => 'Vui lòng chọn hình ảnh!'
            ], 422);
        }

        Products::create($body);

        return response()->json([
            'message' => 'Tạo mới thành công!'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($idProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idProduct)
    {
        $product = Products::find($idProduct);
        if (!$product) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm!'
            ], 404);
        }

        $body = $request->all();

        if ($body['name'] != $product->name) {
            $record = Products::where('name', $request->name)->first();
            if ($record) {
                return response()->json([
                    'error' => 'Sản phẩm đã tồn tại!'
                ], 409);
            }
        }

        if ($request->hasFile('img')) {
            $ext = $request->file('img')->extension();
            $generate_unique_file_name = md5(time()) . '.' . $ext;
            $request->file('img')->move('images', $generate_unique_file_name, 'local');

            $body['img'] = 'images/' . $generate_unique_file_name;
        }

        $product->update($body);

        return response()->json([
            'message' => 'Sửa sản phẩm thành công!',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idProduct)
    {
        $product = Products::find($idProduct);

        if (!$product) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm!'
            ], 404);
        }
        $product->delete();

        return response()->json([
            'message' => 'Xóa sản phẩm thành công!'
        ], 200);
    }
}
