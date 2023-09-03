

@include('admin.layouts.sidebar')


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0"> recipes</h2>
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
					
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>Description</th>
                                    <th>image</th>
                                    <th>edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recipes as $recipes)
                                    <tr>
                                        <td>{{$recipes->name}}</td>
                                        <td>{{$recipes->text}}</td>
                                        <td><img src="/{{$recipes->image}}"  style="height:100px;width:100px" alt=""></td>
                                        <td>
                                            <a href="/admin/recipes/{{$recipes->id}}" class="btn btn-primary"> Edit </a>
                                        </td>
                                        <td>
                                            <form action="/admin/delete-recipes" method="post">
                                                @csrf
                                                <input type="text" name="id" hidden value="{{$recipes->id}}">
                                                <button class="btn btn-danger" type="submit">  Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>


			</div>
		</div>

        @include('admin.layouts.footer')
