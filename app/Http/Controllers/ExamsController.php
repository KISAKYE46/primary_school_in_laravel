<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class ExamsController extends Controller
{


    public function getExamSets(Request $request)
    {
        SessionChecker::checkSession($request);

        $exam_sets = DB::table("exam_sets")->get();
        return view("data.exam_sets")->with([
            "page_name" => "Our Exam Sets",
            "exam_sets" => $exam_sets
        ]);
    }

    public function getMarks(Request $request){

    
        SessionChecker::checkSession($request);
        $classes = DB::table("classes")->get();
   $subjects = DB::table("subjects")->get();
   $exam_sets = DB::table("exam_sets")->get();
   $students = DB::table("students")->get();
   $classes = DB::table("classes")->get();
   $grading = DB::table("grading")->get();
   $terms = DB::table("current_term")
   ->join("terms","terms.term_id","=","current_term.term_id")
   ->orderBy("term_start_date","desc")
   ->get();

   $marks = DB::table("marks")
   ->join("students","students.student_id","=","marks.student_id")
   ->join("subjects","subjects.subject_id","=","marks.subject_id")
   ->join("current_term","current_term.current_term_id","=","marks.current_term_id")
   ->join("terms","terms.term_id","=","current_term.term_id")
   ->join("classes","students.class_id","=","classes.class_id")
   ->join("levels","classes.level_id","=","levels.level_id")
   ->join("exam_sets","exam_sets.exam_set_id","=","marks.exam_set_id")
   ->get([
       "marks.student_id",
       "marks.exam_set_id",
       "students.class_id",
       "current_term.current_term_id",
       "term_name",
       "student_full_name",
       "mark_value",
       "class_name",
       "term_name",
       "subject_name",
       "subjects.subject_id",
   ]);

    return view("data.marks2")->with([
            "page_name" => "Marks",
            "marks" => $marks,
            "exam_sets" => $exam_sets,
            "classes" => $classes,
            "students"=>$students,
            "current_terms"=>$terms,
            "subjects"=>$subjects,
            "current_terms"=>$terms,
            "grading"=>$grading,
            "pointsFunction"=>function (float $marks,$grading){
               $mark_grade = "";
               foreach($grading as $grade){
                   if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
                       $mark_grade = $grade->points;
                   }
               }
               return $mark_grade;
           },
            "gradingFunction"=> function (float $marks,$grading):string{
                $mark_grade = "";
                foreach($grading as $grade){
                    if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
                        $mark_grade = $grade->reward;
                    }
                }
                return $mark_grade;
            }
        ]);
    }




    public function getReport(Request $request){

    
        SessionChecker::checkSession($request);
        $classes = DB::table("classes")->get();
   $subjects = DB::table("subjects")->get();
   $exam_sets = DB::table("exam_sets")->get();
   $students = DB::table("students")->get();
   $classes = DB::table("classes")->get();
   $grading = DB::table("grading")->get();
   $terms = DB::table("current_term")
   ->join("terms","terms.term_id","=","current_term.term_id")
   ->orderBy("term_start_date","desc")
   ->get();

   $marks = DB::table("marks")
   ->join("students","students.student_id","=","marks.student_id")
   ->join("subjects","subjects.subject_id","=","marks.subject_id")
   ->join("current_term","current_term.current_term_id","=","marks.current_term_id")
   ->join("terms","terms.term_id","=","current_term.term_id")
   ->join("classes","students.class_id","=","classes.class_id")
   ->join("levels","classes.level_id","=","levels.level_id")
   ->join("exam_sets","exam_sets.exam_set_id","=","marks.exam_set_id")
   ->get([
       "marks.student_id",
       "marks.exam_set_id",
       "students.class_id",
       "current_term.current_term_id",
       "term_name",
       "student_full_name",
       "mark_value",
       "class_name",
       "term_name",
       "subject_name",
       "subjects.subject_id",
   ]);

    return view("data.marks2")->with([
            "page_name" => "Marks",
            "marks" => $marks,
            "exam_sets" => $exam_sets,
            "classes" => $classes,
            "students"=>$students,
            "current_terms"=>$terms,
            "subjects"=>$subjects,
            "current_terms"=>$terms,
            "grading"=>$grading,
            "pointsFunction"=>function (float $marks,$grading){
               $mark_grade = "";
               foreach($grading as $grade){
                   if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
                       $mark_grade = $grade->points;
                   }
               }
               return $mark_grade;
           },
            "gradingFunction"=> function (float $marks,$grading):string{
                $mark_grade = "";
                foreach($grading as $grade){
                    if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
                        $mark_grade = $grade->reward;
                    }
                }
                return $mark_grade;
            }
        ]);
    }



    public function handleMarks(Request $request){
        SessionChecker::checkSession($request);

        $student = $request->input("student_id", "");
        $exam_set = $request->input("exam_set_id", "");
        $subject = $request->input("subject_id", "");
        $value = $request->input("mark_value", "");
        $term = $request->input("term_id", "");
        $date = $request->input("exam_date", now());
    

        $mark = [
            "current_term_id" => $term,
            "student_id" => $student,
            "exam_set_id" => $exam_set,
            "mark_value" => $value,
            "subject_id" => $subject,
            "exam_date" => $date,
        ];


        $table = DB::table("marks");

        $chkstdt = $table->where([
            ["student_id", "=",$student],
            ["subject_id","=", $subject],
            ["current_term_id","=", $term],
            ["exam_set_id","=", $exam_set]
        ]
        )->get();

        if(count($chkstdt)>0){
            $request->session()->put("info", "Marks Already Exist, consider Deleting or Updating.");
            return redirect(
            "marks"
        );

        }

        $table->insert(
            $mark
        );

        $request->session()->put("success", "Marks Added Successfully");
        return redirect(
            "marks"
        );
    }

    public function handleExamSets(Request $request){
        SessionChecker::checkSession($request);

        $name= $request->input("name", "");
        $desc= $request->input("desc", "");

        $exam_set = [
            "exam_set_name" => $name,
            "exam_set_desc" => $desc,
        ];

        $table = DB::table("exam_sets");

        $table->insert(
            $exam_set
        );

        $request->session()->put("success", "Exam set Added Successfully");
        return redirect(
            "exam_sets"
        );
    }
}
