@extends('FE.layouts.main')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2" style="margin-top: 90px;">
                <h5 class="font2"> <b>Gallery</b> </h5>
            </div>
        </div>
        </div>

        <div class="container">
          <ul class="nav nav-tabs">
              <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#foto">
                    Foto </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#video">
                    Video </a>
              </li>
          </ul>
          <div class="row">
            <div class="tab-content">
                <div class="tab-pane active" id="foto">
        
        </div>
        
        <div class="tab-pane" id="video">
         
        </div>
        </div>
        </div>
        </div>
      
        <div id="myModal" class="modal">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div id="modalFotoContent" class="modal-content">
        
            <!-- <div class="mySlides">
              <img src="./assets/comiccon.jpeg" class="modal-img">
            </div> -->
        
           
        

            <!-- <div class="mySlides">
              <img src="./assets/solo.jpg" class="modal-img">
            </div> -->
            
            <a class="prev" onclick="plusSlides(-1)"><img src="./assets/arrow_kiri_gallery.png" alt=""></a>
            <a class="next" onclick="plusSlides(1)"><img src="./assets/arrow_kanan_gallery.png" alt=""></a>
        
        </section>
         <div id="modalVideoContent" class="modal-content">
        
        </div>
    </div>
    </div>

@endsection
@section('script')

<script>
  var slideIndex = 1;
  function openModal() {
    document.getElementById("myModal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }

 
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  function clearContent(element) {
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}

async function fetchGalleryData() {
    const API = "http://localhost:8000/api/gallery/all";
    const response = await fetch(API);
    const GalData = await response.json();
    const tab_foto = document.getElementById('foto');
    const tab_vid = document.getElementById('video');
    const modalFotoContent = document.getElementById('modalFotoContent');
    const modalVideoContent = document.getElementById('modalVideoContent');
    let fotoHTML = '';
    let vidHTML = '';
    let modFotoContentHTML = '';
    let modVidContentHTML = '';

    console.log(GalData);

    GalData.data.forEach((item, index) => {
        if (item.type == "foto") {
            fotoHTML += `<div class="col-lg-4 mt-2">
                            <img src="${'storage/uploads/' + item.file}" onclick="openModal();currentSlide(${index})" class="hover-shadow cursor images-mission img-fluid img-web">
                        </div>`;
            modFotoContentHTML += `<div class="mySlides">
                                      <img src="${'storage/uploads/' + item.file}" class="modal-img">
                                    </div>
                                    <a class="prev" onclick="plusSlides(-1)"><img src="./assets/arrow_kiri_gallery.png" alt=""></a>
                                    <a class="next" onclick="plusSlides(1)"><img src="./assets/arrow_kanan_gallery.png" alt=""></a>`;
        } else {
            vidHTML += `<div class="col-lg-4 mt-2">
                            <img src="${'storage/uploads/' + item.file}" alt="${item.file}" onclick="openModal();currentSlide(${index})" class="hover-shadow cursor images-mission img-fluid img-web">
                        </div>`;
            modVidContentHTML += `<div class="mySlides">
                                      <img src="${'storage/uploads/' + item.file}" class="modal-img">
                                    </div>
                                    <a class="prev" onclick="plusSlides(-1)"><img src="./assets/arrow_kiri_gallery.png" alt=""></a>
                                    <a class="next" onclick="plusSlides(1)"><img src="./assets/arrow_kanan_gallery.png" alt=""></a>`;
        }
    });

    // Clear existing content before adding new content
    clearContent(tab_foto);
    clearContent(tab_vid);
    clearContent(modalFotoContent);
    clearContent(modalVideoContent);

    // Append new content
    tab_foto.innerHTML = `<div class="row">${fotoHTML}</div>`;
    tab_vid.innerHTML = `<div class="row">${vidHTML}</div>`;
    modalFotoContent.innerHTML = `${modFotoContentHTML}`;
    modalVideoContent.innerHTML = `${modVidContentHTML}`;


}

// Call the function to fetch and display gallery data
fetchGalleryData();
document.getElementById('foto-tab').classList.add('active');


function clearContent(element) {
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}

// Call the function to fetch and display gallery data
fetchGalleryData();


  </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>     
    
@endsection