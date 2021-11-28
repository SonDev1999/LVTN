<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ward;
use App\Models\city;
use App\Models\province;
use App\Models\sanpham;
use App\Models\loaisp;
use App\Models\khuyenmai;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
class muahangController extends Controller
{
  public function __construct(){
    $loaisanpham=loaisp::all();
    View::share('loaisanpham',$loaisanpham);
  }
  public function add_cart_ajax(Request $request){
    // Session::forget('cart');
    $data = $request->all();
    $session_id = substr(md5(microtime()),rand(0,26),5);
    $cart = Session::get('cart');
    if($cart==true){
        $is_avaiable = 0;
        foreach($cart as $key => $val){
            if($val['product_id']==$data['cart_product_id']){
                $is_avaiable++;
            }
        }
        if($is_avaiable == 0){
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
             
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
    }else{
        $cart[] = array(
            'session_id' => $session_id,
            'product_name' => $data['cart_product_name'],
            'product_id' => $data['cart_product_id'],
            'product_image' => $data['cart_product_image'],
           
            'product_qty' => $data['cart_product_qty'],
            'product_price' => $data['cart_product_price'],
    
        );
        Session::put('cart',$cart);
    }
    
    Session::save();
  }  
  public function gio_hang(Request $request){
    $city = city::orderby('matp','ASC')->get();
    return view('shopping.giohang')->with('city',$city);
  }
  public function update_cart(Request $request){
    $data = $request->all();
    $cart = Session::get('cart');
    if($cart==true){
        foreach($data['cart_qty'] as $key => $qty){
         
            foreach($cart as $session => $val){
                if($val['session_id']==$key){
                    $cart[$session]['product_qty'] = $qty;
                }
            }
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('success','Cập nhật số lượng thành công');
    }else{
        return redirect()->back()->with('danger','Cập nhật số lượng thất bại');
    }
  }
  public function delete_all_product(){
    $cart = Session::get('cart');
    if($cart==true){
        // Session::destroy();
        Session::forget('cart');
        Session::forget('coupon');
        return redirect()->back()->with('success','Xóa hết giỏ thành công');
    }
}
  public function delete($session_id){
    $cart = Session::get('cart');
    if($cart==true){
      foreach($cart as $key => $val){
          if($val['session_id']==$session_id){
              unset($cart[$key]);
          }
      }
      Session::put('cart',$cart);
      return redirect()->back()->with('success','Xóa sản phẩm thành công');

  }else{
      return redirect()->back()->with('danger','Xóa sản phẩm thất bại');
  }
  }
  public function unset_coupon(){
		$coupon = Session::get('coupon');
        if($coupon==true){
          
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}
  public function select_delivery_home(Request $request){
    $data = $request->all();
    if($data['action']){
        $output = '';
        if($data['action']=="city"){
            $select_province = province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
            foreach($select_province as $key => $province){
                $output.='<option value="'.$province->maqh.'">'.$province->name_qh.'</option>';
            }

        }else{

            $select_wards = ward::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
            $output.='<option>---Chọn xã phường---</option>';
            foreach($select_wards as $key => $ward){
                $output.='<option value="'.$ward->xaid.'">'.$ward->name_xp.'</option>';
            }
        }
        echo $output;
    }
}
  public function getformpay()
  {
    $sanpham=\Cart::content();
    return view('shopping.pay',compact('sanpham'));
  }
  public function check_coupon(Request $request){
    $data=$request->all();
    
    $coupon=khuyenmai::where('khuyenmai_code',$data['coupon'])->first();
    
    if($coupon){
      $count_coupon=$coupon->count();
      if($count_coupon>0){
        $coupon_session=Session::get('coupon');
        if($coupon_session){
          $is_avaiable =0;
          if($is_avaiable==0){
            $cou[]=array(
              'code'=>$coupon->khuyenmai_code,
              'loai'=>$coupon->khuyenmai_loai,
              'giatri'=>$coupon->khuyenmai_gia_tri,
            );
            Session::put('coupon',$cou);
          }
        }else{
          $cou[]=array(
            'code'=>$coupon->khuyenmai_code,
            'loai'=>$coupon->khuyenmai_loai,
            'giatri'=>$coupon->khuyenmai_gia_tri,
          );
          Session::put('coupon',$cou);
        }
        Session::save();
        return redirect()->back()->with('success','Nhập mã thành công');
      }
    }else {
      return redirect()->back()->with('danger','Mã không tồn tại');
    }
  }
  public function saveGiohang(Request $request){
    dd($request->all());
  }
}
