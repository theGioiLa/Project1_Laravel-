<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Store\ProductType;
use Store\Product;
use Validator;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = ProductType::pluck('name', 'id');
        $product = [];
        $count = [];
        foreach ($categories as $id => $name) {
            $product[$id] = Product::where('id_type', $id)->get();
            $count[$id] = count($product[$id]);
        }
        return view('admin.product.index', compact('categories', 'product', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ProductType::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = [];

        for($i = 0; $i < 5 ; $i++) {
            if ($request->name[$i]) {

                $rule = [
                    "name.$i"            => 'required|string|unique:products,name',
                    "description.$i"     => 'required|string',
                    "unit_price.$i"      => 'required|numeric',
                    "promotion_price.$i" => 'numeric|nullable',
                    "image.$i"           => 'required|image|max:5000',
                    "id_type.$i"         => 'required'
                ];

                $message = [
                    "image"         => 'Không đúng định dạng ảnh ',
                    "unique"        => ':attribute : Tên đã tồn tại',
                    "numeric"       => 'Không đúng định dạng giá (là số)',
                    "required"      => ':attribute Phải có chứ',
                    'image.max'     => 'Kich thuoc tối đa 5 Mb'
                ];
                $alias = [
                    "name.$i"   => "Sản phẩm thứ ".($i+1),
                    "image.$i"  => "image(".($i+1).")"
                ];


                $validator = Validator::make($request->all(), $rule, $message, $alias);
                if ($validator->fails()) {
                    return redirect('admin/product/create')->withErrors($validator)->withInput();
                } else {
                    $formInput['name'] = $request->name[$i];
                    $formInput['description'] = $request->description[$i];
                    $formInput['unit_price'] = $request->unit_price[$i];
                    $formInput['id_type'] = $request->id_type[$i];
                    $formInput['promotion_price'] = $request->promotion_price[$i];

                    if ($request->has("image.$i")) {
                        $image = $request->image[$i];
                        $imageName = $image->getClientOriginalName();
                        $image->move('source/image/product',$imageName);
                        $formInput['image'] = $imageName;
                    } else $formInput['image'] = null;
                    Product::create($formInput);
                }
            }
        }

        if (!empty($formInput)) {
            //redirect with flased session data.
            return redirect()->back()->with(['status' => 'Tác vụ thành công']);
        }
        return redirect()->back()->with(['status' => 'Tác vụ không thành công, vui lòng nhập lại']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = ProductType::pluck('name', 'id');
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories'));
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
        $rules = [
            'name'            => 'required', 
            'description'     => 'required',
            'unit_price'      => 'required|numeric',
            'promotion_price' => 'numeric',
            'image'           => 'image|max:5000',
            'id_type'         => 'required'
        ];
        $message = [
            'required'                => ':attribute chưa được thiết lập',
            'unit_price.numeric'      => '"Giá gốc" phải ở dạng số',
            'promotion_price.numeric' => '"Gía khuyến mại" phải ở dạng số',
            'image'                   => 'Không đúng định dạng ảnh',
            'max'                     => 'Kích thước tối đa là 5 Mb'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect("admin/product/$id/edit")->withErrors($validator)->withInput();
        } else {
            $product                  = Product::find($id);
            $product->name            = $request->name;
            $product->id_type         = $request->id_type;
            $product->description     = $request->description;
            $product->unit_price      = $request->unit_price;
            $product->promotion_price = $request->promotion_price;

            if ($request->has("image")) {
                $image = $request->image;
                $imageName = $image->getClientOriginalName();
                $image->move('source/image/product',$imageName);
                $product->image = $imageName;
            } 
            $product->save();     

            $value = " \"$product->name\" vừa mới được chỉnh sửa thành công";
            $request->session()->flash('status', $value);   
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $nameProduct = $product->name;
        $product->delete();
        return redirect('admin/product')->with(['status' => "\"$nameProduct\" đã được xóa"]);
    }
}
