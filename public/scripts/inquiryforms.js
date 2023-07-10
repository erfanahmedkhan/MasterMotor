$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#inquiryBtn").click(function () {
        if ($("#Inquiry").hasClass('show')) {
            $('#inquiry_type').removeAttr("required");
            $('#inquiry_dealerships').removeAttr("required");
            $('#inquiry_details').removeAttr("required");
            $('#interested_vehicles').removeAttr("required");
            $('#inquiry_type').removeAttr("required");
            $('#inquiry_source').removeAttr("required");
            $('#selectBox').removeAttr("required");
            $("#submitBtn").show();
        } else {
            $('#inquiry_type').attr("required", "true");
            $('#inquiry_dealerships').attr("required", "true");
            $('#inquiry_details').attr("required", "true");
            $('#interested_vehicles').attr("required", "true");
            $('#inquiry_type').attr("required", "true");
            $('#inquiry_source').attr("required", "true");
            $('#selectBox').attr("required", "true");
            $("#submitBtn").show();
        }
    });

    $("#complainBtn").click(function () {
        if ($("#Complain").hasClass('show')) {
            $('#customer_vehicle').removeAttr("required");
            $('#complain_cpt_type').removeAttr("required");
            $('#complain_dealership').removeAttr("required");
            $('#complain_voc').removeAttr("required");
            $("#submitBtn").show();
        } else {
            $('#customer_vehicle').attr("required", "true");
            $('#complain_cpt_type').attr("required", "true");
            $('#complain_dealership').attr("required", "true");
            $('#complain_voc').attr("required", "true");
            $("#submitBtn").show();
        }
    });

    $("select#inquiry_type").change(function () {
        var selectedData = $(this).children("option:selected").val();
        if (selectedData == 'Sale') {
            $("#interested_vehicles").removeAttr("required");
        }
        if (selectedData == 'After Sale') {
            $("#interested_vehicles").removeAttr("required");
        }
        // alert(selectedData);
    });

    $("#mobile").blur(function () {
        var number = $("#mobile").val();
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getcustomerforinquiry',
            data: { number: number },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj != null || obj != '') {
                    if (obj.length > 0) {
                        $("#customername").val(obj[0].name);
                        $("#email").val(obj[0].email);
                        $("#city").val(obj[0].cityid);
                        Getcity(obj[0].cityid);
                    }
                    else {
                        $("#customername").val('');
                        $("#email").val('');
                        $("#city").val(0);
                    }
                }
                else if (number == '') {
                    $("#customername").val('');
                    $("#email").val('');
                    $("#city").val(0);
                }
                else {
                    $("#customername").val('');
                    $("#email").val('');
                    $("#city").val(0);
                }
            }
        });
    });



    var url = $(location).attr('href');
    url = url.split('/');
    var customerid = parseInt(url[6]);
    if (url[6] == customerid) {
        var cityid = $("#city").val();
        Getcity(cityid);
    }
    // sales_pbo
    $("#sales_pbo").blur(function () {
        var pbo = $("#sales_pbo").val();
        // alert(pbo);
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var saleorderno = obj.result[0].saleorderno;
                    var chassisno = obj.result[0].chassisno;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#sales_so_number").val(saleorderno);
                    $("#sales_chassis").val(chassisno);
                    $("#sales_vehicle").val(vehicle);
                    $("#sales_vehicle_colour").val(colour);
                    $("#sales_inquiry_dealership").val(dealercode);
                    if ($("#sales_so_number").val(saleorderno) != null) {
                        $("#sales_so_number").prop("readonly", true);
                        $("#sales_so_number").removeClass("bg-white");
                        $("#sales_inquiry_dealership").val(dealercode).focus();
                    }
                    else {
                        $("#sales_so_number").val('').prop("readonly", false);
                    }
                } else {
                    alert('No Record Found Against This PBO');
                    // $("#sales_pbo").val('');
                    $("#sales_so_number").val('').prop("readonly", false);
                    $("#sales_chassis").val('');
                    $("#sales_vehicle").val('');
                    $("#sales_vehicle_colour").val('');
                    $("#sales_inquiry_dealership").val('');
                }
            }
        });
    });

    // sales_so_number
    $("#sales_so_number").blur(function () {
        var pbo = $("#sales_pbo").val();
        var so = $("#sales_so_number").val();
        // alert(so);
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo,
                saleorderno: so
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var pbono = obj.result[0].pbono;
                    var chassisno = obj.result[0].chassisno;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#sales_pbo").val(pbono);
                    $("#sales_chassis").val(chassisno);
                    $("#sales_inquiry_dealership").val(dealercode);
                    $("#sales_vehicle").val(vehicle);
                    $("#sales_vehicle_colour").val(colour);
                    if ($("#sales_pbo").val(pbono) != null) {
                        $("#sales_so_number").prop("readonly", true);
                        $("#sales_so_number").removeClass("bg-white");
                        $("#sales_inquiry_dealership").val(dealercode).focus();
                    }

                } else {
                    $("#sales_chassis").val('');
                    $("#sales_inquiry_dealership").val('');
                    $("#sales_vehicle").val('');
                    $("#sales_vehicle_colour").val('');
                    $("#sales_so_number").val('');
                }
            }
        });
    });

    // general_pbo
    $("#general_pbo").blur(function () {
        var pbo = $("#general_pbo").val();
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo
            },
            success: function (data) {
                var obj = JSON.parse(data);

                if (obj.result != null && obj.result !== '') {
                    var dealercode = obj.result[0].dealercode;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    $("#general_inquiry_dealership").val(dealercode);
                    $("#general_vehicle").val(vehicle);
                    $("#general_vehicle_colour").val(colour);
                } else {
                    alert('No Record Found Against This PBO');
                    $("#general_inquiry_dealership").val('');
                    $("#general_vehicle").val('');
                    $("#general_vehicle_colour").val('');

                }
            }
        });
    });

    // afs_pbo
    // $("#afs_pbo").blur(function () {
    //     var pbo = $("#afs_pbo").val();
    //     var so = $("#afs_so_number").val();
    //     $.ajax({
    //         type: 'POST',
    //         url: baseurl() + 'getpboforinquiry',
    //         data: {
    //             pbonumber: pbo,
    //             saleorderno: so
    //         },
    //         success: function (data) {
    //             var obj = JSON.parse(data);

    //             if (obj.result != null && obj.result !== '') {

    //                 var vehicle = obj.result[0].itemname;
    //                 var colour = obj.result[0].color;
    //                 var chassis = obj.result[0].chassisno;
    //                 var dealercode = obj.result[0].dealercode;
    //                 var saleorderno = obj.result[0].saleorderno;
    //                 $("#afs_so_number").val(saleorderno);
    //                 $("#afs_inquiry_dealership").val(dealercode);
    //                 $("#afs_vehicle").val(vehicle);
    //                 $("#afs_vehicle_colour").val(colour);
    //                 $("#afs_chassis").val(chassis);

    //                 if ($("#afs_so_number").val(saleorderno) != null) {
    //                     $("#afs_so_number").prop("readonly", true).removeClass("bg-white");
    //                     $("#afs_pbo").prop("readonly", true).removeClass("bg-white");
    //                     $("#afs_inquiry_dealership").val(dealercode).focus();
    //                 }
    //                 else {
    //                     $("#afs_so_number").val('').prop("readonly", false);
    //                 }
    //             } else {
    //                 $("#afs_so_number").val('').prop("readonly", false);
    //                 $("#afs_inquiry_dealership").val('');
    //                 $("#feedback_vehicle").val('');
    //                 $("#feedback_vehicle_colour").val('');
    //                 $("#feedback_chassis").val('');
    //             }
    //         }
    //     });
    // });

    $("#afs_pbo").blur(function () {
        var pbo = $("#afs_pbo").val();
        // alert(pbo);
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var saleorderno = obj.result[0].saleorderno;
                    var chassisno = obj.result[0].chassisno;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#afs_so_number").val(saleorderno);
                    $("#afs_chassis").val(chassisno);
                    $("#afs_vehicle").val(vehicle);
                    $("#afs_vehicle_colour").val(colour);
                    $("#afs_inquiry_dealership").val(dealercode);
                    if ($("#afs_so_number").val(saleorderno) != null) {
                        $("#afs_so_number").prop("readonly", true);
                        $("#afs_so_number").removeClass("bg-white");
                        $("#afs_inquiry_dealership").val(dealercode).focus();
                    }
                    else {
                        $("#afs_so_number").val('').prop("readonly", false);
                    }
                } else {
                    alert('No Record Found Against This PBO');
                    // $("#afs_pbo").val('');
                    $("#afs_so_number").val('').prop("readonly", false);
                    $("#afs_chassis").val('');
                    $("#afs_vehicle").val('');
                    $("#afs_vehicle_colour").val('');
                    $("#afs_inquiry_dealership").val('');
                }
            }
        });
    });

    // afs_so_number
    // $("#afs_so_number").blur(function () {
    //     var pbo = $("#afs_pbo").val();
    //     var so = $("#afs_so_number").val();
    //     alert(so);
    //     $.ajax({
    //         type: 'POST',
    //         url: baseurl() + 'getpboforinquiry',
    //         data: {
    //             pbonumber: pbo,
    //             saleorderno: so
    //         },
    //         success: function (data) {
    //             var obj = JSON.parse(data);
    //             if (obj.result != null && obj.result !== '') {
    //                 var pbono = obj.result[0].pbono;
    //                 var chassisno = obj.result[0].chassisno;
    //                 var vehicle = obj.result[0].itemname;
    //                 var colour = obj.result[0].color;
    //                 var dealercode = obj.result[0].dealercode;
    //                 $("#afs_pbo").val(pbono);
    //                 $("#afs_chassis").val(chassisno);
    //                 $("#afs_inquiry_dealership").val(dealercode);
    //                 $("#afs_vehicle").val(vehicle);
    //                 $("#afs_vehicle_colour").val(colour);
    //                 if ($("#afs_pbo").val(pbono) != null) {
    //                     $("#afs_so_number").prop("readonly", true).removeClass("bg-white");
    //                     $("#afs_pbo").prop("readonly", true).removeClass("bg-white");
    //                     $("#afs_inquiry_dealership").val(dealercode).focus();
    //                 }
    //                 else {
    //                     $("#afs_so_number").val('').prop("readonly", false);
    //                     $("#afs_so_number").focus();
    //                 }
    //             } else {
    //                 $("#afs_chassis").val('');
    //                 $("#afs_inquiry_dealership").val('');
    //                 $("#afs_vehicle").val('');
    //                 $("#afs_vehicle_colour").val('');
    //                 $("#afs_so_number").val('').focus();
    //             }
    //         }
    //     });
    // });

    $("#afs_so_number").blur(function () {
        var pbo = $("#afs_pbo").val();
        var so = $("#afs_so_number").val();
        // alert(so);
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo,
                saleorderno: so
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var pbono = obj.result[0].pbono;
                    var chassisno = obj.result[0].chassisno;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#afs_pbo").val(pbono);
                    $("#afs_chassis").val(chassisno);
                    $("#afs_inquiry_dealership").val(dealercode);
                    $("#afs_vehicle").val(vehicle);
                    $("#afs_vehicle_colour").val(colour);
                    if ($("#afs_pbo").val(pbono) != null) {
                        $("#afs_so_number").prop("readonly", true);
                        $("#afs_so_number").removeClass("bg-white");
                        $("#afs_inquiry_dealership").val(dealercode).focus();
                    }

                } else {
                    $("#afs_chassis").val('');
                    $("#afs_inquiry_dealership").val('');
                    $("#afs_vehicle").val('');
                    $("#afs_vehicle_colour").val('');
                    $("#afs_so_number").val('');
                }
            }
        });
    });


    // dealernetwork_pbo
    $("#dealernetwork_pbo").blur(function () {
        var pbo = $("#dealernetwork_pbo").val();
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {

                    var pbono = obj.result[0].pbono;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;

                    $("#dealernetwork_vehicle").val(vehicle);
                    $("#dealernetwork_vehicle_colour").val(colour);
                    $("#dealernetwork_inquiry_dealership").val(dealercode);
                } else {
                    $("#dealernetwork_pbo").val('');
                    $("#dealernetwork_vehicle").val('');
                    $("#dealernetwork_vehicle_colour").val('');
                    $("#dealernetwork_inquiry_dealership").val('');
                    var errorMessage = 'No result found.';
                    setTimeout(function () {
                        alert(errorMessage);
                    }, 100);
                }
            }
        });
    });

    // feedback_pbo
    // $("#feedback_pbo").blur(function () {
    //     var pbo = $("#feedback_pbo").val();
    //     $.ajax({
    //         type: 'POST',
    //         url: baseurl() + 'getpboforinquiry',
    //         data: {
    //             pbonumber: pbo
    //         },
    //         success: function (data) {
    //             var obj = JSON.parse(data);

    //             if (obj.result != null && obj.result !== '') {
    //                 var vehicle = obj.result[0].itemname;
    //                 var saleorderno = obj.result[0].saleorderno;
    //                 var chassis = obj.result[0].chassisno;
    //                 var dealercode = obj.result[0].dealercode;
    //                 var colour = obj.result[0].color;
    //                 var dealercode = obj.result[0].dealercode;
    //                 $("#feedback_so_number").val(saleorderno);
    //                 if ($("#feedback_so_number").val(saleorderno) != null) {
    //                     $("#feedback_so_number").prop("readonly", true);
    //                     $("#feedback_so_number").removeClass("bg-white");
    //                     $("#feedback_inquiry_dealership").val(dealercode).focus();
    //                 }
    //                 else {
    //                     $("#feedback_so_number").val('').prop("readonly", false);
    //                 }
    //                 $("#feedback_inquiry_dealership").val(dealercode);
    //                 $("#feedback_vehicle").val(vehicle);
    //                 $("#feedback_vehicle_colour").val(colour);
    //                 $("#feedback_chassis").val(chassis);
    //             } else {
    //                 $("#feedback_pbo").val('');
    //                 $("#feedback_so_number").val('').prop("readonly", false);
    //                 $("#feedback_chassis").val('');
    //                 $("#feedback_inquiry_dealership").val('');
    //                 $("#feedback_vehicle").val('');
    //                 $("#feedback_vehicle_colour").val('');
    //                 var errorMessage = 'No result found.';
    //                 setTimeout(function () {
    //                     alert(errorMessage);
    //                     $("#feedback_so_number").val('').focus();
    //                 }, 100);
    //             }
    //         }
    //     });
    // });
    $("#feedback_pbo").blur(function () {
        var pbo = $("#feedback_pbo").val();
        // alert(pbo);
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var pbono = obj.result[0].pbono;
                    var saleorderno = obj.result[0].saleorderno;
                    var chassisno = obj.result[0].chassisno;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#feedback_so_number").val(saleorderno);
                    $("#feedback_chassis").val(chassisno);
                    $("#feedback_vehicle").val(vehicle);
                    $("#feedback_vehicle_colour").val(colour);
                    $("#feedback_inquiry_dealership").val(dealercode);
                    if ($("#feedback_so_number").val(saleorderno) != null) {
                        $("#feedback_so_number").prop("readonly", true);
                        $("#feedback_so_number").removeClass("bg-white");
                        $("#feedback_inquiry_dealership").val(dealercode).focus();
                    }
                    else {
                        $("#feedback_so_number").val('').prop("readonly", false);
                    }
                } else {
                    alert('No Record Found Against This PBO');
                    $("#feedback_pbo").val('');
                    $("#feedback_so_number").val('').prop("readonly", false);
                    $("#feedback_chassis").val('');
                    $("#feedback_vehicle").val('');
                    $("#feedback_vehicle_colour").val('');
                    $("#feedback_inquiry_dealership").val('');
                }
            }
        });
    });

    // feedback_so_number
    // $("#feedback_so_number").blur(function () {
    //     var pbo = $("#feedback_pbo").val();
    //     var so = $("#feedback_so_number").val();
    //     // alert(so);
    //     $.ajax({
    //         type: 'POST',
    //         url: baseurl() + 'getpboforinquiry',
    //         data: {
    //             pbonumber: pbo,
    //             saleorderno: so
    //         },
    //         success: function (data) {
    //             var obj = JSON.parse(data);
    //             if (obj.result != null && obj.result !== '') {
    //                 var pbono = obj.result[0].pbono;
    //                 var chassisno = obj.result[0].chassisno;
    //                 var vehicle = obj.result[0].itemname;
    //                 var colour = obj.result[0].color;
    //                 var dealercode = obj.result[0].dealercode;
    //                 $("#feedback_pbo").val(pbono);
    //                 $("#feedback_chassis").val(chassisno);
    //                 $("#feedback_inquiry_dealership").val(dealercode);
    //                 $("#feedback_vehicle").val(vehicle);
    //                 $("#feedback_vehicle_colour").val(colour);
    //                 if ($("#feedback_pbo").val(pbono) != null) {
    //                     $("#feedback_pbo").prop("readonly", true);
    //                     $("#feedback_pbo").removeClass("bg-white");
    //                     $("#feedback_inquiry_dealership").val(dealercode).focus();
    //                 }
    //                 else {
    //                     $("#feedback_pbo").val('').prop("readonly", false);
    //                 }
    //             } else {
    //                 $("#feedback_pbo").val('').prop("readonly", false);
    //                 $("#feedback_so_number").val('');
    //                 $("#feedback_chassis").val('');
    //                 $("#feedback_inquiry_dealership").val('');
    //                 $("#feedback_vehicle").val('');
    //                 $("#feedback_vehicle_colour").val('');

    //             }
    //         }
    //     });
    // });


    $("#feedback_so_number").blur(function () {
        var pbo = $("#feedback_pbo").val();
        var so = $("#feedback_so_number").val();
        // alert(so);
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo,
                saleorderno: so
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var pbono = obj.result[0].pbono;
                    var chassisno = obj.result[0].chassisno;
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#feedback_pbo").val(pbono);
                    $("#feedback_chassis").val(chassisno);
                    $("#feedback_inquiry_dealership").val(dealercode);
                    $("#feedback_vehicle").val(vehicle);
                    $("#feedback_vehicle_colour").val(colour);
                    if ($("#feedback_pbo").val(pbono) != null) {

                        $("#feedback_inquiry_dealership").val(dealercode).focus();
                    }

                } else {
                    $("#feedback_chassis").val('');
                    $("#feedback_inquiry_dealership").val('');
                    $("#feedback_vehicle").val('');
                    $("#feedback_vehicle_colour").val('');
                    $("#feedback_so_number").val('');
                }
            }
        });
    });


    unsuccess_calls_pbo
    $("#unsuccess_calls_pbo").blur(function () {
        var pbo = $("#unsuccess_calls_pbo").val();
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getpboforinquiry',
            data: {
                pbonumber: pbo
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result != null && obj.result !== '') {
                    var vehicle = obj.result[0].itemname;
                    var colour = obj.result[0].color;
                    var dealercode = obj.result[0].dealercode;
                    $("#unsuccess_calls_dealership").val(dealercode);
                    $("#unsuccess_calls_vehicle").val(vehicle);
                    $("#unsuccess_calls_vehicle_colour").val(colour);
                } else {
                    $("#unsuccess_calls_vehicle").val('');
                    $("#unsuccess_calls_vehicle_colour").val('');
                    var errorMessage = 'No result found.';
                    setTimeout(function () {
                        alert(errorMessage);
                    }, 100);
                }
            }
        });
    });
});

