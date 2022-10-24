
@isset($marks)
@foreach ($settings as $setting )
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>End Of Term Report</title>
  <!-- Tell tde browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">

  :root{
    --primary:green;
  }
		@page {  margin: 0.80in;margin-right: 1.1in }
    h1,h2,h3,h4,h5{
      padding: 0px;
      margin: 0px;
    }

    h1, h2, h3, h4, h5 {
      page-break-after: avoid;
      padding: 0px;
    }
            @page {
            size: A4;
            font-size: 10pt;
            font-family: "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif;
            font-weight: lighter;
            color:  color: rgb(34, 58, 57);
        
          }

        table, figure {
          page-break-inside: avoid;
        }

        table{
            font-size: 9pt;
            border: 1px;
            border-radius: 5px;
        }

        .text-success{
            color: rgb(60, 179, 60);
        }

        .text-danger{
            color: rgb(179, 60, 60);
        }

        .dash{
            color:rgb(44, 109, 44);
        }



        p{
          font-size: 9pt;
        }

        .heading{
          font-weight: bold;
        }

        .left{
          text-align: left;
          padding-top: 1%;
          border: none;
          border-bottom: 1px dotted black;
        }

        .answer{
          font-style: normal;
          font-weight: lighter;
          color: rgb(34, 58, 57);
        }


        body{
          background-image: url(../storage/app/public/img/{{$setting->school_badge}});
          background-position: center;
          background-origin:border-box;
          background-size: 240px;
          background-clip:content-box;
          backdrop-filter:initial;
          background-blend-mode:luminosity;
          background-attachment:local;
          background-repeat: no-repeat;
          background-position-y:50%; 
        }

      
        td{

            box-sizing: border-box;
            padding: 1%;
            font-size: 8.6pt;
            text-align: center;
            padding: .5%;
            font-weight: lighter;
            
        }

        table{
          padding: .5%;
        }

        body{
          opacity: 0.85;
        }

        .dash{
          border-bottom: 1px dotted black;
        }

        .answer{
          font-style: italic;
          font-weight: lighter;
          color: rgb(25, 136, 180);
        }

		td p { background: transparent }
		a:link { color: #000080; so-language: zxx; text-decoration: underline }
		a:visited { color: #800000; so-language: zxx; text-decoration: underline }
	</style>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

  {{-- class checking --}}
  @foreach ($classes as $class )
  {{-- student level checking --}}
  @foreach ($students as $student)
  @if ($student->class_id==$class->class_id)
<body style="font-family:Arial, Helvetica, sans-serif;width:100vw;" align="center">
<div class="wrapper">
    <section class="content" >
      <div class="container-fluid" >
        <div class="row justify-content-center" style="display: flex;justify-content:center; ">
          <div class="col-8 p-2"   style="background-color:white;width: 100%;padding:1%;margin:1%;border:2px dotted black">
            <!-- Main content -->
            <div class="invoice p-3 mb-3" >
              <!-- title row -->
            
              <center align="center">
                <div class="row" style="display: grid;place-items:center;">
                  <div class="col-12" style="width: 100%;align-items:center" >
                   <center>
                    <div style="display:grid;place-items:center">

                    <h3 style="text-align: center"><img src="../storage/app/public/img/{{$setting->school_badge}}" alt="No Image"  style="height: 100px;width:100px;border:2px solid ;border-radius:50%"></h3>
  
                    </div>
                   </center>
                  <br>
                   <h3 style="text-align: center">{{$setting->school_name}}</h3>
                   <small>
                    <p>Located {{$setting->school_address}} contact us on ({{$setting->school_contact}})</p>
                   </small>
                   <h4 style="text-align: center">Office of the Director of Studies</h4>
                  

                   {{-- <div style="float: ">
                    <h5 >{{$student->student_full_name}}'s Marks</h5>
                  </div> --}}


                  <p style="text-align:right">
                    <strong class="text-danger" style="margin-right: 2%">{{date("Y")}}{{$student->student_id}}</strong>
                   </p> 
                  <div style="text-align:left;">

                    <table style="width:100%;text-align: left;" align="left" border="1" >
                      <tr>
                        <td class="left"><strong>Full Name:</strong></td>
                        <td class="left answer">{{$student->student_full_name}}</td>
                        <td class="left"><strong>Class:</strong></td>
                        <td class="left answer"> {{$student->class_name}}</td>

                        <td class="left"><strong>Gender:</strong></td>
                        <td class="left answer"> {{$student->gender=="f"?"Female":"Male"}}</td>
                      
                       </tr>

                    </table>

                  </div>

                  <br>
            

                   <center style="width: 100%;min-height:0.3in;background-color:rgb(67, 178, 67);color:white;padding-bottom:.1%;padding-top:.1%">
                    <p  style="text-align: center;">END OF TERM RESULTS</p>
                   </center>

                   <br>
                   
                  </div>
                  <!-- /.col -->
                </div>
                
              </center>
             
              <!-- info row -->
              
              <!-- /.row -->

              <!-- Table row -->
              <section class="content">

                
              
                 
          
                 {{-- current term checking --}}
                     
                @php
                    $button_shown = false;
                @endphp
               
                <div class="row">
                  <div class="col-lg-12">
          
                    <div class="card">
                      <div class="card-body">
        
                        <table class="table" style="border:1px solid rgb(45, 146, 79);width:100%">
                          <thead>
          
                            {{-- Defining the exam sets --}}
                            <tr>
                              <td>Subject</td>
                              @foreach ($exam_sets as $exam_set)
                                  <td>
                                    {{$exam_set->exam_set_name}}
                                  </td>
                              @endforeach
                              <td>Final Mark</td>
                              <td>Reward</td>
                              <td>Aggregate</td>
                              <td>Initials</td>
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                $total_aggregates =0;
                              @endphp
                               @foreach ($marks as $mark)
          
                                  
                                  @if ($mark->student_id==$student->student_id&&$mark->current_term_id==4)
                                   
                                  
                                  
                                  <tr>
                                    @php
                                      $final_mark = 0;
                                    
                                     @endphp
                                      <td>{{$mark->subject_name}}</td>
                                      @foreach ($exam_sets as $exam_set)
                                      <td >
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
                                     
                                  <tr>
                                    @php
                                      $final_mark = 0;
                                    
                                     @endphp
                                      <td>{{$mark->subject_name}}</td>
                                      @foreach ($exam_sets as $exam_set)
                                      <td >
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

                                     
                                  <tr>
                                    @php
                                      $final_mark = 0;
                                    
                                     @endphp
                                      <td>{{$mark->subject_name}}</td>
                                      @foreach ($exam_sets as $exam_set)
                                      <td >
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
                                  <tr>
                                    @php
                                      $final_mark = 0;
                                    
                                     @endphp
                                      <td>{{$mark->subject_name}}</td>
                                      @foreach ($exam_sets as $exam_set)
                                      <td >
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
                                  <tr>
                                    @php
                                      $final_mark = 0;
                                    
                                     @endphp
                                      <td>{{$mark->subject_name}}</td>
                                      @foreach ($exam_sets as $exam_set)
                                      <td >
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
          
                        </table>

                        <br>
                        <div style="text-align:left;">
                          <table style="width:100%;text-align: left;" align="left" border="1" >
                            <tr>
                              <td class="left text-success"><strong>Total Aggregates:</strong></td>
                              <td class="left answer">{{ $total_aggregates}}</td>
                              <td class="left text-success"><strong>Grade:</strong></td>
                              <td class="left answer">{{ $total_aggregates}}</td>
                             </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 {{-- end current_term loop --}}
               
                <!-- /.row -->
              </section>
            
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                 
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  
                    {{-- This is to certify that <strong>{{$mark->student_full_name}}</strong> has made the above payment and has been approved by the  <strong>School Administration</strong> . --}}
                  
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">

                    <p class="heading">Class Teachers' Comment</p>
                    <p class="dash"></p>
                    <p class="heading">Head Teacher's Comment</p>
                    <p  class="dash"></p>

                    <br>
                    <br>
                     <p style="text-align: center;color:green"><small>Incase of inquiry bout this report contact <strong>({{$setting->school_contact}})</strong> for more information.</small></p>

                    <blockquote>   <h3 style="text-align: center;color:var(--primary)">"{{$setting->school_motto}}"</h3></blockquote>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- tdis row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>

@endif
                
@endforeach
@break
 {{-- end student loop --}}
@endforeach
{{-- end class loop --}}
</html>

@break
@endforeach
@endisset