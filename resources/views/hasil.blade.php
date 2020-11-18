<!DOCTYPE html>
<html>

<head>

    <!-- BOOSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- FONT-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>
    <script src="https://use.fontawesome.com/7b4dc9f8b9.js"></script>
    <!--GOOGLE CHART-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--CHARTJS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!--Lainya-->
    <script src="https://kit.fontawesome.com/1d0c17521a.js" crossorigin="anonymous"></script>

    <title>Data Peserta</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('Design/css/hasil/hasil.css') }}">

    <style type="text/css">
        .stars-outer {
            position: relative;
            display: inline-block;
        }

        .stars-inner {
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
        }

        .stars-outer::before {
            content: "\f005 \f005 \f005 \f005";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #ccc;
        }

        .stars-inner::before {
            content: "\f005 \f005 \f005 \f005";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #f8ce0b;
        }
    </style>
</head>

<body>



    <header class="main_h">

        <div class="row">
            <img class="logo" src="{{asset('Design/image/logo.png')}}">
            <div class="mobile-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav>
                <ul>
                    <li><a href="#sec01">Data Peserta</a></li>
                    <li><a href="#sec02">Sumber Informasi</a></li>
                    <li><a href="#sec03">Layanan Panitia</a></li>
                    <li><a href="#sec04">Rate Trainer</a></li>
                </ul>
            </nav>

        </div> <!-- / row -->

    </header>

    <div class="hero">

        <h1>
            {{$products->training_title}}<br>
            <span>Data Peserta</span>
        </h1>

        <div class="mouse">
            <span></span>
        </div>

    </div>

    <!-- DATA PESERTA-->
    <div class="row content" id="sec01">
        <h1 id="sec01">Data Peserta</h1>
        <!-- TABLE DATA PESERTA-->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Merekomendasikan</th>
                    <th scope="col">Request Pelatihan</th>
                    <th scope="col">Kesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pp as $r)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        {{ $r->name }}
                    </td>
                    <td>
                        {{$r->merekomendasikan}}
                    </td>
                    <td>
                        {{ $r->request_pelatihan }}
                    </td>
                    <td>
                        {{ $r->kesan }}
                    </td>
                    <!-- <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#pesertaModal" data-id="{{$r->id}}" data-request_pelatihan="{{ $r->request_pelatihan }}"
                            data-nama="{{$r->name}}" data-traning_title="{{ $r->training_title }}"
                            data-merekomendasikan="{{$r->merekomendasikan}}" data-kesan="{{ $r->kesan }}">
                            Lihat Detail
                        </button>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /TABLE DATA PESERTA-->

        <!-- /DATA PESERTA-->


        <!-- Sumber Informasi-->
        <h1 id="sec02">Sumber Informasi</h1>
        <!-- Chart Sumber Informasi-->
        <div class="panel-body" align="center">

            <div id="pie_chart" style="width:750px; height:450px;"></div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chartModal">
                Detail Sumber Informasi
            </button>
            <br>

        </div>
        <!-- Chart Sumber Informasi-->
        <!-- ModalChart -->
        <div class="modal fade" id="chartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Sumber Informasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Peserta</th>
                                    <th scope="col">Sumber Informasi</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pp as $r)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $r->name }}
                                    </td>
                                    <td>
                                        {{ $r->sumber_informasi }}
                                    </td>
                                    <td>
                                        @if($r->sumber_informasi == 'Lainnya')
                                        <p>{{ $r->detail }}</p>
                                        @elseif ( $r->sumber_informasi == 'whatsapp/line' )
                                        <!--KUDU DIGANTI -->
                                        <p>{{ $r->detail }}</p>
                                        @elseif ( $r->sumber_informasi == 'Asosiasi / Organisasi' )
                                        <p>{{ $r->detail }}</p>
                                        @else
                                        <p> - </p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- /ModalChart -->

        <!-- Layanan Panitia-->
        <h1 id="sec03">Layanan Panitia</h1>
        <!-- Layanan Sikap-->
        <div class="row" style="margin: 10px 0 0 0;">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">Layanan Sikap Panitia</h3>
                    </div>
                    <div class="panel-body" align="center">
                        <div>
                            <div class="star">
                                <table class="">
                                    <tr class="sikap">
                                        <td>
                                            <div class="fa-2x stars-outer ">
                                                <div class="stars-inner"></div>
                                            </div>
                                            <span class="number-rating"></span>
                                            <span>/ 4</span>
                                        </td>
                                    </tr>
                                </table>
                                <span>{{ $rating1Count }} Peserta Menilai </span>
                            </div>
                        </div>
                        <!-- Layanan Sikap Button modal -->
                        <button type="button" style="margin-top: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#layananModal">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Layanan Sikap modal -->
        <div class="modal fade" id="layananModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Layanan Sikap Panitia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pp as $p)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $p->name }}
                                    </td>
                                    <td>
                                        @if($p->layanan_panitia_sikap == '')
                                        <span class="btn btn-sm btn-warning col-md-8">Belum Ada Nilai</span>
                                        @elseif ( $p->layanan_panitia_sikap == 1 )
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        @elseif ( $p->layanan_panitia_sikap == 2 )
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        @elseif ( $p->layanan_panitia_sikap == 3 )
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        @else
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- /Layanan Sikap PanitiaModal -->
        <!-- /Layanan Sikap-->

        <!-- Layanan Kinerja-->
        <div class="row" style="margin: 20px 0 0 0;">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">Kinerja dan Kualitas Pekerjaan</h3>
                    </div>
                    <div class="panel-body" align="center">
                        <div class="review-rating">
                            <div class="star">
                                <table class="">
                                    <tr class="kinerja">
                                      <td></td>
                                      <td>
                                        <div class="fa-2x stars-outer">
                                          <div class="stars-inner"></div>
                                        </div>
                                        <span class="number-rating"> </span>
                                        <span>/ 4</span>
                                      </td>
                                    </tr>                              
                                </table>
                                <span>{{ $rating1Count }} Peserta Menilai </span>
                            </div>
                        </div>
                        <!-- Layanan Kinerja Panitia modal -->
                        <button type="button" style="margin-top: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#kinerjaModal">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Layanan Kinerja Modal -->
        <div class="modal fade" id="kinerjaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Layanan Kinerja dan Kualitas Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pp as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $p->name }}
                                </td>
                                <td>
                                    @if($p->layanan_panitia_kinerja_kualitas == '')
                                    <span class="btn btn-sm btn-warning col-md-8">Belum Ada Nilai</span>
                                    @elseif ( $p->layanan_panitia_kinerja_kualitas == 1 )
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @elseif ( $p->layanan_panitia_kinerja_kualitas == 2 )
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @elseif ( $p->layanan_panitia_kinerja_kualitas == 3 )
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @else
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @endif

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- /Layanan Kinerja Modal -->
    <!-- /Layanan Kinerja-->

    <!-- Ketetapan Materi-->
        <div class="row" style="margin: 20px 0 0 0;">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">Ketetapan Materi</h3>
                    </div>
                    <div class="panel-body" align="center">
                        <div class="review-rating">
                            <div class="star">
                                <table class="">
                                    <tr class="materi">
                                      <td></td>
                                      <td>
                                        <div class="fa-2x stars-outer">
                                          <div class="stars-inner"></div>
                                        </div>
                                        <span class="number-rating"> </span>
                                        <span>/ 4</span>
                                      </td>
                                    </tr>                              
                                </table>
                                <span>{{ $rating1Count }} Peserta Menilai </span>
                            </div>
                        </div>
                        <!-- Layanan Kinerja Panitia modal -->
                        <button type="button" style="margin-top: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#materiModal">
                            Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layanan Materi Modal -->
        <div class="modal fade" id="materiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ketetapan Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pp as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $p->name }}
                                </td>
                                <td>
                                    @if($p->materi == '')
                                    <span class="btn btn-sm btn-warning col-md-8">Belum Ada Nilai</span>
                                    @elseif ( $p->materi == 1 )
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @elseif ( $p->materi == 2 )
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @elseif ( $p->materi == 3 )
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @else
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    <i class='fa fa-star fa-fw' style="color: #f8ce0b"></i>
                                    @endif

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <!-- /Layanan Materi Modal -->

        

        <h1 id="sec04">Rate Trainer</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="margin-bottom: 10px;">
                        <h6>Nama Trainer</h6>
                        <ul>
                            @foreach ($trainer_data as $t)
                                <li>{{$t->full_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-body" align="center">

                        <div>

                            <div class="star">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Peserta</th>
                                            @foreach ($trainer_data as $r)
                                                <th scope="col">Nilai {{$r->full_name}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pp as $r)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                {{ $r->name }}
                                            </td>
                                            @foreach ($trainer_data as $t)
                                            @php
                                                $q= App\Models\Trainer_rating::where([['participant_id',$r->participant_id],['trainer_id',$t->id]])->get();
                                               
                                                //  dd($q);
                                            @endphp
                                                <td scope="col">{{$q->avg('penyampaian_rating')}}</td>
                                            @endforeach
                                            
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total</td>
                                                @foreach ($ratetrainer as $r)
                                                @if($r == '')
                                                    <td>Tidak Ada Data</td>
                                                @else   
                                                    <td>{{$r}} / 4</td>
                                                @endif
                                                @endforeach
                                        </tr>
                                    </tbody>
                                </table>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



    </div>




    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{asset('Design/image/logo.png')}}" alt="logo"></a>
                    </div>
                    <p class="text-justify">IPB Training <br>
                        PT Global Scholarship Services Indonesia <br>
                        Jalan Taman Kencana No 3, Bogor - West Java Indonesia</p>

                    <div class="footer-social-icon">
                        <ul class="social-icons">
                            <li>
                                <h5>Follow Us</h5>
                            </li>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>

                <div class="col-xs-6 col-md-3">
                    <h5>Useful links</h5>
                    <ul class="footer-links">
                        <li><a href="">Homepage</a></li>
                        <li><a href="">Login</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h5>Contact with Us</h5>
                    <ul class="footer-links">
                        <li><a href="#"> (0251) 8382 223</a></li>
                        <li><a href="#"> (0251) 8372 400</a></li>
                        <li><i class="fa fa-envelope"></i><a href="#"> info@ipbtraining.com</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </footer>


</body>

</html>

<script type="text/javascript">
    // Sticky Header
    $(window).scroll(function () {

        if ($(window).scrollTop() > 100) {
            $('.main_h').addClass('sticky');
        } else {
            $('.main_h').removeClass('sticky');
        }
    });

    // Mobile Navigation
    $('.mobile-toggle').click(function () {
        if ($('.main_h').hasClass('open-nav')) {
            $('.main_h').removeClass('open-nav');
        } else {
            $('.main_h').addClass('open-nav');
        }
    });

    $('.main_h li a').click(function () {
        if ($('.main_h').hasClass('open-nav')) {
            $('.navigation').removeClass('open-nav');
            $('.main_h').removeClass('open-nav');
        }
    });

    // navigation scroll lijepo radi materem
    $('nav a').click(function (event) {
        var id = $(this).attr("href");
        var offset = 70;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 500);
        event.preventDefault();
    });
