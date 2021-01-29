<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="{{url('ela-admin/images/icon.png')}}">
        <title>SDT | Management Inventary</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="{{ url('/metronic/theme') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css">
        <link href="{{ url('/ela-admin/css') }}/lib/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/ela-admin/css') }}/lib/calendar2/semantic.ui.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/ela-admin/css') }}/lib/calendar2/pignose.calendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/ela-admin/css') }}/lib/owl.carousel.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/ela-admin/css') }}/lib/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/ela-admin/css') }}/helper.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/ela-admin/css') }}/style.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/css') }}/style.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <link href="{{ url('/ela-admin/css') }}/lib/datepicker/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        
        <link rel="shortcut icon" href="favicon.ico" />
    </head>

    <body class="fix-header fix-sidebar">
        <div class="main-wrapper">
            @include('layouts.header')
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <!-- <div class="page-container"> -->
                @include('layouts.side')
                <!-- BEGIN CONTENT -->
                 <div class="page-wrapper" >
                        @include('layouts.breadcrump')
                        <div class="container-fluid" >
                        <img src="{{url('ela-admin/images/sentuh digital.png')}}" style="margin: 100px 300px; width: 35%;
    position: fixed;">
                        @include('layouts.error')
                        @include('toast::messages')
                        @yield('content')
                        </div>
                </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            @include('layouts.footer')
        </div>
        <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/bootstrap/js/popper.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/jquery.slimscroll.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/sidebarmenu.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/sticky-kit-master/dist/sticky-kit.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/morris-chart/raphael-min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/morris-chart/dashboard1-init.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/morris-chart/morris.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/calendar-2/moment.latest.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/calendar-2/semantic.ui.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/calendar-2/prism.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/calendar-2/pignose.calendar.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/calendar-2/pignose.init.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/owl-carousel/owl.carousel-init.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/scripts.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/custom.min.js" type="text/javascript"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <script src="{{ url('/ela-admin/js') }}/lib/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>  
        
        <script>
            
            $(document).ready(function()
            {
                $('select').select2();

                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });

                @if(!empty($columns))
                $('#datatable tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                } );
                var table = $('#datatable').DataTable({
                    processing: true,
                    order: [[ 0, 'desc' ], [ 0, 'asc' ]],
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ], 
                    serverSide: true,
                    ajax: '{{ url()->current() }}',
                    columns: {!! General::columnDatatable($columns) !!}
                });
                // Apply the search
                // table.columns().every( function () {
                //     var that = this;
                //     $( 'input', this.footer()).on( 'keyup change', function () {
                //         if ( that.search() !== this.value ) {
                //             that
                //                 .search( this.value )
                //                 .draw();
                //         }
                //     } );
                // } );
                @endif

                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
        </script>
        <script type="text/javascript">
            $(function () {
                $('#datepicker').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        @if(!empty($validator))
        {!! $validator->render() !!}
        @endif
        @yield('js')
    </body>

</html>
