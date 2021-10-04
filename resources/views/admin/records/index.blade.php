<h1>Records</h1>

<ul>
        @foreach ($records  as $key => $record)
            <li>Record {{$key}}: {{$record }} </li>
        @endforeach
</ul>
