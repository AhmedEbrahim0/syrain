

@include('admin.layouts.sidebar')

<style>
	.textarea{
		width: 100%;
		height: 100px;
	}
</style>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0"> Home Page</h2>
				</div>

                <div class="bg-white p-2">

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

					<form method="post" enctype="multipart/form-data" action="/admin/home-map">
						@csrf
						<div>
							<label for="image" class="btn btn-primary btn-update"> Change Image  </label>
							<button class="btn btn-danger btn-save" type="submit" style="display: none;"> Save Changes</button>
							<input hidden onchange="preview_image(event)"  name="image" type="file" id="image">
						</div>
						<div>
							<img id="output_image" style="height: 200px; width:200px" src="/{{$background->image}}" alt="">
						</div>


						<div>
							<button type="submit" class="btn btn-primary w-100"> Save Changes </button>
						</div>
						
					</form>

                </div>

                <script>
                        function preview_image(event) 
                        {
                          document.querySelector(".btn-update").style.display="none";
                          document.querySelector(".btn-save").style.display="block";
                        var reader = new FileReader();
                        reader.onload = function()
                        {
                        var output = document.getElementById('output_image');
                        output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                        }


                </script>


			</div>
		</div>

        @include('admin.layouts.footer')
