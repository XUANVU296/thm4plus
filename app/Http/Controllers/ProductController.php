<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $products = Product::query()
                ->where('name', 'LIKE', "%$search%")
                ->orWhere('author', 'LIKE', "%$search%")
                ->get();

            return view('index', compact('products'));
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Đã xảy ra lỗi');
        }
    }
    public function create()
    {
        return view('create');
    }
    public function store(StoreRequest $request)
    {
        try {
            $min = intval(10000000000000000000);
            $max = intval(99999999999999999999);
            $product = new Product();
            $product->name = $request->name;
            $product->isbn = abs(mt_rand($min, $max));
            $product->author = $request->author;
            $product->genre = $request->genre;
            $product->page = $request->page;
            $product->year = $request->year;
            $product->save();
            return redirect()->route('products.index')->with('successMessage', 'Thêm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Đã xảy ra lỗi trong quá trình thêm sản phẩm');
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('edit',compact('product'));
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Bạn không có quyền truy cập vào trang chỉnh sửa');
        }
    }
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->author = $request->author;
            $product->genre = $request->genre;
            $product->page = $request->page;
            $product->year = $request->year;
            $product->save();
            return redirect()->route('products.index')->with('successMessage', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Đã xảy ra lỗi trong quá trình cập nhật');
        }
    }
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->back()->with('successMessage', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Bạn không có quyền truy cập');
        }
    }
}
