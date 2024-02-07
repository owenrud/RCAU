@extends('FE.layouts.main')


@section('content')
        <!-- Banner Image  -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content-web">
      <div class="container" id="home">
      <div class="row gap-row1">
      <div class="col-lg-5">
        <h5 id="title" class="judul"><b>PT. Rinjani Cipta Angkasa Utama</b></h5>
        <p class="font10">Establish 2021</p>
    </div>
    <div class="col-lg-1 mt-1">
        <img src="../assets/line2.png" alt="" class="line3">
    </div>
    <div class="col-lg-6 mt-1">
        <p id="deskripsi" class="paragraf1">Berlokasi di Bintaro Ruko Kebayoran Arcade dan berdiri pada tanggal 21 Juni 2021 yang bergerak dibidang konstruksi dan arsitektur. PT. RCAU mengedepankan SOP yang sesuai dengan standar mutu konstruksi serta mengutamakan perencanaan yang matang dari segi waktu, biaya, dan SDM.</p>
        <div class="row">
          <div class="col-lg-3">
            <p id="number_project" class="text-biru">300+</p>
          <p class="text-putih">Number of Project</p>
          </div>
          <div class="col-lg-3">
            <p id="housing" class="text-biru">70+</p>
          <p class="text-putih">Housing</p>
          </div>
          <div class="col-lg-3">
            <p id="commercial" class="text-biru">100+</p>
          <p class="text-putih">Commercial Area</p>
          </div>
          <div class="col-lg-3">
            <p id="government" class="text-biru">50+</p>
          <p class="text-putih">Government Project & Public Facility</p>
          </div>
        </div>
    </div>
    </div>
  </div>
  </div>
  <div class="content-mob">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="font10">Establish 2021</p>
          <h5 id="title_mob" class="judul"><b>PT. Rinjani Cipta Angkasa Utama</b></h5>
          <p id="deskripsi_mob" class="paragraf1">Berlokasi di Bintaro Ruko Kebayoran Arcade dan berdiri pada tanggal 21 Juni 2021 yang bergerak dibidang konstruksi dan arsitektur. PT. RCAU mengedepankan SOP yang sesuai dengan standar mutu konstruksi serta mengutamakan perencanaan yang matang dari segi waktu, biaya, dan SDM.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <p id="np_mob" class="text-biru">300+</p>
          <p class="text-putih">Number of Project</p>
        </div>
        <div class="col-6">
          <p id="com_mob" class="text-biru">100+</p>
          <p  class="text-putih">Commercial Area</p>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <p id="housing_mob" class="text-biru">70+</p>
          <p class="text-putih">Housing</p>
        </div>
        <div class="col-6">
          <p id="gov_mob" class="text-biru">50+</p>
          <p class="text-putih">Government Project & Public Facility</p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <section>
    <div class="video-container">
      <!-- Replace 'YOUR_YOUTUBE_VIDEO_ID' with the actual ID of your YouTube video -->
      <iframe src="https://www.youtube.com/embed/3DewzIv06IQ" frameborder="0" allowfullscreen></iframe>
    </div>
  </section>

    <div class="button-sticky1">
        <a href="https://api.whatsapp.com/send?phone=6282310097113">
        <img src="../assets/WA.png" id="sticky-button">
      </a>
    </div>

    <section id="form-awal">
        <div class="form-gap">
            <div class="row">
                <div class="col-lg-4">
                    <img src="../assets/kiri.png" alt="" class="img-2">
                </div>
                <div class="col-lg-4 p-5 pt-0">
                  <h5 class="font2"><b>Bikin rumah Impianmu Sesuai Budget kamu</b></h5>
                  <form id="Subscribe" class="row g-3">
                  <div class="col-12">
                    <label for="inputName" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name ="nama" placeholder="Nama">
                  </div>
                    <div class="col-md-6">
                      <label for="inputEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-md-6">
                      <label for="inputNumber" class="form-label">No. Handphone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="No. Handphone">
                    </div>
                    <div class="col-md-6">
                      <label for="inputDesign" class="form-label">Design / Bangun / Renovasi</label>
                      <select name ="kategori" id="inputDesign" class="form-select">
                        <option value="Design" selected>Design</option>
                        <option value="Bangun">Bangun</option>
                        <option value="Renovasi">Renovasi</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="inputDesign" class="form-label">Rumah Tinggal</label>
                      <select name="rumah_tinggal" id="inputDesign" class="form-select">
                        <option value="1" selected>1 Lantai</option>
                        <option value ="2">2 Lantai</option>
                        <option value ="3">3 Lantai</option>
                      </select>
                    </div>
                    <div class="col-md-8">
                      <label for="inputKomersial" class="form-label">Komersial</label>
                      <select  name="komersial" id="inputKomersial" class="form-select">
                        <option value="booth" selected>Booth</option>
                        <option value ="2">2</option>
                        <option value="3">3</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="inputLuas" class="form-label">Luas (m2)</label>
                      <input type="number" class="form-control" id="inputLuas" name="luas">
                    </div>
                    <div class="col-12">
                      <label for="inputBudget" class="form-label">City</label>
                      <select name="city" id="inputBudget" class="form-select">
                        <option value="100 Juta" selected> 100 Juta </option>
                        <option value=">100 Juta"> >100 Juta </option>
                        <option value ="<=100 Juta"> <= 100 Juta</option>
                      </select>
                    </div>
                    <div class="d-grid gap-2">
                      <button onclick="postForm(event)" type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                  </form>
                </div>
                <div class="col-lg-4">
                    <img src="../assets/kanan.png" alt="" class="img-3">
                </div>
            </div>
        </div>
    </section>

   <section id="portfolio">
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
             <div class="row">
              <div class="tab-content" id="content">
               </div>
              </div>
      
          </div>
   </section>

              @endsection

