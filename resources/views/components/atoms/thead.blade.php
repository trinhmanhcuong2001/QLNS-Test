<thead :content="$content">
    <tr>
        @foreach ($columns as $column)
            <x-atoms.th :text="$column" />
        @endforeach
    </tr>
</thead>