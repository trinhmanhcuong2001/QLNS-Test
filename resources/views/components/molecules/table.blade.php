<table class="{{$attributes['class']}}">
    <x-atoms.thead :columns="$columns" :content="$content" />
    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $data)
                    <x-atoms.td :data="$data" />
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>