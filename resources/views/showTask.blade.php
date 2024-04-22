@extends('layouts.admin')

@section('content')

    <h1 class='text-center'>Edit</h1>
    <br>
    <div class="container">
        <div class ="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <form action="/updateTask/{{ $data->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="taskTitle" class="form-label">Task Title</label>
                            <input type="text" name="taskTitle" class="form-control" id="taskTitle" value={{ $data->taskTitle }} >
                        </div>
                        <div class="mb-3">
                            <label for="forTaskType">Type</label>
                            <select id="forTaskType" name="taskType">
                                <option selected>{{ $data->taskType }}</option>
                                <option value="System Update (SU)">System Update</option>
                                <option value="System Maintenance (SM)">System Maintenance</option>
                                <option value="System Debug (SD)">System Debug</option>
                                <option value="System Revamp (SR)">System Revamp</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="forTaskRemarks" class="form-label">Remarks</label>
                            <input type="textarea" name="taskRemarks" class="form-control" id="forTaskRemarks" value={{ $data->taskRemarks }}>
                            @error('taskRemarks')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date Start:</label>
                            <div class="input-group date" id="taskDate" data-target-input="nearest">
                                <input type="text" name="taskTimeStart"class="form-control datetimepicker-input" data-target="#taskDate" value= {{ $data->taskTimeStart }}  />
                                <div class="input-group-append" data-target="#taskDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date End:</label>
                            <div class="input-group date" id="taskDate" data-target-input="nearest">
                                <input type="text" name="taskTimeEnd" class="form-control datetimepicker-input" data-target="#taskDate"  value={{ $data->taskTimeEnd }} />
                                <div class="input-group-append" data-target="#taskDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="forTaskDesignation">Employee In-Charge:</label>
                            <select id="forTaskDesignation" name="taskDesignation" value={{ $data->taskDesignation }}>
                                @foreach($emp as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
@endsection


@section('script')

@endsection
