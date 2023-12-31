<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body >
<div class=" container bg-light">
    <div class="h3 pt-2" style="text-align: center; font-weight;bolder">Add New Student</div>
</div>
</div>
  <div class="container bg-dark text-white  pb-5"  >
    <form class="row g-3 px-4" style="margin-top:13px" method="POST" enctype="multipart/form-data" action="{{route('save_data')}}">
    @csrf
      <div class="col-md-6">
          <label for="" class="form-label">Name</label>
          <input required  type="text" class="form-control" id="" name="Name">
        </div>
        <div class="col-md-6">
          <label for="" class="form-label">Email</label>
          <input type="email" name="Email" class="form-control" id="">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" name="Address" id="inputAddress" placeholder="1234 Main St">
        </div>
        {{-- <div class="col-12">
          <label for="inputAddress2" class="form-label">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div> --}}
        {{-- <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity">
        </div> --}}
        <div class="col-md-4">
          <label for="inputState" class="form-label"   >Class</label>
          <select id="inputState" class="form-select"  name="Class">
            <option selected>Choose...</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
           
          </select>
        </div>
        <div class="col-md-2"  style="margin-top:50px;  margin-left:70px;">
          <input type="file" id="imageUpload" name="image">
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Add Student</button>
        </div>
      </form>

      
      
  </div>
</body>
</html>