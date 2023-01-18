@extends('layouts.app3')

@section('menu')
    @include('groupe.menu')
@endsection

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <a href="{{Route('groupe.meute')}}">
                  <h5 class="card-title">Meute </h5>
                </a>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$meute->count()}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <a href="{{Route('groupe.troupe')}}">
                  <h5 class="card-title">Troupe </h5>
                </a>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$troupe->count()}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card compagnie-card">

              <div class="card-body">
                <a href="{{Route('groupe.compagnie')}}">
                  <h5 class="card-title">Compagnie </h5>
                </a>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$compagnie->count()}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-6 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <a href="{{Route('groupe.route')}}">
                  <h5 class="card-title">Route </h5>
                </a>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$route->count()}}</h6>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Customers Card -->
          <div class="col-xxl-6 col-xl-12">

            <div class="card info-card clan-card">

              <div class="card-body">
                <a href="{{Route('groupe.clan')}}">
                  <h5 class="card-title">Clan </h5>
                </a>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$clan->count()}}</h6>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="card-body">
                <h5 class="card-title">Rapport Mensuel des nouveaux membres </h5>
                
                <!-- Bar Chart -->
                <canvas id="barChart" style="max-height: 400px;"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                        labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                 'Juillet', 'Août','Septembre','Octobre','Novembre','Décembre'],
                        datasets: [{
                            label: 'Rapport',
                            data: [ {{$janvier->count()}},
                                    {{$fevrier->count()}},
                                    {{$mars->count()}},
                                    {{$avril->count()}},
                                    {{$mai->count()}},
                                    {{$juin->count()}},
                                    {{$juillet->count()}},
                                    {{$aout->count()}},
                                    {{$septembre->count()}},
                                    {{$octobre->count()}},
                                    {{$novembre->count()}},
                                    {{$decembre->count()}}],
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            y: {
                            beginAtZero: true
                            }
                        }
                        }
                    });
                    });
                </script>
                <!-- End Bar CHart -->
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
            <h5 class="card-title">Statistiques Par Unité</h5>

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