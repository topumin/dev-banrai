@extends('layouts.master_sidebar')

@section('title','เพิ่มบัญชีผู้ปกครอง')

@section('content')

<!-- Parent Table Area Start Here -->
    <div class="heading text-left">
        <h3>เพิ่มบัญชีผู้ปกครอง</h3>
    </div>
    <div class="card height-auto pb-0">
        <div class="card-body pt-5">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>ข้อมูลผู้ปกครอง</h3>
                </div>
            </div>
            <form action="{{url('admin/management/parent/store')}}" method="POST" enctype="multipart/form-data" id="addUserForm" class="mb-5 mb-lg-0 new-added-form">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-12 form-group">
                            <div class="uploader" >
                            <span class='flaticon-photo'></span>
                            <img src="" alt="Profile Image" class="text-center" id="image0"/>
                            <input type="file" name="parentImage0"  id="parentImage0" data-id="0" class="filePhoto" onchange="readURL(this,this.getAttribute('data-id'))" />
                        </div>
                        <div class="text-center mt-3">
                            <span class="text-red small">ไฟล์ต้องมีขนาดไม่เกิน 2MB และเป็นสกุลไฟล์ .jpg, .png, เท่านั้น<span>
                            {{-- @if ($errors->has('title'))
                                <span class="help-block">
                                    {{$errors->first('title')}}
                                </span>
                            @endif --}}
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <select class="select2" name="prefix_parent" required>
                            <option value="">คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="text" placeholder="ชื่อ" class="form-control" name="parent_fname" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="text" placeholder="นามสกุล" name="parent_lname" class="form-control" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <select class="select2" name="parent_relation" required>
                            <option value="">ความสัมพันธ์</option>
                            <option value="1">พ่อ</option>
                            <option value="2">แม่</option>
                            <option value="3">ผู้ปกครอง</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="text" placeholder="เบอร์โทร" name="parent_phone" class="form-control" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="text" placeholder="ไลน์ไอดี"  name="parent_line_id" class="form-control">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="email" placeholder="อีเมล" class="form-control" name="parent_email">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="email" placeholder="ยืนยันอีเมล" name="parent_email_confirm" class="form-control">
                    </div>
                    <div class="col-xl-12 col-12 form-group">
                        <textarea class="textarea form-control" name="address" placeholder="ที่อยู่" rows="6" required></textarea>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="text" placeholder="ชื่อผู้ใช้" class="form-control" name="parent_username" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="password" placeholder="รหัสผ่าน" class="form-control" name="parent_password" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <input type="password" placeholder="ยืนยันรหัสผ่าน" class="form-control" name="parent_password_confirm" required>
                    </div>
                </div>
                <div class="row" id="student-profile">
                    <div class="col-lg-12 col-12 form-group mb-2">
                        <hr class="mb-5 hr-adduser">
                        <div class="heading-layout1">
                            <div class="item-title d-flex student-heading w-100">
                                <h3 class="pb-3">ข้อมูลเด็กนักเรียน</h3>
                                <h3 class="pb-3" id="numberOfStudent">#1</h3>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="uploader" onclick="$('#studentImage1').click()">
                                <span class='flaticon-photo'></span>
                                <img src="" alt="Profile Image" class="text-center" id="image1"/>
                                <input type="file" name="userprofile_picture[]" id="studentImage1" class="filePhoto" data-id="1"  onchange="readURL(this,this.getAttribute('data-id'))" />
                            </div>
                            <div class="text-center mt-3">
                                <span class="text-red small">ไฟล์ต้องมีขนาดไม่เกิน 2MB และเป็นสกุลไฟล์ .jpg, .png, เท่านั้น<span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <select class="select2" name="prefix[]" required>
                                    <option value="">คำนำหน้า</option>
                                    <option value="เด็กชาย">เด็กชาย</option>
                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <input type="text" name="first_name[]" placeholder="ชื่อ" class="form-control" required>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <input type="text" name="last_name[]" placeholder="นามสกุล" class="form-control" required>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <input type="text" name="nickname[]" placeholder="ชื่อเล่น" class="form-control" required>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <input type="text" name="tel[]" placeholder="เบอร์โทร" class="form-control">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <select class="select2" name="school[]" required>
                                    <option value="">โรงเรียน</option>
                                    <option value="1">หนองฉางวิทยา</option>
                                    <option value="2">ธรรมานุวัตร</option>
                                    <option value="3">วัดหนองขุนชาติ</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group">
                                <select class="select2" name="car[]" required>
                                    <option value="">ประจำคันรถ</option>
                                    <option value="1">คันที่ 1: สินาท</option>
                                    <option value="2">คันที่ 2: โกญจนาท</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group text-right">
                                <button type="button" name="remove" id="add" class="btn-fill-lg bg-blue-dark btn-hover-yellow w-100" style="margin-bottom: 2.3rem;"><span class="flaticon-plus"></span></span> เพิ่มบุตรหลาน</button>
                            </div>
                        </div>
                        <hr class="mb-5 hr-adduser">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 heading-layout1">
                        <div class="item-title">
                            <h3 class="pb-3">จุดรับ-ส่งนักเรียน</h3>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <input id="address" type="text" name="map_address" class="form-control search_addr" style="height: auto; min-height: 45px; padding: 1.05rem 1.5rem;" placeholder="จุดรับ-ส่ง">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <input id="lat" value="" type="number" name="lattitude" readonly type="text" placeholder="ละติจูด" class="form-control search_latitude">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <input id="lon" value="" type="number" name="longtitude" readonly type="text" placeholder="ลองติจูด" class="form-control search_longitude">
                    </div>
                    <div class="col-lg-4 col-12 form-group">
                        <select class="select2" name="district_id" required>
                            <option value="">ตำบล</option>
                            <option value="1">บ้านไร่ - ฿900 </option>
                            <option value="2">หูช้าง - ฿700 </option>
                            <option value="3">หนองหย่าง - ฿650</option>
                            <option value="4">การุ้ง - ฿650</option>
                            <option value="5">คลองโป่ง - ฿600</option>
                            <option value="6">วังหิน - ฿500</option>
                            <option value="7">เขาตะพาน - ฿350</option>
                        </select>
                    </div>
                    <div class="col-12 form-group">
                        <div type="button" class="map w-100" id="geomap" style="width:100%; height:25em;"></div>
                    </div>
                    <div class="col-12 form-group mg-t-8 text-right">
                        <input type="submit" class="btn-fill-lg bg-blue-dark btn-hover-yellow" id="addUserBtn" value="ยืนยัน">
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- Parent Table Area End Here -->

