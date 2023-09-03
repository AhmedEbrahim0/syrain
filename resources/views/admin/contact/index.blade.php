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
					<h2 class="h3 mb-0">Messages </h2>
				</div>

        @foreach($contacts as $contact)
        @if($contact->read==0)
        <a  href="/admin/contact/{{$contact->id}}">

          <div class=" card-box p-2 my-1 " style="background: #a50505; color:white;cursor: pointer;">
            <div style="font-size: 20px;">
              {{$contact->name}}
            </div>
            <div style="color:gray;">
              {{$contact->subject}}
            </div>
          </div>
        </a>
        @else
        <a  href="/admin/contact/{{$contact->id}}">

          <div class=" card-box p-2 my-1 " style="background: green; color:white;cursor: pointer;">
            <div style="font-size: 20px;">
              {{$contact->name}}
            </div>
            <div style="color:gray;">
              {{$contact->subject}}
            </div>
          </div>
          </a>
        @endif
        @endforeach


        
			</div>
		</div>
    @include('admin/layouts/footer')

</body>
</html>