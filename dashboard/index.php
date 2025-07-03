<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Ratimdo Utama</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      width: 100%;
      height: 100%;
      overflow: hidden;
      font-family: sans-serif;
    }

    .container {
      display: flex;
      width: 100vw;
      height: 100vh;
    }

    .left,
    .right {
      width: 50vw;
      height: 100vh;
      overflow: hidden;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
      display: block;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="left">
      <iframe src="sawmil/index.php"></iframe>
    </div>
    <div class="right">
      <iframe src="produksi/index.php"></iframe>
    </div>
  </div>

</body>
</html>
