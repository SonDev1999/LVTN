@extends('layouts.app')
@section('content')
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
    <div class="main-contact-area">
        <div class="container wrapper">
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                  @csrf
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                        <!--REVIEW ORDER-->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Giỏ hàng <div class="pull-right"></div>
                            </div>
                           
                            <div class="panel-body">
                              @foreach ($sanpham as $item)
                           
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img class="img-responsive"
                                        src="{{ url('resources') }}/img/products/{{ $item->options->avatar }}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{$item->name}}</div>
                                        <div class="col-xs-12"><small>Số lượng: <span>{{$item->qty}}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>{{number_format($item->price)}} VNĐ</h6>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <hr />
                                </div>
                                @endforeach
                                {{-- <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Subtotal</strong>
                                        <div class="pull-right"><span>$</span><span>200.00</span></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <small>Shipping</small>
                                        <div class="pull-right"><span>-</span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <hr />
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-xs-12">
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
                                                    
                                                    echo '<li class="cartSubT">Tổng tiền: <span>'. number_format($tongtien),' VNĐ</span></li>';
                                                  @endphp
                                                </p>  
                                              @endif
                                            @endforeach
                                          @endif
                      
                                        </li>
                                       
                                      </ul>
                                        <strong>Tổng tiền</strong>
                                        <div class="pull-right"><span>{{  \Cart::subtotal() }} VNĐ</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--REVIEW ORDER END-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                        <!--SHIPPING METHOD-->
                        <div class="panel panel-info">
                            <div class="panel-heading">Thông tin thanh toán</div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-md-12"><strong>Tên người nhận: </strong></div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="tem" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Số điện thoại người nhận: </strong></div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="sdt" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Địa chỉ nhận hàng: </strong></div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="diachi" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Ghi chú: </strong></div>
                                    <div class="col-md-12">
                                        <input type="text" name="ghichu" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="actions-log">
                                  <input type="submit" class="button" value="Xác nhận thông tin ">
                              </div>
                            </div>
                        </div>
                        <!--SHIPPING METHOD END-->

                    </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
        </div>
    </div>
@stop
