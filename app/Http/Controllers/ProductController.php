<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $types = Product::latest()->get();

            return DataTables::of($types)

                ->addColumn('no', function () {
                    static $rowNumber = 0;
                    $rowNumber++;

                    return $rowNumber;
                })
                ->addColumn('image', function ($products) {
                    $image = "<img style='width: 60px; height: 90px; object-fit: cover; object-position: center;'
                    src='/uploads/" . $products->image . "' alt='Photo'/>";
                    return $image;
                })

                ->addColumn('action', function ($a) {

                    $edit = '<a href="/admin/products/' . $a->id . '/edit" class="btn btn-primary mr-5 px-4 py-2" data-id="' . $a->id . '">Edit</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $edit . $delete . '</div>';
                })->rawColumns(['no', 'action', 'image'])->make(true);
        }

        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create',[
            'categories' => Category::latest()->get(), 
        ]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:products,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand' => 'required',
            'category' => 'required|numeric|integer|min:1|not_in:0',
            'price' => 'required',
            'total_qty' => 'required',
            'description' => 'required|min:3',
        ]);

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        $attributes['image'] = $imageName;

        $attributes['category_id'] = $attributes['category'];

        unset($attributes['category']);

        Product::create($attributes);

        return redirect('/admin/products')->with('success', 'New product added successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ( $product->name != $request['name'] ) {


        $attributes = request()->validate([
            'name' => 'required|max:255|min:3|unique:products,name',
            'brand' => 'required',
            'price' => 'required',
            'add' => 'required',
            'description' => 'required|min:3',
        ]);

        
    } else {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'brand' => 'required',
            'price' => 'required',
            'add' => 'required',
            'description' => 'required|min:3',
        ]);

        
    }
    $product->update([
        'name' => $attributes['name'],
        'brand' => $attributes['brand'],
        'price' => $attributes['price'],
        'total_qty' => $product->total_qty + $attributes['add'],
        'description' => $attributes['description'],
    ]);

        $product->save();

        return back()->with('success', 'Product updated successfully');
    }

    public function imageChange(Request $request, $id)
    {
        $attributes = request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');

        $imageName = time() . '_' . $request->name . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads'), $imageName);

        $attributes['image'] = $imageName;

        $product = Product::findOrFail($id);

        $product->update([
            'image' => $attributes['image'],
        ]);

        $product->save();

        return back()->with('success', 'Image changed successfully');
    }

    public function productDetail($id) {
        
        $product = Product::findOrFail($id);
        $category = $product->category->id;

        return view('user.products.detail', [
            'product' => $product,
            'suggests' => Product::where('category_id', $category)->where('id', '<>', $id)->paginate(4),
            'categories' => Category::latest()->get(),
            'reviews' => ProductReview::where('product_id', $product->id)->latest()->get(),
            'five' => ProductReview::where('product_id', $product->id)->where('rating', 5)->count(),
            'four' => ProductReview::where('product_id', $product->id)->where('rating', 4)->count(),
            'three' => ProductReview::where('product_id', $product->id)->where('rating', 3)->count(),
            'two' => ProductReview::where('product_id', $product->id)->where('rating', 2)->count(),
            'one' => ProductReview::where('product_id', $product->id)->where('rating', 1)->count(),
            'initialQuantity' => 1,
        ]);


    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return 'success';
    }
}
