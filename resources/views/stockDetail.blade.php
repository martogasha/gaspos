<!doctype html>
<html lang="en">


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/receivemoney.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 10:18:43 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{$product->product_name}} - Dolex Technologies</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('assets/img/favicon180.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('assets/img/favicon32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('assets/img/favicon16.png')}}" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css')}}">

    <!-- style css for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" id="style">
</head>

<body class="body-scroll">

<!-- loader section -->
<!-- loader section ends -->

<!-- Sidebar main menu -->

<!-- Sidebar main menu ends -->

<!-- Begin page -->
<main class="h-100">

    <!-- Header -->
    <header class="header position-fixed">
        <div class="row">
            <div class="col-auto">
                <a href="{{url('stock')}}" target="_self" class="btn btn-light btn-44">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            <div class="col align-self-center text-center">
                <div class="logo-small">
                    <h5 style="font-size: 15px">Edit <b style="font-size: 20px;color: green">{{$product->product_name}}</b></h5>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{url('deleteStock',$product->id)}}" target="_self" class="btn btn-light btn-44">
                    <i class="bi bi-trash" style="color:red"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- Header ends -->
@include('flash-message')
    <!-- main page content -->
    <div class="main-container container">
        <!-- select Amount -->
        <div class="container text-center">
            <div class="row align-items-center">
                @if(isset($product->product_quantity))
                    <div class="col-12">
                        <input type="number" class="trasparent-input text-center" value="{{$product->product_quantity}}" placeholder="Full">
                        <div class="text-center"><span class="text-muted">Qty</span>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <input type="number" class="trasparent-input text-center" value="{{$product->product_full_quantity}}" placeholder="Full">
                        <div class="text-center"><span class="text-muted">Full</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="number" class="trasparent-input text-center" value="{{$product->product_empty_quantity}}" placeholder="Empty">
                        <div class="text-center"><span class="text-muted">Empty</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <h6 class="title">Edit</h6>
            </div>
        </div>
        <!-- group user -->
        <div class="row">
            <form action="{{url('editStock')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="col-12">
                <div class="form-group form-floating is-valid mb-1">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name"
                           value="{{$product->product_name}}">
                    <label class="form-control-label">Product Name</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group form-floating is-valid mb-1">
                    <input type="number" class="form-control" id="product_amount" name="product_amount" placeholder="Product Amount"
                           value="{{$product->product_amount}}">
                    <label class="form-control-label">Product Amount</label>
                </div>
            </div>
            @if(isset($product->product_quantity))
                <div class="col-12">
                    <div class="form-group form-floating is-valid mb-1">
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Qty"
                               value="">
                        <label class="form-control-label">Qty</label>
                    </div>
                </div>
                    <div class="col-12">
                        <div class="form-floating is-valid mb-3">
                            <input type="file" class="form-control"
                                   placeholder="Quantity" name="product_image" id="image">
                            <label>Image</label>
                        </div>
                    </div>
            @else
                <div class="col-12">
                    <div class="form-group form-floating is-valid mb-1">
                        <input type="number" class="form-control" id="product_full_quantity" name="product_full_quantity" placeholder="Full Qty">
                        <label class="form-control-label">Full Qty</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group form-floating is-valid mb-1">
                        <input type="number" class="form-control" id="product_empty_quantity" name="product_empty_quantity" placeholder="Empty Qty">
                        <label class="form-control-label">Empty Qty</label>
                    </div>
                </div>
                    <div class="col-12">
                    <div class="form-floating is-valid mb-3">
                        <input type="file" class="form-control"
                               placeholder="Quantity" name="product_image" id="image">
                        <label>Image</label>
                    </div>
                    </div>
            @endif
            <div class="row mb-4">
                <div class="col-12 ">
                    <button class="btn btn-default btn-lg shadow-sm w-100">
                        Save
                    </button>
                </div>
            </div>
            </form>

        </div>
        <!-- send requet button -->
        <div class="row mb-3">
            <div class="col">
                <h6 class="title">Stock Updates</h6>
            </div>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control " id="search" placeholder="Search">
            <label class="form-control-label" for="search">Search by date</label>
            <button type="button" class="text-color-theme tooltip-btn">
                <i class="bi bi-search"></i>
            </button>
        </div>
        <div style="overflow-y: scroll;height: 300px">
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" style="font-size: 16px"><b style="color: black">12/2/2022</b></label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
            <div class="form-group form-floating is-valid mb-4">
                <text class="form-control " id="description" placeholder="Description">Need help 3 months medical emergency
                </text>
                <label class="form-control-label" for="description">Description</label>
            </div>
        </div>


    </div>
    <!-- main page content ends -->


</main>
<!-- Page ends-->

<!-- Footer -->
@include('footer')
<!-- Footer ends-->


<!-- Required jquery and libraries -->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js')}}"></script>

<!-- cookie js -->
<script src="{{asset('assets/js/jquery.cookie.js')}}"></script>

<!-- Customized jquery file  -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/color-scheme.js')}}"></script>

<!-- PWA app service registration and works -->
<script src="{{asset('assets/js/pwa-services.js')}}"></script>

<!-- Chart js script -->
<script src="{{asset('assets/vendor/chart-js-3.3.1/chart.min.js')}}"></script>

<!-- Progress circle js script -->
<script src="{{asset('assets/vendor/progressbar-js/progressbar.min.js')}}"></script>

<!-- swiper js script -->
<script src="{{asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js')}}"></script>

<!-- page level custom script -->
<script src="{{asset('assets/js/app.js')}}"></script>
<script>
    /* Search Bar */

    document.querySelector('#search').addEventListener('keyup', function(e) {
        // UI Element
        let namesLI = document.getElementsByClassName('form-group form-floating is-valid mb-4');

        // Get Search Query
        let searchQuery = search.value.toLowerCase();

        // Search Compare & Display
        for (let index = 0; index < namesLI.length; index++) {
            const name = namesLI[index].textContent.toLowerCase();

            if (name.includes(searchQuery)) {
                namesLI[index].style.display = 'block';
            } else {
                namesLI[index].style.display = 'none';
            }
        }
    });
</script>
</body>


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/receivemoney.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 10:18:44 GMT -->
</html>
