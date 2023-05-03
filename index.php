<!DOCTYPE html>
<html>
<head>
  <title>Rainbow Text</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">
  <style>
    * {
      font-family: sans-serif;
    }
    .rainbow-text {
      width: fit-content;
      background: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="rainbow-text">Hello everyone!</h1>
  </div>
</body>
</html>
