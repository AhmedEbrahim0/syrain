<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New User </title>
</head>
<body>

@include('admin.layouts.sidebar')


<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">Create New User </h2>
				</div>

        <div class=" card-box p-2 ">
            @if(Session::has('success'))
				<p  style="background: green; color:white;padding: 10px;">{{ Session::get('success') }}</p>
        	@endif
            @if(Session::has('error'))
				<p  style="background: red; color:white;padding: 10px;">{{ Session::get('error') }}</p>
        	@endif
			@if($errors->any())
				@foreach ($errors->all() as $error)
					<div style="background-color: red; color:white; margin: 10px 0;padding: 10px;"> {{$error}}</div>
				@endforeach
			@endif
            <form action="/admin/create-user" method="post">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Name </label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label"> Email</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder=" Email ">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label"> Password</label>
                    <input type="password" name="password" class="form-control" id="formGroupExampleInput3" placeholder=" Password">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label">Confirmation Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="formGroupExampleInput3" placeholder="Confirmation Password ">
                </div>
                <div>
                    <button class="btn btn-primary" > Save </button>
                </div>
            </form>
        </div>
        
        
        
    </div>
</div>
@include('admin.layouts.footer')

</body>
</html>