@section('script')
    
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
async function fetchPortfolioData(){
  const PortoAPIURL ="http://localhost:8000/api/portfolio/all";
  const response = await fetch(PortoAPIURL);
  const PortoData = await response.json();
 let tabHTML = ''; // Initialize tabHTML variable
let counterItem = 0; // Initialize counterItem variable

// Iterate through PortoData.data using a for loop
for (let i = 0; i < PortoData.data.length; i++) {
  const item = PortoData.data[i]; // Get current item
  // Append HTML code for the current item to tabHTML variable
  tabHTML += `
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
  counterItem++; // Increment counterItem
  if (counterItem >= 3) { // Check if counterItem is greater than or equal to 3
  tabHTML += `
    <div class="col-lg-4 mt-3">
      
        <div class="card-body d-flex justify-content-center align-items-center" style="height: 100%;">
          <button class="btn btn-primary">See All</button>
        </div>
      
    </div>`;
    break; // Exit the loop if counterItem is 3 or more
  }
}

// tabHTML now contains HTML code for the first 3 items


content.innerHTML = `<div class="row">${tabHTML}</div>`;
}

fetchPortfolioData();

const navEl = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY >= 80) {
            navEl.classList.add('navbar-scrolled');
            navEl.classList.remove('navbar-initial');
        } else if (window.scrollY < 80) {
            navEl.classList.add('navbar-initial');
            navEl.classList.remove('navbar-scrolled');
        }
    });
async function fetchHeroData(){
  const HeroAPIURL ="http://localhost:8000/api/hero/all";
  const response = await fetch(HeroAPIURL);
  const HeroData = await response.json();
  //console.log(HeroData.data);

  const title = document.getElementById('title');
  const deskripsi = document.getElementById('deskripsi');
  const number_project = document.getElementById('number_project');
  const housing = document.getElementById('housing');
  const commerical = document.getElementById('commerical');
  const government = document.getElementById('government');
   const title_mob = document.getElementById('title_mob');
  const deskripsi_mob = document.getElementById('deskripsi_mob');
  const np_mob = document.getElementById('np_mob');
  const housing_mob = document.getElementById('housing_mob');
  const com_mob = document.getElementById('com_mob');
  const gov_mob = document.getElementById('gov_mob');
  title.textContent = HeroData.data.title;
  deskripsi.textContent = HeroData.data.deskripsi;
  number_project.textContent = HeroData.data.number_project;
  housing.textContent = HeroData.data.housing;
  commercial.textContent = HeroData.data.commercial;
  government.textContent = HeroData.data.government;
  title_mob.textContent = HeroData.data.title;
  deskripsi_mob.textContent = HeroData.data.deskripsi;
  np_mob.textContent = HeroData.data.number_project;
  housing_mob.textContent = HeroData.data.housing;
  com_mob.textContent = HeroData.data.commercial;
  gov_mob.textContent = HeroData.data.government;
}

fetchHeroData();
document.addEventListener('DOMContentLoaded', function () {

    function postForm(event) {
    event.preventDefault();  // Mencegah tindakan default formulir

    const form = document.getElementById('Subscribe');
    const formData = new FormData(form);

    fetch('http://localhost:8000/api/subscribe/save', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.is_success) {
            // Redirect to /admin if successful
            window.location.reload();
        } else {
            // Handle the case where save failed
            console.error('Failed to save data:', data.message);
            // You can display an error message to the user or take other actions
        }
    })
    .catch(error => console.error('Error during fetch:', error));
}

// Menambahkan event listener ke formulir untuk mendengarkan peristiwa pengiriman
const form = document.querySelector('form');
form.addEventListener('submit', postForm);
});
</script>
@endsection