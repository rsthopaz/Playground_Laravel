<div @class([
'my-css-class',
'indonesia' => $country === 'id'
])
@style([
'color: green'
])
>
    <!-- We must ship. - Taylor Otwell -->
     <p>My name is {{ $name }} {{$surname}} </p>
     
</div>

@include('shared.button', ['color' => 'brown', 'text' => 'Submit'])
