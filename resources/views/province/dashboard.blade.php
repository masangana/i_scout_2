@extends('layouts.app3')

@section('menu')
    @include('province.menu')
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Groupes <span>| Statistiques</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$groupes->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans le district. Le nombre de groupe sera mis à jour</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Sales Card -->
          <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Districts <span>| Statistiques</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$districts->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans la province. Le nombre sera mis à jour</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Route</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-trip"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$route->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans le district</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Clan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$clan->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans le district</span>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Compagnie</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-navigation"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$compagnie->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans le district</span>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <div class="col-xxl-6 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Troupe</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bx-group"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$troupe->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans le district</span>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <div class="col-xxl-6 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Meute</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bx bxl-baidu"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$meute->count()}}</h6>
                    <span class="text-muted small pt-2 ps-1">Dans le district</span>
                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="card-body">
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <script>
                    
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Customers',
                        data: @json($months)
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'month',
                        categories: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>
  
              <div class="activity">
  
                  @if ( $userLogs)
                      
                      
                      @foreach ($userLogs as $userLog)
                          @php
                              $classes = array_rand(array_flip(array('text-success', 'text-warning', 'text-info')),1)
  
                          @endphp
                          
                          <div class="activity-item d-flex">
                              <div class="activite-label">{{Str::limit($userLog->created_at->diffForHumans(), 7)}} </div>
                              <i class='bi bi-circle-fill activity-badge {{$classes }} align-self-start'></i>
                              <div class="activity-content">
                                  {{$userLog->subject }}
                              </div>
                          </div>
                      @endforeach
                      
                  @endif
  
                <!-- End activity item-->
  
  
              </div>
  
            </div>
        </div><!-- End Recent Activity -->

        <!-- Website Traffic -->
        <div class="card">

          <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: {{$clan->count()}},
                        name: 'Clan'
                      },
                      {
                        value: {{$compagnie->count()}},
                        name: 'Compagnie'
                      },
                      {
                        value: {{$troupe->count()}},
                        name: 'Troupe'
                      },
                      {
                        value: {{$meute->count()}},
                        name: 'Meute'
                      },
                      {
                        value: {{$route->count()}},
                        name: 'Route'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

      </div><!-- End Right side columns -->

    </div>
</section>

@endsection