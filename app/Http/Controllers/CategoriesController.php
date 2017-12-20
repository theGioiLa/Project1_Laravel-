<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Store\ProductType;
use Store\Product;
use Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $categories;

    public function __construct() {
        $this->categories = ProductType::all();
    }
    public function index()
    {
        //
        $categories = $this->categories;
        $catalog = [];
        $i = 0;
        foreach ($categories as $category) {
            # code...
            $products = Product::where('id_type', $category->id)->get();
            $catalog[$i++] = [$category, count($products)];
        }
        $index = 0;
        return view('admin.category.index',compact('catalog', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = $this->categories;
        return view('admin.category.create', compact('categories'));

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

        for($i = 0; $i < 3; $i++) {
            if ($request->name[$i]) {
                $rule = [
                    "name.$i"            => 'required|string|unique:connection.type_products,name',
                    "description.$i"     => 'required|string',
                    "image.$i"           => 'bail|image|required|mimes:png,jpg,jpeg|max:5000',
                ];

                $message = [
                    "mimes"          => 'Không đúng định dạng',
                    "image"          => 'Không đúng định dạng',
                    "required"       => ':attribute chưa được thiết lập',
                    "unique"         => ':attribute : Tên đã tồn tại',
                    "max"            => 'Kích thước ảnh tối đa 5 Mb'
                ];
                $alias = [
                    "name.$i"   => "Danh mục thứ ".($i+1),
                    "image.$i"  => "image(".($i+1).")",
                    "description.$i" => "Mô tả thứ ".($i+1),
                ];

                $validator = Validator::make($request->all(), $rule, $message, $alias);
                if ($validator->fails()) {
                    return redirect('admin/category/create')->withErrors($validator)->withInput();
                } else {
                    $formInput['name'] = $request->name[$i];
                    $formInput['description'] = $request->description[$i];

                    if ($request->has("image.$i")) {
                        $image = $request->image[$i];
                        $imageName = $image->getClientOriginalName();
                        $image->move('source/image/category',$imageName);
                        $formInput['image'] = $imageName;
                    } else $formInput['image'] = null;
               }
               ProductType::create($formInput);
            }
           
        } 
        if (!empty($formInput)) {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductType::findorFail($id);
        $nameCata = $category->name;
        $category->delete();
        return redirect('admin/category')->with(['status' => "Danh mục \"$nameCata\" đã được xóa"]);
    }
}
