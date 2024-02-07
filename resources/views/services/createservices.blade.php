@extends('layouts.main')
@section('content')
<div class="w-full mx-auto my-auto overflow-y-auto  px-4 space-y-8 bg-white border border-gray-200 rounded-lg shadow-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-800 font-bold text-xl">Add Services Data</span>
<form id="AddServices">
<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Services <span class="text-red-500">*</span></label>
    <input id="nama" name="nama" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags<span class="text-red-500">*</span></label>
    

    <input id="tags" name="tags" type="text"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <small>Tambahkan <strong>","</strong> untuk menambah tags , <strong>Contoh : TAG1,TAG2,TAG3</strong></small>

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
document.addEventListener('DOMContentLoaded', function () {

    function postForm(event) {
    event.preventDefault();  // Mencegah tindakan default formulir

    const form = document.getElementById('AddServices');
    const formData = new FormData(form);

    fetch('http://localhost:8000/api/services/save', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.is_success) {
            // Redirect to /admin if successful
            window.location.href= `/admin/services`;
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
