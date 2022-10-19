@foreach ($dataItem as $value)
    <option value="{{ $value->xaid }}"> {{ $value->name }}</option>
@endforeach