function getResponse(id, val) {
    alert($("#" + id).val()
    );
    $.ajax({
        type: 'POST',
        url: baseurl() + 'getpboforinquiry',
        data: {
            pbonumber: val,
            saleorderno: val
        },
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.result != null && obj.result !== '') {
                var pbono = obj.result[0].pbono;
                var saleorderno = obj.result[0].saleorderno;
                var chassisno = obj.result[0].chassisno;
                var dealercode = obj.result[0].dealercode;
                var vehicle = obj.result[0].itemname;

                // $("#"+id).val(saleorderno);
                $("#dealernetwork_vehicle").val(vehicle);
                $("#dealernetwork_vehicle_colour").val(colour);
                $("#feedback_so_number").val(saleorderno);
                $("#feedback_inquiry_dealership").val(dealercode);
                $("#feedback_vehicle").val(vehicle);
                $("#feedback_vehicle_colour").val(colour);
                $("#feedback_chassis").val(chassisno);
                $("#sales_pbo").val(pbono);
                $("#sales_so_number").val(saleorderno);

                $("#sales_chassis").val(chassisno);
                $("#sales_vehicle").val(vehicle);
                $("#sales_vehicle_colour").val(colour);
                $("#sales_inquiry_dealership").val(dealercode).focus();
                $("#general_pbo").val(pbono);
                $("#general_vehicle_colour").val(colour);
                $("#afs_pbo").val(pbono);
                $("#afs_so_number").val(saleorderno);
                $("#afs_chassis").val(chassisno);
                $("#afs_inquiry_dealership").val(dealercode);
                $("#afs_vehicle").val(vehicle);
                $("#afs_vehicle_colour").val(colour);
                $("#unsuccess_calls_dealership").val(dealercode);
                $("#unsuccess_calls_vehicle").val(vehicle);
                $("#unsuccess_calls_vehicle_colour").val(colour);
            }
            else {
                $("#dealernetwork_vehicle").val('');
                $("#dealernetwork_vehicle_colour").val('');
                $("#feedback_so_number").val('');
                $("#feedback_inquiry_dealership").val('');
                $("#feedback_vehicle").val('');
                $("#feedback_vehicle_colour").val('');
                $("#feedback_chassis").val('');
                $("#sales_pbo").val('');
                $("#sales_chassis").val('');
                $("#sales_vehicle").val('');
                $("#sales_vehicle_colour").val('');
                $("#sales_inquiry_dealership").val('');
                $("#sales_so_number").val('');
                $("#general_pbo").val('');
                $("#general_vehicle_colour").val('');
                $("#afs_pbo").val('');
                $("#afs_so_number").val('');
                $("#afs_chassis").val('');
                $("#afs_inquiry_dealership").val('');
                $("#afs_vehicle").val('');
                $("#afs_vehicle_colour").val('');
                $("#unsuccess_calls_dealership").val('');
                $("#unsuccess_calls_vehicle").val('');
                $("#unsuccess_calls_vehicle_colour").val('');
            }

        }
    });
}

