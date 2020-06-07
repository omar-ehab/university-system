<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Course;
use App\Alert;
use App\Material;
use App\Term;
use DB;
use App\pending_courses;




class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  ours afnaaaan rewaaaaan
    public function index()
    {
        return view('dashboard.student.studentHome');
    }

    public function showProfile(int $id)
    {
              // $article= Article::findOrFail($id);
    $user=User::findOrFail($id);
     //   $student=Student::findOrFail($id);
       // dd($student);
       $student=$user->student;
      // return view('dashboard.student.profile',['user'=>$user]);
       return view('dashboard.student.profile',['student'=>$student]);

    }

    public function showCourses(int $id)
    {
        //hna bn find that user logged in

        $user=User::findOrFail($id);

        //hna find the student 
        $student=$user->student;
        //dd($student->courses->first()->pivot->cgpa);
        
        
        $course=$student->course;
        $collection=new collection();
        foreach($course as $course){
            
            if($course->pivot->isPaid){
                $collection->push($course);

            }




        }

        return view('dashboard.student.myCourses',['collection'=>$collection]);
    }

    public function registerCourses()
    {
        $student=Auth::user()->student;
        $student_courses=$student->course_student->where('passed',1);

        $student_department=$student->department;
        $department_courses=$student_department->courses;
        $collection=new collection();        
        foreach($student_courses as $student_course){
            
            $course=$student_course->course;
            $collection->push($course);
        }


      
        $neededCourses=$department_courses->diff($collection);
        
        
        return view('dashboard.student.registerCourses',compact('neededCourses'));
    }


    
    // public function addCourse(int $id)
    // {

    //     $student=Auth::user()->student;
    //     $student_courses=$student->course;
    //     //dd($student_courses);

    //     $pres=Course::find($id)->course_prerequisites;
        
    //     $flag=0;

    //  foreach($pres as $pre)
    //  {

    //      $course_pre=Course::findOrFail($pre->prerequisite_id);
    //    // dd($course_pre->id);


    //      foreach($student_courses as $student_course){
             
    //         //dd($student_course->id);

    //          if($student_course->id==$course_pre->id)
    //          {
    //              //dd($student_course->pivot->passed);

    //              if($student_course->pivot->passed==1)
    //              {
    //                  //$flag=0;
    //              break 2;
                     
    //             }
    //             else
    //             {
    //                 $flag=1 ; //moshklaaaaa bardoo
    //             break;

    //             }
            

    //          }
    //          else{
    //             $flag=1;
    //         break; //moshklaaaaa
    //         }

         
    //      }
         

    //      if($flag==1){
    //     break;

    //     }
        
    //  }

    //  if ($flag==0)
    //  {
    //     return view('dashboard.student.payment');


    //  }
    //  else
    //     {
    //     return view('dashboard.student.studentHome');

    //  }


      
    //     //return view('dashboard.student.studentHome');
    // }


    public function addCourse(int $id){
        $student=Auth::user()->student;
        $student_courses=$student->course;
        $pres=Course::find($id)->course_prerequisites;
        $collection=new collection(); 
        $flag=0;
        foreach($pres as $pre)
        {
            $course_pre=Course::findOrFail($pre->prerequisite_id);
            $collection->push($course_pre);   
        }
        $inters=$student_courses->intersect($collection);
        foreach($inters as $inter){
            $flag=0;
           if($inter->pivot->passed == 0)
           {
                $flag=1;
                break;
           }

        }

        if($flag==1){

            //moshkelaaah
            return view('dashboard.student.courseConflict');
        }
        else{
            $theCourse=Course::find($id);
            $pending_request =new pending_courses();
            $pending_request->course_id=$id;
            $pending_request->student_id=$student->id;
            $pending_request->term_id=1;//hna mfrood al term ally opened by IT member
            $pending_request->save();
            
            return view('dashboard.student.requestIsPending');
        }
        
        

    }
    
    public function showCourseMaterial(int $id)
    {

     
      $material=Course::find($id)->material;

      
        return view('dashboard.student.courseMaterial',['material'=>$material]);
    }


    public function showAlerts(int $id)
    {
        $user=User::findOrFail($id);
        $student=$user->student;
      
        $alert=$student->alert;

        return view('dashboard.student.alerts',['alert'=>$alert]);      
       
    }

    public function showAlertData(int $id)
    {
        $alert=Alert::findOrFail($id);
    
        return view('dashboard.student.alertData',['alert'=>$alert]);      
       
    }
    

    // public function showTranscript(int $id)
    // {
    //     $user=User::findOrFail($id);
    //     $student=$user->student;
    //     $courses=$student->course;
    //     $student_course=$courses->course_student;
    //     $terms=$student_course->groupBy('term_id');
    //     //tale3 mnha 2 arrays just like we wanted bs we can't handel it in the bladeeeeeeeeeee 3 collections
        
    //     dd($terms);
    //     //$courses=$student->course->groupBy('term_id');

    //     // foreach($terms as $term){
    //     // dd($term->course_id);
    //     // }
    //    //dd($terms);
    //     //return view('dashboard.student.transcript',compact(['courses','terms']));
    //     return view('dashboard.student.transcript',compact('terms'));

    // }

    public function showTranscript(int $id)
     {
        $user=User::findOrFail($id);
        $student=$user->student;
       
        $student_course=$student->course_student;

        // $data=DB::select(DB::raw("SELECT *,COUNT(course_students.term_id) FROM course_students,courses,students
        // WHERE courses.id=course_students.course_id AND students.id=course_students.student_id AND students.id=1 
        // GROUP BY course_students.term_id"))->get();
        // dd($data);

       // $data=DB::table('course_students')->where('student_id',$student->id)
       // ->select('id',DB::raw('count(*)as total'))->groupBy('term_id')->get();
        //dd($data);
       // $student_course=$courses->course_student;
    //dd($student_course);
      
        return view('dashboard.student.transcript',compact('student_course'));

     }


     public function showTermTranscript(int $id)
    {

        $user=Auth::user();
        $student=$user->student;
        //dd($student);
        // $term=Term::findOrFail($id);
        $student_term_courses=$student->course_student->where('term_id',$id);
        return view('dashboard.student.thisTermTranscript',compact('student_term_courses'));
    }

     

    public function payOnline()
    {
        return view('dashboard.student.payment');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
