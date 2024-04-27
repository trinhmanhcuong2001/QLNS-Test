<select name="{{$name}}" id="{{$id}}" class="form-control" onchange="{{$onchange}}" {{$multiple}}>
    <option value="">{{ $placeholder }}</option>
    @foreach ($options as $option)
        <option value="{{$option[$value]}}">{{$option[$label]}}</option>
    @endforeach
</select>