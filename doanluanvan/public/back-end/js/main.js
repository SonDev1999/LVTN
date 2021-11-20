/* $(document).ready(function(){
    // btn_addProduct start
        $('#btn_AddProduct').click(function(){
                
            // $('#form_themsanpham').animate({marginleft:0,});
            $('#form_themsanpham').css({'display':'block'});
        });
        $('#btn_thoat_addsanpham').click(function(){
                
            // $('#form_themsanpham').animate({marginleft:0,});
            $('#form_themsanpham').css({'display':'none'});
        });
        $('#form_addproduct').validate({
            rules:{
                tensanpham: {
                    required:true,
                },
                soluong:{
                    required:true,
                    digits:true,
                },
                gia:{
                    required:true,
                    digits:true,
                },
                hinhanh:{required:true,},
                mota:{required:true,},
            },
            messages:{
                tensanpham:{required: 'bạn chưa nhập tên sản phẩm',},
                soluong:{required: 'bạn chưa nhập số lượng',digits:'số lượng phải là số nguyên dương'},
                hinhanh:{required: 'bạn chưa nhập hình ảnh',},
                gia:{required: 'bạn chưa nhập giá',digits:'giá phải là số nguyên dương'},
                mota:{required: 'bạn chưa nhập mô tả',},
            },
            
        });
        // $('#example2 tr').click(function (e) {
        //     e.preventDefault();
        //     var soHoaDon = $(this).closest('.onRow').find('td:nth-child(1)').text();
        //             var thueGTGT = $(this).closest('.onRow').find('td:nth-child(2)').text();
        //             alert(soHoaDon);
        //     //$('#result2').val($(this).closest('tr').find('td:nth-child(2)').text()); //Hoặc lấy giá trị cột thứ 2
        // });

        $(document).on('click','#btn_suaSP',function(e){
            var id = $(this).val();
            var tbl_sanpham = $('#list_tensanpham'+id).text(); 
            var tbl_noidung = $('#list_noidungmota'+id).text(); 
            var tbl_hinhanh = $('#list_hinhanh'+id).text(); 
            var tbl_gia = $('#list_gia'+id).text(); 
            var tbl_soluong = $('#list_soluong'+id).text(); 
            var tbl_hangxe = $('#list_hangxe'+id).text(); 
alert(tbl_hangxe);
            $('#form_suasanpham').css({'display':'block'}); //gọi form

            $('#form_sua_tenSP').val(tbl_sanpham);
            $('#form_sua_Gia').val(tbl_gia);
            $('#form_sua_SoLuong').val(tbl_soluong);
            $('#option_loaisp').text(tbl_hangxe);
            $('#form_sua_MoTa').val(tbl_noidung);
            $('#form_sua_hinhanh').file().val(tbl_hinhanh);
        })
        $('#form_addproduct').submit(function() {
            $('#form_suasanpham').css({'display':'block'});
            // alert="âaa";
            
            
        });
        
        
       
        
        
}) */
$("div.alert").delay(3000).slideUp();