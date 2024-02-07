@extends('FE.layouts.main')
@section('content')
<div class="container-fluid">
    

    
      <div class="button-sticky1">
        <a href="https://api.whatsapp.com/send?phone=6282310097113">
        <img src="./assets/WA.png" id="sticky-button">
      </a>
    </div>

      

      <section class="channel" id="channel">
          <div class="container channel">
              <div class="row">
                <div class="col-lg-12 mb-4" style="margin-top: 90px;">
                    <h5 class="font2"> <b>Channel</b> </h5>
                </div>
                      <!-- <div class="col-lg-6 col-md-6 col-xs-6">
                          <img src="./asset/konten_channel.png" alt="" class="img-fluid gambar-channel1">
                      </div> -->
                      <!-- <div class="btn-mobile"  style="justify-content: center;">
                        <button type="button" class="btn btn-outline-danger btn-subscribe" onClick="SubscribeClick()">Subscribe</button>
                      </div> -->
                  </div>
              </div>
              </div>
          </div>
      </section>
      
      <section class="view" id="view">
          <div class="container view">
              <div class="row" id="videoList">
               
                  <!--MEMBACA DATA YOUTUBE API HASIL DARI JAVASCRIPT DI ATAS-->
                  
                  <!--MEMBACA DATA YOUTUBE API HASIL DARI JAVASCRIPT DI ATAS-->

              </div>
          </div>
      </section>

      

@endsection
@section('script')
<!--Fetch Youtube API-->
  <script>
    function fetchDataFromYouTubeMobile() {
     
const playlistId = 'PLNVlxaqrs3plmC6WAT1mMDKK32qXCFYMx'; // Ganti dengan ID playlist YouTube yang ingin Anda ambil
const apiKey = 'AIzaSyCy4yN-TorGzi65kq3BHu9hvsVeWmqhScM'; // Ganti dengan kunci API YouTube Anda
const thumbnailSize = 'high';

fetch(`https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=18&playlistId=${playlistId}&key=${apiKey}`)
 .then(response => response.json())
 .then(data => {
   const videoListElement = document.getElementById('videoList');

   data.items.forEach(item => {
     const videoTitle = item.snippet.title;
     const videoId = item.snippet.resourceId.videoId;
     const videoThumbnail = item.snippet.thumbnails[thumbnailSize].url;

     // Lakukan permintaan terpisah untuk statistik video
     fetch(`https://www.googleapis.com/youtube/v3/videos?part=statistics&id=${videoId}&key=${apiKey}`)
       .then(response => response.json())
       .then(videoData => {
         if (videoData.items && videoData.items.length > 0) {
           const statistics = videoData.items[0].statistics;
           const viewCount = statistics.viewCount;

           // Selanjutnya, Anda bisa menggabungkan viewCount dengan elemen HTML yang sesuai
           // Berikan tampilan jumlah tampilan ke elemen yang sesuai
           // (misalnya, dengan mengubah elemen yang memiliki ID tertentu)
           const videoStats = `${viewCount} views`;
           const videoPublishedAt = new Date(item.snippet.publishedAt).toLocaleString()
           var timeAgo = calculateTimeDiff(videoPublishedAt);
           
           const videoInfo = `${videoStats} | ${timeAgo}`;

           // Buat elemen-elemen HTML sesuai dengan format yang diinginkan
           const listItem = document.createElement('div');
           listItem.className = 'col-lg-12'; // Tambahkan class untuk lebar kolom
           listItem.style.marginBottom = 24 + 'px';

           const divGambarView = document.createElement('div');
           divGambarView.className = 'gambar-view img-mobile';

           const link = document.createElement('a');
           link.href = `https://www.youtube.com/watch?v=${videoId}`;
           const img = document.createElement('img');
           img.src = videoThumbnail;
           img.className = 'gambar-view3';
           img.id = 'videoThumbnail';

           link.appendChild(img);

           const pText = document.createElement('p');
                pText.textContent = videoTitle;
                pText.className = 'view-text';
                pText.style.marginBottom = '8px';
                pText.style.marginTop = '16px';
                pText.style.width = '350px'; // Sesuai dengan lebar teks utama
                pText.style.wordWrap = 'break-word'; // Memastikan teks mematahkan kata yang panjang
                pText.style.overflow = 'hidden';
                pText.style.display = '-webkit-box';
                pText.style.webkitLineClamp = 2;
                pText.style.webkitBoxOrient = 'vertical';

                link.appendChild(pText);

           const divFlex = document.createElement('div');
           divFlex.className = 'd-flex';

           const divStats = document.createElement('div');
           divStats.textContent = videoInfo;
           divStats.className = 'p-2 flex-shrink-1 view-text3';

           divFlex.appendChild(divStats);

           divGambarView.appendChild(link);
           divGambarView.appendChild(pText);
           divGambarView.appendChild(divFlex);

           listItem.appendChild(divGambarView);

           videoListElement.appendChild(listItem);
         } else {
           console.log('Tidak ada statistik video ditemukan.');
         }
       })
       .catch(error => {
         console.error('Error saat mengambil statistik video:', error);
       });
   });
 })
 .catch(error => {
   console.error('Error:', error);
 });
}
 </script>

 <script>
   function calculateTimeDiff(publishedAt) {
var now = new Date();
var uploadedTime = new Date(publishedAt);
var timeDiff = Math.abs(now - uploadedTime);

var hours = Math.floor(timeDiff / 3600000); // 1 jam = 3600000 milidetik
var days = Math.floor(hours / 24);

if (days >= 30) {
var months = Math.floor(days / 30);
return  months + (months === 1 ? " Month" : " Months") + " Ago";
} else if (days >= 365) {
var years = Math.floor(days / 365);
return  years + (years === 1 ? " Year" : " Years") + " Ago";
} else if (days >= 1) {
return   days + (days === 1 ? " Day" : " Days") + " Ago";
} else {
return   hours + (hours === 1 ? " Hour" : " Hours") + " Ago";
}
}
</script>

