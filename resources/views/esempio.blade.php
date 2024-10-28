<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body>
    <h1>{{$title}}</h1>
    {{--commento di Blade--}}

    @if($someValue === null)
    <p>$someValue è null</p>

    @elseif($someValue === 'qualcosa')
    <p>$someValue è uguale a "qualcosa"</p>

    @else
    <p>$someValue ha un altro valore</p>

    @endif

    <hr>

    @isset($items)
    <h2>lista degli elementi</h2>
    <ul>
        @foreach($items as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
    @endisset

    @empty($emptyArray)
    <p>L'Array è vuoto</p>
    @else
    <p>L'array NON è vuoto</p>
    @endempty
<hr>
    <h2>numeri</h2>
        <ul>
            @for($i =0; $i < count ($numbers); $i++)
            <li>{{$numbers[$i]}}</li>
            @endfor
        </ul>
</body>
</html>