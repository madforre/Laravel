<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>템플릿 테스트</title>
  </head>
  <body>
  <div class="container">
      <header> @include('layout.header') </header>
      <div class="sidebar"> @include('layout.sidebar') </div>
      <div class="contents"> $yield('content') </div>
      <footer> @include('layout.footer') </footer>
  </div>
  </body>
</html>
