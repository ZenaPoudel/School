<?php

namespace App\Http\Controllers;

use App\Result;

use App\Subject;

use App\Student;
use App\Marks;
use Illuminate\Http\Request;
class ResultController extends Controller
{
     public function view()
    {
        $result=Result::all();
        return array('result_list'=>$result);
    }
    public function add(Request $request)
    {
        $response=array();
        $response['insert']=false;
        $result = new Result;
        $result->class_id = $request->post('class_id');
        $result->section_id = $request->post('section_id');
        $result->student_id=$request->post('student_id');
        $result->sub_id = $request->post('sub_id');
        $result->marks = $request->post('marks');
        $result->terminal = $request->post('terminal');
        if($result->save()){
        $response['insert']=true;
        }
        echo json_encode($response);
    }
    public function ViewByClass(Request $request)
    {
        $GrandTotal=0;
        $response=array();
        $Result=array();
        $Result1= array();
        $student= array();
        $Result=Subject::select('id')->where('class_id',$request->post('class_id'))->get();
        foreach ($Result as $R) {
            $sub=$R['id'];
            $total= Marks::where(['sub_id'=>$sub])->first(['total_marks']);
            $Total = $total->total_marks;
            $GrandTotal=$GrandTotal + $Total ;
        }
        $total_marks = $GrandTotal;
        //dd($total_marks);
      
        $Student=Student::select('id','student_name','roll_num')->where('class_id',$request->post('class_id'))->where('section_id', $request->post('section_id'))->get();
        $response=$Student;
        foreach ($Student as $std) {
        $ObtainMarks= 0;
        $id=$std['id'];
        $Result1=Result::where('student_id',$id)->where('terminal', $request->post('terminal'))->get();

        foreach ($Result1 as $R1) {
            $mark= $R1['marks'];
            $ObtainMarks= $ObtainMarks + $mark;
            //dd($ObtainMarks);
        }
        $Percentage= ($ObtainMarks/$GrandTotal)*100;
                $std['Percentage']=$Percentage;
       // dd($ObtainMarks);
    //  $response = array_prepend($response, $std);
}

      return $response;
    	     }
}