<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

@include('admin/layouts/sidebar')


<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">Message </h2>
				</div>

            <div class=" card-box p-2 ">
                <div style="font-weight:bold;">
                    Message From : {{$contact->name}}
                </div>

                <div>
                    Email  : <a  style="color:blue;" href="mailto:{{$contact->email}}"> {{$contact->email}}  </a> 
                </div>
                <div class="mt-3" style="font-weight:bold;">
                    Message :
                </div>
                <div class="px-3">
                    {{$contact->message}}
                </div>
            </div>


        
			</div>
		</div>
        @include('admin/layouts/footer')

</body>
</html>