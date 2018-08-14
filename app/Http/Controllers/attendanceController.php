<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Attendance;
use App\Student;
use Carbon\Carbon;
//@param array $data;


class attendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function view()
    {
    	$attendance=attendance::all();
        return array('attendance_list'=>$attendance);
    }
    public function selectStudent(Request $request)
    {
       $response=array();      
       $student=array();
       $student=Student::select('id','student_name','class_id','section_id')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->get();
        $response=$student;
        foreach ($student as $s) {
        $id=$s['id'];
        $s['attendance']=true;
        //dd($s->id);
        $attendance=Attendance::select('student_id','flag','date')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->distinct('date')->get();
<<<<<<< HEAD
        //dd($attendance);
    $present=Attendance::select('student_id','flag','date')->where(['flag'=>1])->where(['student_id'=>$id])->distinct('date')->get();
    //dd('$')
=======
        $present=Attendance::select('student_id','flag','date')->where(['flag'=>1])->where(['student_id'=>$id])->distinct('date')->get();
>>>>>>> bef34bab95266233d4c78668cc80eaae6cf43d04
        $total=$attendance->count();
        $s['total']=$total;

        if($total==0){
            $total=1;
            $s['attendance']=false;
        }
        $present=$present->count();
        $s['present']=$present;
        if (($present/$total)*100>=80) {
            $s['performance']="good";
        }
        elseif (($present/$total)*100>=50) {
            $s['performance']="average";
        }
        else{
            $s['performance']="Bad";
        }
  //$student = DB::table('students')->where(['class_id'=>$request->post('class_id')])-> where(['section_id'=>$request->post('section_id')])->select('id','student_name','class_id','section_id')->get();
        //return($student->attendances);
        //echo $total;
       // $student_id = DB::table('attendances')->where(['student_id'=>$id);
       // $present=DB::table('attendances')->select('student_id','student_name','flag','date')->where(['flag'=>"1"])->where(['student_id'=>$student_id])->distinct('date')->get();
        //$response['List']=array();
        //$present = Student::find();
 //$present->student;
       // return ($student->attendances);
       // $attendance->students($s->student_id->get());
        /*$present=DB::table('attendances')
        ->join('students',function($join){
            $join->on('attendances.student_id', '=', 'students.id')
                 ->select('student_id','student_name','flag','date')->where(['flag'=>1]);
           })->distinct('date')->count();
       /* $present=DB::table('attendances')->
        join('students','attendances.student_id','=','student.student_id')->select('student_id','student_name','flag','date')->where(['flag'=>"1"])->distinct('date')->get();*/
    }
        return array('response'=>$response);
    }
    public function add(Request $request)
    {       
    	$response=array();
        $response['insert']=true;
        $attendance = new attendance;
        $date = Carbon::parse(now())->format('Y.m.d');
        $time = Carbon::parse(now())->format('H:i:s');
        $class_id=$request->post('class_id');
        $section_id=$request->post('section_id');
        $roll_array=array();
        $attendance_array=array();
        $i=0;
        $size=$request->post('size');
        $toBeSort=$request->post('datas');


        while($i<$size){
             $add = new attendance;
             $add->class_id=$class_id;
             $add->section_id=$section_id;
             $add->date=$date;
             $add->time=$time;
             $reducer=substr($toBeSort, 0,1);
              /*this indicates the first input of the packet 110 (1 represents length of roll) */
            /* if the length of the first key is 1  */
            if($reducer==1){
                $add->student_id=substr($toBeSort, 1,1);
                $add->flag=substr($toBeSort, 1+1,1);
                $data_attendance=student::where('id',substr($toBeSort, 1,1))->where('class_id',$class_id)->where('section_id',$section_id)->first(['remember_token','guardian_name']);
                $report=(substr($toBeSort, 1+1,1)==1)?'present':'absent';

                $this->sendNotification($data_attendance->remember_token,$data_attendance->guardian_name,$report);

                array_push($roll_array, substr($toBeSort, 1,1));//should be added simultaneous
                array_push($attendance_array, substr($toBeSort, 1+1,1));//should be added simultaneosuly
            }
            else if($reducer>1){
                $add->student_id=substr($toBeSort, 1,$reducer);
                $add->flag=substr($toBeSort, $reducer+1,1);
                $data_attendance=student::where('id',substr($toBeSort, 1,$reducer))->where('class_id',$class_id)->where('section_id',$section_id)->first(['remember_token','guardian_name']);
                $report=(substr($toBeSort, 1+1,1)==1)?'present':'absent';

                 $this->sendNotification($data_attendance->remember_token,$data_attendance->guardian_name,$report);

                array_push($roll_array, substr($toBeSort, 1,$reducer));
                array_push($attendance_array,substr($toBeSort, $reducer+1,1));
            }
             $add->save();
             //$short=substr($toBeSort,0,3);//evaluates the value of 1st 3 digit which represents
                                                    // in format length roll flag ( 1 1 1  i.e length of roll 1  and attendance is present)
             $toBeSort=substr($toBeSort,2+$reducer);//reducing the datas by consectutive recursiveness.

             $i++;
             
        }
            $response['insert']=true;
        
        
        $response['data']=$roll_array;
        $response['attend']=$attendance_array;
        

        return $response;


    }
    public function sendNotification($token,$guardian_name,$report){

            $msg = array
                  (
                'body'  => $guardian_name.' ,Your child is '.$report,
                'title' => 'Attendance Report'
                  );
            $fields = array
                    (
                        'to'        => $token,
                        'notification'  => $msg
                    );
            
            
            $headers = array
                    (
                        'Authorization: key=AAAAORPa1bM:APA91bHgGGxd7iLjUa8GsJbqc_yNl8DAoybNCxEsjhvpYMrVVDSf7fEVbCDaPVBgvS4wZw3K8w8PdQBysB19AngsPV8dcazjY4cMaUTYJL8gMOJzaKhVxxEvA2PAfvrdXbCFgxh4ze4XxWBAcntjOiZiMvxM9eLGww',
                        'Content-Type: application/json'
                    );
                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                curl_close( $ch );
                return $result;

    }
    public function attendNum(Request $request){

            $response=array();
            $class_id=$request->post('class_id');
            $user_id=$request->post('user_id');
            $section_id=$request->post('section_id');
            //we have to check the session match 

            $data=Attendance::where('class_id',$class_id)->where('section_id',$section_id)->where('student_id',$user_id)->where('flag',1)->get();

            $total=Attendance::where('class_id',$class_id)->where('section_id',$section_id)->distinct('date')->get();
            
            $response['present']=$data->count();
            $response['total']=$total->count();


            return $response;


    }
    /* public function edit(Request $request)
    {
    	
    	$attendance = new attendance; // this model represent your database table, so you can name it according to your requirement.
    	//sdd(Input::all());
        $attendance->class_id = $request->post('class_id');
        $attendance->section_id = $request->post('section_id');
        $attendance->student_id = $request->post('student_id');
        $attendance->sub_id = $request->post('sub_id');
        $attendance->flag = $request->post('flag');
        //$attendance->flag = $request->get('flag');
        $attendance->date = $request->post('date');
        //$date=date_create($request->get('date'));
        //$format = date_format($date,"Y-m-d");
        //$attendance->date = strtotime($format);
        $attendance->time = $request->post('time');
   		//$attendance->password =$request->password;
        if($attendance->save()){
          echo "PDF_add_nameddest(pdfdoc, name, optlist)";
        }
        else{
          echo 'Unsuccess';
        } 

    }
*/
}