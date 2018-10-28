function post_maro(receipt)
{
  event.preventDefault();
  $.ajax({
      url: '{{ route('maropost.post') }}',
      type: 'POST',
      data: {receipt : receipt},
      dataType: 'text',

      success: function( data ) {
          console.log(data);

      }       
  })


  // $('#student_form').on('submit', function(event){
  //   event.preventDefault();
  //   var form_data = $(this).serialize();
    
  //   $.ajax({
  //       url:"{{ route('ajaxdata.postdata') }}",
  //       method:"POST",
  //       data:form_data,
  //       dataType:"json",
  //       success:function(data)
  //       {
  //           if(data.error.length > 0)
  //           {
  //               var error_html = '';
  //               for(var count = 0; count < data.error.length; count++)
  //               {
  //                   error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
  //               }
  //               $('#form_output').html(error_html);
  //           }
  //           else
  //           {
  //               $('#form_output').html(data.success);
  //               $('#student_form')[0].reset();
  //               $('#action').val('Add');
  //               $('.modal-title').text('Add Data');
  //               $('#button_action').val('insert');
  //               $('#student_table').DataTable().ajax.reload();
  //           }
  //       }
  //   })

}