// INQUIRY TYPE
function getinquirytype(e) {
    var inquirytype = $(e).attr('data-type');
    // alert(inquirytype);
    $.ajax({
        type: 'POST',
        url: baseurl() + "getinquirytype",
        data: { inquirytype: inquirytype },
        success: function (data) {
            var obj = JSON.parse(data);
            if (inquirytype == "Sales") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#sales_inquiry_type").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on Sales
                $("#sales_pbo").attr("required", true);
                $("#sales_inquiry_dealership").attr("required", true);
                $("#sales_inquiry_details").attr("required", true);
                // removing required validations from Pre-Sale 1
                $("#presales_inquiry_details").removeAttr("required");
                // removing required validations from  General 2
                $("#general_inquiry_details").removeAttr("required");
                // removing required validations from AFS 3
                $("#afs_inquiry_details").removeAttr("required");
                // removing required validations from Dealership Network 4
                $("#dealernetwork_inquiry_details").removeAttr("required");
                // removing required validations from Feedback 5
                $("#feedback_inquiry_details").removeAttr("required");
                // removing required validations from Unsuccessful Call 6
                $("#unsuccess_calls_inquiry_details").removeAttr("required");
            }
            else if (inquirytype == "Pre-Sales") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#presales_inquiry_type").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on Pre-Sale
                $("#presales_inquiry_details").attr("required", true);
                // removing required validations from Sales 1
                $("#sales_pbo").removeAttr("required");
                $("#sales_inquiry_dealership").removeAttr("required");
                $("#sales_inquiry_details").removeAttr("required");
                // removing required validations from General 2
                $("#general_inquiry_details").removeAttr("required");
                // removing required validations from AFS 3
                $("#afs_inquiry_details").removeAttr("required");
                // removing required validations from Dealership Network 4
                $("#dealernetwork_inquiry_details").removeAttr("required");
                // removing required validations from Feedback 5
                $("#feedback_inquiry_details").removeAttr("required");
                // removing required validations from Unsuccessful Call 6
                $("#unsuccess_calls_inquiry_details").removeAttr("required");
            }
            else if (inquirytype == "General") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#general_inquiry_type").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on General
                $("#general_inquiry_details").attr("required", true);
                // removing required validations from Sales 1
                $("#sales_pbo").removeAttr("required");
                $("#sales_inquiry_dealership").removeAttr("required");
                $("#sales_inquiry_details").removeAttr("required");
                // removing required validations from Pre-Sales 2
                $("#presales_inquiry_details").removeAttr("required");
                // removing required validations from AFS 3
                $("#afs_inquiry_details").removeAttr("required");
                // removing required validations from Dealership Network 4
                $("#dealernetwork_inquiry_details").removeAttr("required");
                // removing required validations from Feedback 5
                $("#feedback_inquiry_details").removeAttr("required");
                // removing required validations from Unsuccessful Call 6
                $("#unsuccess_calls_inquiry_details").removeAttr("required");
            }
            else if (inquirytype == "AFS") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#afs_inquirytype").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on AFS
                $("#afs_inquiry_details").attr("required", true);
                // removing required validations from Sales 1
                $("#sales_pbo").removeAttr("required");
                $("#sales_inquiry_dealership").removeAttr("required");
                $("#sales_inquiry_details").removeAttr("required");
                // removing required validations from Pre-Sales 2
                $("#presales_inquiry_details").removeAttr("required");
                // removing required validations from General 3
                $("#general_inquiry_details").removeAttr("required");
                // removing required validations from Dealership Network 4
                $("#dealernetwork_inquiry_details").removeAttr("required");
                // removing required validations from Feedback 5
                $("#feedback_inquiry_details").removeAttr("required");
                // removing required validations from Unsuccessful Call 6
                $("#unsuccess_calls_inquiry_details").removeAttr("required");
            }
            else if (inquirytype == "Dealership Network") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#dealernetwork_inquiry_type").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on Dealership Network
                $("#dealernetwork_inquiry_details").attr("required", true);
                // removing required validations from Sales 1
                $("#sales_pbo").removeAttr("required");
                $("#sales_inquiry_dealership").removeAttr("required");
                $("#sales_inquiry_details").removeAttr("required");
                // removing required validations from Pre-Sales 2
                $("#presales_inquiry_details").removeAttr("required");
                // removing required validations from General 3
                $("#general_inquiry_details").removeAttr("required");
                // removing required validations from AFS 4
                $("#afs_inquiry_details").removeAttr("required");
                // removing required validations from Feedback 5
                $("#feedback_inquiry_details").removeAttr("required");
                // removing required validations from Unsuccessful Call 6
                $("#unsuccess_calls_inquiry_details").removeAttr("required");
            }
            else if (inquirytype == "Feedback") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#feedback_inquirytype").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on Feedback
                $("#feedback_inquiry_details").attr("required", true);
                // removing required validations from Sales 1
                $("#sales_pbo").removeAttr("required");
                $("#sales_inquiry_dealership").removeAttr("required");
                $("#sales_inquiry_details").removeAttr("required");
                // removing required validations from Pre-Sales 2
                $("#presales_inquiry_details").removeAttr("required");
                // removing required validations from General 3
                $("#general_inquiry_details").removeAttr("required");
                // removing required validations from AFS 4
                $("#afs_inquiry_details").removeAttr("required");
                // removing required validations from Dealership Network 5
                $("#dealernetwork_inquiry_details").removeAttr("required");
                // removing required validations from Unsuccessful Call 6
                $("#unsuccess_calls_inquiry_details").removeAttr("required");
            }
            else if (inquirytype == "Unsuccessful Call") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#unsuccess_calls_inquiry_type").append($("<option></option>").attr("value", obj[i].id).text(obj[i].inquiry_type));
                }
                // adding validtions on Unsuccessful Call
                $("#unsuccess_calls_inquiry_details").attr("required", true);
                // removing required validations from Sales 1
                $("#sales_pbo").removeAttr("required");
                $("#sales_inquiry_dealership").removeAttr("required");
                $("#sales_inquiry_details").removeAttr("required");
                // removing required validations from Pre-Sales 2
                $("#presales_inquiry_details").removeAttr("required");
                // removing required validations from General 3
                $("#general_inquiry_details").removeAttr("required");
                // removing required validations from AFS 4
                $("#afs_inquiry_details").removeAttr("required");
                // removing required validations from Dealership Network 5
                $("#dealernetwork_inquiry_details").removeAttr("required");
                // removing required validations from Feedback 6
                $("#feedback_inquiry_details").removeAttr("required");
            }
        }
    });
}

