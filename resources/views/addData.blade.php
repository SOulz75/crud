<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>CRUD LARAVEL</title>
  </head>
  <body>
    <h1 class='text-center'>Add data</h1>
    <br>
    <div class="container">
        <div class ="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <form action={{route('insertData')}} method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="forName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="forName">
                        </div>
                        <div class="mb-3">
                            <label for="forGender">Choose your gender:</label>
                            <select id="forGender" name="gender">
                                <option value="man">Man</option>
                                <option value="woman">Woman</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="forNoPhone" class="form-label">Phone No</label>
                            <input type="text" name="notelephone" class="form-control" id="forNoPhone">
                        </div>
                        <div class="mb-3">
                            <label for="forProfilePicture" class="form-label">Add Profile Picture</label>
                            <input type="file" name="photo" class="form-control" id="forProfilePicure">
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
  </body>
</html>
