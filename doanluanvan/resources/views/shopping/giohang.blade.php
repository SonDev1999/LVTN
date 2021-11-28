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
                        <form action="{{ url('/update-cart') }}" method="POST">
                            @csrf
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
                                    @if (Session::get('cart') == true)
                                        @php
                                            $i = 1;
                                            $total = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $key => $item)
                                            @php
                                                $subtotal = $item['product_price'] * $item['product_qty'];
                                                $total += $subtotal;
                                            @endphp
                                            <tr>
                                                <td>#{{ $i }}</td>
                                                <td>
                                                    <a href="#"><img
                                                            src="{{ url('resources') }}/img/products/{{ $item['product_image'] }}"
                                                            class="img-responsive" alt="" /></a>
                                                </td>
                                                <td>
                                                    <h6>{{ $item['product_name'] }}</h6>
                                                </td>
                                                <td>
                                                    <div class="cart-price">
                                                        {{ number_format($item['product_price'], 0, ',', '.') }} VNĐ</div>
                                                </td>
                                                <td>

                                                    <input class="cart_quantity" type="number" min="1"
                                                        name="cart_qty[{{ $item['session_id'] }}]"
                                                        value="{{ $item['product_qty'] }}">

                                                </td>
                                                <td>
                                                    <div class="cart-subtotal">
                                                        {{ number_format($subtotal, 0, ',', '.') }}
                                                        VNĐ</div>
                                                </td>
                                                <td><a href="{{ route('delete.sp', $item['session_id']) }}"><i
                                                            class="fa fa-times"></i></a></td>
                                            </tr>

                                            <?php $i++; ?>
                                        @endforeach
                                        <tr>
                                            <td class="actions-crt" colspan="7">
                                                <div class="">
                                                    <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a
                                                            class="cbtn"> <input name="update_qty" type="submit"
                                                                value="CẬP NHẬT" style="    background: #3f3f3f;
                                                  height: 17px;
                                                  color: #fff !important;
                                                  font-size: 12px;"> </a></div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="{{ route('delete.all') }}">Xóa tất cả</a></div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 align-right"> <a class="cbtn" href="{{route('unset.coupon')}}">XOÁ MÃ GIẢM GIÁ</a></div>
                                                </div>
                                            </td>
                                            </td>
                                        </tr>

                                </tbody>
                            </table>
                        </form>
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
                          <div class="shippingTitle"><p><span>* </span>Tỉnh/Thành phố</p></div>
                          <div class="selectOption">
                            <div class="selectParent">
                              <select name="city" id="city" class="choose city">
                                <option value="">--Chọn tỉnh thành phố--</option>
                                  @foreach ($city as $key => $ci)
                                    <option value="{{ $ci->matp }}">{{ $ci->name_tp }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                            <div class="shippingTitle">
                              <div class="shippingTitle"><p><span>* </span>Quận/Huyện</p></div>
                            </div>
                            <div class="selectOption">
                                <div class="selectParent">
                                  <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                    <option value="">--Chọn quận huyện--</option>
                                </select>
                                </div>
                            </div>
                            <div class="shippingTitle">
                              <div class="shippingTitle"><p><span>* </span>Xã/Phường/Thị trấn</p></div>
                            </div>
                            <div class="selectOption">
                                <div class="selectParent">
                                  <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">--Chọn xã phường--</option>
                                </select>  
                                </div>
                            </div>
                            <button type="submit" name="calculate_order"
                            class="btn btn-primary btn-sm calculate_delivery">Tra cứu</button>
                        </form>
                    </div>
                    <!-- Shopping Estimate -->
                    <!-- Shopping Code -->
                    <div class="shipping coupon hidden-sm">
                        <div class="">
                            <h5>MÃ GIẢM GIÁ</h5>
                        </div>
                        <p>Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
                        <form method="POST" action="{{ url('/check-coupon') }}">
                            @csrf
                            <input type="text" class="coupon-input" name="coupon">
                            <button class="pull-left" type="submit" name="check_coupon">Áp dụng</button>
                        </form>
                    </div>
                    <!-- Shopping Code -->
                    <!-- Shopping Totals -->

                    <div class="shipping coupon cart-totals">
                        <ul>
                            @if (Session::get('coupon'))
                                <li class="cartSubT">Tổng tiền hàng: <span>
                                        {{ number_format($total, 0, ',', '.') }}
                                        VNĐ</span>
                                </li>
                                <li class="cartSubT">
                                    @foreach (Session::get('coupon') as $key => $cou)
                                        @if ($cou['loai'] == 1)
                                <li class="cartSubT">Mã giảm
                                    giá:<span>{{ number_format($cou['giatri'], 0, ',', '.') }}
                                        VNĐ</span></li>
                                <p>
                                    @php
                                        $total_coupon = $total - $cou['giatri'];
                                    @endphp
                                </p>
                                          @elseif ($cou['loai']==2)
                                <p>
                                    @php
                                        $total_sale = ($total * $cou['giatri']) / 100;
                                        $total_coupon = $total - $total_sale;
                                    @endphp
                                </p>
                                <li class="cartSubT">Mã giảm
                                    giá:<span>{{ number_format($total_sale, 0, ',', '.') }} VNĐ</span></li>
                                         @endif
                                             @endforeach
                           
                            <li class="cartSubT">Thành tiền: <span>{{ number_format($total_coupon, 0, ',', '.') }}
                                    VNĐ</span></li>
                            @else
                            <li class="cartSubT">Thành tiền: <span> {{ number_format($total, 0, ',', '.') }}
                                    VNĐ</span>
                            </li>
                            @endif
                        </ul>
                        <a class="proceedbtn" href="">THANH TOÁN</a>
                    </div>
                    <!-- Shopping Totals -->
                </div>
            </div>
        @else
            <div class="cart-area-start">
                <div class="container">
                    <!-- Shopping Cart Table -->

                    <div class="container-fluid mt-100">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body cart">
                                        <div class="col-sm-12 empty-cart-cls text-center"> <img
                                                src="https://salt.tikicdn.com/desktop/img/mascot@2x.png" width="130"
                                                height="130" class="img-fluid mb-4 mr-3">
                                            <p style="margin: 15px 0px 30px;" class="empty__note">Không có sản phẩm nào
                                                trong giỏ hàng của bạn.</p>
                                            <a href="{{ route('home') }}" class="btn btn-primary cart-btn-transform m-3"
                                                data-abc="true">Tiếp tục mua sắm</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif
            <!-- Shopping Coupon -->
        </div>
    </div>


@stop
