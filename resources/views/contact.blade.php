@extends("layouts.app")

@section("content")

    <h2>Contact Page</h2>
     <ul>
        @if (count($people)) 
        
            @foreach($people as $person)
              <li>{{$person}}</li>
            
            @endforeach
      
        @endif
        </ul>
@endsection

@section("footer")

<h3 class="footer">Footer section</h3>

@stop