hiiii
@isset($data)
@foreach ($data as $key => $value)

* {{ $key }} : {{ $value }}

@endforeach
@endisset

@isset($errors)
@foreach ($errors as $key => $value)

* {{ $key }} : {{ $value }}

@endforeach

@endisset