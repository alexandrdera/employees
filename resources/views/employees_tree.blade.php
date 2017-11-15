<html>
    <body>
    @foreach($tree as $branch)
        <p>
        CEO: {{ $branch->lvl_1 }} | 
        CEO: {{ $branch->lvl_2 }} | 
        CEO: {{ $branch->lvl_3 }} | 
        CEO: {{ $branch->lvl_4 }} | 
        CEO: {{ $branch->lvl_5 }} | 
        CEO: {{ $branch->lvl_6 }} | 
        CEO: {{ $branch->lvl_7 }} | 
        </p>
    @endforeach
    </body>
</html>