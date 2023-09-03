div

@include('admin.layouts.sidebar')


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0"> About Us </h2>
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
					
                    <form action="/admin/aboutus" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            
                            <div class="col-lg-6 col-sm-12 my-2">
                                <input type="text" name="title1" class="w-100" placeholder="title" value="{{$about[2]->title}}">
                                <div class="my-2">
                                    <textarea name="text1" class="textarea">{{$about[2]->text}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 my-2">
                                <img  id="output_image1" style="height: 150px;width:50%" src="/{{$about[2]->image}}" alt="">

                                <label  for="image1" class="btn btn-primary btn-update1"> Chnage Image</label>
                                <button class="btn btn-danger btn-save1"   style="display: none;  ">Update</button>
                                <input onchange="preview_image1(event)" type="file" name="image1" id="image1" hidden>
                            </div>
                            

                            
                            <div class="col-lg-6 col-sm-12 my-2">
                                <input type="text" name="title2" class="w-100" placeholder="title" value="{{$about[3]->title}}">
                                <div class="my-2">
                                    <textarea name="text2" class="textarea">{{$about[3]->text}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 my-2">
                                <img  id="output_image2" style="height: 150px;width:50%" src="/{{$about[3]->image}}" alt="">

                                <label  for="image2" class="btn btn-primary btn-update2"> Chnage Image</label>
                                <button class="btn btn-danger btn-save2"   style="display: none;  ">Update</button>
                                <input onchange="preview_image2(event)" type="file" name="image2" id="image2" hidden>
                            </div>
                            


                            
                        </div>

                        <div>
                            <button class="btn btn-primary w-100">Save Changes</button>
                        </div>
                    </form>
                        
                </div>
                <script>
                        function preview_image1(event) 
                        {
                          document.querySelector(".btn-update1").style.display="none";
                          document.querySelector(".btn-save1").style.display="inline";
                        var reader = new FileReader();
                        reader.onload = function()
                        {
                        var output = document.getElementById('output_image1');
                        output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                        }
                        function preview_image2(event) 
                        {
                          document.querySelector(".btn-update2").style.display="none";
                          document.querySelector(".btn-save2").style.display="inline";
                        var reader = new FileReader();
                        reader.onload = function()
                        {
                        var output = document.getElementById('output_image2');
                        output.src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                        }


                </script>

			</div>
		</div>

        @include('admin.layouts.footer')
