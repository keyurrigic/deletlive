@include('template-parts.head')
<div id="wrapper"> 
  <!--- Header -->
  @include('template-parts.header')
  <!--- /Header --> 
@yield('content')

@include('template-parts.footer')