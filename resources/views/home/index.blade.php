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

@php
$cars = [1, 2, 3, 4, 5];
@endphp

@foreach($cars as $car)
    @include('car.view', ['car' => $car])
@endforeach

@each('car.view', $cars, 'car')

