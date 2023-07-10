(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/

        // $(document).ready(function() {
        //     $('.example').DataTable( {
        //         fixedHeader: true,
        //         dom: 'Bfrtip',
        //         buttons: [
        //             {
        //                 extend:    'excelHtml5',
        //                 text:      '<i class="fa fa-file-excel-o"> Excel</i>',
        //                 titleAttr: 'Excel'
        //             }
        //         ]
        //     } );
        // } );

      $(document).ready(function () {

        //  $('.example thead th').each(function() {
        //     var title = $(this).text();
        //     if (title === 'Action') {
        //             return NULL;
        //         } else {
        //     $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        //     }
        // });
    //$('.example').DataTable();
    //$('.example thead tr').clone(true).addClass('filters').appendTo('.example thead');

     $('.example').DataTable({
        filter: true,
        responsive: true,


        // dom: 'Bfrtip',
        // buttons: [
        //     {
        //         extend:    'excelHtml5',
        //         text:      '<i class="fa fa-file-excel"> Excel</i>',
        //         titleAttr: 'Excel'
        //     }
        // ]

    });





});
    // Setup - add a text input to each footer cell

})(jQuery);;