<!-- Success Modal -->
<div class="wrap-modal">
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header _success">
                </div>
                <div class="modal-body my-4 text-center">
                    <b>เพิ่มบัญชีผู้ใช้งานสำเร็จ</b>
                    <div class="modal-button text-center mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยืนยัน</button>
                        <!-- data-dismiss="modal" -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Success Modal End Here -->

<!-- Tel Modal -->
<div class="wrap-modal">
    <div class="modal fade" id="telModal" tabindex="-1" role="dialog" aria-labelledby="telModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header _success">
                </div>
                <div class="modal-body my-4 text-center">
                    <b>เบอร์โทรศัพท์นี้ถูกใช้งานแล้ว</b>
                    <div class="modal-button text-center mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยืนยัน</button>
                        <!-- data-dismiss="modal" -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tel Modal End Here -->

<!-- Email Modal -->
<div class="wrap-modal">
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header _success">
                </div>
                <div class="modal-body my-4 text-center">
                    <b>อีเมลนี้ถูกใช้งานแล้ว</b>
                    <div class="modal-button text-center mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยืนยัน</button>
                        <!-- data-dismiss="modal" -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Email Modal End Here -->

<!--Username Modal -->
<div class="wrap-modal">
    <div class="modal fade" id="usernameModal" tabindex="-1" role="dialog" aria-labelledby="usernameModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog3 modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header _success">
                </div>
                <div class="modal-body my-4 text-center">
                    <b>ชื่อผู้ใช้งานนี้ถูกใช้งานแล้ว</b>
                    <div class="modal-button text-center mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยืนยัน</button>
                        <!-- data-dismiss="modal" -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Username Modal End Here -->