function getinquirysubtype(Id) {
    var inqid = Id.split('|');
    inqid = inqid[0];
    $.ajax({
        type: 'POST',
        url: baseurl() + "InqTypeRequest",
        data: { Id: inqid },
        dataType: "json",
        success: function (RecordSet) {
            var datalength = RecordSet.ReturnData.length;
            //alert(datalength);
            if (datalength > 0) {
                $(".sales_subtype").css("display", "block");
                $('.inquiry_sub_type').find('option').remove().end();
                for (var i = 0; i < datalength; i++) {
                    console.log(RecordSet.ReturnData[i].complain_spg_type);
                    $(".inquiry_sub_type").append($("<option></option>").attr("value", RecordSet.ReturnData[i].inquiry_subtype).text(RecordSet.ReturnData[i].inquiry_subtype));
                }
            }
            else {
                $(".sales_subtype").css("display", "none");
            }
        }
    });
}

function getcomplaincpt(e) {
    var complaintype = $(e).attr('data-type');
    $.ajax({
        type: 'POST',
        url: baseurl() + "getcomplaincpt",
        data: { complaintype: complaintype },
        success: function (data) {
            var obj = JSON.parse(data);
            if (complaintype == "Sales") {
                console.log(obj);
                var datalength = obj.length;
                //alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#sale_complain_cpt_type").append($("<option></option>").attr("value", obj[i].complain_id).text(obj[i].complain_type));
                }
            }
            else if (complaintype == "After Sale") {
                console.log(obj);
                var datalength = obj.length;
                //alert(datalength);
                for (var i = 0; i < datalength; i++) {
                    $("#aftersale_complain_cpt_type").append($("<option></option>").attr("value", obj[i].complain_id).text(obj[i].complain_type));
                }
            }
        }
    });
}

