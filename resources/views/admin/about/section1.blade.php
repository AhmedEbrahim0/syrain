

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
                    <form action="/admin/update-about1" method="post">
                        @csrf
                        <input type="text" name="title1" placeholder="title" value="{{$about[0]->title}}" class="w-100">
                        <div class="my-2">
                            <textarea name="text1" class="textarea">{{$about[0]->text}}</textarea>
                        </div>
                        <input type="text" name="title2" placeholder="title" value="{{$about[1]->title}}" class="w-100">
                        <div class="my-2">
                            <textarea name="text2" class="textarea">{{$about[1]->text}}</textarea>
                        </div>
                        <div>
                            <button class="w-100 btn btn-primary">Save Changes</button>
                        </div>
                    </form>

                </div>


			</div>
		</div>

        @include('admin.layouts.footer')
