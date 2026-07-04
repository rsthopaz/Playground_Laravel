<script>
    const hobbies = {{Illuminate\Support\Js::from($hobbies)}}
</script>


<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
     <p>Hello from {{$name}} {{$surname}}</p>
     <p>{{ Illuminate\Foundation\Application::VERSION}}</p>
     <p>{!! $job !!}</p>
     @foreach($hobbies as $hobby)
        <p>{{ $hobby }}</p>
     @endforeach
</div>

