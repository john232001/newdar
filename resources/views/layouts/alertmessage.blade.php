@if (Session::has('success'))
  <script>
    swal("{{ Session::get('success')}}", "", 'success',{
      button:true,
      button:"OK",
      timer: 3000,
      dangerMode: true,
    });
  </script>
@elseif (Session::has('error'))
  <script>
    swal("{{ Session::get('error')}}","", 'error',{
      button:true,
      button:"OK",
      timer: 3000,
      dangerMode: true,
    });
  </script>
@endif 