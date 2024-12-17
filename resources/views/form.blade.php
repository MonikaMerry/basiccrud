<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Basic Crud</title>
</head>
<body>
    <div class="container mt-5 border border-secondary rounded-2" >
         {{-- validation alert --}}
         @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
        <form action="{{url('post-data')}}" method="POST" enctype="multipart/form-data" class="mt-5 mb-5">
            @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="user_name" placeholder="Enter a name..." required  value="{{old('user_name')}}">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Email</label>
            <input type="email" class="form-control" name="user_email" placeholder="Enter a email..." required  value="{{old('user_email')}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="user_address" placeholder="Enter a address..." required  value="{{old('user_address')}}">
          </div>
          <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="user_image" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="number" class="form-control" name="user_phoneno"  placeholder="Enter a phone number..." required  value="{{old('user_phoneno')}}">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit">submit</button>
          </div>

        </form>
    </div>

    @if (Session::has('created'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{Session::get('created')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
    
        @if (Session::has('updated'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{Session::get('updated')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (Session::has('deleted'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{Session::get('deleted')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <table class="table table-bordered mt-4">
            <thead class="text-center table-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class=" text-center" style="vertical-align: middle;">
                @foreach ($getdata as $key =>$data)
                    
                <tr>
                          
                        <td>{{$key+1}}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->address }}</td>
                        <td>
                           
                            @if ($data->image)
                                <img src="{{ asset('images/'.$data->image) }}" alt="" height="100px"
                                    width="100px">
                            @endif

                        </td>
                        <td>{{ $data->phone_number }}</td>
                        <td>
                            <a href="{{ url('edit-data') }}/{{$data->id}}"
                                class="btn btn-warning mb-3">Edit</a><br>
                                    <a href="{{ url('delete-data') }}/{{$data->id}}"
                                        class="btn btn-danger">Delete</a>
                               
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>