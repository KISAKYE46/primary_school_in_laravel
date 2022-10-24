
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">




      
      <div class="row">

        @if (session()->get("role")=="admin")
        <div class="col-lg-12">
          
        </div>
        @endif


        @php
          $count = 0;
        @endphp
        @foreach ($classes as $class)
        @foreach ($students as $student)

        @if ($student->class_id==$class->class_id)
       
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <div>
                <button type="button" class="btn btn-success float-center" data-toggle="modal" data-target="#modal-marks">
                  <i class="fa fa-plus"></i> New Marks
                </button>
              </div>
              @if(session()->get("role")!="student")
              <h3 class="card-title">{{$student->student_full_name}}'s Marks 
              @endif
                
              @if ($count<1)
              
              @endif</h3>
            </div>
            <!-- /.card-header -->
            @isset($marks)
            @if (count($marks)>0)
            <div class="card-body">
              @foreach ($current_terms as $term)
              <strong><p>Results for {{$term->term_name}} of Year <strong class="text-success">{{date("Y",strtotime($term->term_start_date))}}</strong>.</p></strong>
                
              <table id="example{{$count}}"  class="table  table-hover   data-table table-bordered">
                <thead>
                <tr>
                  <th>Subject Name</th>
                  @foreach ($exam_sets as $exam_set)
                  <th>{{$exam_set->exam_set_name}}</th>
                  @endforeach
                  <th>Final Mark</th>
                  <th>Initials</th>
                  {{-- @if (session()->get("role")=="admin")
                  <th>Actions</th>
                  @endif --}}
                </tr>
                </thead>
                <tbody>

                @php
                  $added_subjects = [];
                @endphp
                @foreach ($marks as $mark )
                @foreach ($subjects as $subject)
                @if ($mark->student_id==$student->student_id&&$mark->subject_id==$subject->subject_id&&$term->term_id==$mark->current_term_id&&!in_array($subject->subject_id,$added_subjects))
                
                @php
                  array_push($added_subjects,$subject->subject_id);
                @endphp
                <tr>
                  <td>{{$mark->subject_name}}</td>
                  @php
                    $sets_count = 0;
                    $final_mark = 0;
                    $id = 0;

                    $sets = [];
                    $sets_counter = 0;
   
                  @endphp
                  
                  @foreach ($exam_sets as $exam_set)

                  @php
                  $table_mark = 0;
                  
                  
                  @endphp

                  @foreach ($marks as $inner_mark )
                 
                  
                  @if ($exam_set->exam_set_id==$inner_mark->exam_set_id&&$inner_mark->subject_id==$mark->subject_id&&$inner_mark->student_id==$mark->student_id&&$inner_mark->current_term_id)
                  
                  @php
                      
                  $table_mark = ($inner_mark->mark_value)*$exam_set->contribution;

                  $id = $inner_mark->mark_id;
                  
                  @endphp

                  @break
                
                  @endif
                  
                  
                  @endforeach

                  <td>
                   
                    <strong><span>

                      <div class="form-group">
                       
                        <div class="input-group">
                           <div class="input-group-append delete cursor-pointer" style="cursor:pointer" data-target="#modal-delete" data-toggle="modal" data-table="marks" data-column="mark_id" data-id="{{$id}}">
                             <span class="input-group-text text-sm text-danger " ><i class="fa fa-trash"></i></span> 
                           </div>
                           <input readonly type="number" class="input-append form-control" value="{{$table_mark}}">
                       
                           <div class="input-group-prepend" data-value="{{$table_mark}}" data-target="#modal-edit-marks" style="cursor:pointer" data-toggle="modal" data-id="{{$id}}">
                            <span class="input-group-text text-sm text-success edit" data-value="{{$table_mark}}" data-target="#modal-edit-marks" style="cursor:pointer" data-toggle="modal" data-id="{{$id}}"><i class="fa fa-edit edit" data-value="{{$table_mark}}" data-target="#modal-edit-marks" style="cursor:pointer" data-toggle="modal" data-id="{{$id}}"></i></span> 
                          </div>
                        </div>
                         
                      </div>
                      
                    </span></strong>   
                  @php
                    $final_mark+=$table_mark;
                  @endphp                    
                  </td>
                  @php
                  $sets_count++;
                  @endphp
                  @endforeach
                  @php
                    $final_mark = $final_mark;
                  @endphp
                  <th>
                    @if ($final_mark>=50)
                    <strong><span class="text-success">{{$final_mark}}</span></strong>
                    @else
                    <strong><span class="text-danger">{{$final_mark}}</span></strong>
                    @endif 
                    </th>
                  <th>NR</th>
                  {{-- @if (session()->get("role")=="admin")
                  <td><button class="btn btn-danger "> <i class="fa fa-trash"></i> Delete</button> <button class="btn btn-success "> <i class="fa fa-edit"></i> Edit</button></td>
                  @endif --}}
                </tr>
                @endif
                @endforeach
                @endforeach
                </tbody>




                <tfoot>
                    <tr>
                        <th>Subject Name</th>
                        
                        @foreach ($exam_sets as $exam_set)
      
                        <th>{{$exam_set->exam_set_name}}</th>
                            
                        @endforeach
                        <th>Final Mark</th>
                        <th>Initials</th>
                        {{-- @if (session()->get("role")=="admin")
                        <th>Actions</th>
                        @endif --}}
                      </tr>
                </tfoot>
              </table>
              @endforeach
            </div>

            @endif
            
            @endisset
            <!-- /.card-body -->
          </div>
          <!-- /.card -->  
          <!-- /.card -->
        </div>
        <!-- /.col -->

        @php
          $count++;
        @endphp
        @endif
        @endforeach
        @endforeach





      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

  