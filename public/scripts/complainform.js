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
                        $("#customer_type").val(obj[0].customer_type);
                        Getcity(obj[0].cityid);

                    }
                    else {
                        $("#customername").val('');
                        $("#email").val('');
                        $("#city").val(0);
                        $("#customer_type").val('');
                        //$("#existing_customer_type_div").addClass("d-none"); // Hide existing_customer_type_div
                        //$("#customer_type_div").removeClass("d-none"); // Show customer_type_div
                        // Adding required attribute on customer_type

                    }
                }
                else if (number == '') {
                    $("#customername").val('');
                    $("#email").val('');
                    $("#city").val(0);
                    $("#customer_type").val('');
                    //$("#existing_customer_type_div").addClass("d-none"); // Hide existing_customer_type_div
                    //$("#customer_type_div").removeClass("d-none"); // Show customer_type_div
                    // Adding required attribute on customer_type
                }
                else {
                    $("#customername").val('');
                    $("#email").val('');
                    $("#city").val(0);
                    $("#customer_type").val('');
                    //$("#existing_customer_type_div").addClass("d-none");  // Hide existing_customer_type_div
                    //$("#customer_type_div").removeClass("d-none"); // Show customer_type_div
                    // Adding required attribute on customer_type
                }
            }
        });
    });

    // sale pbo
    // $("#sale_pbo").blur(function () {
    //     var pbo = $("#sale_pbo").val();
    //     var so = $("#sale_sale_order_number").val();
    //     $.ajax({
    //         type: 'POST',
    //         url: baseurl() + 'getpboforinquiry',
    //         data: {
    //             pbonumber: pbo,
    //             sonumber: so
    //         },
    //         success: function (data) {
    //             var obj = JSON.parse(data);

    //             if (obj.result != null && obj.result !== '') {
    //                 var pbono = obj.result[0].pbono;
    //                 var vehicle = obj.result[0].itemname;
    //                 var invoiceno = obj.result[0].invoiceno;
    //                 var invoicedate = obj.result[0].invoicedate;
    //                 var colour = obj.result[0].color;
    //                 var saleorderno = obj.result[0].saleorderno;
    //                 alert(saleorderno);
    //                 var dealercode = obj.result[0].dealercode;
    //                 alert(dealercode);
    //                 var dealer = obj.result[0].dealer;
    //                 alert(dealer);
    //                 // Setting variables values into the fields
    //                 $("#sale_pbo").val(pbono);
    //                 $("#sale_customer_vehicle").val(vehicle);
    //                 $("#sale_invoice_number").val(invoiceno);
    //                 $("#sale_invoice_date").val(invoicedate);
    //                 $("#sale_vehicle_colour").val(colour);
    //                 $("#sale_sale_order_number").val(saleorderno);
    //                 $("#sale_complain_dealership").val(dealercode);
    //             } else {
    //                 $("#sale_pbo").val('');
    //                 $("#sale_customer_vehicle").val('');
    //                 $("#sale_invoice_number").val('');
    //                 $("#sale_invoice_date").val('');
    //                 $("#sale_vehicle_colour").val('');
    //                 $("#sale_sale_order_number").val('');
    //                 $("#sale_complain_dealership").val('');
    //             }
    //         }
    //     });
    // });
    $("#sale_pbo").blur(function () {
        getsalesinfo();
    });
    // sale so number
    $("#sale_so_number").blur(function () {
        getsalesinfo();
    });

    // after sale pbo
    $("#aftersale_pbo").blur(function () {
        getserviceinfo();
    });
    $("#aftersale_chasis_number").blur(function () {
        getserviceinfo();
    });


    $(".complaindealership").change(function () {
        getDealerships();
    });

    var url = $(location).attr('href');
    url = url.split('/');
    var customerid = parseInt(url[6]);
    if (url[6] == customerid) {
        var cityid = $("#city").val();

        Getcity(cityid);
    }

});


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
                // alert(datalength);
                // die();
                for (var i = 0; i < datalength; i++) {
                    $("#sale_complain_cpt_type").append($("<option></option>").attr("value", obj[i].complain_id).text(obj[i].complain_type));
                    // adding validations on Sale
                    $("#sale_complain_dealership").attr("required", true);
                    $("#sale_complain_cpt_type").attr("required", true);
                    $('#sale_complain_spg_type').attr("required", true);
                    $('#sale_complain_ccc_type').attr("required", true);
                    $('#sale_complain_voc').attr("required", true);
                    // removing required validations from After Sale
                    $('#aftersale_complain_dealership').removeAttr("required");
                    $("#aftersale_complain_cpt_type").removeAttr("required");
                    $('#aftersale_complain_spg_type').removeAttr("required");
                    $('#aftersale_complain_ccc_type').removeAttr("required");
                    $('#aftersale_complain_voc').removeAttr("required");
                    $("#presale_complain_dealership").removeAttr("required");
                    $("#presale_complain_cpt_type").removeAttr("required");
                    $('#presale_complain_spg_type').removeAttr("required");
                    $('#presale_complain_ccc_type').removeAttr("required");
                    $('#presale_complain_voc').removeAttr("required");
                    $("#gen_complain_dealership").removeAttr("required");
                    $('#gen_complain_cpt_type').removeAttr("required");
                    $('#gen_complain_spg_type').removeAttr("required");
                    $('#gen_complain_ccc_type').removeAttr("required");
                    $('#gen_complain_voc').removeAttr("required");
                }
            }
            else if (complaintype == "After Sale") {
                console.log(obj);
                var datalength = obj.length;
                //alert(datalength);
                // die();
                for (var i = 0; i < datalength; i++) {
                    $("#aftersale_complain_cpt_type").append($("<option></option>").attr("value", obj[i].complain_id).text(obj[i].complain_type));
                    // adding validations on After Sale
                    $('#aftersale_complain_dealership').attr("required", true);
                    $("#aftersale_complain_cpt_type").attr("required", true);
                    $('#aftersale_complain_spg_type').attr("required", true);
                    $('#aftersale_complain_ccc_type').attr("required", true);
                    $('#aftersale_complain_voc').attr("required", true);
                    // removing required validations from Sale & Pre-Sale
                    $("#sale_complain_dealership").removeAttr("required");
                    $("#sale_complain_cpt_type").removeAttr("required");
                    $('#sale_complain_spg_type').removeAttr("required");
                    $('#sale_complain_ccc_type').removeAttr("required");
                    $('#sale_complain_voc').removeAttr("required");
                    $("#presale_complain_dealership").removeAttr("required");
                    $("#presale_complain_cpt_type").removeAttr("required");
                    $('#presale_complain_spg_type').removeAttr("required");
                    $('#presale_complain_ccc_type').removeAttr("required");
                    $('#presale_complain_voc').removeAttr("required");
                    $("#gen_complain_dealership").removeAttr("required");
                    $('#gen_complain_cpt_type').removeAttr("required");
                    $('#gen_complain_spg_type').removeAttr("required");
                    $('#gen_complain_ccc_type').removeAttr("required");
                    $('#gen_complain_voc').removeAttr("required");
                }
            }
            else if (complaintype == "General") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                // die();
                for (var i = 0; i < datalength; i++) {
                    $("#gen_complain_cpt_type").append($("<option></option>").attr("value", obj[i].complain_id).text(obj[i].complain_type));
                    //  adding validations on General
                    $("#gen_complain_dealership").attr("required", true);
                    $('#gen_complain_cpt_type').attr("required", true);
                    $('#gen_complain_spg_type').attr("required", true);
                    $('#gen_complain_ccc_type').attr("required", true);
                    $('#gen_complain_voc').attr("required", true);
                    // removing required validations from After Sale, Sale & Pre-Sale
                    $("#aftersale_complain_cpt_type").removeAttr("required");
                    $('#aftersale_complain_spg_type').removeAttr("required");
                    $('#aftersale_complain_ccc_type').removeAttr("required");
                    $('#aftersale_complain_dealership').removeAttr("required");
                    $('#aftersale_complain_voc').removeAttr("required");
                    $("#sale_complain_dealership").removeAttr("required");
                    $("#sale_complain_cpt_type").removeAttr("required");
                    $('#sale_complain_spg_type').removeAttr("required");
                    $('#sale_complain_ccc_type').removeAttr("required");
                    $('#sale_complain_voc').removeAttr("required");
                    $("#presale_complain_dealership").removeAttr("required");
                    $("#presale_complain_cpt_type").removeAttr("required");
                    $('#presale_complain_spg_type').removeAttr("required");
                    $('#presale_complain_ccc_type').removeAttr("required");
                    $('#presale_complain_voc').removeAttr("required");
                }
            }
            else if (complaintype == "Pre-Sale") {
                console.log(obj);
                var datalength = obj.length;
                // alert(datalength);
                // die();
                for (var i = 0; i < datalength; i++) {
                    $("#presale_complain_cpt_type").append($("<option></option>").attr("value", obj[i].complain_id).text(obj[i].complain_type));
                    // adding validations on Pre-Sale
                    $("#presale_complain_dealership").attr("required", true);
                    $("#presale_complain_cpt_type").attr("required", true);
                    $('#presale_complain_spg_type').attr("required", true);
                    $('#presale_complain_ccc_type').attr("required", true);
                    $('#presale_complain_voc').attr("required", true);
                    // removing required validations from Sale & After Sale
                    $("#aftersale_complain_dealership").removeAttr("required");
                    $("#aftersale_complain_cpt_type").removeAttr("required");
                    $('#aftersale_complain_spg_type').removeAttr("required");
                    $('#aftersale_complain_ccc_type').removeAttr("required");
                    $('#aftersale_complain_voc').removeAttr("required");
                    $("#sale_complain_dealership").removeAttr("required");
                    $("#sale_complain_cpt_type").removeAttr("required");
                    $('#sale_complain_spg_type').removeAttr("required");
                    $('#sale_complain_ccc_type').removeAttr("required");
                    $('#sale_complain_voc').removeAttr("required");
                    $("#gen_complain_dealership").removeAttr("required");
                    $('#gen_complain_cpt_type').removeAttr("required");
                    $('#gen_complain_spg_type').removeAttr("required");
                    $('#gen_complain_ccc_type').removeAttr("required");
                    $('#gen_complain_voc').removeAttr("required");
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
            $('.complain_spg_type').find('option').remove().end().append("<option value=''>Select SPG Type</option>").val();
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
            $('.complain_ccc_type').find('option').remove().end().append("<option value=''>Select CCC Type</option>").val();
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
            $('#inquiry_dealerships').find('option').remove().end().append("<option value=''>Select Dealership</option>").val();
            // alert(RecordSet);
            var datalength = RecordSet.ReturnData.length;
            for (var i = 0; i < datalength; i++) {
                // console.log(RecordSet.ReturnData[i].complain_ccc_type);
                $("#inquiry_dealerships").append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
            }
            $("#inquiry_dealerships").append($("<option></option>").attr("value", "Other Dealerships").text("Other Dealerships"));

            $('.complaindealership').find('option').remove().end().append("<option value=''>Select Dealership</option>").val();
            // alert(RecordSet);
            var datalength = RecordSet.ReturnData.length;
            for (var i = 0; i < datalength; i++) {
                // console.log(RecordSet.ReturnData[i].complain_ccc_type);
                $(".complaindealership").append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
            }
            $(".complaindealership").append($("<option></option>").attr("value", "Other Dealerships").text("Other Dealerships"));

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
                $('#inquiry_dealerships').find('option').remove().end().append("<option value=''>Select Dealerships</option>").val();
                console.log(RecordSet.ReturnData[0].dealer_name);
                var datalength = RecordSet.ReturnData.length;
                for (var i = 0; i < datalength; i++) {
                    $("#inquiry_dealerships").append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
                }
            }
        });
    }

}


