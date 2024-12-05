@extends('layouts.user_type.auth')

@section('content')

<div class="row">
  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card shadow-sm">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Risiko</p>
              <h5 class="font-weight-bolder mb-0">
              {{ $risk }}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
              <i class="ni ni-alert-circle-exc text-lg opacity-10" aria-hidden="true"></i> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card shadow-sm">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Rekomendasi Mitigasi</p>
              <h5 class="font-weight-bolder mb-0">
              {{ $mitigation }}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
              <i class="ni ni-clipboard text-lg opacity-10" aria-hidden="true"></i> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-4">
    <div class="card shadow-sm">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Perubahan Status</p>
              <h5 class="font-weight-bolder mb-0">
              {{ $status }}
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
              <i class="ni ni-refresh-02 text-lg opacity-10" aria-hidden="true"></i> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card shadow-sm">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-lg-6">
            <div class="d-flex flex-column h-100">
              <p class="mb-1 pt-2 text-bold" style="font-size: 30px; color: black;">Tingkat Risiko</p>
              <p class="mb-1 pt-2" style="color: red; font-size: 14px;">*berdasarkan nilai RPN</p>
            </div>
          </div>
          <div class="col-lg-6 ms-auto">
            <canvas id="chart-bars" style="width: 100%; height: 250px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('dashboard')
<script>
  window.onload = function() {
    var ctx = document.getElementById("chart-bars").getContext("2d");

    var gradientRed = ctx.createLinearGradient(0, 0, 0, 400);
    gradientRed.addColorStop(0, '#FF0000');
    gradientRed.addColorStop(1, '#FF6F61');

    var gradientYellow = ctx.createLinearGradient(0, 0, 0, 400);
    gradientYellow.addColorStop(0, '#FFFF00');
    gradientYellow.addColorStop(1, '#FFD700');

    var gradientGreen = ctx.createLinearGradient(0, 0, 0, 400);
    gradientGreen.addColorStop(0, '#00FF00');
    gradientGreen.addColorStop(1, '#32CD32');

    new Chart(ctx, {
      type: "pie",
      data: {
        labels: ["Tinggi", "Sedang", "Rendah"],
        datasets: [{
          label: "Risk Levels",
          backgroundColor: [gradientRed, gradientYellow, gradientGreen],
          data: [2, 10, 16],
          borderWidth: 0,
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                let value = tooltipItem.raw;
                return $;{tooltipItem.label}; $:{value};
              }
            }
          }
        },
      },
    });
  }
</script>
@endpush