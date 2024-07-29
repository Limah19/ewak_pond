<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ewak Pond</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <style>
    .container {
      display: flex;
      gap: 20px;
      /* Jarak antara div */
    }

    .card {
      flex: 1;
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Media query untuk layar kecil */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
    }
  </style>
  @stack('style')
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    @include('partial.nav')
    <!-- /Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{asset('admin/index3.html')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/EwakPondLogo.png')}}" alt="EwakPond Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ewak Pond</span>
      </a>

      <!-- Sidebar -->
      @include('partial.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 428px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
              &nbsp;
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">@yield('judul')</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            @yield('content')
          </div>
        </div>
        <!-- /.card-body -->

        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Pemilik 1</h3>

                  <p>2 Kolam <br> Lele dan Gabus</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>Pemilik 2</h3>

                  <p>3 Kolam <br> Lele, Nila, dan Gabus.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>Pemilik 3</h3>

                  <p>2 Kolam <br> Nila, dan Gabus.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>Pemilik 4</h3>

                  <p>3 Kolam <br> Gurame, Nila, dan Gabus.</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- /.row -->
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Pemilik 5</h3>

                      <p>2 Kolam <br> Lele dan Gabus</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>Pemilik 6</h3>

                      <p>3 Kolam <br> Lele, Nila, dan Gabus.</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>Pemilik 7</h3>

                      <p>2 Kolam <br> Nila, dan Gabus.</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>Pemilik 8</h3>

                      <p>3 Kolam <br> Gurame, Nila, dan Gabus.</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
              <div class="container">
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Sales</th>
                          <th>More</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Some Product
                          </td>
                          <td>$13 USD</td>
                          <td>
                            <small class="text-success mr-1">
                              <i class="fas fa-arrow-up"></i>
                              12%
                            </small>
                            12,000 Sold
                          </td>
                          <td>
                            <a href="#" class="text-muted">
                              <i class="fas fa-search"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Another Product
                          </td>
                          <td>$29 USD</td>
                          <td>
                            <small class="text-warning mr-1">
                              <i class="fas fa-arrow-down"></i>
                              0.5%
                            </small>
                            123,234 Sold
                          </td>
                          <td>
                            <a href="#" class="text-muted">
                              <i class="fas fa-search"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Amazing Product
                          </td>
                          <td>$1,230 USD</td>
                          <td>
                            <small class="text-danger mr-1">
                              <i class="fas fa-arrow-down"></i>
                              3%
                            </small>
                            198 Sold
                          </td>
                          <td>
                            <a href="#" class="text-muted">
                              <i class="fas fa-search"></i>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Perfect Item
                            <span class="badge bg-danger">NEW</span>
                          </td>
                          <td>$199 USD</td>
                          <td>
                            <small class="text-success mr-1">
                              <i class="fas fa-arrow-up"></i>
                              63%
                            </small>
                            87 Sold
                          </td>
                          <td>
                            <a href="#" class="text-muted">
                              <i class="fas fa-search"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card bg-gradient-success">
                  <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                    <h3 class="card-title">
                      <i class="far fa-calendar-alt"></i>
                      Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                          <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a href="#" class="dropdown-item">Add new event</a>
                          <a href="#" class="dropdown-item">Clear events</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item">View calendar</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%">
                      <div class="bootstrap-datetimepicker-widget usetwentyfour">
                        <ul class="list-unstyled">
                          <li class="show">
                            <div class="datepicker">
                              <div class="datepicker-days" style="">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th>
                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">July 2024</th>
                                      <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                                    </tr>
                                    <tr>
                                      <th class="dow">Su</th>
                                      <th class="dow">Mo</th>
                                      <th class="dow">Tu</th>
                                      <th class="dow">We</th>
                                      <th class="dow">Th</th>
                                      <th class="dow">Fr</th>
                                      <th class="dow">Sa</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td data-action="selectDay" data-day="06/30/2024" class="day old weekend">30</td>
                                      <td data-action="selectDay" data-day="07/01/2024" class="day">1</td>
                                      <td data-action="selectDay" data-day="07/02/2024" class="day">2</td>
                                      <td data-action="selectDay" data-day="07/03/2024" class="day">3</td>
                                      <td data-action="selectDay" data-day="07/04/2024" class="day">4</td>
                                      <td data-action="selectDay" data-day="07/05/2024" class="day">5</td>
                                      <td data-action="selectDay" data-day="07/06/2024" class="day weekend">6</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="07/07/2024" class="day weekend">7</td>
                                      <td data-action="selectDay" data-day="07/08/2024" class="day">8</td>
                                      <td data-action="selectDay" data-day="07/09/2024" class="day">9</td>
                                      <td data-action="selectDay" data-day="07/10/2024" class="day">10</td>
                                      <td data-action="selectDay" data-day="07/11/2024" class="day">11</td>
                                      <td data-action="selectDay" data-day="07/12/2024" class="day">12</td>
                                      <td data-action="selectDay" data-day="07/13/2024" class="day weekend">13</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="07/14/2024" class="day weekend">14</td>
                                      <td data-action="selectDay" data-day="07/15/2024" class="day">15</td>
                                      <td data-action="selectDay" data-day="07/16/2024" class="day">16</td>
                                      <td data-action="selectDay" data-day="07/17/2024" class="day">17</td>
                                      <td data-action="selectDay" data-day="07/18/2024" class="day">18</td>
                                      <td data-action="selectDay" data-day="07/19/2024" class="day">19</td>
                                      <td data-action="selectDay" data-day="07/20/2024" class="day weekend">20</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="07/21/2024" class="day weekend">21</td>
                                      <td data-action="selectDay" data-day="07/22/2024" class="day">22</td>
                                      <td data-action="selectDay" data-day="07/23/2024" class="day">23</td>
                                      <td data-action="selectDay" data-day="07/24/2024" class="day">24</td>
                                      <td data-action="selectDay" data-day="07/25/2024" class="day">25</td>
                                      <td data-action="selectDay" data-day="07/26/2024" class="day">26</td>
                                      <td data-action="selectDay" data-day="07/27/2024" class="day weekend">27</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="07/28/2024" class="day weekend">28</td>
                                      <td data-action="selectDay" data-day="07/29/2024" class="day active today">29</td>
                                      <td data-action="selectDay" data-day="07/30/2024" class="day">30</td>
                                      <td data-action="selectDay" data-day="07/31/2024" class="day">31</td>
                                      <td data-action="selectDay" data-day="08/01/2024" class="day new">1</td>
                                      <td data-action="selectDay" data-day="08/02/2024" class="day new">2</td>
                                      <td data-action="selectDay" data-day="08/03/2024" class="day new weekend">3</td>
                                    </tr>
                                    <tr>
                                      <td data-action="selectDay" data-day="08/04/2024" class="day new weekend">4</td>
                                      <td data-action="selectDay" data-day="08/05/2024" class="day new">5</td>
                                      <td data-action="selectDay" data-day="08/06/2024" class="day new">6</td>
                                      <td data-action="selectDay" data-day="08/07/2024" class="day new">7</td>
                                      <td data-action="selectDay" data-day="08/08/2024" class="day new">8</td>
                                      <td data-action="selectDay" data-day="08/09/2024" class="day new">9</td>
                                      <td data-action="selectDay" data-day="08/10/2024" class="day new weekend">10</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div class="datepicker-months" style="display: none;">
                                <table class="table-condensed">
                                  <thead>
                                    <tr>
                                      <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th>
                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2024</th>
                                      <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month active">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div class="datepicker-years" style="display: none;">
                                <table class="table-condensed">
                                  <thead>
                                    <tr>
                                      <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                                      <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year active">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div class="datepicker-decades" style="display: none;">
                                <table class="table-condensed">
                                  <thead>
                                    <tr>
                                      <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
                                      <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                      <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </li>
                          <li class="picker-switch accordion-toggle"></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>


              <div class="card-footer">
                Footer
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2024 <a href="#">Ewak Pond</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('admin/dist/js/demo.js')}}"></script>

  @include('sweetalert::alert')

  @stack('script')

</body>

</html>