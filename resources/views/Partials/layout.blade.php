<!DOCTYPE html>
<html>
@include("Partials.header")
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include("Partials.mainheader")
  @include("Partials.sidebar")

  @yield("content")

  @include("Partials.footer")

  @include("Partials.additionalsidebar")

@include("Partials.scripts")
</body>
</html>

