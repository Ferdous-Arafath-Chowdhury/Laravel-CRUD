<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    

    <title>Document</title>

</head>
<body  >
  <div class="bg-dark py-4">
    <div class="h1 text-white">Student Information</div>
  </div>

  <div class="container py-3 ">
   <div class="d-flex justify-content-between">
  <div class="h4">Student List</div>

  <div>
    <a href=" {{route('add')}}"  class="btn btn-primary">Add New</a>
  </div>
 </div>
 {{-- <div  style="text-align: center">
    <label for="">Search</label>
    <input type="text" name="search" id="">
 </div> --}}

 <div id="app"></div>
 <script src="{{ mix('js/app.js') }}"></script>
 <script>
  // Pass the students data from Laravel to the React component
  const students = @json($col);
</script>

 <div class="pt-3">
  {{$col->links()}}
</div> 

 <div class="card py-2">
    <div class="card-body">
      @if(session('success'))
      <div class="alert alert-success mt-4">
          {{ session('success') }}
      </div>
      @endif
        
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                  <th>Class</th>
                <th>Image</th>
                <th>Action</th>
                
            </tr>
            @foreach ($col as $student)
            <tr>
    
             
                  <td>{{ $student->id }}</td>
                  <td>{{ $student->Name }}</td>
                  <td>{{ $student->Address }}</td>
                  <td>{{ $student->Class }}</td>

                  
                   @if($student->Image != "")
                <td><img src="{{ url('/uploads/students/'.$student->Image)}}" alt="" width="80" height="80"></td>
              @else
                <td><img src="{{ url('/public/assets/images/noimg.png')}}" alt="" width="80" height="80">
                
                  <td>
                
              @endif

              <td>
          <a href="{{route('st.edit',$student->id)}}" ><button  class = "btn btn-primary">Update</button></a>
              </td>

              <td>
                <a href="{{route('st.destroy',$student->id)}}" ><button  class = "btn btn-danger">Delete</button></a>
                    </td>

                
                    {{-- <form action="{{ route('st.destroy', $student->id) }}" method="POST">

                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </td>


                  
                 --}}
                    
                 <td>
                  <a href="{{ route('pd.pdf', $student->id) }}" class="btn btn-primary">Generate PDF</a>
              </td>

              
            
                </tr>
                @endforeach
               
          </table>
    </div> 

    <div>
      {{$col->links()}}
    </div> 
  
  </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kpL+kJc9MSlEA6wOw5p4m3Z8QvCGPhgxw2nD8e/dAiUxQOWd4Ib6Xk9JvoRx7OdL" crossorigin="anonymous"></script>
    
</body>
</html> 