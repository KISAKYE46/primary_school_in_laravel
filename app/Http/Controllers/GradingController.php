<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;

class GradingController extends Controller{


    public function getGrading(Request $request){
        SessionChecker::checkSession($request);

        $exam_sets = DB::table("exam_sets")->get();
        $levels = DB::table("levels")->get();
        $grading = DB::table("grading")->join("levels","levels.level_id","=","grading.level")->get();
        return view("exams.grading")->with([
            "page_name" => "Gradings",
            "levels" => $levels,
            "grading"=>$grading
        ]);
    }

    public function editGrading(Request $request){
        SessionChecker::checkSession($request);

        $id = $request->input("id",1);

       // $grading = DB::table("exam_sets")->get();
        $levels = DB::table("levels")->get();

        $grading = DB::table("grading")
        ->join("levels","levels.level_id","=","grading.level")
        ->where(
            "grading.grading_id","=","$id"
        )->get();
        return view("exams.edit-grading")->with([
            "page_name" => "Modify Grading System",
            "levels" => $levels,
            "grading"=>$grading
        ]);
    }

    public function handleEditGrading(Request $request){
        SessionChecker::checkSession($request);
        $level = $request->input("level_id", "");
        $from_mark = $request->input("from_marks", "");
        $to_mark = $request->input("to_marks", "");
        $reward = $request->input("reward", "");
        $points = $request->input("points", "");
        $date = $request->input("date", now());
        $id = $request->input("id","0");
    
        $grading = [
            "level" => $level,
            "from_mark" => $from_mark,
            "to_mark" => $to_mark,
            "reward" => $reward,
            "points" => $points,
            "grading_create_date" => $date,
        ];

        $table = DB::table("grading");

        $table->where("grading.grading_id","=","$id")->update($grading);    
       
        $request->session()->put("success","Grading Modified Successfully");
        return redirect("edit_grading?id=$id");
    }

    
    public function handleGrading(Request $request){
        SessionChecker::checkSession($request);
        $level = $request->input("level_id", "");
        $from_mark = $request->input("from_marks", "");
        $to_mark = $request->input("to_marks", "");
        $reward = $request->input("reward", "");
        $points = $request->input("points", "");
        $date = $request->input("date", now());
    
        $grading = [
            "level" => $level,
            "from_mark" => $from_mark,
            "to_mark" => $to_mark,
            "reward" => $reward,
            "points" => $points,
            "grading_create_date" => $date,
        ];

        $table = DB::table("grading");
        $table->insert(
            $grading
        );

        $request->session()->put("success", "New Grading Created Successfully");
        return redirect(
            "grading"
        );
    }
}