
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">

      <div class="p-1">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-marks">
          <i class="fa fa-plus"></i> New Marks
        </button>
      </div>
       {{-- class checking --}}
      @foreach ($classes as $class )
      {{-- student level checking --}}
      @foreach ($students as $student)
      @if ($student->class_id==$class->class_id)


        
      <div class="p-2">
        <h5 >{{$student->student_full_name}}'s Marks</h5>
      </div>

       {{-- current term checking --}}
      @foreach ($current_terms as $current_term )

      @php
          $button_shown = false;
      @endphp
     
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              @if ($button_shown==false)
              <div class="mb-1">
                <button class="btn btn-sm btn-default"><i class="fa fa-print"></i> Generate {{$current_term->term_name}} {{date("Y",strtotime("$current_term->term_start_date"))}}'s Report</button>
              </div>

              @php
                $button_shown = true;
              @endphp

              @endif
              
              <table class="table">
                <thead>

                  {{-- Defining the exam sets --}}
                  <tr>
                    <th>Subject</th>
                    @foreach ($exam_sets as $exam_set)
                        <th>
                          {{$exam_set->exam_set_name}}
                        </th>
                    @endforeach

                    <th>Final Mark</th>
                    <th>Reward</th>
                    <th>Aggregate</th>
                    <th>Initials</th>
                  </tr>
                    
                </thead>
                <tbody>

                    @php
                          $total_aggregates =0;
                    @endphp
                     @foreach ($marks as $mark)

                        @php
                            $final_mark = 0;
                          
                        @endphp
                        @if ($mark->student_id==$student->student_id&&$mark->current_term_id==$current_term->current_term_id)
                          <tr>
                            <td>{{$mark->subject_name}}</td>
                            @foreach ($exam_sets as $exam_set)
                            <td>
                            @if ($mark->exam_set_id==$exam_set->exam_set_id)

                              {{-- Getting Mark Contribution --}}
                              {{$mark->mark_value*$exam_set->contribution}}

                              @php
                                  $final_mark += $mark->mark_value*$exam_set->contribution
                              @endphp
                            @else
                            {{0.0}}
                            @endif
                            </td>
                            @endforeach
                            <td class="text-bold {{$final_mark>50?"text-success":"text-danger"}}">{{$final_mark}}</td>
                            <td>{{$gradingFunction($final_mark,$grading)}}</td>
                            <td>{{$pointsFunction($final_mark,$grading)}}</td>
                            @php
                              $total_aggregates+=$pointsFunction($final_mark,$grading)
                            @endphp
                            <td>NR</td>
                          </tr>
                        @endif
                    @endforeach
              
                </tbody>

                <tfoot>
                  <tr>
                    
                    <th></th>
                    @foreach ($exam_sets as $exam_set)
                      <th>
                        {{-- {{$exam_set->exam_set_name}} --}}
                      </th>
                    @endforeach

                    <th></th>
                    <th>Total Aggregates</th>
                    <th>{{ $total_aggregates}}</th>
                    <th></th>
                  </tr>
                </tfoot>

              </table>

            </div>
          </div>
        </div>
      </div>

      @endforeach
       {{-- end current_term loop --}}
      @endif
      @endforeach
       {{-- end student loop --}}
      @endforeach
      {{-- end class loop --}}
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

  