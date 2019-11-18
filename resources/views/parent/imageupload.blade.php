@extends('layouts.master_menu_bottom')

@section('title','แจ้งชำระเงิน')

@section('content')

<!-- Payment Form Area Start Here -->
<div class="heading mt-5 pt-5 mt-md-0 pt-md-0 text-left d-none d-md-block">
        <h3>แจ้งชำระเงิน</h3>
    </div>
    <div class="card height-auto pb-0 pt-5 mt-5 pt-md-0 mt-md-0">
        <div class="card-body">

    {{-- <h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3> --}}

    <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"
    class="dropzone" id="dropzone">
    @csrf
    </form>


    <form class="new-added-form pt-5 pt-md-4" id="paymentConfirm">
        @csrf
        <div class="row">
             <div class="col-xl-3 col-lg-6 col-12 form-group">
                <select class="select2" required autocomplete="off" id="tran_key">
                    <option value="">หมายเลขรายการ</option>
                    <option value="1">987</option>
                    <option value="2">986</option>
                    <option value="3">885</option>
                    <option value="4">ทั้งหมด</option>
                </select>
            </div>
            {{-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                <input type="text" placeholder="หมายเลขรายการ" class="form-control" required autocomplete="off">
            </div> --}}
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <input type="text" placeholder="เวลา" class="form-control" id="timepicker" required autocomplete="off">
                <i class="far fa-clock"></i>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <input type="text" id="date" placeholder="วว/ดด/ปปปป" class="form-control air-datepicker calendar" data-position="bottom right" required autocomplete="off">
                <i class="far fa-calendar-alt"></i>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group">
                <select class="select2" required autocomplete="off" id="bank">
                    <option value="">กรุณาเลือกบัญชีที่ท่านชำระเงิน</option>
                    <option value="1">บัญชีกสิกรไทย 002-2-85496-8</option>
                    <option value="2">บัญชีไทยพาณีชย์ 002-2-85496-8</option>
                    <option value="3">บัญชีกกรุงไทย 002-2-85496-8</option>
                    <option value="4">บัญชีกกรุงศรี 002-2-85496-8</option>
                </select>
            </div>


            {{-- <div class="col-12 form-group mb-0">
                <label for="">ใบเสร็จชำระเงิน <span class="small text-red">(อัพโหลดได้เพียง 1 ไฟล์)</span></label>
                <div class="dropzone text-center" id="bill_image">
                </div>
                <div class="text-center text-lg-left mt-3">
                    <span class="text-red small">ไฟล์ต้องมีขนาดไม่เกิน 4MB และเป็นสกุลไฟล์ .jpg, .png, เท่านั้น<span>
                </div>
            </div> --}}
            <div class="col-12 form-group mt-5">
                <input type="text" id="price" placeholder="จำนวนเงิน" class="form-control" required autocomplete="off">
                <i style="top: 10px; font-style: normal;">฿</i>
            </div>
            {{-- <div class="col-12 form-group mt-5">
                <textarea class="textarea form-control" name="message" id="content" cols="10" rows="10" placeholder="หมายเหตุ (ถ้ามี)" autocomplete="off"></textarea>
            </div> --}}
            <div class="col-12 form-group mg-t-8 text-center text-md-right">
                <button type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow " id="btn-submit" data-toggle="modal">ยืนยัน</button>
            </div>
        </div>
    </form>



</div>
</div>
<!-- Payment Form Area End Here -->

<!-- Modal: Success -->
<div class="wrap-modal">
    <div class="modal fade" id="successConfirm" tabindex="-1" role="dialog" aria-labelledby="successConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog2 modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header _success">
            </div>
            <div class="modal-body my-4 text-center">
                <b>แจ้งชำระเงินสำเร็จ</b>
                <p>กรุณาตรวจสอบสถานะการชำระเงินของท่านภายใน 24 ชั่วโมง หลังการแจ้งชำระเงิน</p>
                <div class="modal-button text-center mt-3" >
                    <a href="{{url('parent/index')}}"><button type="button" class="btn btn-primary">ตกลง</button></a>
                    <!-- data-dismiss="modal" -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Failed -->
