<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // menampilkan data produk
    // buat fungsi menampilkan semua data produk
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');
        
        if ($id) {

            $product = Products::find($id);
            
            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data produk berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }
        }

        $product = Products::query();

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        if ($types) {
            $product->where('types', 'like', '%' . $types . '%');
        }

        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }

        if ($price_to) {
            $product->where('price', '<=', $price_to);
        }

        if ($rate_from) {
            $product->where('rate', '>=', $rate_from);
        }

        if ($rate_to) {
            $product->where('rate', '<=', $rate_to);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil'
        );

    }

    public function store(Request $request, $id)
    {

        Products::create([
            'store_id' => $id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'type' => $request->type,
            'picturePath' => $fileName,
        ]);

        return ResponseFormatter::success($product->toArray(), 'Store Created');
    }

}
