<html>
    <body>
    @foreach($tree as $branch)
        <p>
        CEO: {{ $branch['foo'] }} | 
        </p>
    @endforeach
    </body>
</html>