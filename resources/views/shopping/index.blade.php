@extends('layouts.app')
@section('content')
@if (\Session::has('success'))
        <div class="col-md-4 col-md-offset-4" style="position: fixed; display: block">

            <div class="alert alert-success alert-dismissible" role="alert">{{ \Session::get('success') }}</div>
        </div>
        @elseif (\Session::has('danger'))
        <div class="col-md-4 col-md-offset-4" style="position: fixed; display: block">

          <div class="alert alert-danger alert-dismissible" role="alert">{{ \Session::get('danger') }}</div>
      </div>
    @endif
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container-inner">
          <ul>
            <li class="home">
              <a href="index.html">Home</a>
              <span><i class="fa fa-angle-right"></i></span>
            </li>
            <li class="category3"><span>Shopping Cart</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="cart-area-start">
  <div class="container">
    <!-- Shopping Cart Table -->
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="cart-table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phảm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1 ?>
              @foreach ($sanpham as $key=>$item)       
             
              <tr>
                <td>#{{$i}}</td>
                <td>
                  <a href="#"><img src="{{ url('resources') }}/img/products/{{ $item->options->avatar }}" class="img-responsive" alt=""/></a>
                </td>
                <td>
                  <h6>{{$item->name}}</h6>
                </td>
                <td><div class="cart-price">{{number_format($item->price)}} VNĐ</div></td>
                <td>
                  <form>
                    <input type="text" placeholder="{{$item->qty}}"> 
                  </form>
                </td> 
                <td>
                  <div class="cart-subtotal"> {{ number_format($item->price * $item->qty) }} VNĐ</div>
                </td>
                <td><a href="{{route('xoa.sp',$key)}}"><i class="fa fa-times"></i></a></td>
              </tr>
              
              @endforeach
             
              <?php $i++ ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
 
  				<!-- Shopping Coupon -->
          <div class="row">
            <div class="col-md-12 vendee-clue">
              <!-- Shopping Estimate -->
              <div class="shipping coupon">
                <h5>ƯỚC TÍNH VẬN CHUYỂN</h5>
                <p>Nhập điểm đến của bạn để nhận ước tính vận chuyển.</p>
                <form>
                  @csrf
                  <div class="shippingTitle"><p><span>*</span>Tỉnh</p></div>
                  <div class="selectOption">
                    <div class="selectParent">
                      <select name="city" id="city" >
                        <option value="">--Chọn tỉnh thành phố--</option>
                          @foreach ($city as $key => $ci)
                            <option value="{{ $ci->matp }}">{{ $ci->name_tp }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  
                  <div class="shippingTitle"><p>Quận/Huyện</p></div>
                  <div class="selectOption">
                    <div class="selectParent">
                      <select>
                        <option value="">Please Select</option>
                        <option value="1">Region 1</option>
                        <option value="2">Region 2</option>
                        <option value="1">Region 3</option>
                        <option value="2">Region 4</option>
                        <option value="1">Region 5</option>
                        <option value="2">Region 6</option>
                        <option value="1">Region 7</option>
                        <option value="2">Region 8</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit">Tra cứu</button>
                </form>
              </div>
              <!-- Shopping Estimate -->
              <!-- Shopping Code -->
              <div class="shipping coupon hidden-sm">
                <div class=""><h5>MÃ GIẢM GIÁ</h5></div>
                <p>Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
                <form method="POST" action="{{url('/check-coupon')}}">
                  @csrf
                  <input type="text" class="coupon-input" name="coupon">
                  <button class="pull-left" type="submit" name="check_coupon">Áp dụng</button>
                </form>
              </div>
              <!-- Shopping Code -->
              <!-- Shopping Totals -->
              <div class="shipping coupon cart-totals">
                <ul>
                  @php
                    $temp=str_replace(',','',\Cart::subtotal(0,2)) ;
                   
                  @endphp
                  <li class="cartSubT">Tổng tiền: <span>{{\Cart::subtotal(0,2)}} VNĐ</span></li>
                  <li class="cartSubT">
                    @if (Session::get('coupon'))
                      @foreach (Session::get('coupon') as $key =>$cou )
                      
                        @if ($cou['loai']==1)
                        <li class="cartSubT">Mã giảm giá:<span>{{number_format($cou['giatri']) }} VNĐ</span></li>
                        
                          <p>
                            @php
                              $giamgia=($cou['giatri']);
                              
                              $tongtien=($temp - $giamgia);
                              
                              
                            @endphp
                          </p>  
                        @endif
                      @endforeach
                    @endif

                  </li>
                  <li class="cartSubT">Tổng tiền: <span> {{number_format($tongtien)}} VNĐ</span></li>
                </ul>
                <a class="proceedbtn" href="{{route('get.form.pay')}}">THANH TOÁN</a>
               
              </div>
              <!-- Shopping Totals -->
            </div>
          </div>
          <!-- Shopping Coupon -->
</div>
</div>


@stop