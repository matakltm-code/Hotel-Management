@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 m-0">
    {{-- Hero section --}}
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/hero/1.jpg" class="d-block w-100 img-fluid" alt="..." style="max-height: 75vh;">
            </div>
            <div class="carousel-item">
                <img src="/images/hero/2.jpg" class="d-block w-100 img-fluid" alt="..." style="max-height: 75vh;">
            </div>
            <div class="carousel-item">
                <img src="/images/hero/3.jpg" class="d-block w-100 img-fluid" alt="..." style="max-height: 75vh;">
            </div>
            <div class="carousel-item">
                <img src="/images/hero/4.jpg" class="d-block w-100 img-fluid" alt="..." style="max-height: 75vh;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    {{-- Check availability --}}
    <div class="col-md-8 offset-md-2 py-5">
        <h1 class="text-center">Check Availability</h1>
        <form method="get" action="/rooms">
            {{-- @csrf --}}
            <div class="form-row">
                <div class="col">
                    <input type="date" class="form-control" placeholder="Arrival Date" name="start_date" id="start_date"
                        value="{{ old('start_date') }}">
                </div>
                <div class="col">
                    <input type="date" class="form-control" placeholder="Departure Date" name="end_date" id="end_date"
                        value="{{ old('end_date') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-md btn-success">Check Availability</button>
                </div>
            </div>
        </form>
    </div>




    {{-- Feedback --}}
    <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Customers Satisfaction </h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh
                    erat, pellentesque ut laoreet vitae.</p>
            </div>
            <div class="row people">
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="/images/users_feed_images/user.jpg">
                        <h3 class="name">Ben Johnson</h3>
                        <p class="title">Musician</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus.
                            Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo
                            suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="/images/users_feed_images/user.jpg">
                        <h3 class="name">Emily Clark</h3>
                        <p class="title">Artist</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus.
                            Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo
                            suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle" src="/images/users_feed_images/user.jpg">
                        <h3 class="name">Carl Kent</h3>
                        <p class="title">Stylist</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus.
                            Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo
                            suscipit id. Etiam dictum feugiat tellus, a semper massa. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- Footer --}}
    <footer class="text-center text-lg-start bg-dark text-muted border-top">

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:<a class="text-reset fw-bold" href="/">{{ config('app.name') }}</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->




</div>
@endsection



<script type="text/javascript">
    $( "#from" ).datepicker({
	inline: true
});
    // $( function() {
    //     var dateFormat = "mm/dd/yy",
    //     from = $( "#from" )
    //         .datepicker(
    //             {
    //         defaultDate: "+1w",
    //         changeMonth: true,
    //         numberOfMonths: 3
    //         }
    //         )
    //         .on( "change", function() {
    //         to.datepicker( "option", "minDate", getDate( this ) );
    //         }),
    //     to = $( "#to" ).datepicker(
    //         {
    //         defaultDate: "+1w",
    //         changeMonth: true,
    //         numberOfMonths: 3
    //     }
    //     )
    //     .on( "change", function() {
    //         from.datepicker( "option", "maxDate", getDate( this ) );
    //     });

    //     function getDate( element ) {
    //     var date;
    //     try {
    //         date = $.datepicker.parseDate( dateFormat, element.value );
    //     } catch( error ) {
    //         date = null;
    //     }

    //     return date;
    //     }
    // } );
</script>
