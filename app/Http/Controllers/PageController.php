<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Store\Slide;
use Store\Product;
use Store\ProductType;
use Store\Cart;
use Store\Customer;
use Store\Bill;
use Store\BillDetail;
use Store\User;
use Validator;
use Route;
use Mail;
use Session;
use Store\Mail\Welcome;

class PageController extends Controller
{
 
  public function getIndex()
  {
    $slide = Slide::all();

    $new_product = Product::where('new', 1)->orderByRaw('RAND()')->paginate(4, ['*'], 'np');
    $sp_km = Product::where('promotion_price', '<>', 0)->paginate(4, ['*'], 'pp');

    return view('page.homepage', compact('slide', 'new_product', 'sp_km'));
  }

  public function getCatalog(Request $req, $type = '') 
  {
    if ($type == '') {
      return view('page.catalog', compact('type'));
    } else {
      $sp_theoloai = Product::where('id_type', $type)->get();
      $loaisp = ProductType::where('id', $type)->first();
      $catalog = ProductType::all();
      $sp_khac = Product::where('id_type', '<>', $type)->paginate(4);

      return view('page.catalog', compact('sp_theoloai', 'loaisp', 'sp_khac', 'catalog','type'));
    }
  }

  public function getDetail($id = '') 
  {
    $product = Product::where('id', $id)->first();
    $similarPro = Product::where('id_type', $product->id_type)->paginate(3);
    $newPro = Product::where('new', 1)->paginate(4);

    if (session()->has('viewedProductList')) {
      foreach (session()->get('viewedProductList') as $index => $pro) {
        if ($pro->id == $product->id) {
          return view('page.product_detail', compact('product', 'similarPro', 'newPro'));
        }
      }
      session()->push('viewedProductList', $product);
    } else session()->put('viewedProductList', [$product]);
    return view('page.product_detail', compact('product', 'similarPro', 'newPro'));
  }

  public function getContact() 
  {
    return view('page.contact');
  }

  public function getAbout() {
    return view('page.about');
  }

  public function getAddToCart(Request $req, $id) 
  {
    $product = Product::find($id);
    $oldCart = Session('cart')? Session::get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->add($product, $id);
    $req->session()->put('cart', $cart);
    return redirect()->back();
  }

  public function delItemCart($id) 
  {
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    if (count($cart->items) > 0) {
      Session::put('cart', $cart);
    }
    else {
      Session::forget('cart');
    }

    return redirect()->back();
  }

  public function postCheckout(Request $req) 
  {
    
    $cart = Session::get('cart');
    $validate= Validator::make(
      $req->all(),
      [
        'phone_number' => 'required|digits:11',
        'email'        => 'required|email'
      ],
      [
        'required'  =>  'Xin cho biết :attribute của bạn',
        'digits'    =>  ':attribute không hợp lệ',
        'email'     => ':attribute không hợp lệ'
      ],
      ['phone_number' => 'SĐT']

    );
    if($validate->fails()){
      return redirect('dathang')->withErrors($validate)->withInput();
    } else {

      $customer = new Customer;
      $customer->name = $req->name;
      $customer->gender = $req->gender;
      $customer->email = $req->email;
      $customer->address = $req->address;
      $customer->phone_number = $req->phone_number;
      $customer->note = $req->note;
      $customer->save();

      $bill = new Bill;
      $bill->id_customer = $customer->id;
      $bill->total = $cart->totalPrice;
      $bill->payment = $req->payment_method;
      $bill->save();

      foreach ($cart->items as $key => $value){
        $bill_detail = new BillDetail;
        $bill_detail->id_bill = $bill->id;
        $bill_detail->id_product = $key;
        $bill_detail->quantity = $value['qty'];
        $bill_detail->unit_price = $value['price'] / $value['qty'];
        $bill_detail->save();
      }
      Session::forget('cart');
     /* if ($customer->user) {
        Mail::to($customer->user)->send(new Welcome);
      }*/
     
      return redirect()->route('homepage')->with('thongbao', 'Đặt hàng thành công !');
    }
  }

  public function getSearch(Request $req) 
  {
    $product = Product::where('name', 'like','%'.$req->key.'%')->orWhere('unit_price', $req->key)->get();

    return view('page.search', compact('product'));
  }
  public function getNews() 
  {
    return view('page.indexNews');    
  }
}
