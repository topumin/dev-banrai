<?php

namespace App\Http\Controllers;

use App\App_status;
use Illuminate\Http\Request;
use App\Appointment;
use App\Period_time;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function list($id, $token)
    {
        $cookie = $this->request->cookie('role_number');

        //Check login
        $auth = User::where('id', $this->request->cookie('use_id'))->where('secure_code', $this->request->cookie('secure'))->where('status', 1)->first();

        if ($auth) {

            if (isset($cookie)) {

                if ($this->request->cookie('role_number') == '1') {
                    $Appointments = Appointment::where('user_id', $id)->orderBy('appointments.created_at', 'desc')->orderBy('appointments.app_status_id', 'desc')->get();

                    $data['info'] = [];
                    $count = 0;

                    foreach ($Appointments as $app) {

                        $status = App_status::where('id', $app->app_status_id)->first();
                        $student = Student::where('id', $app->student_id)->first();
                        $period_time = Period_time::where('id', $app->period_time_id)->first();

                        $data['info'][$count++] = [
                            'app_status_id' => $status->id,
                            'student_id' => $student->nickname,
                            'appointment_at' => $app->appointment_at,
                            'period_time_id' => $period_time->name,
                            'created_at' => $app->created_at
                        ];
                    }

                    return view('parent.appointment', [
                        'data' => $data['info']
                    ]);
                }
                \abort(404);
            }
            return redirect('/');
        }

        return redirect('/');
    }

    public function list_stu()
    {
        $students = Student::where('user_id', $this->request->user_id)->get();

        return $this->responseRequestSuccess($students);
    }

    public function createAppointment()
    {
        //Check login
        $auth = User::where('id', $this->request->cookie('use_id'))->where('secure_code', $this->request->cookie('secure'))->where('status', 1)->first();

        if (!$auth) {
            return redirect('/');
        }

        try {

            $this->validate($this->request, [

                'user_id' => 'required',
                'student_id' => 'required',
                'period_time_id' => 'required',
                'appointment_at' => 'required',

            ], [
                'period_time_id.required' => '* กรุณาเลือกช่วงเวลาที่ต้องการนัดหมาย',
                'appointment_at.required' => '* กรุณาเลือกวันที่ที่ต้องการนัดหมาย'
            ]);


            $app = Appointment::where('student_id', $this->request->input('student_id'))->where('appointment_at', $this->request->input('appointment_at'))->where('period_time_id', $this->request->input('period_time_id'))->first();

            if ($app) {

                $this->validate($this->request, [

                    'err' => 'required',


                ], [
                    'err.required' => '* การนัดหมายซ้ำ',

                ]);
            }

            DB::beginTransaction();

            $res['App_log'] = Appointment::create([
                'user_id' => $this->request->input('user_id'),
                'student_id' => $this->request->input('student_id'),
                'app_status_id' => 1,
                'period_time_id' => $this->request->input('period_time_id'),
                'appointment_at' => $this->request->input('appointment_at'),

            ]);



            DB::commit();

            session()->flash('success', 'Create Article Complete');
            return redirect('parent/appointment/' . $this->request->get('user_id') . '/' . $this->request->get('secure_code'));

        } catch (Exception $e) {

            return response()->json($this->formatResponse($e->getMessage()));
        }
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