// function getDealerships() { // ZAMRAN'S FUNCATION
//     var data = $(".complaindealership").val();
//     alert(data)
//     if (data == "Other Dealerships") {
//         $.ajax({
//             type: 'POST',
//             url: baseurl() + 'getalldealership',
//             dataType: "json",
//             success: function (RecordSet) {
//                 $('.complaindealership').find('option').remove().end().append("<option value=''>Select Dealerships</option>").val();
//                 $(".complaindealership").append($("<option></option>").attr("value", "previousdealers").text("View Previous Dealers"));
//                 console.log(RecordSet.ReturnData[0].dealer_name);
//                 var datalength = RecordSet.ReturnData.length;
//                 for (var i = 0; i < datalength; i++) {
//                     $(".complaindealership").append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
//                 }
//             }
//         });
//     }
//     if (data == "previousdealers") {
//         var cityid = $("#city").val();
//         Getcity(cityid);
//     }
// }

function getDealerships() { // UPDATED FUNCTION
    $(".complaindealership").each(function () {
        var data = $(this).val();
        if (data == "Other Dealerships") {
            var $complaindealership = $(this);
            $.ajax({
                type: 'POST',
                url: baseurl() + 'getalldealership',
                dataType: "json",
                success: function (RecordSet) {
                    $complaindealership.find('option').remove().end().append("<option value=''>Select Dealerships</option>").val("");
                    $complaindealership.append($("<option></option>").attr("value", "previousdealers").text("View Previous Dealers"));
                    console.log(RecordSet.ReturnData[0].dealer_name);
                    var datalength = RecordSet.ReturnData.length;
                    for (var i = 0; i < datalength; i++) {
                        $complaindealership.append($("<option></option>").attr("value", RecordSet.ReturnData[i].dealer_code).text(RecordSet.ReturnData[i].dealer_name));
                    }
                }
            });
        }
        if (data == "previousdealers") {
            var cityid = $("#city").val();
            Getcity(cityid);
        }
    });
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


function getserviceinfo() {
    var pbo = $("#aftersale_pbo").val();
    var chassis = $("#aftersale_chasis_number").val();
    // alert (chassis);
    var engine = $("#aftersale_engine_number").val();
    var registration = $("#aftersale_registration_number").val();
    var item = $("#aftersale_customer_vehicle").val();
    $.ajax({
        type: 'POST',
        url: baseurl() + 'getpboforaftersale',
        data: {
            pbonumber: pbo,
            chasisnumber: chassis,
            enginenumber: engine,
            reg_num: registration,
            item: item
        },
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.result != null && obj.result !== '') {
                // variables
                var pbono = obj.result[0].pbono;
                var chassisno = obj.result[0].chassisno;
                var engineno = obj.result[0].engineno;
                var colour = obj.result[0].itemcolor;
                var regno = obj.result[0].regno;
                var item = obj.result[0].itemname;
                var invoicedate = obj.result[0].salesinvoicedate;
                var formattedDate = moment(invoicedate).format('DD-MM-YYYY');
                var dealercode = obj.result[0].dealercode;
                var dealer = obj.result[0].dealer;
                // Setting variables values into the fields
                $("#aftersale_pbo").val(pbono);
                if (chassisno != null) {
                    $("#aftersale_chasis_number").val(chassisno).prop("readonly", true);
                }
                $("#aftersale_customer_vehicle").val(item);
                $("#aftersale_engine_number").val(engineno);
                $("#aftersale_registration_number").val(regno);
                $("#aftersale_vehicle_colour").val(colour);
                $("#aftersale_invoice_date").val(formattedDate);
                $("#aftersale_complain_dealership").val(dealercode).focus();
            } else {
                $("#aftersale_pbo").val('');
                $("#aftersale_chasis_number").val('');
                $("#aftersale_customer_vehicle").val('');
                $("#aftersale_engine_number").val('');
                $("#aftersale_registration_number").val('');
                $("#aftersale_vehicle_colour").val('');
                $("#aftersale_invoice_date").val('');
                $("#aftersale_complain_dealership").val('');
            }
        }
    });
}