<!-- Modal: System error-->
<div class="modal fade" id="systemError" tabindex="-1" role="dialog" aria-labelledby="systemError" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header _success">
            </div>
            <div class="modal-body my-4 text-center">
                <b>ระบบเกิดข้อผิดพลาด</b>
                <p>กรุณาทำรายการใหม่ภายหลัง</p>
                <div class="modal-button text-center mt-3">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ตกลง</button>
                    <!-- data-dismiss="modal" -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- System error End Here -->
@endsection

@section('script')

    {{-- form  --}}
    <script>
        $(document).ready(function(){
            $("#addUserBtn").submit(function(event){
                submitForm();
                return false;
            });
        });

        function submitForm(){
            $.ajax({
                type: "POST",
                url: "https://localhost:8000/addUserParent",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache:false,
                data: $('form#addUserForm').serialize(),
                success: function(result){
                    // เพิ่มบัญชีผู้ใช้สำเร็จ
                    if(result.status == 'success') {
                        $(".wrap-modal > #successModal").modal('show');
                    }
                    // เบอร์โทรซ้ำ
                    if (result.status == 'same_tel') {
                        $(".wrap-modal > #telModal").modal('show');
                    }
                    // อีเมลซ้ำ
                    if (result.status == 'same_email') {
                        $(".wrap-modal > #emailModal").modal('show');
                    }
                    // ชื่อบัญชีผู้ใช้ซ้ำ
                    if (result.status == 'same_username') {
                        $(".wrap-modal > #usernameModal").modal('show');
                    }
                },
                error: function(result){
                    $(".wrap-modal > #systemError").modal('show');
                }
            });
        }
    </script>

    {{-- upload image --}}
    <script>
        function readURL(e,id){
            var reader = new FileReader();
            reader.onload = function (event) {
               $('#image'+id).attr('src',event.target.result);
           }
           reader.readAsDataURL(e.files[0]);
       }

       function handleImage(e) {
           console.log(e);
           var reader = new FileReader();
           reader.onload = function (event) {
               var temp =  $('.uploader img').attr('id');
               $('.uploader img#'+temp).attr('src',event.target.result);
           }
           reader.readAsDataURL(e.target.files[0]);
       }
    </script>

    {{-- append student profile --}}
    <script>
        var i=1;
        $('#add').click(function(){
            $(document).ready(function(){
                $('.select2').select2();
            });
            i++;
            $('#student-profile').append(
                '<div class="col-lg-12 col-12 form-group mb-2" id="student-' +  i +'">' +
                    '<div class="heading-layout1">' +
                        '<div class="item-title d-flex student-heading w-100">' +
                            '<h3 class="pb-3">ข้อมูลเด็กนักเรียน</h3>' +
                            '<h3 class="pb-3" id="numberOfStudent"> #' + i + '</h3>' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<div class="uploader" onclick="$("#studentImage'+ i + '").click()">' +
                            '<span class="flaticon-photo"></span>' +
                            '<img src="" alt="Profile Image" class="text-center" id="image'+ i +'"/>' +
                            '<input type="file" name="userprofile_picture[]" id="studentImage'+ i +'"  data-id="'+i+'" class="filePhoto" onchange="readURL(this,this.getAttribute(\'data-id\'))" />' +
                        '</div>' +
                        '<div class="text-center mt-3">' +
                            '<span class="text-red small">ไฟล์ต้องมีขนาดไม่เกิน 2MB และเป็นสกุลไฟล์ .jpg, .png, เท่านั้น<span>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<select class="select2" name="prefix[]" id="student-prefix' + i + '">' +
                                '<option value="">คำนำหน้า</option>' +
                                '<option value="เด็กชาย">เด็กชาย</option>' +
                                '<option value="เด็กหญิง">เด็กหญิง</option>' +
                                '<option value="นาย">นาย</option>' +
                                '<option value="นาง">นาง</option>' +
                                '<option value="นางสาว">นางสาว</option>' +
                            '</select>' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<input type="text" name="first_name[]" placeholder="ชื่อ" class="form-control id="student-firstname' + i + '">' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<input type="text" name="last_name[]" placeholder="นามสกุล" class="form-control id="student-lastname' + i + '">' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<input type="text" name="nickname[]" placeholder="ชื่อเล่น" class="form-control id="student-nickname' + i + '">' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<input type="text" name="tel[]" placeholder="เบอร์โทร" class="form-control id="student-tel' + i + '">' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<select class="select2" name="school[]" id="student-school' + i + '">' +
                                '<option value="">โรงเรียน</option>' +
                                '<option value="1">หนองฉางวิทยา</option>' +
                                '<option value="2">ธรรมานุวัตร</option>' +
                                '<option value="3">วัดหนองขุนชาติ</option>' +
                            '</select>' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group">' +
                            '<select class="select2 name="car[]" id="student-car' + i + '">' +
                                '<option value="">ประจำคันรถ</option>' +
                                '<option value="1">คันที่ 1: สินาท</option>' +
                                '<option value="2">คันที่ 2: โกญจนาท</option>' +
                            '</select>' +
                        '</div>' +
                        '<div class="col-xl-3 col-lg-6 col-12 form-group text-right">' +
                            '<button type="button" name="remove" id="' + i + '" class="btn_remove btn-fill-lg bg-red w-100" style="margin-bottom: 2.3rem;"><span class="flaticon-minus"></span></span> ลบบุตรหลาน</button>' +
                        '</div>' +
                    '</div>' +
                    '<hr class="mb-5 hr-adduser">' +
                '</div>'
                );
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#student-'+button_id+'').remove();
        });
    </script>

    {{-- google maps (Free) --}}
    {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> --}}
    {{-- google maps (Paid) --}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBR5ep3J8E9BF3ZLanAvD_mYdSWbbrSPY"></script>
    <script>
        var geocoder;
        var map;
        var marker;

        /*
         * Google Map with marker
        */
        function initialize() {
            var initialLat = $('.search_latitude').val();
            var initialLong = $('.search_longitude').val();
            initialLat = initialLat?initialLat:15.082973757663751;
            initialLong = initialLong?initialLong:99.51978236690366;
            var latlng = new google.maps.LatLng(initialLat, initialLong);
            var options = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("geomap"), options);
            geocoder = new google.maps.Geocoder();
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: latlng,
                animation: google.maps.Animation.DROP
            });
            google.maps.event.addListener(marker, "dragend", function () {
                var point = marker.getPosition();
                map.panTo(point);
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        $('.search_addr').val(results[0].formatted_address);
                        $('.search_latitude').val(marker.getPosition().lat());
                        $('.search_longitude').val(marker.getPosition().lng());
                    }
                });
            });
        }
        $(document).ready(function () {
            //load google map
            initialize();
            /*
            * autocomplete location search
            */
            var PostCodeid = '#search_location';
            $(function () {
                $(PostCodeid).autocomplete({
                    source: function (request, response) {
                        geocoder.geocode({
                            'address': request.term
                        }, function (results, status) {
                            response($.map(results, function (item) {
                                return {
                                    label: item.formatted_address,
                                    value: item.formatted_address,
                                    lat: item.geometry.location.lat(),
                                    lon: item.geometry.location.lng()
                                };
                            }));
                        });
                    },
                    select: function (event, ui) {
                        $('.search_addr').val(ui.item.value);
                        $('.search_latitude').val(ui.item.lat);
                        $('.search_longitude').val(ui.item.lon);
                        var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                        marker.setPosition(latlng);
                        initialize();
                    }
                });
            });
            /*
            * Point location on google map
            */
            $('.get_map').click(function (e) {
                var address = $(PostCodeid).val();
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        $('.search_addr').val(results[0].formatted_address);
                        $('.search_latitude').val(marker.getPosition().lat());
                        $('.search_longitude').val(marker.getPosition().lng());
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
                e.preventDefault();
            });
            //Add listener to marker for reverse geocoding
            google.maps.event.addListener(marker, 'drag', function () {
                geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('.search_addr').val(results[0].formatted_address);
                            $('.search_latitude').val(marker.getPosition().lat());
                            $('.search_longitude').val(marker.getPosition().lng());
                        }
                    }
                });
            });
        });
    </script>

@endsection
