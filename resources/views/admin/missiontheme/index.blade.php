@endsection
@section('js')
<!-- DataTables -->
<script type='text/javascript'>

$(function() {
  $('#example1').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: "{!! route($route."ajaxData") !!}",

      columns: [
          {data: 'id', name: 'id' },
          {data: 'name', name: 'name' },
          { data: 'image', name: 'image',
            render: function( data, type, full, meta ) {
              return "<img src=\"{{url(asset('public/uploads/portfolio'))}}/" + data + "\" height=\"50\"/>";
            }
          },
          {data: 'description', name: 'description' },
          {data: 'action', name: 'action', searchable: false, orderable : false,className : 'text-center'},
      ]
  });
});

function deleteUser(url) {
  if(confirm("Do you really want to delete this {{$title}} ?"))
    window.location.href= url;
  else
    return false;
}
</script>
@endsection 