<div class="wrap-modal">
    <div class="modal fade" id="failConfirm" tabindex="-1" role="dialog" aria-labelledby="failConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog2 modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header _error">
            </div>
            <div class="modal-body my-4 text-center">
                <b>แจ้งชำระเงินไม่สำเร็จ</b>
                <p>กรุณากรอกข้อมูลให้ครบถ้วน</p>
                <div class="modal-button text-center mt-3" >
                    <a href=""><button type="button" class="btn btn-primary">ตกลง</button></a>
                    <!-- data-dismiss="modal" -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Server Error -->
<div class="wrap-modal">
    <div class="modal fade" id="errorConfirm" tabindex="-1" role="dialog" aria-labelledby="errorConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog2 modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header _error">
            </div>
            <div class="modal-body my-4 text-center">
                <b>ระบบเกิดข้อผิดพลาด</b>
                <p>ขณะนี้เซิร์ฟเวอร์มีปัญหา กรุณาแจ้งเรื่องใหม่ภายหลัง</p>
                <div class="modal-button text-center mt-3" >
                    <a href=""><button type="button" class="btn btn-primary">ตกลง</button></a>
                    <!-- data-dismiss="modal" -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')


<script type="text/javascript">
      Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file)
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function(file, response)
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
<script>

        function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                            }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                        return "";
            }

            $(document).ready(function(){

                $("#paymentConfirm").submit(function(event){
                    $('#btn-submit').prop('disabled',true);
                    $('#btn-submit').css('cursor','not-allowed');
                    submitForm();
                    return false;
                });

                $('button.btn-primary').click(function(){
                    $('#btn-submit').prop('disabled',false);
                    $('#btn-submit').css('cursor','pointer');
                });
            });


            function submitForm(){
                // e.preventDefault();
                // var bill_image = $('.dz-image img').attr("src");
                // var bill_image = $('.dz-image img').attr("src");
                // var bill_image = document.getElementByClassName('#bill_image').attr("src");
                // console.log(bill_image);
                var tran_key = $('#tran_key').val();
                // var user_id =  getCookie('user_id');
                var timepicker = $('#timepicker').val();
                var date = $('#date').val();
                var content = $('#content').val();
                var bank_id = $('#bank').val();

                var formData = {
                    // 'bill_image' : bill_image,
                    'tran_key' : tran_key,
                    // 'user_id' : user_id,
                    'timepicker' : timepicker,
                    'date' : date,
                    'content' : content,
                    'bank_id' : bank_id,
                }

                console.log(formData);
                alert(formData['tran_key']);



                $.post("/bill",formData,function(data){
                    console.log(data);  // ทดสอบแสดงค่า  ดูผ่านหน้า console
                    $(".wrap-modal > #successConfirm").modal('show');
                    $(location).attr('href', '/image/upload');
                    /*การใช้งาน console log เพื่อ debug javascript ใน chrome firefox และ ie
                    http://www.ninenik.com/content.php?arti_id=692 via @ninenik
        */      });

                // $.ajax({
                //     type: "POST",
                //     url: "/bill",
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     // cache:false,
                //     data: {
                //         // bill_image: bill_image,
                //         tran_key: tran_key,
                //         // user_id: user_id,
                //         timepicker: timepicker,
                //         date: date,
                //         content: content,
                //     },
                //     success: function(result){

                //         // ส่งฟอร์มสำเร็จ
                //         if (result.status == 'success') {
                //             $(".wrap-modal > #successConfirm").modal('show');
                //             $(location).attr('href', '/parent/payment/confirm');
                //         }

                //         // ส่งไม่สำเร็จ (กรอกไม่ครบหรือกรอกผิด)
                //         if (result.status == 'error') {
                //             $(".wrap-modal > #failConfirm").modal('show');
                //         }

                //     },
                //     error: function(){
                //         // alert(bill_image)
                //         console.log(formData);
                //         // console.log(timepicker);
                //         // console.log(date);
                //         // console.log(bill_image);
                //         // เซิร์ฟเวอร์มีปัญหา
                //         $(".wrap-modal > #errorConfirm").modal('show');
                //     }
                // });
            }

        </script>

        @endsection