function Getcpt(Id) {
    $.ajax({
        type: 'POST',
        url: baseurl() + "cptRequest",
        //url:'get-cpt-options',
        data: { Id: Id },
        dataType: "json",
        success: function (RecordSet) {
            $('.complain_spg_type').find('option').remove().end().append("<option value=''>Select Complain Type SPG</option>").val();
            var datalength = RecordSet.ReturnData.length;
            for (var i = 0; i < datalength; i++) {
                console.log(RecordSet.ReturnData[i].complain_spg_type);
                $(".complain_spg_type").append($("<option></option>").attr("value", RecordSet.ReturnData[i].complain_spg_id).text(RecordSet.ReturnData[i].complain_spg_type));
            }
        }
    });
}

// subhan edit file start here date 12/5/2023
function select_complain_type() {
    var selectObject = document.getElementById("complain_cpt_type");
    var selected_complain_type = selectObject.options[selectObject.selectedIndex].innerHTML;
    console.log(selected_complain_type);
    // 1
    if (selected_complain_type == "Service") {
        console.log(selected_complain_type);
        document.getElementById('pbo').required = true;
        document.getElementById('pbo_requard').style.display = "block";

        document.getElementById('Mileage').style.display = "none";
    } else {
        document.getElementById('pbo').required = false;
        document.getElementById('pbo_requard').style.display = "none";

        document.getElementById('Mileage').style.display = "block";
    }
}

