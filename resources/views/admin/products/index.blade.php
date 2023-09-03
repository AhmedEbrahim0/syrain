

@include('admin.layouts.sidebar')


		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0"> Products</h2>
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
                        <form  action="" method="get" class="my-2" id="form">
                            <select onchange="document.getElementById('form').submit();" name="category_id" style="height: 40px;width: 200px;" >
                                <option value="0" selected > All Categories</option>
                                @foreach($categories as $category )
                                    @if($category->id == $category_id)
                                    <option value="{{$category->id}}" selected > {{$category->name}} </option>
                                    @else
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </form>
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
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->text}}</td>
                                        <td><img src="/{{$product->image}}"  style="height:100px;width:100px" alt=""></td>
                                        <td>
                                            <a href="/admin/products/{{$product->id}}" class="btn btn-primary"> Edit </a>
                                        </td>
                                        <td>
                                            <form action="/admin/delete-product" method="post">
                                                @csrf
                                                <input type="text" name="id" hidden value="{{$product->id}}">
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
