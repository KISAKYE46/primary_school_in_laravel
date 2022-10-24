
@extends("layouts.main_layout")
@section("content")
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">



          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Grading <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-grading"><i class="fa fa-plus"></i> New Grading</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <div class="table-responsive">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                          <th>Minimum Marks</th>
                          <th>Maximum Marks</th>
                          <th>Reward</th>
                          <th>Points</th>
                          <th>Level</th>
                          <th>Actions</th>
                          <th></th>
                        </tr>
                    </thead>

                    <tbody>

                      @foreach ($grading as $grade )
                      <tr>
                        <th>{{$grade->from_mark}}</th>
                        <th>{{$grade->to_mark}}</th>
                        <th>{{$grade->reward}}</th>
                        <th>{{$grade->points}}</th>
                        <th>{{$grade->level_name}}</th>
                        <th> <a href="edit_grading?&id={{$grade->grading_id}}"><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button></a></th>
                        <th><button class="btn btn-sm btn-danger delete" data-id="{{$grade->grading_id}}" data-table="grading" data-column="grading_id" data-target="#modal-delete" data-toggle="modal"><i class="fa fa-trash"></i> Delete</button></th>
                     
                      </tr>
                      @endforeach
                     
                  </tbody>


                  <tfoot>
                    <tr>
                      <th>Minimum Marks</th>
                      <th>Maximum Marks</th>
                      <th>Reward</th>
                      <th>Points</th>
                      <th>Level</th>
                      <th>Actions</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
             </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

  