function getsalesinfo() {
    var pbo = $("#sale_pbo").val();
    var so = $("#sale_so_number").val();
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
                var vehicle = obj.result[0].itemname;
                var invoiceno = obj.result[0].invoiceno;
                var invoicedate = obj.result[0].invoicedate;
                var colour = obj.result[0].color;
                var saleorderno = obj.result[0].saleorderno;
                var dealercode = obj.result[0].dealercode;
                // Setting variables values into the fields
                $("#sale_pbo").val(pbono);
                $("#sale_customer_vehicle").val(vehicle);
                $("#sale_invoice_number").val(invoiceno);
                $("#sale_invoice_date").val(invoicedate);
                $("#sale_vehicle_colour").val(colour);
                $("#sale_so_number").val(saleorderno);
                $("#sale_complain_dealership").val(dealercode);
                if ($("#sale_so_number").val(saleorderno) != null) {
                    $("#sale_so_number").prop("readonly", true);
                    $("#sale_so_number").removeClass("bg-white");
                    $("#sale_complain_dealership").val(dealercode).focus();
                }
                else {
                    $("#sale_so_number").val('').prop("readonly", false);
                }
            } else {
                $("#sale_pbo").val('');
                $("#sale_customer_vehicle").val('');
                $("#sale_invoice_number").val('');
                $("#sale_invoice_date").val('');
                $("#sale_vehicle_colour").val('');
                $("#sale_so_number").val('').prop("readonly", false);
                $("#sale_complain_dealership").val('');
            }
        }
    });
}

function getpboapi(pbo, saleorderno, chassisno, vehicle, color) {
    $.ajax({
        type: 'POST',
        url: baseurl() + 'getpboforinquiry',
        data: {
            pbonumber: pbo,
            saleorder: saleorderno
        },
        success: function (data) {
            var obj = JSON.parse(data);

            if (obj.result != null && obj.result !== '') {
                var pbono = obj.result[0].pbono;
                var saleorderno = obj.result[0].saleorderno;
                var chassisno = obj.result[0].chassisno;
                var vehicle = obj.result[0].itemname;
                var colour = obj.result[0].color;

                $(pbono).val(pbono);
                $(chassisno).val(chassisno);
                $(vehicle).val(vehicle);
                $(color).val(colour);
                $(saleorderno).val(saleorderno);
            } else {
                $(pbono).val('');
                $(chassisno).val('');
                $(vehicle).val('');
                $(color).val('');
                $(saleorderno).val('');
            }
        }
    });
}

