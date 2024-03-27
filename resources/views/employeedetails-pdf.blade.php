<!DOCTYPE html>
<html>
<head>
<style>
#employeesDetails {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#employeesDetails td, #employeesDetails th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employeesDetails tr:nth-child(even){background-color: #f2f2f2;}

#employeesDetails tr:hover {background-color: #ddd;}

#employeesDetails th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Employees Details</h1>

<table id="employeesDetails">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Phone No</th>
        <th>Day Created</th>
    </tr>
    @php $i=1; @endphp
    @foreach ($data as $row)
    <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{  $row->name  }}</td>
        <td>{{  $row->gender    }}</td>
        <td>{{  $row->notelephone   }}</td>
        <td>{{  $row->created_at->format('D M Y') }}</td>
        {{-- <td>
            <img src="{{ asset('/photoEmployees/'.$row->photo) }}" alt="{{  $row->photo   }}" style="width: 40px;">
        </td> --}}
    </tr>
    @endforeach
</table>
</body>
</html>