function two_function(value) {
    Getcpt(value);
    select_complain_type();
}
// subhan edit file end here date 12/5/2023

function Getspg(spg_Id) {
    $.ajax({
        type: 'POST',
        url: baseurl() + 'spgRequest',
        //url:'get-cpt-options',
        data: { spg_Id: spg_Id },
        dataType: "json",
        success: function (RecordSet) {
            $('.complain_ccc_type').find('option').remove().end().append("<option value=''>Select Complain Type CCC</option>").val();
            var datalength = RecordSet.ReturnData.length;
            for (var i = 0; i < datalength; i++) {
                console.log(RecordSet.ReturnData[i].complain_ccc_type);
                $(".complain_ccc_type").append($("<option></option>").attr("value", RecordSet.ReturnData[i].complain_ccc_id).text(RecordSet.ReturnData[i].complain_ccc_type));
            }
        }
    });
}

function Getcity(id) {
    $.ajax({
        type: 'POST',
        url: baseurl() + 'city-dealership',
        //url:'get-cpt-options',
        data: { city_id: id },
        dataType: "json",
        success: function (RecordSet) {
            // $('.inquiry_dealerships').find('option').remove();
            $('.inquiry_dealerships').find('option').remove();
            //  alert(RecordSet);
            var datalength = RecordSet.ReturnData.length;
            for (var i = 0; i < datalength; i++) {
                // console.log(RecordSet.ReturnData[i].complain_ccc_type);
                $(".inquiry_dealerships").append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
            }
        }
    });
}

