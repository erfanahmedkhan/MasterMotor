$(document).ready(function(){

   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   var table = $('.datatable').DataTable({
        processing: false,
        serverSide: true,
        pageLength: 50,
        lengthMenu: [50,100, 250, 500],
        "drawCallback": function(settings) {
            var api = this.api();
            var startIndex = api.context[0]._iDisplayStart;
            api.column(0, {order: 'applied'}).nodes().each(function(cell, i) {
               cell.innerHTML = startIndex + i + 1;
            });
        },
        ajax: baseurl() + "getcustomerlisting",
        columns: [
           { data: '#' },
           { data: 'Profile' },
           { data: 'Customer Type' },
           { data: 'Name' },
           { data: 'Email' },
           { data: 'Mobile' },
           { data: 'Reg Date' },
           { data: 'Source' },
           { data: 'City' },
           { data: 'Action' },
        ]
     });

     //new $.fn.dataTable.FixedHeader(table);


    $('.editcustomerpopup').click(function(){
        $("#EditCustomerModal").modal("hide");
    });

});

function getCustomerDetailsForEdit(e)
{
   var id = $(e).attr('data-id');
   
   $.ajax({
      type: 'POST',
      url: baseurl() + 'getCustomerDetailsForEdit',
      data: {id: id},
      success: function(data)
      {
         var obj = JSON.parse(data);
         if(obj != '')
         {
            $("#EditCustomerModal").modal("show");
            console.log(obj);

            $("#id").val(id);
            $("#efname").val(obj[0].name);
            $("#ecustomer_type").val(obj[0].customer_type);
            $("#eemail").val(obj[0].email);
            $("#emobile").val(obj[0].mobile);
            $("#eaddress").val(obj[0].address);
            $("#ecity").val(obj[0].city);
            $("#ecnic").val(obj[0].cnic);
            $("#echannel").val(obj[0].channel);
            $("#efb_url").val(obj[0].fb_url);
            $("#einsta_url").val(obj[0].insta_url);
            
         }
      }
   });
}