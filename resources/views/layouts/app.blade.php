<!DOCTYPE html>
<html lang="en">

@include('partials.head', ['pageTitle' => $pageTitle, 'metaTitle' => $metaTitle])

<body>
    @include('partials.menu')

    <div>
        @yield('content')
    </div>
</body>
</html> 