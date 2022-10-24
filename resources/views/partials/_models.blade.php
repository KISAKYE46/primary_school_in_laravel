{{-- Time --}}
<div class="modal fade" id="modal-receipt" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Payment Receipt</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container" style="width:100%">
          <div class="row justify-content-center">

          
          <div class="col-md-12" style="border: 3px dotted grey;border-radius:5px">

            <h3 class="text-center text-uppercase">Our School</h3>
           <h5 class="text-center text-uppercase text-bold text-success ">Payment Confirmation Receipt</h5>
          
           <h5 class="text-danger">Receipt No<span id="receipt_id"></span> </h5>



            
           <table class="table table-striped table-hover" style="width: 100%">

            <tr>
              <th>Student Name</th>
              <th><span  class="text-success"  id="receipt_name"></span></th>
              <th></th>
            </tr>

            <tr>
              <th>Paid For</th>
              <th><span  class="text-success" id="payment_name"></span></th>
              <th></th>
            </tr>

            <tr>
              <th>Balance</th>
              <th><span  class="text-success" id="payment_balance"></span></th>
              <th></th>
            </tr>

            <tr>
              <th>Amount Paid</th>
              <th><span  class="text-success" id="receipt_amount"></span></th>
              <th></th>
            </tr>

            <tr>
              <th>Payment Date</th>
              <th><span id="date"></span></th>
              <th></th>
            </tr>



           </table>

           
           
          </div>

        </div>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <a  href="receipt"> <button type="button" class="btn btn-success" id="print">Print</button></a>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Day  cats --}}



<div class="modal fade" id="modal-default" style="display: none; padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content card-outline card card-success  card-outline card card-success ">
        <div class="modal-header">
          <h4 class="modal-title">Add A User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body…</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade " id="modal-logout" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success bg-success  modal-sm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 id="deleteProgress">Are you sure to logout?</h6>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="logout"><button type="button" class="btn btn-success" id="logoutBtn">Logout</button></a>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade " id="modal-delete" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-danger bg-danger  modal-sm">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Are you sure to delete this artifact?</h6>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="deleteBtn" data-dismiss="model">Delete</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>





<div class="modal fade" id="modal-default" style="display: none; padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content card-outline card card-success ">
        <div class="modal-header">
          <h4 class="modal-title">Add A User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body…</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content card-outline card card-success  -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div class="modal fade" id="modal-users" style="display: none; padding-right: 12px;" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content card-outline card card-success ">
        <div class="modal-header">
          <h4 class="modal-title">New Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            

            <form role="form"  id="adminsForm" method="post" action="/handle_registration">
              @csrf
                <!-- text input -->
                <div class="form-group">
                  <label>Full Name</label>
                  <input required name="name" type="text" class="form-control" placeholder="Enter Full Name ...">
                </div>


                <div class="form-group">
                    <label>Email</label>
                    <input required type="email" name="email" class="form-control" placeholder="Enter Email ...">
                </div>


                <div class="form-group">
                    <label>Contact</label>
                    <input required type="text" name="contact" class="form-control" placeholder="Enter Contact ...">
                </div>
                
  
                <!-- select -->
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role_id">
                    <option value="1">Super Admin</option>
                    <option value="2">Customer</option>
                  </select>
                </div>
                
              </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="submitAdmins">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content card-outline card card-success  -->
    </div>
    <!-- /.modal-dialog -->
</div>

























<div class="modal fade " id="modal-teachers" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog ">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Teacher</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="teachersForm" method="post" action="teachers">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Full Name</label>
                <input required name="name" type="text" class="form-control" placeholder="Enter Full Name ...">
              </div>


              <div class="form-group">
                  <label>Email</label>
                  <input required type="email" name="email" class="form-control" placeholder="Enter Email ...">
              </div>


              <div class="form-group">
                  <label>Contact</label>
                  <input required type="text" name="contact" class="form-control" placeholder="Enter Contact ...">
              </div>
              

              <div class="form-group">
                <label>Password</label>
                <input required type="text" value="teacher" name="password" class="form-control" placeholder="Create password...">
            </div>
            

              <!-- select -->
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option value="f">Female</option>
                  <option value="m">Male</option>
                </select>
              </div>
              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitTeachers">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>




