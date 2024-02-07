@extends('FE.layouts.main')



@section('content')
        <div class="button-sticky1">
        <a href="https://api.whatsapp.com/send?phone=6282310097113">
        <img src="./assets/WA.png" id="sticky-button">
      </a>
    </div>

    <section class="mission" id="mission">
        <div class="container mission-gap">
            <div class="row">
                <div class="col-12" style="margin-top: 70px;">
                    <h5 class="font1"><b>About Us</b></h5>
                    <h5 class="font2"><b>Our Vision & Mission</b></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                        <div class="card card-servic" style="border: 1px solid #FFF;">
                          <div class="card" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); border: none;">
                            <div class="card-body card-kotak">
                              <h4 class="card-title font3"><b>Vision</b></h4>
                              <p id="visi_deskripsi" class="card-text font4">
                                Perusahaan EPC (Engineering Procurement Construction) yang meningkatkan produktivitas SDM dengan mengacu pada SOP dan standar mutu konstruksi serta berkembang menjadi Perusahaan Konstruksi berbasis teknologi.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 mt-3">
                        <div class="card card-servic" style="border: 1px solid #FFF;">
                          <div class="card" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); border: none;">
                            <div class="card-body card-kotak">
                              <h4 class="card-title font3"><b>Mission</b></h4>
                                <ul id="list_misi" class="card-text font4">
                                </ul>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
    </section>
     <section id="services">
      <div class="container-fluid service-gap">
          <div class="container">
          <div  class="row">
              <div class="col-lg-4 service1">
                  <h5 class="font1"><img src="./assets/line1.png" class="line1" alt=""> Our Services</h5>
                  <h5 class="font11"><b>This is the best service we provide for you </b></h5>
                  <a href="https://api.whatsapp.com/send?phone=6282310097113" style="text-decoration: none;"><button class="btn-1 web-btn">Contact Us</button></a>
              </div>
              <div id="test" class="col-lg-8">
              </div>
             
          <div class="col-lg-12 button-2">
            <button class="btn-1 mob-btn">Contact Us</button>
  
          </div>
      </div>
      </div>
      </div>
      </div>
     
  </section>


@endsection


@section('script')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
async function fetchAllVisiData() {
        try {
            const response = await fetch('http://localhost:8000/api/visi/all');
            const visiData = await response.json();

            if (visiData.is_success) {
                displayVisiData(visiData.data);
            } else {
                console.error('Error fetching all visi data:', visiData.message);
            }
        } catch (error) {
            console.error('Error fetching all visi data:', error);
        }
        
    }
    async function fetchAllMisiData() {
        try {
            const response = await fetch('http://localhost:8000/api/misi/all');
            const misiData = await response.json();

            if (misiData.is_success) {
                displaymisiData(misiData.data);
            } else {
                console.error('Error fetching all misi data:', misiData.message);
            }
        } catch (error) {
            console.error('Error fetching all misi data:', error);
        }
    }

 function displaymisiData(misiData) {
      console.log(misiData);
        const misiDiv = document.getElementById('list_misi');
       
       misiData.forEach(item=>{
        const list = document.createElement('li');
        list.textContent = item.deskripsi;
        misiDiv.appendChild(list);
       })
    }

     function displayVisiData(visiData) {
     
        const visiDiv = document.getElementById('visi_deskripsi');
       visiDiv.textContent=visiData.deskripsi;
    }
    
    fetchAllMisiData();
    fetchAllVisiData();

async function FetchandPopulateServices() {
  let counterService=0;
  const ServicesAPI = "http://localhost:8000/api/services/all";
  const response = await fetch(ServicesAPI);
  const ServicesData = await response.json();
  const serviceDiv = document.getElementById('test');

  console.log(ServicesData);

  ServicesData.data.forEach((item, index) => {
    // Create a new <div> for each item
    counterService++;
    const div = document.createElement('div');
    div.classList.add('col-lg-6', 'jarak-mob');
const tagsArray = JSON.parse(item.tags);
    const tagsElements = tagsArray.map(tag => `<p class="mx-1 font7">${tag}</p>`).join('');

    // Create the first card structure
    div.innerHTML = `
      <div class="card card-service mb-4" style="border: 1px solid #FFF;">
        <div class="card" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); border: none;">
          <div class="card-body card-kotak2">
            <h4 class="card-title font5">0${counterService}</h4>
            <h5 class="font6"><b>${item.nama}</b></h5>
             ${tagsElements}
          </div>
        </div>
      </div>
    `;

    // If the index is odd or the first item, create a new row
    if (index % 2 === 0) {
      const newRow = document.createElement('div');
      newRow.classList.add('row');
      serviceDiv.appendChild(newRow);
    }

    // Append the new <div> to the current row
    const currentRow = serviceDiv.lastElementChild;
    currentRow.appendChild(div);
  });
}

// Call the function to fetch and populate services
FetchandPopulateServices();
</script>

@endsection