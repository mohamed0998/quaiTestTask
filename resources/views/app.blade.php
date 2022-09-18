<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/js/app.js')
</head>


<body class="antialiased">
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
     
        <img
          src="https://www.quaidesbalises.fr/images/logos/logo.svg"
          height="90"
          alt="Logo"
          style="margin-top: 25px;"
        />
    </div>
  </nav>

    <div id="app">
    </div>
</body>

</html>