<script>
    function fetchDataFromYouTubeDesktop() {
     const isMobileView = window.innerWidth <= 768;
const playlistId = 'PLNVlxaqrs3plmC6WAT1mMDKK32qXCFYMx'; // Ganti dengan ID playlist YouTube yang ingin Anda ambil
const apiKey = 'AIzaSyCy4yN-TorGzi65kq3BHu9hvsVeWmqhScM'; // Ganti dengan kunci API YouTube Anda
const thumbnailSize = 'maxres';

fetch(`https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=18&playlistId=${playlistId}&key=${apiKey}`)
 .then(response => response.json())
 .then(data => {
   const videoListElement = document.getElementById('videoList');

   data.items.forEach(item => {
     const videoTitle = item.snippet.title;
     const videoId = item.snippet.resourceId.videoId;
     const videoThumbnail = item.snippet.thumbnails[thumbnailSize].url;

     // Lakukan permintaan terpisah untuk statistik video
     fetch(`https://www.googleapis.com/youtube/v3/videos?part=statistics&id=${videoId}&key=${apiKey}`)
       .then(response => response.json())
       .then(videoData => {
         if (videoData.items && videoData.items.length > 0) {
           const statistics = videoData.items[0].statistics;
           const viewCount = statistics.viewCount;

           // Selanjutnya, Anda bisa menggabungkan viewCount dengan elemen HTML yang sesuai
           // Berikan tampilan jumlah tampilan ke elemen yang sesuai
           // (misalnya, dengan mengubah elemen yang memiliki ID tertentu)
           const videoStats = `${viewCount} views`;
           const videoPublishedAt = new Date(item.snippet.publishedAt).toLocaleString()
           var timeAgo = calculateTimeDiff(videoPublishedAt);
           
           const videoInfo = `${videoStats} | ${timeAgo}`;

           // Buat elemen-elemen HTML sesuai dengan format yang diinginkan
           const listItem = document.createElement('div');
           listItem.className = 'col-lg-4'; // Tambahkan class untuk lebar kolom
           listItem.style.marginBottom = 24 + 'px';

           const divGambarView = document.createElement('div');
           divGambarView.className = 'gambar-view img-web';

           const link = document.createElement('a');
           link.href = `https://www.youtube.com/watch?v=${videoId}`;
           const img = document.createElement('img');
           img.src = videoThumbnail;
           img.className = 'img-fluid gambar-view3';
           img.id = 'videoThumbnail';
           img.style.width ='100%';

           link.appendChild(img);

           const pText = document.createElement('p');
            pText.textContent = videoTitle;
            pText.className = 'view-text';
            pText.style.marginBottom = '8px';
            pText.style.marginTop = '16px';
            pText.style.width = '350px'; // Sesuai dengan lebar teks utama
            pText.style.wordWrap = 'break-word'; // Memastikan teks mematahkan kata yang panjang
            pText.style.overflow = 'hidden';
            pText.style.display = '-webkit-box';
            pText.style.webkitLineClamp = 2;
            pText.style.webkitBoxOrient = 'vertical';

            link.appendChild(pText);

           const divFlex = document.createElement('div');
           divFlex.className = 'd-flex';

           const divStats = document.createElement('div');
           divStats.textContent = videoInfo;
           divStats.className = 'p-2 flex-shrink-1 view-text3';

           divFlex.appendChild(divStats);

           divGambarView.appendChild(link);
           divGambarView.appendChild(pText);
           divGambarView.appendChild(divFlex);

           listItem.appendChild(divGambarView);

           videoListElement.appendChild(listItem);
         } else {
           console.log('Tidak ada statistik video ditemukan.');
         }
       })
       .catch(error => {
         console.error('Error saat mengambil statistik video:', error);
       });
   });
 })
 .catch(error => {
   console.error('Error:', error);
 });
}
</script>

<script>
function handleResize() {
const windowWidth = window.innerWidth;
const mobileBreakpoint = 768; // Ganti dengan breakpoint tampilan mobile yang sesuai

const videoListElement = document.getElementById('videoList');

// Hapus semua div yang ada
while (videoListElement.firstChild) {
 videoListElement.removeChild(videoListElement.firstChild);
}

// Cek apakah lebar layar saat ini adalah tampilan mobile
if (windowWidth < mobileBreakpoint) {
 // Jika iya, jalankan ulang pembuatan div untuk tampilan mobile
 fetchDataFromYouTubeMobile();
} else {
 // Jika tidak, jalankan ulang pembuatan div untuk tampilan desktop
 fetchDataFromYouTubeDesktop();
}
}

// Pasang event listener ke perubahan lebar layar
window.addEventListener('resize', handleResize);

// Panggil fungsi handleResize saat halaman dimuat
window.onload = handleResize;

</script>


<script>
   // Panggil fungsi fetchDataFromYouTube saat halaman dimuat
   window.onload = handleResize;
 </script>

<script>
  function SubscribeClick(){
    console.log('fungsi berhasil di trigger')
    window.open('https://www.youtube.com/@mezzanine_id','_blank');
  }
</script>
<script>
          function openNav() {
            document.getElementById('myNav').style.width = '100%';
          }
        
          function closeNav() {
            document.getElementById('myNav').style.width = '0%';
          }
        
          // Fungsi untuk menangani klik pada tautan menu
          function handleMenuClick(target) {
            closeNav(); // Tutup overlay menu
        
            // Ambil elemen konten yang sesuai berdasarkan target
            var contentElement = document.querySelector(target);
        
            // Gulir halaman ke elemen konten
            if (contentElement) {
              contentElement.scrollIntoView({ behavior: 'smooth' });
            }
          }
        </script>
        <script>
          function openNav() {
            document.getElementById("myNav").style.height = "100%";
          }
          
          function closeNav() {
            document.getElementById("myNav").style.height = "0%";
          }
          </script>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
          
         
@endsection