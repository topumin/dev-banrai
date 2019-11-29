<?php

namespace App\Http\Controllers;

use App\Car;
use App\District;
use Illuminate\Http\Request;
use App\Payment_inform;
use App\Payment_log;
use App\Payment_status;
use App\School;
use App\Student;
use App\User;
use LogicException;
use Validator;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index($car)
    {
        $inform = Payment_inform::get();

        $data['info'] = [];
        $count = 0;

        if ($car == 'car1') {
            $car_num = 1;
        } else {
            $car_num = 2;
        }

        $bank_1 = 0;
        $bank_2 = 0;
        $bank_3 = 0;
        $bank_4 = 0;

        $month_sub = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
        $month_now = $month_sub[date('m') - 1];
        $year_now = date('Y') + 543;


        foreach ($inform as $d) {

            if ($d->pm_status_id == '1') {

                $log = Payment_log::where('id', $d->payment_log_id)->first();
                $std = Student::where('id', $log->student_id)->first();

                if ($std->car_id == $car_num) {

                    $parent = User::where('id', $std->user_id)->first(); // เอาข้อมูลผู้ปกครองออกมาไม่เป็น
                    $school = School::where('id', $std->school_id)->first();
                    $district = District::where('id', $std->district_id)->first();



                    if ($d->bank_id == '1') {

                        $bank_1++;
                    } else if ($d->bank_id == '2') {
                        $bank_2++;
                    } else if ($d->bank_id == '3') {
                        $bank_3++;
                    } else if ($d->bank_id == '4') {
                        $bank_4++;
                    }

                    $data['info'][$count++] = [

                        'id' => $d->payment_log_id,
                        'status_bill' => $d->pm_status_id,
                        'student_id' => $std->id,
                        'tran_key' => $log->tran_key,
                        'date' => $d->date . ' ' . $d->timepicker,
                        'bank_id' => $d->bank_id,
                        'bill_image' => $d->imgInp,

                        'std_prefix' => $std->prefix,
                        'std_first_name' => $std->first_name,
                        'std_last_name' => $std->last_name,
                        'nickname' => $std->nickname,
                        'car_id' => $std->car_id,
                        'parent_prefix' => $parent->prefix,
                        'parent_first_name' => $parent->first_name,
                        'parent_last_name' => $parent->last_name,
                        'parent_phone' => $parent->phone,

                        'school' => $school->name_school,

                        'price' => $district->price,
                    ];
                }
            }
        }
        // dd($data['info']);

        return view('admin.payment_confirm', [
            'datas' => $data['info'],
            'bank_1' => $bank_1,
            'bank_2' => $bank_2,
            'bank_3' => $bank_3,
            'bank_4' => $bank_4,
            'month_now' => $month_now,
            'year_now' => $year_now
        ]);
    }

    public function addPayment()
    {

        try {

            $validate = Validator::make($this->request->all(), [
                'tran_key' => 'required',
                'timepicker' => 'required',
                'date' => 'required',
                'content' => '',
                'bank_id' => 'required',
                // 'pm_status_id' => 'required' defalut : 1
            ]);

            if ($validate->fails()) {
                throw new LogicException($validate->errors());
            }

            $student_id = Payment_log::where('tran_key', $this->request->input('tran_key'))->first();

            DB::beginTransaction();


            $payment = new Payment_inform();

            $payment->tran_key = $this->request->input('tran_key');
            $payment->student_id = $student_id['student_id'];
            $payment->timepicker = $this->request->input('timepicker');
            $payment->date = $this->request->input('date');
            $payment->content = $this->request->input('content');
            $payment->bank_id = $this->request->input('bank_id');
            $payment->pm_status_id = 1;
            $payment->save();

            DB::commit();
            return $this->responseRequestSuccess('Success!');
        } catch (Exception $e) {
            return response()->json($this->formatResponse($e->getMessage()));
        }
    }

    public function overview($id)
    {

        $students = Student::where('user_id', $id)->get();

        $data['info'] = [];
        $count = 0;

        foreach ($students as $d) {

            $bill = Payment_log::where('student_id', $d->id)->get();
            $month_sub = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];

            // dd($month_sub[11]);

            foreach ($bill as $b) {

                $district = District::where('id', $d->district_id)->first();
                $school = School::where('id', $d->school_id)->first();
                $car = Car::where('id', $d->car_id)->first();

                $data['info'][$count++] = [

                    'tran_key' => $b->tran_key,
                    'status' => $b->pm_status_id,
                    'fullname' => $d->prefix . ' ' . $d->first_name . ' ' . $d->last_name,
                    'name' => $d->nickname,
                    'school' => $school->name_school,
                    'car_id' =>  $car->name,
                    'car_name' => $car->name_driver,
                    'month' => $month_sub[($b->month) - 1],
                    'year' => $b->year,
                    'price' => $district->price,
                    'qrcode' => $b->qr_code

                ];
            }
        }


        return view('parent.payment_overview', [
            'data' => $data['info']
        ]);
    }

    public function parent_list($id)
    {

        $students = Student::where('user_id', $id)->get();

        $data['info'] = [];
        $count = 0;

        foreach ($students as $d) {

            $bill = Payment_log::where('student_id', $d->id)->get();

            foreach ($bill as $b) {

                $district = District::where('id', $d->district_id)->first();
                $school = School::where('id', $d->school_id)->first();
                $car = Car::where('id', $d->car_id)->first();

                $data['info'][$count++] = [

                    'log_id' => $b->id,
                    'tran_key' => $b->tran_key

                ];
            }
        }

        return view('parent.payment_confirm', [
            'data' => $data['info']
        ]);
    }

    public function admin_list($car)
    {

        if ($car == 'car1') {
            $car_num = 1;
        } else {
            $car_num = 2;
        }

        $bill = Payment_log::get();

        $month_sub = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];

        $month_sub_full = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

        $display_month = $month_sub_full[date('m') - 1];
        $display_year = date('Y') + 543;


        $data['info'] = [];
        $count = 0;

        $status_1 = 0; //ค้างชำระ
        $status_2 = 0; //ชำระ
        $status_3 = 0; //รอการยืนยัน

        $income = 0;


        foreach ($bill as $b) {

            $stu = Student::where('id', $b->student_id)->first();


            if ($stu->car_id == $car_num) {

                $district = District::where('id', $stu->district_id)->first();
                $school = School::where('id', $stu->school_id)->first();
                $user = User::where('id', $stu->user_id)->first();

                if ($b->pm_status_id == '1') {
                    $status_1++;
                } else if ($b->pm_status_id == '2') {
                    $status_2++;
                    $income += $district->price;
                } else if ($b->pm_status_id == '3') {
                    $status_3++;
                }

                // dd(date('m'));

                if ($b->month == date('m')) {


                    $data['info'][$count++] = [

                        'nickname' => $stu->nickname,
                        'tran_key' => $b->tran_key,
                        'status_bill' => $b->pm_status_id,
                        'school' => $school->name_school,
                        'parent_name' => $user->prefix . ' ' . $user->first_name . ' ' . $user->last_name,
                        'phone' => $user->phone,
                        'price' => $district->price,

                    ];
                }
            }
        }

        // dd($data['info']);


        return view('admin.payment_overview', [
            'data' => $data['info'],
            'no_1' => $status_1,
            'no_2' => $status_2,
            'no_3' => $status_3,
            'income' => $income,
            'display_month' => $display_month,
            'display_year' => $display_year
        ]);
    }

    public function confirm($car, $id)
    {

        $bill_log = Payment_log::where('tran_key', $id)->first();
        $bill_log->pm_status_id = 2;
        $bill_log->save();

        $bill_inform = Payment_inform::where('payment_log_id', $bill_log->id)->first();
        $bill_inform->pm_status_id = 2;
        $bill_inform->save();

        $inform = Payment_inform::get();

        $data['info'] = [];
        $count = 0;


        $bank_1 = 0;
        $bank_2 = 0;
        $bank_3 = 0;
        $bank_4 = 0;

        $month_sub = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
        $month_now = $month_sub[date('m') - 1];
        $year_now = date('Y') + 543;


        foreach ($inform as $d) {



            if ($d->pm_status_id == '1') {


                $log = Payment_log::where('id', $d->payment_log_id)->first();
                $std = Student::where('id', $log->student_id)->first();

                // dd($d);

                if ($std->car_id == $car) {

                    $parent = User::where('id', $std->user_id)->first(); // เอาข้อมูลผู้ปกครองออกมาไม่เป็น
                    $school = School::where('id', $std->school_id)->first();
                    $district = District::where('id', $std->district_id)->first();

                    // dd($parent);

                    if ($d->bank_id == '1') {

                        $bank_1++;
                    } else if ($d->bank_id == '2') {
                        $bank_2++;
                    } else if ($d->bank_id == '3') {
                        $bank_3++;
                    } else if ($d->bank_id == '4') {
                        $bank_4++;
                    }

                    $data['info'][$count++] = [

                        'id' => $d->payment_log_id,
                        'status_bill' => $d->pm_status_id,
                        'student_id' => $std->id,
                        'tran_key' => $log->tran_key,
                        'date' => $d->date . ' ' . $d->timepicker,
                        'bank_id' => $d->bank_id,
                        'bill_image' => $d->imgInp,

                        'std_prefix' => $std->prefix,
                        'std_first_name' => $std->first_name,
                        'std_last_name' => $std->last_name,
                        'nickname' => $std->nickname,
                        'car_id' => $std->car_id,
                        'parent_prefix' => $parent->prefix,
                        'parent_first_name' => $parent->first_name,
                        'parent_last_name' => $parent->last_name,
                        'parent_phone' => $parent->phone,

                        'school' => $school->name_school,

                        'price' => $district->price,
                    ];
                }
            }
        }
        // dd($data['info']);

        return view('admin.payment_confirm', [
            'datas' => $data['info'],
            'bank_1' => $bank_1,
            'bank_2' => $bank_2,
            'bank_3' => $bank_3,
            'bank_4' => $bank_4,
            'month_now' => $month_now,
            'year_now' => $year_now
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | response เมื่อข้อมูลส่งถูกต้อง
    |--------------------------------------------------------------------------
     */
    protected function responseRequestSuccess($ret)
    {
        return response()->json(['status' => 'success', 'data' => $ret], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
    /*
    |--------------------------------------------------------------------------
    | response เมื่อข้อมูลมีการผิดพลาด
    |--------------------------------------------------------------------------
     */
    protected function responseRequestError($status = '', $ret = '', $message = 'Bad request', $statusCode = 200)
    {
        return response()->json(['status' => $status, 'data' => $ret, 'error' => $message], $statusCode)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
