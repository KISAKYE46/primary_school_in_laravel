
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <form class="card" action="edit_grading_action" method="post">
            @csrf
            <div class="card-header">
              <h3 class="card-title">Make Grading Changes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @foreach ($grading as $grade)
                <div class="row">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Study Level</label>
                            <select class="form-control" name="level_id" required>
                                <option value="{{$grade->level}}">{{$grade->level_name}}</option>
                                @php
                                    $current_level = $grade->level;
                                @endphp
                                @isset($levels)
                                 @foreach ($levels as $level)
                                 @if ($level->level_id!=$current_level)
                                   <option value="{{$level->level_id}}">{{$level->level_name}}</option>
                                 @endif
                                   @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Minimum Marks</label>
                            <input required type="number" value="{{$grade->from_mark}}" name="from_marks" class="form-control" placeholder="Minimum Marks..">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Maximum Marks</label>
                            <input required type="number" value="{{$grade->to_mark}}" name="to_marks"  class="form-control" placeholder="Maximum Marks..">
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Points</label>
                            <input required value="{{$grade->points}}" type="number" name="points" class="form-control" placeholder="Points Earned">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Reward</label>
                            <input required type="text" value="{{$grade->reward}}" name="reward"  class="form-control" placeholder="Grading Reward..">
                        </div>
                    </div>

                   
                </div>
                @endforeach

            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <div class="row float-right">
                    <a href="grading" class="mr-2"><button type="button" class="btn-sm btn-default btn ">Back</button></a>  <button class="btn-sm btn-success btn " value="{{$grade->grading_id}}" name="id">Save Changes</button>

                </div>
               
            </div>
        </form>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection