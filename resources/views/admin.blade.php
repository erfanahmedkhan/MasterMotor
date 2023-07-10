@extends('template')

@section('content')

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin </title>
<link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="../../vendors/feather/feather.css">
<link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../../vendors/typicons/typicons.css">
<link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/agent-css.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/admin-css.css') }}">

<div class="main-container">
    <div class="container-fluid top-container" style='align-items : center'>
 <input type="text" name="datefilter" value="" class='inputDate' placeholder='Select date change'/>
       <details class="dropdown">
                    <summary role="button">
                        <a class="buttonCities" id="metaHead">Cities</a>
                    </summary>
                    <ul style='box-shadow : inset 0px 0px 10px #f6f6f6 !important;'>
                        <li><a href="#" class="navbarListNamesCities">Karachi</a></li>
                      <li><a href="#" class="navbarListNamesCities">Islamabad</a></li>
                        <li><a href="#" class="navbarListNamesCities">Lahore</a></li>
                    </ul>
                </details>
                 <details class="dropdown">
                    <summary role="button">
                        <a class="buttonCities" id="metaHead">Delarships</a>
                    </summary>
                    <ul style='box-shadow : inset 0px 0px 10px #f6f6f6 !important;'>
                        <li><a href="#" class="navbarListNamesCities">Bilal Motors</a></li>
                      <li><a href="#" class="navbarListNamesCities">Ahmed Motors</a></li>
                        <li><a href="#" class="navbarListNamesCities">Ahsan Motors</a></li>
                    </ul>
                </details>
    </div>

    <div class="upper-div">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card" style='height : 400px'>
                        <div class="card-body">
                            <h5 class="px-2">Total Calls</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="col-xl-4">
                    <div class="card"  style='height : 400px'>
                        <div class="card-body">
                            <h5 class="px-2">Total Inquiries Created</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                   <div id="chart15" style='height : 348.7px;'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="upper-div">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card"  style='height : 430px'>
                        <div class="card-body">
                            <h5 class="px-2">Total Complains Generated</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card"  style='height : 430px'>
                        <div class="card-body">
                            <h5 class="px-2">Complain Status</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="upper-div">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card"  style='height : 430px'>
                        <div class="card-body">
                            <h5 class="px-2">Inquiries Status</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xl-4">
                    <div class="card"  style='height : 430px'>
                        <div class="card-body">
                            <h5 class="px-2">Total Inquiries Generated</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
   <div class='upper-div'>
       <div class="container-fluid">
            <div class="row">
                      <div class="col-xl-6">
                    <div class="card"  style='height : 430px'>
                        <div class="card-body">
                            <h5 class="px-2">Inquiry Registered</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart77"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   <div class="col-xl-6">
                    <div class="card"  style='height : 430px'>
                        <div class="card-body">
                            <h5 class="px-2">PBO Allocation & Booking created</h5>
                            <div class="row align-item-left">
                                <div class="col-xl-12">
                                    <div id="chart777"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
   </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
   
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../..//vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/Chart.roundedBarCharts.js"></script>

    <script>
        const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        const d = new Date();
        let day = weekday[d.getDay()];
        document.getElementById("time").innerHTML = day;

        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
    <script>
        function infoFunction() {
            var x = document.getElementById("click");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function openSearch() {
            var y = document.getElementById("search-box");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }
    </script>
   
    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

            var minutes = x.getMinutes().toString()
            minutes = minutes.length == 1 ? 0 + minutes : minutes;



            var month = (x.getMonth() + 1).toString();
            month = month.length == 1 ? 0 + month : month;

            var dt = x.getDate().toString();
            dt = dt.length == 1 ? 0 + dt : dt;

            var x1 = month + "-" + dt + "-" + x.getFullYear();
            x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct7()', refresh)
        }
        display_c7()
    </script>
    <script>
        var options = {
            series: [56, 37, 71],
             chart: {
                height: 390,
                type: 'radialBar',
                fontFamily: 'BeVietnamPro-Regular'
            },
            plotOptions: {
                radialBar: {
                    offsetY: 0,
                    startAngle: 0,
                    endAngle: 270,
                    hollow: {
                        margin: 5,
                        size: '30%',
                        background: 'transparent',
                        image: undefined,
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            show: false,
                        }
                    }
                }
            },
            colors: ['#39539E', '#1ab7ea', '#0084ff'],
            labels: ['Meta', 'Email', 'Calls', ],
            legend: {
                show: true,
                floating: true,
                fontSize: '14px',
                position: 'left',
                offsetX: 45,
                offsetY: 20,
                labels: {
                    useSeriesColors: true,
                },
                markers: {
                    size: 0
                },
                formatter: function(seriesName, opts) {
                    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                },
                itemMargin: {
                    vertical: 6
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        show: false
                    }
                }
            }]
        };

        var chart7 = new ApexCharts(document.querySelector("#chart7"), options);
        chart7.render();

        var options = {
            series: [{
                    name: "Won",
                    data: [5, 41, 35, 51, 49, 62, 69]
                },
                {
                    name: "Lost",
                    data: [10, 35, 41, 49, 51, 91, 148]
                },
                {
                    name: "Hot",
                    data: [20, 41, 35, 62, 51, 49, 91]
                },
                {
                    name: "Cold",
                    data: [32, 41, 35, 51, 49, 91, 148]
                },
                {
                    name: "Warm",
                    data: [15, 41, 91, 62, 49, 69, 148]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Product Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            }
        };

        var chart6 = new ApexCharts(document.querySelector("#chart6"), options);
        chart6.render();

        var options = {
            series: [{
                    name: "Resolve",
                    data: [5, 41, 35, 51, 49, 62, 69]
                },
                {
                    name: "Pending",
                    data: [10, 35, 41, 49, 51, 91, 148]
                },
                {
                    name: "In-Progress",
                    data: [20, 41, 35, 62, 51, 49, 91]
                },
                {
                    name: "No Show",
                    data: [32, 41, 35, 51, 49, 91, 148]
                },
                {
                    name: "Re-Open",
                    data: [15, 41, 91, 62, 49, 69, 148]
                },
                {
                    name: "Close",
                    data: [40, 35, 51, 91, 49, 62, 148]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Product Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            }
        };

        var chart5 = new ApexCharts(document.querySelector("#chart5"), options);
        chart5.render();

        var options = {
            series: [{
                    name: "Calls",
                    data: [44, 55, 41, 64, 22, 43, 21]
                }, {
                    name: "Meta",
                    data: [53, 32, 33, 52, 13, 44, 32]
                },
                {
                    name: "Email",
                    data: [50, 28, 25, 45, 11, 22, 16]
                }
            ],
            // labels:["Calls","Meta","Email"],
            chart: {
                type: 'bar',
                height: 300
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), options);

        chart3.render();

        var options = {
            series: [76, 67, 61],
            chart: {
                height: 390,
                type: 'radialBar',
                fontFamily: 'BeVietnamPro-Regular'
            },
            plotOptions: {
                radialBar: {
                    offsetY: 0,
                    startAngle: 0,
                    endAngle: 270,
                    hollow: {
                        margin: 5,
                        size: '30%',
                        background: 'transparent',
                        image: undefined,
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            show: false,
                        }
                    }
                }
            },
            colors: ['#39539E', '#1ab7ea', '#0084ff'],
            labels: ['Meta', 'Email', 'Calls', ],
            legend: {
                show: true,
                floating: true,
                fontSize: '14px',
                position: 'left',
                offsetX: 45,
                offsetY: 20,
                labels: {
                    useSeriesColors: true,
                },
                markers: {
                    size: 0
                },
                formatter: function(seriesName, opts) {
                    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                },
                itemMargin: {
                    vertical: 6
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        show: false
                    }
                }
            }]
        };

        var chart4 = new ApexCharts(document.querySelector("#chart4"), options);
        chart4.render();

        var options = {
            series: [25, 30, 10, 20, 15],
            labels: ['Won', 'Lost', 'Hot', 'Cold', 'Warm'],
            chart: {
                height: 295,
                width: "100%",
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options);

        chart2.render();


        var options = {
            chart: {
                height: 280,
                width: "100%",
                type: "area"
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                    name: "Inbound Calls",
                    data: [45, 52, 38, 45, 19, 23, 2]
                },
                {
                    name: "Outbound Calls",
                    data: [40, 25, 28, 20, 10, 5, 10]
                }
            ],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: [
                    "01 Jan",
                    "02 Jan",
                    "03 Jan",
                    "04 Jan",
                    "05 Jan",
                    "06 Jan",
                    "07 Jan"
                ]
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>

    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('DD/MM/YY') + ' - ' + end.format('DD/MM/YY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>

    <script>
        /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
        function regionFunction() {
            document.getElementById("myDropdown1").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn1')) {
                var dropdowns = document.getElementsByClassName("dropdown-content1");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <script>
        function DropDown(el) {
            this.dd = el;
            this.placeholder = this.dd.children('span');
            this.opts = this.dd.find('ul.dropdown > li');
            this.val = '';
            this.index = -1;
            this.initEvents();
        }
        DropDown.prototype = {
            initEvents: function() {
                var obj = this;

                obj.dd.on('click', function(event) {
                    $(this).toggleClass('active');
                    return false;
                });

                obj.opts.on('click', function() {
                    var opt = $(this);
                    obj.val = opt.text();
                    obj.index = opt.index();
                    obj.placeholder.text(obj.val);
                });
            },
            getValue: function() {
                return this.val;
            },
            getIndex: function() {
                return this.index;
            }
        }
    </script>
   <script>
            var options = {
          series: [42, 47, 52],
          chart: {
          width: 380,
          offsetX: -25,
          type: 'polarArea'
        },
        labels: ['Promotion 1', 'Promotion 2', 'Promotion 3'],
        fill: {
          opacity: 1
        },
        stroke: {
          width: 1,
          colors: undefined
        },
        yaxis: {
          show: false
        },
        legend: {
          position: 'bottom'
        },
        plotOptions: {
          polarArea: {
            rings: {
              strokeWidth: 0
            },
            spokes: {
              strokeWidth: 0
            },
          }
        },
        theme: {
               palette: 'palette6', 
          monochrome: {
            enabled: false,
            shadeTo: 'light',
            shadeIntensity: 0.6
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart15"), options);
        chart.render();
   </script>
   <script>
           var options = {
          series: [{
          name: 'PBO Allocation',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Booking created',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart777"), options);
        chart.render();
   </script>
   <script>
     var options = {
          series: [{
          name: 'Inflation',
          data: [2.3, 3.1, 4.0, 4.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "%";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
        title: {
          text: 'Inquiry Registered Monthly Wise',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart77"), options);
        chart.render();
   </script>
   <script>
   $('input[name="dates"]').daterangepicker();
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<script type="text/javascript">
    $(function() {
    
      $('input[name="datefilter"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });
    
      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });
    
      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });
    
    });
    </script>
@endsection('content')