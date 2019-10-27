@extends('layouts.master_sidebar')

@section('title','แจ้งชำระเงิน')

@section('content')


<!-- Payment Table Area Start Here -->
<div class="heading text-left">
    <h3>แจ้งชำระเงิน</h3>
</div>


<div class="row gutters-20">
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-red">
                        <i class="flaticon-cancel-event-interface-symbol-of-a-calendar-with-a-cross-button text-red"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">ค้างชำระ</div>
                        <div class="item-number"><span class="counter" id="up" data-num="7">7</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-yellow">
                        <i class="flaticon-calendar-1 text-orange"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">รอการยืนยัน</div>
                        <div class="item-number"><span class="counter" id="down" data-num="10">10</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-green">
                        <i class="flaticon-calendar text-green"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">ชำระแล้ว</div>
                        <div class="item-number"><span class="counter" id="self" data-num="40">40</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card height-auto pb-0">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>ประจำคันรถที่ 1</h3>
            </div>
            {{-- <div class="dropdown-refresh">
                    <a href="#" role="button" data-toggle="dropdown" aria-expanded="false" value = "Refresh" onclick="history.go(0)"> <i class="fas fa-redo-alt"></i></a>
                </div> --}}
        </div>
        <form class="mg-b-20 new-added-form">
            <div class="row gutters-8">
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <input type="text" placeholder="ค้นหาด้วยหัวข้อ" class="form-control">
                </div>
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <select class="form-control select2" required autocomplete="off">
                        <option value="">ค้นหาด้วยระดับความสำคัญ</option>
                        <option value="1">เล็กน้อย</option>
                        <option value="2">ปานกลาง</option>
                        <option value="3">เร่งด่วน</option>
                    </select>
                </div>
                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <select class="form-control select2" required autocomplete="off">
                        <option value="">ค้นหาด้วยประเภท</option>
                        <option value="1">บริการทวั่ไป</option>
                        <option value="2">พฤติกรรมคนจับ</option>
                        <option value="3">ระบบการชำระเงิน</option>
                        <option value="4">ระบบการแจ้งเดินทางเอง</option>
                        <option value="5">ระบบติดตามรถบัส</option>
                        <option value="6">แดชบอร์ด</option>
                        <option value="7">แก้ไขโปรไฟล์</option>
                    </select>
                </div>
                <div class="col-2-xxxl col-xl-2 col-lg-2 col-12 form-group">
                    <input type="text" placeholder="ค้นหาด้วยวันที่" class="form-control air-datepicker">
                    <i class="far fa-calendar-alt"></i>
                </div>
                <div class="col-1-xxxl col-xl-1 col-lg-1 col-12 form-group">
                    <button type="submit" class="fw-btn-fill btn-gradient-yellow">ค้นหา</button>
                </div>
            </div>
        </form>
        <div class="table-responsive student-profile-table">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr class="bg-special-orange">
                        <th>ลำดับ</th>
                        <th>หัวข้อ</th>
                        <th>ประเภท</th>
                        <th>เวลาที่แจ้ง</th>
                        <th>ระดับความสำคัญ</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="text-left">แจ้งพฤติกรรมคนขับรถคันที่ 2 แย่มากเลยค่ะ</td>
                        <td>พฤติกรรมคนขับรถ</td>
                        <td>26/10/2562 17:02:23</td>
                        <td class="badge badge-pill badge-green d-block mg-t-8">เล็กน้อย</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="text-left">ระบบจ่ายเงินไม่เสถียร</td>
                        <td>ระบบการเงิน</td>
                        <td>26/10/2562 16:52:23</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="text-left">อยากให้ดูแลเด็กให้ทั่วถึงด้วยค่ะ</td>
                        <td>บริการทั่วไป</td>
                        <td>26/10/2562 16:50:12</td>
                        <td class="badge badge-pill badge-green d-block mg-t-8">เล็กน้อย</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="text-left">ฝากถึงเจ้าของรถ เรื่องพัดลมบนรถด้วยครับ</td>
                        <td>บริการทั่วไป</td>
                        <td>25/10/2562 09:43:51</td>
                        <td class="badge badge-pill badge-green d-block mg-t-8">เล็กน้อย</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="text-left">อยากให้คนขับรถขับรถช้าลงกว่านี้</td>
                        <td>พฤติกรรมคนขับรถ</td>
                        <td>25/10/2562 07:43:51</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td class="text-left">GPS ไม่ค่อยเสถียรเลยครับ</td>
                        <td>ระบบติดตามรถบัส</td>
                        <td>24/10/2562 16:42:11</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td class="text-left">ลูกชอบบ่นว่าถึงโรงเรียนสาย</td>
                        <td>บริการทั่วไป</td>
                        <td>24/10/2562 11:24:33</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td class="text-left">อยากให้คนขับพูดจาดีๆกับเด็กๆ </td>
                        <td>พฤติกรรมคนขับรถ</td>
                        <td>24/10/2562 09:40:43</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td class="text-left">แจ้งพฤติกรรมคนขับรถคันที่ 2 แย่มากเลยค่ะ</td>
                        <td>พฤติกรรมคนขับรถ</td>
                        <td>26/10/2562 17:02:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td class="text-left">ระบบจ่ายเงินไม่เสถียร</td>
                        <td>ระบบการเงิน</td>
                        <td>26/10/2562 16:52:23</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td class="text-left">อยากให้ดูแลเด็กให้ทั่วถึงด้วยค่ะ</td>
                        <td>บริการทั่วไป</td>
                        <td>26/10/2562 16:50:12</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td class="text-left">ฝากถึงเจ้าของรถ เรื่องพัดลมบนรถด้วยครับ</td>
                        <td>บริการทั่วไป</td>
                        <td>25/10/2562 09:43:51</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td class="text-left">อยากให้คนขับรถขับรถช้าลงกว่านี้</td>
                        <td>พฤติกรรมคนขับรถ</td>
                        <td>25/10/2562 07:43:51</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td class="text-left">GPS ไม่ค่อยเสถียรเลยครับ</td>
                        <td>ระบบติดตามรถบัส</td>
                        <td>24/10/2562 16:42:11</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td class="text-left">ลูกชอบบ่นว่าถึงโรงเรียนสาย</td>
                        <td>บริการทั่วไป</td>
                        <td>24/10/2562 11:24:33</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td class="text-left">อยากให้คนขับพูดจาดีๆกับเด็กๆ </td>
                        <td>พฤติกรรมคนขับรถ</td>
                        <td>24/10/2562 09:40:43</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-red d-block mg-t-8">เร่งด่วน</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-green d-block mg-t-8">เล็กน้อย</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>25</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-orange d-block mg-t-8">ปานกลาง</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td class="text-left">โปรไฟล์ผมผิดคะ รบกวนด้วย </td>
                        <td>แก้ไขโปรไฟล์</td>
                        <td>23/10/2562 06:54:23</td>
                        <td class="badge badge-pill badge-green d-block mg-t-8">เล็กน้อย</td>
                        <td><a href="#" data-toggle="modal" data-target="#reportModal"><span class="flaticon-invoice"></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Payment Table Area End Here -->

<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog1 modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-light">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 modal_body_content px-4">
                    <table class="detail">
                        <tbody>
                            <tr>
                                <td style="width: 30%;">หัวข้อ:</td>
                                <td>คนขับรถโกญจนาท ขับรถเร็วครับ</td>
                            </tr>
                            <tr>
                                <td>ประเภท:</td>
                                <td>พฤติกรรมคนขับ</td>
                            </tr>
                            <tr>
                                <td>เวลาแจ้ง:</td>
                                <td>24/10/2562 06:54:23</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="my-4">
                        รายละเอียด: <br>
                        รถรับส่งนักเรียน (โกญจนาท เกษศิลป์) ขับเร็ว
                        มากครับ วันก่อนผมเจอเส้นโรงเรียนบ้านไร่วิทยา
                        ยังไงรบกวนช่วยอบรมคนขับด้วยนะครับ เป็นห่วง
                        บุตรหลานจริง ๆ
                    </p>
                    <p class="text-right mb-2">
                        นาย สมัคร ลิลิตสัจจะ <br>
                        087-234-2721
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Report Modal End Here -->

@endsection