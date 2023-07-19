<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    @include('admin.include.head')
    
</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('admin.include.header')

@include('admin.include.sidebar')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('admin.include.footer')

<script>
    $(document).ready(function () {
  // form repeater jquery
  $('.file-repeater, .contact-repeater, .repeater-default').repeater({
    show: function () {
      $(this).slideDown();
    },
    hide: function (deleteElement) {
      if (confirm('Are you sure you want to delete this element?')) {
        $(this).slideUp(deleteElement);
      }
    }
  });

});
  </script> 
</body>
</html>
