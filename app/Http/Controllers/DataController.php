<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function getUsers(Request $request)
    {

        SessionChecker::checkSession($request);

        $data = DB::table('users')->join("roles", "users.role_id", '=', "roles.role_id")->get();
        return view("accounts.users_table")->with([
            "page_name" => "Admins",
            "users_data" => $data
        ]);
   
    }

    public function getRoles(Request $request)
    {
        SessionChecker::checkSession($request);

        $roles = DB::table("roles")->get();
        return view("accounts.roles_table")->with([
            "page_name" => "Roles",
            "roles" => $roles
        ]);

        //return view("accounts.roles_table")->with("page_name","Roles");

    }


    public function getMeters(Request $request)
    {
        SessionChecker::checkSession($request);
        return view("accounts.meters_table")->with("page_name", "Meters");
    }

    public function getDataset(Request $request)
    {
        SessionChecker::checkSession($request);

        $datasets = DB::table("water_consuptions")->get();
        return view("data.data_table")->with([
            "page_name" => "Datasets",
            "dataset" => $datasets
        ]);
    }




    public function getStudents(Request $request)
    {
        SessionChecker::checkSession($request);

        $students = DB::table("students")->get();
        $classes = DB::table("classes")->get();
        $student_categories = DB::table("student_categories")->get();


        return view("accounts.students_table")->with([
            "page_name" => "Students",
            "classes" => $classes,
            "students" => $students,
            "student_categories" => $student_categories
        ]);
    }







    public function getTeachers(Request $request)
    {
        SessionChecker::checkSession($request);

        $teachers = DB::table("teachers")->get();
        return view("accounts.teachers_table")->with([
            "page_name" => "Teachers",
            "teachers" => $teachers
        ]);
    }



    public function getSubjects(Request $request)
    {
        SessionChecker::checkSession($request);

        $subjects = DB::select("SELECT * FROM subjects join levels on subjects.level_id = levels.level_id join subject_categories on subject_categories.subject_category_id=subjects.subject_category_id");
        $categories = DB::table("subject_categories")->get();
        $levels = DB::table("levels")->get();


        return view("data.subjects")->with([
            "page_name" => "Subjects",
            "subjects" => $subjects,
            "categories" => $categories,
            "levels" => $levels,

        ]);
    }

    public function getClasses(Request $request)
    {
        SessionChecker::checkSession($request);

        $levels = DB::table("levels")->get();
        $classes = DB::select("SELECT * from classes join levels on classes.level_id=levels.level_id");
        return view("data.classes")->with([
            "page_name" => "Clases",
            "levels" => $levels,
            "classes" => $classes
        ]);
    }




    public function getStudySessions(Request $request)
    {
        SessionChecker::checkSession($request);

        $study_times = DB::table("study_times")->get();
        $study_days = DB::table("study_days")->get();

        return view("data.study_sessions")->with([
            "page_name" => "Study Sessions",
            "study_times" => $study_times,
            "study_days" => $study_days
        ]);



        
    }



    public function getLevels(Request $request)
    {
        SessionChecker::checkSession($request);

        $levels = DB::select("SELECT * from levels");
        return view("data.levels")->with([
            "page_name" => "Class Levels",
            "levels" => $levels
        ]);
    }

    public function getSubjectCategories(Request $request)
    {
        SessionChecker::checkSession($request);

        $subject_categories = DB::select("SELECT * from subject_categories");
        return view("data.subject_categories")->with([
            "page_name" => "Subject Categories",
            "subject_categories" => $subject_categories
        ]);
    }


    public function getStudentCategories(Request $request)
    {
        SessionChecker::checkSession($request);

        $student_categories = DB::select("SELECT * from student_categories");
        return view("data.student_categories")->with([
            "page_name" => "Student Categories",
            "student_categories" => $student_categories
        ]);
    }


    public function getEvents(Request $request)
    {
        SessionChecker::checkSession($request);
        $events = DB::table("events")->get();
        return view("data.calendar")->with([
            "page_name" => "School Events Calendar",
            "events" => $events
        ]);
    }



    public function getTimeTables(Request $request)
    {
        SessionChecker::checkSession($request);
        $classes = [];

        if(session()->get("role")=="student"){
            $class_id = session()->get("user")->class_id;
            $classes = DB::table("classes")->where("class_id","=",$class_id)->get();
        }else{
            $classes = DB::table("classes")->get();
        }


        
        $teachers = DB::table("teachers")->get();
        $subjects = DB::table("subjects")->get();
        $study_days = DB::select("SELECT * FROM study_days order by day_create_date asc");
        $study_times = DB::table("study_times")->get();


        $timetables = DB::select("SELECT distinct * from study_days
        left  join time_table  on study_days.study_day_id=time_table.study_day_id 
        left join subjects    on subjects.subject_id=time_table.subject_id 
        left join teachers    on teachers.teacher_id=time_table.teacher_id
        left join classes     on classes.class_id=time_table.class_id
        left join study_times on study_times.study_time_id=time_table.study_time_id");

        return view("data.timetables")->with([
            "page_name" => "Time Tables",
            "classes" => $classes,
            "study_days" => $study_days,
            "study_times" => $study_times,
            "subjects" => $subjects,
            "teachers" => $teachers,
            "timetables" => $timetables
        ]);
    }



    public function getFees(Request $request)
    {
        SessionChecker::checkSession($request);

        $classes = DB::table("classes")->get();
        $terms = DB::table("terms")->get();
        $student_categories = DB::table("student_categories")->get();

        $fees = DB::table("fees")
        ->join("classes","classes.class_id","=","fees.class_id","left")
        ->join("terms","terms.term_id","=","fees.term_id","left")
        ->join("student_categories","fees.student_category_id","=","student_categories.student_category_id","left")
        ->get();


       
        return view("data.fees")->with([
            "page_name" => "Fees",
            "fees" => $fees,
            "classes" => $classes,
            "terms" => $terms,
            "student_categories"=>$student_categories
        ]);
    }




    public function getPayments(Request $request)
    {
        SessionChecker::checkSession($request);

        $students = DB::table("students")->get();
        $fees = DB::table("fees")->get();
        $terms = DB::table("terms")->get();

        $payments = [];
        if (session()->get("role")=="student"){

            $id = session()->get("user")->student_id;

        $payments = DB::table("payments")
        ->join("students","students.student_id","=","payments.student_id","left")
        ->join("classes","students.class_id","=","classes.class_id","left")
        ->join("fees","payments.fees_id","=","fees.fees_id","left")
        ->join("terms","terms.term_id","=","fees.term_id","left")
        ->where("payments.student_id","=",$id)
        ->get();

        }else{

            $payments = DB::table("payments")
            ->join("students","students.student_id","=","payments.student_id","left")
            ->join("classes","students.class_id","=","classes.class_id","left")
            ->join("fees","payments.fees_id","=","fees.fees_id","left")
            ->join("terms","terms.term_id","=","fees.term_id","left")
            ->get();

        }

       

        return view("data.payments")->with([
            "page_name" => "Payments and Transactions",
            "payments" => $payments,
            "terms" => $terms,
            "students"=>$students,
            "fees"=>$fees
        ]);
    }




    public function getTerms(Request $request)
    {
        SessionChecker::checkSession($request);

        $terms = DB::table("terms")->get();
        return view("data.terms")->with([
            "page_name" => "School Academic Terms",
            "terms" => $terms
        ]);
    }




    public function getMarks(Request $request)
    {
        SessionChecker::checkSession($request);

        $classes = DB::table("classes")->get();
        $subjects = DB::table("subjects")->get();
        $students = DB::table("students")->get();
        $classes = DB::table("classes")->get();
        $terms = DB::table("current_term")->join("terms.term_id","=","current_term.term_id")->get();

        $marks = DB::table("marks")
        ->join("students","students.student_id","=","marks.student_id","left")
        ->join("terms","terms.term_id","=","marks.term_id","left")
        ->join("subjects","subjects.subject_id","=","marks.subject_id","left")
        ->get();

        return view("data.marks")->with([
            "page_name" => "Student Marks",
            "marks" => $marks,
            "classes" => $classes,
            "students"=>$students,
            "terms"=>$terms,
            "subjects"=>$subjects

        ]);
    }

    public function getReceipt($id,Request $request){

        $pay_id = $id;

        $payments = DB::table("payments")
        ->join("students","students.student_id","=","payments.student_id","left")
        ->join("classes","students.class_id","=","classes.class_id","left")
        ->join("fees","payments.fees_id","=","fees.fees_id","left")
        ->join("terms","terms.term_id","=","fees.term_id","left")
        ->where([
           ["payment_id","=",$pay_id]
        ])
        ->get();



        $settings = DB::select("SELECT * from school_settings limit 1");
        
        $pdf = PDF::loadView("finance.receipt", [
            "payments" => $payments,
            "settings" =>$settings
        ]);

        $pdf->save(storage_path("new.pdf"));

        return $pdf->download('new.pdf');

    
        // return view("finance.receipt")->with(
        //     [
        //         "payments" => $payments,
        //         "settings" =>$settings
        //     ]
        // );

    }



    public function handleStudents(Request $request)
    {   
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $email = $request->input("email");
        $contact = $request->input("contact");
        $class_id = $request->input("class_id", "1");
        $category_id = $request->input("student_category_id", "1");
        $gender = $request->input("gender", "m");
        $password = $request->input("password", "student");
        $password = md5(md5($password));


        $student = [
            "student_full_name" => $name,
            "email" => $email,
            "student_category_id" => $category_id,
            "contact" => $contact,
            "class_id" => $class_id,
            "password" => $password,
            "gender" => $gender,
        ];

        $studentsTable = DB::table("students");

        $studentsTable->insert(
            $student
        );

        $request->session()->put("success", "Student Registered Successfully");
        return redirect(
            "students"
        );
    }



    public function handleTeachers(Request $request)
    {
        SessionChecker::checkSession($request);


        try {
           
        $name = $request->input("name");
        $email = $request->input("email");
        $contact = $request->input("contact");
        $gender = $request->input("gender", "m");
        $password = $request->input("password", "teacher");
        $password = md5(md5($password));

        $student = [
            "teacher_full_name" => $name,
            "email" => $email,
            "contact" => $contact,
            "password" => $password,
            "gender" => $gender,
        ];

        $table = DB::table("teachers");

        $table->insert(
            $student
        );

        $request->session()->put("success", "Teacher Registered Successfully");
        return redirect(
            "teachers"
        );

     } catch (\Throwable $th) {

        $request->session()->put("error", "Something went wrong!!");
        return redirect(
            "teachers"
        );
           
      }
}






    public function handleClasses(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $level_id = $request->input("level_id", "1");
        $class_desc = $request->input("desc", "");

        $class = [
            "class_name" => $name,
            "class_desc" => $class_desc,
            "level_id" => $level_id,
        ];

        $table = DB::table("classes");

        $table->insert(
            $class
        );

        $request->session()->put("success", "Class Added Successfully");
        return redirect(
            "classes"
        );
    }






    public function handleSubjects(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $level_id = $request->input("level_id", "1");
        $code = $request->input("code", "R00" . rand(1, 100));
        $category_id = $request->input("category_id", "1");
        $desc = $request->input("desc", "");

        $subject = [
            "subject_name" => $name,
            "subject_desc" => $desc,
            "subject_code" => $code,
            "level_id" => $level_id,
            "subject_category_id" => $category_id
        ];

        $table = DB::table("subjects");

        $table->insert(
            $subject
        );

        $request->session()->put("success", "Class Added Successfully");
        return redirect(
            "subjects"
        );
    }





    public function handleSubjectCategories(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $desc = $request->input("desc", "");

        $subjectCategory = [
            "subject_category_name" => $name,
            "subject_category_desc" => $desc,
        ];

        $table = DB::table("subject_categories");

        $table->insert(
            $subjectCategory
        );

        $request->session()->put("success", "Subject Category Added Successfully");
        return redirect(
            "subject_categories"
        );
    }



    public function handleStudentCategories(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $desc = $request->input("desc", "");

        $studentCategory = [
            "student_category_name" => $name,
            "student_category_desc" => $desc,
        ];

        $table = DB::table("student_categories");
        $table->insert(
            $studentCategory
        );

        $request->session()->put("success", "Student Category Added Successfully");
        return redirect(
            "student_categories"
        );
    }




    public function handleLevels(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $desc = $request->input("desc", "");

        $level = [
            "level_name" => $name,
            "description" => $desc,
        ];

        $table = DB::table("levels");

        $table->insert(
            $level
        );

        $request->session()->put("success", "Level Added Successfully");
        return redirect(
            "levels"
        );
    }



    public function handleEvents(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name");
        $desc = $request->input("desc", "");
        $start = $request->input("start_date", "");
        $end = $request->input("end_date", $start);

        $event = [
            "event_name" => $name,
            "event_desc" => $desc,
            "start_date" => $start,
            "end_date" => $end,

        ];

        $table = DB::table("events");

        $table->insert(
            $event
        );

        $request->session()->put("success", "Event Added Successfully");
        return redirect(
            "events"
        );
    }





    public function handleFees(Request $request)
    {
        SessionChecker::checkSession($request);

        $name = $request->input("name","Un Known");
        $amount = $request->input("amount", "");
        $term_id = $request->input("term_id", "");
        $category = $request->input("student_category_id", "0");
        $class = $request->input("class_id", "0");

        $fee = [
            "fees_name" => $name,
            "fees_amount" => $amount,
            "student_category_id" => $category,
            "class_id" => $class,
            "term_id" => $term_id,

        ];

        $table = DB::table("fees");

        $table->insert(
            $fee
        );

        $request->session()->put("success", "Fee Added Successfully");
        return redirect(
            "fees"
        );
    }





    public function handlePayments(Request $request)
    {
        SessionChecker::checkSession($request);

        $amount = $request->input("amount", "");
        $term_id = $request->input("term_id", "");
        $student = $request->input("student_id", "0");
        $fees = $request->input("fees_id", "0");
        $date = $request->input("date", "0");

        $payment = [
            "fees_id" => $fees,
            "paid_amount" => $amount,
            "student_id" => $student,
            "payment_date" => $date,

        ];

        $table = DB::table("payments");

        $table->insert(
            $payment
        );

        $request->session()->put("success", "Payment Registered Successfully");
        return redirect(
            "payments"
        );
    }




    public function handleStudySessions(Request $request)
    {
        SessionChecker::checkSession($request);

        if ($request->has("study_time")) {
            $name = $request->input("study_time");

            $time = [
                "study_time_name" => $name,
            ];

            $table = DB::table("study_times");

            $table->insert(
                $time
            );

            $request->session()->put("success", "Study Time Added Successfully");
            return redirect(
                "study_sessions"
            );
        }


        if ($request->has("study_day")) {
            $name = $request->input("study_day");

            $day = [
                "study_day_name" => $name,
            ];

            $table = DB::table("study_days");

            $table->insert(
                $day
            );

            $request->session()->put("success", "Study Day Added Successfully");
            return redirect(
                "study_sessions"
            );
        }
    }


    public function handleTimeTables(Request $request){
        SessionChecker::checkSession($request);

        $teacher = $request->input("teacher_id");
        $class = $request->input("class_id", "1");
        $subject = $request->input("subject_id", "1");
        $day = $request->input("day_id", "");
        $time = $request->input("time_id", "");

        $timetable = [
            "teacher_id" => $teacher,
            "class_id" => $class,
            "subject_id" => $subject,
            "study_day_id" => $day,
            "study_time_id" => $time,
        ];

        $table = DB::table("time_table");

        $table->insert(
            $timetable
        );

        $request->session()->put("success", "Time Table Session Added Successfully");
        return redirect(
            "timetables"
        );
    }




    public function handleTerms(Request $request){
        SessionChecker::checkSession($request);

        $name = $request->input("name", "");
        $desc = $request->input("desc", "");

        $term = [
            "term_name" => $name,
            "term_desc" => $desc,
            
        ];

        $table = DB::table("terms");

        $table->insert(
            $term
        );

        $request->session()->put("success", "Term Added Successfully");
        return redirect(
            "terms"
        );
    }


    public function handleCurrentTerm(Request $request)
    {
        SessionChecker::checkSession($request);

       
        $term_id = $request->input("term_id", "1");
        $start = $request->input("start", "");
        $end = $request->input("end");


        $tstart = strtotime($start);
        $tend =  strtotime($end);

       if($tstart>=$tend){
        $request->session()->put("error","End Date Must Be Greater Than Start Date.");
        return redirect("terms");
       }

        $term = [
            "term_id" => $term_id,
            "term_start_date" => $start,
            "term_end_date" => $end,
        ];

        $table = DB::table("current_term");

        $table->insert(
            $term
        );
        $request->session()->put("success", "Current Updated Successfully");
        return redirect(
            "terms"
        );
    }



    public function handleMarks(Request $request){
        SessionChecker::checkSession($request);

        $student = $request->input("student_id", "");
         $class = $request->input("class_id", "");
        $subject = $request->input("subject_id", "");
        $value = $request->input("mark_value", "");
        $term = $request->input("term_id", "");
        $date = $request->input("exam_date", "");

        $mark = [
            "term_id" => $term,
            "student_id" => $student,
            "mark_value" => $value,
            "subject_id" => $subject,
            "exam_date" => $date,
        ];


        $table = DB::table("marks");

        $chkstdt = $table->where([
            ["student_id", "=",$student],
            ["subject_id","=", $subject],
            ["term_id","=", $term]
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


    private function checkSession(Request $request)
    {
        if (!$request->session()->has("user")) {
            $request->session()->put("info", "Unfortunately, Session Expired !");
            header("location:login");
            exit();
        }
    }
}
