@extends('layouts.app')
@section('content')
    <div class="cart-area-start">
        <div class="container">
            <!-- Shopping Cart Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($sanpham as $sanpham)

                                    <tr>
                                        <td>
                                            <img src="{{ url('resources') }}/img/products/{{ $sanpham->options->avatar }}"
                                                class="img-responsive" alt="" />
                                        </td>
                                        <td>
                                            <h6>{{ $sanpham->name }}</h6>
                                        </td>

                                        <td>
                                            <div class="cart-price">{{ number_format($sanpham->price) }} VND </div>
                                        </td>
                                        <td>
                                            <form>
                                                <input type="text" placeholder="1">
                                            </form>
                                        </td>
                                        <td>
                                            <div class="cart-subtotal">
                                                {{ number_format($sanpham->price * $sanpham->qty) }}
                                                VND </div>
                                        </td>
                                        <td><a href="#"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
           
            <div class="row">
            <div class="col-md-12 vendee-clue">
                <div class="shipping coupon hidden-sm">
                    <div class=""><h5>Discount Codes</h5></div>
                    <p>Enter your coupon code if you have one.</p>
                    <form>
                        <input type="text" class="coupon-input">
                        <button class="pull-left" type="submit">APPLY COUPON</button>
                    </form>
                </div>
                <div class="shipping coupon cart-totals">
                    <ul>
                        <li class="cartSubT">Subtotal: <span>$50.00</span></li>
                        <li class="cartSubT">Grand total: <span>$50.00</span></li>
                    </ul>
                    <a class="proceedbtn" href="#">PROCEED TO CHECK OUT</a>

                </div>
            </div>
                <!-- Shopping Totals -->
            </div>

            <!-- Shopping Cart Table -->

        </div>
    </div>
@stop
