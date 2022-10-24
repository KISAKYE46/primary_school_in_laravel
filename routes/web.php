<?php
<<<<<<< refs/remotes/origin/master

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
=======
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\GradingController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Expr\Cast\Double;

(function(){

   Route::get("login",function(Request $request){
      if($request->session()->has("user")){
         $request->session()->put("info","Please, You have to  logout first");
         return redirect("dashboard");
      }
      return view("auth.login");  
  });


Route::get("data",function(){
   return view("data.data_table")->with("page_name","Datasets");
});
Route::get("/",function(Request $request){
   if($request->session()->has("user")){
      return redirect("dashboard");
   }else{
      return redirect("login"); 
   } 
});

 Route::get("my",function(){
   return view("pages.examples.profile");  
});

 Route::get("register",function(){
   return view("auth.register");  
});

Route::get("visualizations_chartjs",function(){
   return view("charts.chartjs");  
});

Route::get("visualizations_flot",function(){
   return view("charts.flot");  
});

Route::get("visualizations_inline",function(){
   return view("charts.inline");  
});

Route::fallback(function(Request $request){
   if(!$request->session()->has("user")){
      return redirect("login");
   }
   return view("pages.examples.404")->with([
      "page_name"=>"Page Not Found"
   ]);
});

Route::controller(AuthController::class)->group(function(){
   Route::post("auth_login","handleLogin");
   Route::post("handle_registration","handleRegistration");
});

Route::controller(HomeController::class)->group(function(){
   Route::get("dashboard","dashboardTwo");
   // Route::get("dashboard_2","dashboardTwo");
   // Route::get("dashboard_3","dashboardThree");
});

Route::controller(StudentsController::class)->group(function(){
   Route::get("edit-student","StudentsController@showEdit");
});


Route::controller(ExamsController::class)->group(function(){
   Route::get("marks","getMarks");
   Route::get("marks/{id}","getMarks");

   Route::get("exam_sets","getExamSets");
   Route::post("marks","handleMarks");
   Route::post("exam_sets","handleExamSets");
});

Route::controller(GradingController::class)->group(function(){  
   Route::get("edit_grading","editGrading");
   Route::get("grading","getGrading");


   Route::post("grading","handleGrading");
   Route::post("edit_grading_action","handleEditGrading");
  
});

Route::get("delete/{table}/{column}/{id}",function($table,$column,$id){
   DB::delete("DELETE from $table where $column = $id ");
   Session::put("success","Artifact Deleted Successfully");
   return [
      "message"=>"success"
   ];

});


Route::controller(DataController::class)->group(function(){
   Route::get("users","getUsers");
   Route::get("teachers","getTeachers");
   Route::get("students","getStudents");
   Route::get("fees","getFees");
   Route::get("classes","getClasses");
   Route::get("levels","getLevels");
   Route::get("subject_categories","getSubjectCategories");
   Route::get("student_categories","getStudentCategories");
   Route::get("subjects","getSubjects");
   Route::get("roles","getRoles");
   Route::get("data","getDataset");
   Route::get("study_sessions","getStudySessions");
   Route::get("timetables","getTimeTables");
   Route::get("terms","getTerms");
   Route::get("events","getEvents");
   Route::get("payments","getPayments");
   Route::get("receipt/{id}","getReceipt");

   // post requests
   Route::post("students","handleStudents");
   Route::post("teachers","handleTeachers");
   Route::post("classes","handleClasses");
   Route::post("levels","handleLevels");
   Route::post("subjects","handleSubjects");
   Route::post("subject_categories","handleSubjectCategories");
   Route::post("student_categories","handleStudentCategories");
   Route::post("study_sessions","handleStudySessions");
   Route::post("timetables","handleTimeTables");
   Route::post("fees","handleFees");
   Route::post("terms","handleTerms");
   Route::post("_term","handleCurrentTerm");
   Route::post("events","handleEvents");
   Route::post("payments","handlePayments");
});

// Route::get("grading",function(){
//    return view("exams.grading")->with(
//       [
//          "page_name"=>"Grading System"
//       ]
//    );
// });
>>>>>>> local

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< refs/remotes/origin/master
=======

})();


global $grading ;
$grading = DB::table("grading")->get();
global $grade_results ;
$grade_results = [];

function getGrade(float $marks){
   $mark_grade = "";
   $grading = $GLOBALS["grading"];
   foreach($grading as $grade){
      if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
         $mark_grade = $grade->reward;
      }
   }
   return $mark_grade;
}

Route::get("test",function(){
   $settings = DB::table("school_settings")->get();
   $classes = DB::table("classes")->get();
   $subjects = DB::table("subjects")->get();
   $exam_sets = DB::table("exam_sets")->get();
   $students = DB::table("students")->join("classes","classes.class_id","=","students.class_id")->get();
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
  
   //  return view("exams.report")->with([
   //          "page_name" => "Marks",
   //          "settings"=>$settings,
   //          "marks" => $marks,
   //          "exam_sets" => $exam_sets,
   //          "classes" => $classes,
   //          "students"=>$students,
   //          "current_terms"=>$terms,
   //          "subjects"=>$subjects,
   //          "current_terms"=>$terms,
   //          "grading"=>$grading,
   //          "pointsFunction"=>function (float $marks,$grading){
   //             $mark_grade = "";
   //             foreach($grading as $grade){
   //                 if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
   //                     $mark_grade = $grade->points;
   //                 }
   //             }
   //             return $mark_grade;
   //         },
   //          "gradingFunction"=> function (float $marks,$grading):string{
   //              $mark_grade = "";
   //              foreach($grading as $grade){
   //                  if($marks>=$grade->from_mark&&$marks<=$grade->to_mark){
   //                      $mark_grade = $grade->reward;
   //                  }
   //              }
   //              return $mark_grade;
   //          }
   //      ]);

       
        $pdf = Pdf::loadView("exams.report", [
         "page_name" => "Marks",
         "settings"=>$settings,
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
   
    //$pdf->save(storage_path("new.pdf"));

    return $pdf->stream('end_of_term_report.pdf');
});
>>>>>>> local
