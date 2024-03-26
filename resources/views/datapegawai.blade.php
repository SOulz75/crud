<!--From New Branch-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD LARAVEL</title>
  </head>
  <body>
    <h1 class='text-center'>Data Pegawai</h1>
    <br>
    <div class="container">
        <a href="/addData" type="button" class="btn btn-success" >Add Item +</a>
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
                @foreach ($data as $row)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{  $row->name  }}</td>
                    <td>{{  $row->gender    }}</td>
                    <td>{{  $row->notelephone   }}</td>
                    <td>
                        <img src="{{ asset('/photoEmployees/'.$row->photo) }}" alt="{{  $row->photo   }}" style="width: 40px;">
                    </td>
                    <td>{{  $row->created_at->format('D M Y') }}</td>
                    <td>
                        <a href="/showDataEmployee/{{ $row->id  }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete </a>
                        <!--<a href="/deleteDataEmployee/{{-- $row->id --}}" class="btn btn-danger">Delete </a>-->
                    </td>
                  </tr>
                </tbody>

                @endforeach

              </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

  </body>
  <script>
    $('.delete').click(function(){
        var empID = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover "+empID+" detail employee!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/deleteDataEmployee/"+empID+"";
            swal("Data has been deleted!", {
            icon: "success",
            });
        } else {
            swal("Your imaginary file is safe!");
        }
    });
    })
</script>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif


</script>

</html>
