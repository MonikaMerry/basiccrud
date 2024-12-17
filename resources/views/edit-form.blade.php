<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Basic Crud</title>
</head>

<body>
    <div class="container mt-5 border border-secondary rounded-2">
        <h1>Edit Form</h1>
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
        <form action="{{url('update-data')}}" method="POST" enctype="multipart/form-data" class="mt-5 mb-5">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{$edit_data->id}}">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Enter a name..." required
                    value="{{ $edit_data->name }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Email</label>
                <input type="email" class="form-control" name="user_email" placeholder="Enter a email..." required
                    value="{{ $edit_data->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="user_address" placeholder="Enter a address..." required
                    value="{{ $edit_data->address }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="user_image" required value="{{$edit_data->image}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="number" class="form-control" name="user_phoneno" placeholder="Enter a phone number..."
                    required value="{{$edit_data->phone_number}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">submit</button>
            </div>

        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