</script>
<!-- Script Star-->
</script>
<!-- star -->
<script type="text/javascript">
    // Initial Ratings
    var ratings=
    {
      sikap: <?php echo $ratelayanan; ?>,
      kinerja: <?php echo $ratekinerja; ?>,
      materi: <?php echo $ratemateri; ?>
                    
    }
         
    // Total Stars
    const starsTotal = 4;

    // Run getRatings when DOM loads
    document.addEventListener('DOMContentLoaded', getRatings);

    // Get ratings
    function getRatings() {
      for (let rating in ratings) {
        // Get percentage
        const starPercentage = (ratings[rating] / starsTotal) * 100;

        // Round to nearest 10
        const starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;
        console.log(starPercentageRounded);
        // Set width of stars-inner to percentage
        document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;

        document.querySelector(`.${rating} .number-rating`).innerHTML = ratings[rating];
      }
    }
  </script>
<!--- /Script Star -->

<!-- Script Chart-->
<script>
    var analytics = <?php echo $sumber_informasi; ?>

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
        };
        //css 
    options.chartArea = { left: '10%', top: '5%', width: "85%", height: "80%" };
    
    //create trigger to resizeEnd event     
    $(window).resize(function() {
      if(this.resizeTO) clearTimeout(this.resizeTO);
      this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
      }, 500);
    });

//redraw graph when window resize is completed  
$(window).on('resizeEnd', function() {
drawChart(data);
});
//end 
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data, options);
    }

</script>