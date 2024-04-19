@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List of Task</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List of Task</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content-main">
        <div class="container-fluid">
            <div class="mb-3">
                <form action="/taskData" method="GET" enctype="multipart/form-data">
                    <label for="searchTask" class="form-label">Search by title: <input type="search" class="form-control" name="search"></label>
                </form>
                <a href="/addTask" type="button" class="btn btn-success" > Add Task + </a>
                {{-- <a href="/exportPDF" type="button" class="btn btn-info" > Export PDF </a>
                <a href="/exportExcel" type="button" class="btn btn-primary" > Export Excel </a> --}}
            </div>
            <div class ="row">
            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{  $message  }}
                </div>
            @endif --}}
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Details</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Task Start</th>
                        <th scope="col">Task End</th>
                        <th scope="col">Person In-Charge</th>
                        <th scope="col">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($data as  $index=> $row)
                    <tr>
                        <th scope="row">{{ $index  + $data->firstItem()}}</th>
                        <td>{{  $row->taskTitle  }}</td>
                        <td>{{  $row->taskType    }}</td>
                        <td>{{  $row->taskRemarks   }}</td>
                        <td>{{  $row->taskTimeStart  }}</td>
                        <td>{{ $row->taskTimeEnd }}</td>
                        <td>{{  $row->taskDesignation   }}</td>
                        <td>
                            <a href="/showTaskDetails/{{ $row->id  }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->taskTitle }}">Delete </a>
                            <!--<a href="/deleteDataEmployee/{{-- $row->id --}}" class="btn btn-danger">Delete </a>-->
                        </td>
                      </tr>
                    </tbody>

                    @endforeach

                  </table>
                  {{ $data->links() }}
                </div>
        </div>
    </div>
@endsection

@section('script')
<script>
  $('.delete').click(function(){
        console.log('masuk ka juga?');
    //   var empId = $(this.attr('data-id'));
    //   var empName = $(this.attr('data-name'));
      var taskID = $(this).attr('data-id');
      var taskTitle = $(this).attr('data-name');
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this "+ taskID +" task!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              window.location = "/deleteTaskDetails/"+ taskID +""
              swal("Poof! " + taskTitle +" file has been deleted!", {
              icon: "success",
          });
          } else {
              swal("Deletion aborted!");
          }
      })
  });
</script>

{{-- Toaster --}}
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>

@endsection
