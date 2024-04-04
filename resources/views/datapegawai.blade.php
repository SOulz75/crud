@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Pegawai</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pegawai</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content-main">
        <div class="container-fluid">
            <div class="mb-3">
                <form action="/pegawai" method="GET" enctype="multipart/form-data">
                    <label for="searchData" class="form-label">Search by name : <input type="search" class="form-control" name="search"></label>
                </form>
                <a href="/addData" type="button" class="btn btn-success" > Add Item + </a>
                <a href="/exportPDF" type="button" class="btn btn-info" > Export PDF </a>
                <a href="/exportExcel" type="button" class="btn btn-primary" > Export Excel </a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">No Phone</th>
                        <th scope="col">Profile Picture</th>
                        <th scope="col">Created On</th>
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
                        <td>{{  $row->name  }}</td>
                        <td>{{  $row->gender    }}</td>
                        <td>{{  $row->notelephone   }}</td>
                        <td>
                            <img src="{{ asset('/photoEmployees/'.$row->photo) }}" alt="{{  $row->photo   }}" style="width: 40px;">
                        </td>
                        <td>{{  $row->created_at->format('D M Y') }}</td>
                        <td>
                            <a href="/showDataEmployee/{{ $row->id  }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-name="{{ $row->name }}">Delete </a>
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


      <!-- /.content-header -->

@endsection
