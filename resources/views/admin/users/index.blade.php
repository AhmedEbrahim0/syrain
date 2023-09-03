<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Users </title>
</head>
<body>

@include('admin.layouts.sidebar')


<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">All Users </h2>
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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> Name </th>
                        <th> Email </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        
			</div>
		</div>
        @include('admin.layouts.footer')

</body>
</html>