<x-admin-layout>


    <div class="content">
        <div class="container-fluid ">
            <div class="">
                <div class="container-fluid mt-1">
                    <div class="card rounded">
                        <h1 style="font-size: 40px; font-weight: 600;" class="pl-3 p-3">ADMIN DASHBOARD</h1>
                    </div>
                </div>

                <div class="container-fluid mt-5 ">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card bg-dark shadow p-4 py-4">
                                <div class="d-flex mb-3">
                                    <i style="font-size: 40px; align-items: center;" class="fas fa-tag mr-3"></i>
                                    <div style="font-size: 20px; font-weight: 800;" class="pt-1">SALES AMOUNT</div>
                                </div>
                                <div style="font-size: 30px;" class="pl-2"> <b>$
                                        @php
                                            $total = 0;
                                            foreach ($sales as $sale) {
                                                $total += $sale->total;
                                            }
                                            echo $total;

                                        @endphp



                                    </b> </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-dark shadow p-4 py-4">
                                <div class="d-flex mb-3">
                                    <i style="font-size: 40px; align-items: center;"
                                        class="fas fa-shopping-cart text-white mr-3"></i>
                                    <div style="font-size: 20px; font-weight: 800;" class="pt-1 text-white">ORDERS</div>
                                </div>
                                <div style="font-size: 30px;" class="pl-2 text-white"> <b>{{ $orders->count() }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-dark shadow p-4 py-4">
                                <div class="d-flex mb-3">
                                    <i style="font-size: 40px; align-items: center;"
                                        class="fas fa-dumbbell text-white mr-3"></i>
                                    <div style="font-size: 20px; font-weight: 800;" class="pt-1 text-white">TRAINERS
                                    </div>
                                </div>
                                <div style="font-size: 30px;" class="pl-2 text-white"> <b>{{ $trainers->count() }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-dark shadow p-4 py-4">
                                <div class="d-flex mb-3">
                                    <i style="font-size: 40px; align-items: center;"
                                        class="fas fa-book text-white mr-3"></i>
                                    <div style="font-size: 20px; font-weight: 800;" class="pt-1 text-white">COURSES
                                    </div>
                                </div>
                                <div style="font-size: 30px;" class="pl-2 text-white"> <b>{{ $courses->count() }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-dark shadow p-4 py-4">
                                <div class="d-flex mb-3">
                                    <i style="font-size: 40px; align-items: center;"
                                        class="fas fa-dumbbell text-white mr-3"></i>
                                    <div style="font-size: 20px; font-weight: 800;" class="pt-1 text-white">NORMAL USERS
                                    </div>
                                </div>
                                <div style="font-size: 30px;" class="pl-2 text-white"> <b>{{ $normal_users->count() }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card bg-dark shadow p-4 py-4">
                                <div class="d-flex mb-3">
                                    <i style="font-size: 40px; align-items: center;"
                                        class="fas fa-book text-white mr-3"></i>
                                    <div style="font-size: 20px; font-weight: 800;" class="pt-1 text-white">COURSES
                                    </div>
                                </div>
                                <div style="font-size: 30px;" class="pl-2 text-white"> <b>{{ $courses->count() }}</b>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                {{-- Graph --}}
                <div id="sale" >

                </div>

                <div class="container-fluid">
                    <div class="row mt-2 mb-5">
                      <div class="col-lg-8">
                        <div class="card shadow p-4">
                          
                          <div  class="d-flex">
                            <div style="font-size: 20px;" class="mr-auto">SALES PROGRESS</div>
                              <a href="/admin#sale" class="mr-3 px-2 {{ request('saleline1') ? 'bmi' : 'bmiactive' }}" style="font-size: 12px; padding-top: 2.7px;">Bar Graph</a>
                              <a href="/admin?saleline1=1#sale" class="mr-3 px-2 {{ request('saleline1') ? 'bmiactive' : 'bmi' }}" style="font-size: 12px; padding-top: 2.7px;">Line Graph</a>
                            </div>
                       
                        <div class="tab  {{ request('saleline1') ? '' : 'active' }}">
                          <canvas id="mySaleBarChart" style="width: 100%; max-height: 465px;"></canvas>
                      </div>
                      <div class="tab {{ request('saleline1') ? 'active' : '' }}">
                        <canvas id="mySaleLineChart" style="width: 100%; max-height: 465px;"></canvas>
                      </div>
                        </div>
                        
                      </div>
                  
                        <div class="col-lg-4 ">
                          <div class="card shadow p-4">
                            <div style="font-size: 20px;" class="mr-auto">ORDER STATUS</div>
                            <div class="">
                                <canvas id="myOrderPieChart" style="width: 100%; height: 100%; max-height: 470px;"></canvas>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div id="user" class="row mt-2 mb-5">
                        <div class="col-lg-5 ">
                            <div class="card shadow p-4">
                              <div style="font-size: 20px;" class="mr-auto">USER STATUS</div>
                              <div class="">
                                  <canvas id="myPieChart" style="width: 100%; height: 100%; max-height: 425px;"></canvas>
                              </div>
                            </div>
                          </div>
                  
                        <div class="col-lg-7 ">
                          <div class="card shadow p-4">
                            <div  class="d-flex">
                            <div style="font-size: 20px;" class="mr-auto">TRAINER REGISTRATION PROGRESS</div>
                              <a href="/admin#user" class="mr-3 px-2 {{ request('line') ? 'bmi' : 'bmiactive' }}" style="font-size: 12px; padding-top: 2.7px;">Bar Graph</a>
                              <a href="/admin?line=1#user" class="mr-3 px-2 {{ request('line') ? 'bmiactive' : 'bmi' }}" style="font-size: 12px; padding-top: 2.7px;">Line Graph</a>
                            </div>
                            <div class="tab  {{ request('line') ? '' : 'active' }}">
                                <canvas id="myBarChart" style="width: 100%;"></canvas>
                            </div>
                            <div class="tab {{ request('line') ? 'active' : '' }}">
                                <canvas id="myLineChart" style="width: 100%;"></canvas>
                            </div>
                          </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myBarChart').getContext('2d');



            var userChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Trainer Registration',
                        //backgroundColor: {!! json_encode($datasets[0]['backgroundColor']) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        hoverOffset: 4,
                        data: {!! json_encode($datasets[0]['data']) !!}
                    }]
                },
            });
        });
    </script>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myLineChart').getContext('2d');

            var userChart = new Chart(ctx, {
                type: 'line', 
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Trainer Registration', 
                        fill: true,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        tension: 1,
                        hoverOffset: 4,
                        data: {!! json_encode($datasets[0]['data']) !!} 
                    }]
                },
            });
        });
    </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('myOrderPieChart').getContext('2d');



      var userChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: {!! json_encode($orderStatusLabel) !!},
              datasets: [{
                  label: 'Trainer Registration',
                  backgroundColor: {!! json_encode($orderStatusDatasets[0]['backgroundColor']) !!},
                  cutout: '60%',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1,
                  hoverOffset: 4,
                  animateRotate: true,
                  data: {!! json_encode($orderStatusDatasets[0]['data']) !!}
              }]
          },
      });
  });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('myPieChart').getContext('2d');
  
  
  
        var userChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($userStatusLabel) !!},
                datasets: [{
                    label: 'Trainer Registration',
                    backgroundColor: {!! json_encode($userStatusDatasets[0]['backgroundColor']) !!},
                    cutout: '60%',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    hoverOffset: 4,
                    animateRotate: true,
                    data: {!! json_encode($userStatusDatasets[0]['data']) !!}
                }]
            },
        });
    });
  </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('mySaleLineChart').getContext('2d');

            var userChart = new Chart(ctx, {
                type: 'line', 
                data: {
                    labels: {!! json_encode($monthLabels) !!},
                    datasets: [{
                        label: 'Sales', 
                        fill: true,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        tension: 1,
                        data: {!! json_encode($saleDatasets[0]['data']) !!} 
                    }]
                },
            });
        });
    </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('mySaleBarChart').getContext('2d');

      var userChart = new Chart(ctx, {
          type: 'bar', 
          data: {
              labels: {!! json_encode($monthLabels) !!},
              datasets: [{
                  label: 'Sales', 
                  fill: true,
                  
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1,
                  tension: 1,
                  data: {!! json_encode($saleDatasets[0]['data']) !!} 
              }]
          },
      });
  });
</script>









</x-admin-layout>
{{-- <div class="row mt-5 mb-4 d-flex justify-content-center">
                        <h1>TRAINER REGISTRATION</h1>
                    </div>
                    <div style="margin-left: 138px;" class="row mt-5 mb-5">
                        <a href="/admin#trainer" class="checkout ml-4 px-4 py-2  mr-4">Bar Graph</a>
                        <a href="/admin?line=1#trainer" class="checkout px-4 py-2">Line Graph</a>
                    </div> --}}