<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\Images;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::select(['id', 'name'])->get();
        return view('backend/products/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function data()
    {
        $products = Product::select(['id','name','price', 'stock', 'product_category_id', 'updated_at']);

        return DataTables::of($products->get())
            ->addColumn('actions',function($product) {
                $actions = '<a href='. route('products.show', $product->id) .' title="view category"><i data-feather="eye"></i></a>
                        <a href='. route('products.edit', $product->id) .' title="update category"><i data-feather="edit"></i></a>
                        <a href="javascript:;" class="delete link-danger" data-id="'.$product->id.'" title="delete category"><i data-feather="trash-2"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function store(ProductRequest $request)
    {
        $data = $request->except(['_token']);
//        dd($request->files);

        $images = $this->_upload($request);
        $imgIds = [];
        if ($images)
        {
            foreach ($images as $image)
            {
                $i = Images::create($image);
                $imgIds[] = $i->id;
            }
        }

        $product = Product::create($data);
        if ($imgIds)
        {
            $product->images()->attach($imgIds);
        }

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __FUNCTION__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        if($product)
        {
            return view('backend.products.edit', compact('product'));
        }

        return redirect(route('products.index'))->with('msg', 'Can not find product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->name = $request->input('name');
            $product->name = $request->input('description');
            $product->name = $request->input('product_category_id');
            $product->name = $request->input('price');
            $product->name = $request->input('stock');
            $product->name = $request->input('stock_defective');
            $product->name = $request->input('image1');
            $product->name = $request->input('image2');
            $product->name = $request->input('image3');
            $product->save();
        }
        return redirect(route('products.index'))->with('msg', 'Update Sucessful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect(route('products.index'))
            ->with('msg', 'Delete successful!');
    }
    private function _upload(Request $request)
    {
        $data = [];
        if ($request->hasFile('image1'))
        {
            $path = $request->file('image1')->store('uploads');
            $data['image1']['name'] = '';
            $data['image1']['url'] = $path;
        }

        if ($request->hasFile('image2'))
        {
            $path = $request->file('image2')->store('uploads');
            $data['image2']['name'] = '';
            $data['image2']['url'] = $path;
        }

        if ($request->hasFile('image3'))
        {
            $path = $request->file('image3')->store('uploads');
            $data['image3']['name'] = '';
            $data['image3']['url'] = $path;
        }

        return $data;

    }
}
