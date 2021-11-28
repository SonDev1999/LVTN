<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\RequestResetPassword;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail;
class ForgotPasswordController extends Controller
{
  public function getformresetpassword(){
    return view('auth.passwords.email');
  }
  public function sendcoderesetpassword(Request $request){
    $email = $request->email;
    $checkUser = User::where('email',$email)->first();
    if(!$checkUser){
      return redirect()->back()->with('success','Email không tồn tại');
    }
    $code = bcrypt(md5(time().$email));
    $checkUser->code=$code;
    $checkUser->time_code=Carbon::now();
    $checkUser->save();
    $url=route('get.send.email',['code'=>$checkUser->code,'email'=>$email]);
    $data=[
      'route'=>$url
    ];
        Mail::send('email.reset_password', $data, function($message) use($checkUser){
	        $message->to($checkUser->email, 'Visitor')->subject('Lấy lại mật khẩu!');
	    });

    return redirect()->back()->with('success','Link lấy lại mật khẩu đã gửi vào email');
  }
  public function resetpassword(Request $request){
    $code = $request->code;
    $email=$request->email;
    $checkUser = User::where([
      'code'=>$code,
      'email'=>$email
    ])->first();
    if(!$checkUser){
      return redirect('/')->back()->with('success','Không tồn tại đường dẫn !!!');
    }

      return view('auth.passwords.reset');
    }
    public function saveresetpassword(RequestResetPassword $requestResetPassword){
      if($requestResetPassword->password){
        $code = $requestResetPassword->code;
        $email=$requestResetPassword->email;
        $checkUser = User::where([
          'code'=>$code,
          'email'=>$email
        ])->first();
        if(!$checkUser){
          return redirect('/')->with('success','Không tồn tại đường dẫn !!!');
        }
        $checkUser->password = bcrypt($requestResetPassword->password);
        $checkUser->save();
        return redirect('/login')->with('success','Đổi mật khẩu thành công !!!');
        
      }
    }
}