function Getalldealership() {
    var data = $(".complaindealership option:selected").text();
    if (data === "Other Dealerships") {
        $.ajax({
            type: 'POST',
            url: baseurl() + 'getalldealership',
            dataType: "json",
            success: function (RecordSet) {
                $('.inquiry_dealerships').find('option').remove().end().append("<option value=''>Select Dealerships</option>").val();
                console.log(RecordSet.ReturnData[0].dealer_name);
                var datalength = RecordSet.ReturnData.length;
                for (var i = 0; i < datalength; i++) {
                    $(".inquiry_dealerships").append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
                }
            }
        });
    }

}



function hidefields() {
    var selectBox = document.getElementById("inquiry_type");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    if (selectedValue === "Sale") {
        document.getElementById("interested_vehicle").style.display = "none";
        document.getElementById("inquiry_status_remark_div").style.display = "none";
        document.getElementById("pre_sale_status").style.display = "none";
        document.getElementById("inquiry_sub_type_div").style.display = "none";
        document.getElementById("payment_mode_div").style.display = "none";
    }

    else if (selectedValue === "After Sale") {
        document.getElementById("interested_vehicle").style.display = "none";
        document.getElementById("inquiry_status_remark_div").style.display = "none";
        document.getElementById("pre_sale_status").style.display = "none";
        document.getElementById("inquiry_sub_type_div").style.display = "none";
        document.getElementById("payment_mode_div").style.display = "none";
    }

    else {
        document.getElementById("inquiry_status_remark_div").style.display = "inline";
        document.getElementById("interested_vehicle").style.display = "inline";
        document.getElementById("pre_sale_status").style.display = "inline";
        document.getElementById("inquiry_sub_type_div").style.display = "inline";
        document.getElementById("payment_mode_div").style.display = "inline";
    }
}

