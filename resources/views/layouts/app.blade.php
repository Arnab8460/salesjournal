<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sales & Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('sales.index') }}">SalesApp</a>
    <div>
      <a class="btn btn-sm btn-outline-light" href="{{ route('sales.index') }}">Sales</a>
      <a class="btn btn-sm btn-outline-light" href="{{ route('journal.index') }}">Journal</a>
    </div>
  </div>
</nav>

<div class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
