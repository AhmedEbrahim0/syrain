

@include('admin.layouts.sidebar')

<style>
    select{
    width: 100%;
    height: 50px;
    color: black;
    font-weight: bold;
    border: 0.5px solid gray;
    
    }
</style>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0"> Add Product</h2>
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

                    <form action="/admin/add-product" enctype="multipart/form-data" method="post">
                        @csrf
                        <div>
                            <textarea class="textarea" name="name" placeholder="Product Name"></textarea>
                        </div>
                        <div>
                            <textarea class="textarea" name="text" placeholder="Description "></textarea>
                        </div>
                        <div class="my-2">
                            <select name="category_id" >
                                <option value="0" selected disabled> Category </option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="image" class="btn btn-primary"> Upload Image </label>
                            <input onchange="preview_image(event)" type="file" id="image" name="image" hidden>
                            <img  id="output_image" style="height: 150px; width:150px"  alt="">
                        </div>
                        <div>
                            <button class="btn btn-primary w-100">Add </button>
                        </div>
                    </form>
					

                </div>
                <script>
                        function preview_image(event) 
                        {

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