function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if (selectedValue === "Lost") {
        document.getElementById('otherreason').style.visibility = "visible";
        document.getElementById('statusremarks').style.display = "inline";
    } else {
        document.getElementById('statusremarks').style.display = "none";
        document.getElementById('otherreason').style.display = "none";
    }
}

function changeFuncc() {
    var selectBox = document.getElementById("selectBoxx");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if (selectedValue === "Other reason") {
        document.getElementById('otherreason').style.visibility = "visible";
        document.getElementById('otherreason').style.display = "inline";
    } else {
        document.getElementById('otherreason').style.display = "none";
    }
}
// ZAMRAN
// function getpboapi(pbo, saleorderno, chassisno, vehicle, color)
// {
//     $.ajax({
//         type: 'POST',
//         url: baseurl() + 'getpboforinquiry',
//         data: {
//             pbonumber: pbo,
//             saleorder: saleorderno
//         },
//         success: function (data) {
//             var obj = JSON.parse(data);

//             if (obj.result != null && obj.result !== '') {
//                 var saleorderno = obj.result[0].saleorderno;
//                 var chassisno = obj.result[0].chassisno;
//                 var vehicle = obj.result[0].itemname;
//                 var colour = obj.result[0].color;
//                 $(chassisno).val(chassisno);
//                 $(vehicle).val(vehicle);
//                 $(color).val(colour);
//                 $(saleorderno).val(saleorderno);
//             } else {
//                 $(chassisno).val('');
//                 $(vehicle).val('');
//                 $(color).val('');
//                 $(saleorderno).val('');
//             }
//         }
//     });
// }
