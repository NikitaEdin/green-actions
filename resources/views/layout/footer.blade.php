<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Footer</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <style>
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      margin-bottom: 60px; 
    }
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 60px; 
      line-height: 60px; 
      background-color: var(--green-accent);
    }
  </style>
</head>
<body>
  

  <!-- Footer -->
  <footer class="footer">
        <div class="container d-flex justify-content-center">
            <a style="color:white;" class="mx-4" href="{{ route('privacy') }}">Privacy Policy</a>
            <a style="color:white;" class="mx-4" href="{{ route('terms') }}">Terms and Conditions</a>
            <a href="{{ route('sub') }}" style="color:white;" class="mx-4" href="#">Pricing</a>
        </div>
   

  </footer>

  <!-- Bootstrap JS (optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