<div class="modal fade" id="modal-students" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="studentsForm" method="post" action="students">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Full Name</label>
                <input required required name="name" type="text" class="form-control" placeholder="Enter Full Name ...">
              </div>


              <div class="form-group">
                  <label>Email</label>
                  <input required required type="email" name="email" class="form-control" placeholder="Enter Email ...">
              </div>


              <div class="form-group">
                  <label>Contact</label>
                  <input required type="text" name="contact" class="form-control" placeholder="Enter Contact ...">
              </div>


               <!-- select -->
               <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                  <option value="f">Female</option>
                  <option value="m">Male</option>
                </select>
              </div>


              <!-- select -->
              <div class="form-group">
                <label>Scholar Category </label>
                <select class="form-control" name="student_category_id">
                  @isset($student_categories)
                  @foreach ($student_categories as $student_category )
                  <option value="{{$student_category->student_category_id}}">{{$student_category->student_category_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>


              <!-- select -->
              <div class="form-group">
                <label>Class </label>
                <select class="form-control" name="class_id">

                  @isset($classes)

                  @foreach ($classes as  $class)

                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                    
                  @endforeach
                    
                  @endisset
                
                </select>
              </div>
              

              <div class="form-group">
                <label>Password</label>
                <input required type="text" value="student" name="password" class="form-control" placeholder="Create password...">
            </div>
            
              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitStudents">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>





{{-- Student Cats--}}
<div class="modal fade" id="modal-student-categories" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Student Categories</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="studentCategoriesForm" method="post" action="student_categories">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Student Category Name</label>
                <input required name="name" type="text" class="form-control" placeholder="Enter Student Category Name ...">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea required name="desc"  class="form-control" placeholder="Description..."></textarea>
              </div>

        
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success btn-sm" id="submitStudentCategories">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Student cats --}}






{{-- Day --}}
<div class="modal fade" id="modal-study-day" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Day Session</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="studyDaysForm" method="post" action="study_sessions">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Day Name</label>
                <input required name="study_day" type="day" class="form-control" placeholder="Enter Day Name ...">
              </div>

             
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitStudyDays">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Day  cats --}}




{{-- Time --}}
<div class="modal fade" id="modal-study-time" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Time Session</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="studyTimesForm" method="post" action="study_sessions">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Time Name</label>
                <input required name="study_time" value="08:00" type="time" class="form-control" placeholder="Enter Time ...">
              </div>

             
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitStudyTimes">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Day  cats --}}









{{-- Time table Cats--}}
<div class="modal fade" id="modal-timetables" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Time Table Session</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="timeTablesForm" method="post" action="timetables">
            @csrf
              <!-- text input -->
               <!-- select -->
               <div class="form-group">
                <label>Class Name </label>
                <select class="form-control" name="class_id">
                  @isset($classes)
                  @foreach ($classes as $class )
                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>

              <div class="form-group">
                <label>Subject Teacher</label>
                <select class="form-control" name="teacher_id">
                  @isset($teachers)
                  @foreach ($teachers as $teacher )
                  <option value="{{$teacher->teacher_id}}">{{$teacher->teacher_full_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>


              <div class="form-group">
                <label>Subject Name </label>
                <select class="form-control" name="subject_id">
                  @isset($subjects)
                  @foreach ($subjects as $subject )
                  <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>



              <div class="form-group">
                <label>Session Day</label>
                <select class="form-control" name="day_id">
                  @isset($study_days)
                  @foreach ($study_days as $study_day )
                  <option value="{{$study_day->study_day_id}}">{{$study_day->study_day_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>




              <div class="form-group">
                <label>Session Time </label>
                <select class="form-control" name="time_id">
                  @isset($study_times)
                  @foreach ($study_times as $study_time )
                  <option value="{{$study_time->study_time_id}}">{{$study_time->study_time_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>
        
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitTimeTables">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Time Table cats --}}





{{-- Time fees Cats--}}
<div class="modal fade" id="modal-fees" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Establish New Fees</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="feesForm" method="post" action="fees">
            @csrf
            <div class="form-group">
              <label>Fee Name</label>
              <input required name="name"  type="text" class="form-control" placeholder="Enter Fee Name ...">
            </div>

            <div class="form-group">
              <label>Amount to be Paid(UGX)</label>
              <input required name="amount" min="0" value="0" type="number" class="form-control" placeholder="Enter Amount ...">
            </div>
               <!-- select -->

               <div class="form-group">
                <label>Term or Semester (When to Pay This Fee)</label>
                <select class="form-control" name="term_id">
                  <option value="0">All Terms/Semesters</option>
                  @isset($terms)
                  @foreach ($terms as $term)
                  <option value="{{$term->term_id}}">{{$term->term_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>
               <div class="form-group">
                <label>Class Name </label>
                <select class="form-control" name="class_id">
                  <option value="0">All Classes</option>
                  @isset($classes)
                  @foreach ($classes as $class )
                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>

              <div class="form-group">
                <label>Students' Category</label>
                <select class="form-control" name="student_category_id">
                  <option value="0">All Students</option>
                  @isset($student_categories)
                  @foreach ($student_categories as $student_category)
                  <option value="{{$student_category->student_category_id}}">{{$student_category->student_category_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitFees">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Time fees cats --}}




{{-- Time fees Cats--}}
<div class="modal fade" id="modal-current-term" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Set Current Term</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="currentTermForm" method="post" action="_term">
            @csrf
            
               <!-- select -->

               <div class="form-group">
                <label>Term or Semester</label>
                <select class="form-control" name="term_id">
                  @isset($terms)
                  @foreach ($terms as $term)
                  <option value="{{$term->term_id}}">{{$term->term_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>
              <div class="form-group">
                <label>Term Start Date</label>
                <input required name="start"  type="date" class="form-control" placeholder="Start Date...">
              </div>
  
              <div class="form-group">
                <label>Term End Date</label>
                <input required name="end" type="date" class="form-control" placeholder="End Date...">
              </div>
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitCurrentTerm">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Time fees cats --}}






{{--Payments--}}
<div class="modal fade" id="modal-payments" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Register Payment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="paymentsForm" method="post" action="payments">
            @csrf


            <div class="form-group">
              <label>Paying Student</label>
              <select class="form-control" name="student_id">
                @isset($students)
                @foreach ($students as $student)
                <option value="{{$student->student_id}}">{{$student->student_full_name}}</option>
                @endforeach
                @endisset
              </select>
            </div>


            {{-- <div class="form-group">
              <label>Term/Semester Being Paid For</label>
              <select class="form-control" name="term_id">
                @isset($terms)
                @foreach ($terms as $term)
                <option value="{{$term->term_id}}">{{$term->term_name}}</option>
                @endforeach
                @endisset
              </select>
            </div> --}}
            <div class="form-group">
              <label>Payment For</label>
              <select class="form-control" name="fees_id">

                @isset($fees)
                @foreach ($fees as $fee)
                <option value="{{$fee->fees_id}}">{{$fee->fees_name}}({{$fee->fees_amount}})</option>
                @endforeach
                @endisset
              </select>
            </div>

            <div class="form-group">
              <label>Amount to be Paid(UGX)</label>
              <input required name="amount" min="0" value="0" type="number" class="form-control" placeholder="Enter Amount ...">
            </div>


            <div class="form-group">
              <label>Date Of Payment</label>
              <input required name="date"  type="date" value="new Date()" class="form-control" placeholder="Enter Payment Date ...">
            </div>

{{-- 
            <div class="form-group">
              <label>Remaining Balance(UGX)</label>
              <input required name="amount" min="0" value="0" type="number" class="form-control" placeholder="Pending Balance..">
            </div> --}}
               <!-- select -->

               {{-- <div class="form-group">
                <label>Term or Semester (When to Pay This Fee)</label>
                <select class="form-control" name="term_id">
                  <option value="0">All Terms/Semesters</option>
                  @isset($terms)
                  @foreach ($terms as $term)
                  <option value="{{$term->term_id}}">{{$term->term_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div> --}}
               


            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitPayments">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Time fees cats --}}








{{-- Terms--}}
<div class="modal fade" id="modal-terms" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Establish New Term</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="termForm" method="post" action="terms">
            @csrf
              <!-- text input -->
               <!-- select -->
               

              <div class="form-group">
                <label>Term Name</label>
                <input required name="name"  type="text" class="form-control" placeholder="Enter Term Name ...">
              </div>


              <div class="form-group">
                <label>Term Description</label>
                <textarea required name="desc"  class="form-control" placeholder="Enter Description ..."></textarea>
              </div>

              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitTerm">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Terms --}}





{{-- Exam sets--}}
<div class="modal fade" id="modal-exam-sets" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Establish a Exam Set</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="examSetsForm" method="post" action="exam_sets">
            @csrf
              <!-- text input -->
               <!-- select -->
               

              <div class="form-group">
                <label>Exam Set Name</label>
                <input required name="name"  type="text" class="form-control" placeholder="Enter Term Name ...">
              </div>


              <div class="form-group">
                <label>Exam Set Description</label>
                <textarea required name="desc"  class="form-control" placeholder="Enter Set Description ..."></textarea>
              </div>

              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitExamSet">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Exam Sets --}}





{{-- Events--}}
<div class="modal fade" id="modal-events" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Establish School Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="eventForm" method="post" action="events">
            @csrf
              <!-- text input -->
               <!-- select -->
               

              <div class="form-group">
                <label>Event Name</label>
                <input required name="name"  type="text" class="form-control" placeholder="Enter Term Name ...">
              </div>


              <div class="form-group">
                <label>Event Description</label>
                <textarea required name="desc"  class="form-control" placeholder="Enter Description ..."></textarea>
              </div>


              <div class="form-group">
                <label>Event Start Date</label>
                <input required name="start_date" type="date"  class="form-control" placeholder="Event Date"/>
              </div>


              <div class="form-group">
                <label>Event End Date</label>
                <input  name="end_date" type="date"  class="form-control" placeholder="Event Date"/>
              </div>

              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitEvent">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Events --}}














{{-- Levels --}}
<div class="modal fade" id="modal-levels" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Class Level</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="levelsForm" method="post" action="levels">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Level Name</label>
                <input required name="name" type="text" class="form-control" placeholder="Enter Full Name ...">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea required name="desc"  class="form-control" placeholder="Description..."></textarea>
              </div>

        
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitLevels">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Levels --}}




{{-- Classes --}}
<div class="modal fade" id="modal-classes" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Class</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="classesForm" method="post" action="classes">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Class Name</label>
                <input required name="name" type="text" class="form-control" placeholder="Enter Full Name ...">
              </div>


              <div class="form-group">
                <label>Description</label>
                <textarea required name="desc"  class="form-control" placeholder="Description..."></textarea>
              </div>

              <div class="form-group">
                <label>Study Level </label>
                <select class="form-control" name="level_id">

                @isset($levels)

                 @foreach ($levels as $level)
                 <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                 @endforeach
                  @endisset
                 
                 
                </select>
              </div>
             
        
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitClasses">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>

{{-- End Classes --}}



{{-- Grading --}}
<form  method="post" action="grading" class="modal fade" id="modal-grading" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Grading Approach</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Reward</label>
                <input required name="reward" type="text" class="form-control" placeholder="Grading Reward eg D1, D2, P8.">
              </div>

              <div class="form-group">
                <label>Between</label>
                <input required name="from_marks" type="number" required min="0" max="100" class="form-control" placeholder="Minimum marks ...">
              </div>

              <div class="form-group">
                <label>and</label>
                <input required name="to_marks" type="number" required min="0" max="100" class="form-control" placeholder="Maximum marks...">
              </div>
              <div class="form-group">
                <label>Points</label>
                <input required name="points" type="text" required min="0" max="100" class="form-control" placeholder="Number of points...">
              </div>

              <div class="form-group">
                <label>Study Level </label>
                <select class="form-control" name="level_id" required>
                @isset($levels)
                 @foreach ($levels as $level)
                 <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                 @endforeach
                @endisset
                </select>
              </div> 
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="save_grading" id="submitClasses">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</form>

{{-- End Grading--}}





{{-- Subjects --}}
<div class="modal fade" id="modal-subjects" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Subject</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="subjectsForm" method="post" action="subjects">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Subject Name</label>
                <input required name="name" type="text" class="form-control" placeholder="Enter Subject Name ...">
              </div>


              <div class="form-group">
                <label>Subject Unique Code</label>
                <input required name="code"  type="text" class="form-control" placeholder="Enter Unique Code ... eg A002">
              </div>


              <div class="form-group">
                <label>Subject Description</label>
                <textarea required name="desc" type="text" class="form-control" placeholder="Enter Description..."></textarea>
              </div>

               <!-- select -->
               <div class="form-group">
                <label>Category Name </label>
                <select class="form-control" name="category_id">

                  @isset($categories)

                  @foreach ($categories as  $category)

                  <option value="{{$category->subject_category_id}}">{{$category->subject_category_name}}</option>
                    
                  @endforeach
                    
                  @endisset
                
                </select>
              </div>

              <!-- select -->
              <div class="form-group">
                <label>Study Level Name </label>
                <select class="form-control" name="level_id">

                  @isset($levels)

                  @foreach ($levels as  $level)

                  <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                    
                  @endforeach
                    
                  @endisset
                
                </select>
              </div>
        
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitSubjects">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>

{{-- End subjects --}}





{{-- Subjects Cats--}}
<div class="modal fade" id="modal-subject-categories" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Subject Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="subjectCategoriesForm" method="post" action="subject_categories">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Subject Category Name</label>
                <input required name="name" type="text" class="form-control" placeholder="Enter Subject Category Name ...">
              </div>


              <div class="form-group">
                <label>Subject Category Description</label>
                <textarea required name="desc" type="text" class="form-control" placeholder="Enter Description..."></textarea>
              </div>
        
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitSubjectCategories">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>

{{-- End subjects Cats --}}





<div class="modal fade" id="modal-roles" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="adminsForm" method="post" action="/handle_registration">
            @csrf
              <!-- text input -->
              <div class="form-group">
                <label>Role Name</label>
                <input required name="role_name" type="text" class="form-control" placeholder="Enter Full Name ...">
              </div>

              <div class="form-group">
                <label>Role Description</label>
                <input required name="role_desc" type="text" class="form-control" placeholder="Enter Full Name ...">
              </div>
              
            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitRole">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>




<form  method="post" action="edit_marks" class="modal fade" id="modal-edit-marks" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">Modify Marks</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        @csrf
          <div class="form-group">
            <label>Mark Value</label>
            <input  name="mark_value" id="newMarkValue" type="number" max="100" min="0" class="form-control" placeholder="Enter New Marks" required>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-success"  id="submitMarkEdit">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</form>






{{-- Marks--}}
<div class="modal fade" id="modal-marks" style="display: none; padding-right: 12px;" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content card-outline card card-success  card-outline card card-success ">
      <div class="modal-header">
        <h4 class="modal-title">New Marks</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          

          <form role="form"  id="markForm" method="post" action="marks">
            @csrf
              
               <div class="form-group">
                <label>Exam Set Name</label>
                <select class="form-control" name="exam_set_id">
                  @isset($exam_sets)
                  @foreach ($exam_sets as $exam_set )
                  <option value="{{$exam_set->exam_set_id}}">{{$exam_set->exam_set_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>

              <div class="form-group">
                <label>Student Name</label>
                <select class="form-control" name="student_id">
                  @isset($students)
                  @foreach ($students as $student )
                  <option value="{{$student->student_id}}">{{$student->student_full_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>


              

              <div class="form-group">
                <label>Subject Name </label>
                <select class="form-control" name="subject_id">
                  @isset($subjects)
                  @foreach ($subjects as $subject )
                  <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>



              <div class="form-group">
                <label>Terms/Semester</label>
                <select class="form-control" name="term_id">
                  @isset($current_terms)
                  @foreach ($current_terms as $term )
                  <option value="{{$term->current_term_id}}">{{$term->term_name}} ({{date("Y",strtotime($term->term_start_date))}})</option>
                  @endforeach
                  @endisset
                </select>
              </div>

              <div class="form-group">
                <label>Marks Value</label>
                <input required max="100" min="0" name="mark_value" type="number" class="form-control" placeholder="Student's Marks...">
              </div>

            

            </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitMark">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content card-outline card card-success  card-outline card card-success  -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- End Marks --}}


