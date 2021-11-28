
@extends('admin.master')
@section('content_star')
<div class="row">
<div class="col-xl-4 col-lg-12" id="form_themsanpham">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{URL::to('/admin/danhmucnhasanxuat/postThem')}}"  method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Tên Nhà Sản Xuất</label>
                                <input type="text" class="form-control" placeholder="Tên Nhà Sản Xuất" name="tennhasanxuat">
                                <div style="color: red;">
                                    {!! $errors->first('tennhasanxuat') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Chi Tiết</label>
                                <textarea class="form-control" name="chitiet" rows="5" placeholder="Chi Tiết"></textarea>
                                <div style="color: red;">
                                    {!! $errors->first('chitiet') !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_add_product">Thêm</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop