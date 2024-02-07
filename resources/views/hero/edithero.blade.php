@extends('layouts.main')
@section('content')
<div class="w-full mx-auto my-auto overflow-y-auto  px-4 space-y-8 bg-white border border-gray-200 rounded-lg shadow-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-800 font-bold text-xl">Edit Hero Data</span>
<form id="AddHero">
<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title <span class="text-red-500">*</span></label>
    <input id="title" name="title" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>


<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">deskripsi <span class="text-red-500">*</span></label>
    <input id="deskripsi" name="deskripsi" type="text"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

</div>
<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total project <span class="text-red-500">*</span></label>
    <input id="number_project" name="number_project" type="text" placeholder="ex: 300+" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

</div>
<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Housing <span class="text-red-500">*</span></label>
    <input id="housing" name="housing" type="text" placeholder="ex: 20" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komersial <span class="text-red-500">*</span></label>
    <input id="commercial" name="commercial" type="text" placeholder="ex: 10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Government <span class="text-red-500">*</span></label>
    <input id="government" name="government" type="text" placeholder="ex: 100+" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>


<button onclick="postForm(event)" type="submit" class="max-w-lg text-white bg-gradient-to-br from-purple-600 to-fuchsia-400 hover:bg-gradient-to-bl hover:from-purple-600 hover:to-fuchsia-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">

Save
</button>


</form>
</div>

</div>
</div>
</div>
@endsection

@section('script')
<script>
var heroId = window.location.href.split('/').pop();
document.addEventListener('DOMContentLoaded', function () {
 fetch(`http://localhost:8000/api/hero/show`,{
    method: 'POST',
headers: {
            'Content-Type': 'application/json',
        },
            body: JSON.stringify({ id: heroId }),
 })
        .then(response => response.json())
        .then(heroData => {
            // Populate form with hero data
            console.log(heroData);
            document.getElementById('title').value = heroData.data.title;
            document.getElementById('deskripsi').value = heroData.data.deskripsi;
            document.getElementById('number_project').value = heroData.data.number_project;
            document.getElementById('housing').value = heroData.data.housing;
            document.getElementById('commercial').value = heroData.data.commercial;
            document.getElementById('government').value = heroData.data.government;
        })
        .catch(error => console.error('Error fetching hero data:', error));

    function postForm(event) {
    event.preventDefault();  // Mencegah tindakan default formulir

    const form = document.getElementById('AddHero');
    const formData = new FormData(form);
    formData.append('id',heroId);

    fetch('http://localhost:8000/api/hero/update', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.is_success) {
            // Redirect to /admin if successful
            window.location.href= `/admin`;
        } else {
            // Handle the case where save failed
            console.error('Failed to update data:', data.message);
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
