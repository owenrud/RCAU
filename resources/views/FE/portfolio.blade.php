@extends('FE.layouts.main')

@section('content')    
   <div class="container" style="margin-top: 90px;">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="font2"><b>PORTFOLIO & PAPER</b></h1>
            </div>
            </div>
            <div class="row">
              <div class="col-lg-2">

              </div>
              <div class="col-lg-8">
                <p class="font4" style="text-align: center;">More than <b>300+ Number of Our Projects</b> (<b>100+</b> Housing, <b>70+</b> Commercial Area, <b>50+</b> Government Project & Public Facility)</p>
              </div>
              <div class="col-lg-2">

              </div>
            </div>
            </div>

            <div class="container">
              <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="tab" href="#completed">
                        Completed <span id="count_complete">(11)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#ong">
                        On Going <span id="count_ong">(5)</span> </a>
                  </li>
              </ul>
              <div class="row">
              <div class="tab-content">
                  <div class="tab-pane active" id="completed">
                    
                  </div>
                  <div class="tab-pane" id="ong">
                    
                  </div>
              </div>
              </div>
      
          </div>
      
@endsection

@section('script')

    

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
async function fetchPortfolioData(){
  const PortoAPIURL ="http://localhost:8000/api/portfolio/all";
  const response = await fetch(PortoAPIURL);
  const PortoData = await response.json();

  const count_complete = document.getElementById('count_complete');
  const count_ong = document.getElementById('count_ong');
  const  tab_completed = document.getElementById('completed');
  const tab_ong = document.getElementById('ong');
  let counter_ong = 0;
  let counter_comp = 0;
   let ongHTML = '';
  let completedHTML = '';
  PortoData.data.forEach(item=>{
    if(item.status == 0){
      counter_ong++;
       ongHTML += `
        <div class="col-lg-4 mt-3">
          <div class="card" style="border: #FFF;">
            <img src="${'storage/uploads/'+item.foto_project}" class="card-img img-fluid" alt="Background Gambar">
            <div class="card-img-overlay d-flex flex-column justify-content-end" style="margin-left: 19px; margin-bottom: 19px;">
              <div style="margin-top: auto;">
                <h5 class="card-title" style="margin-bottom:2px; font-size:medium;"><b>${item.title}</b></h5>
              </div>
            </div>
          </div>
        </div>`;
    }else{
      counter_comp++;
      completedHTML+=` <div class="col-lg-4 mt-3">
          <div class="card" style="border: #FFF;">
            <img src="${'storage/uploads/'+item.foto_project}" class="card-img img-fluid" alt="Background Gambar">
            <div class="card-img-overlay d-flex flex-column justify-content-end" style="margin-left: 15px; margin-bottom: 19px;">
              <div style="margin-top: auto;">
                <h5 class="card-title" style="margin-bottom:3px; font-size:medium;"><b>${item.title}</b></h5>
              </div>
            </div>
          </div>
        </div>`;
    }
  
     tab_ong.innerHTML = `<div class="row">${ongHTML}</div>`;
      tab_completed.innerHTML =`<div class="row">${completedHTML}</div>`
    count_complete.textContent = "("+counter_comp+")";
    count_ong.textContent = "("+counter_ong+")";

  })

}
fetchPortfolioData();
</script>    
@endsection