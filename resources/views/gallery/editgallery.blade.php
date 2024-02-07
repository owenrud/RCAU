@extends('layouts.main')
@section('content')
<div class="w-full mx-auto my-auto overflow-y-auto  px-4 space-y-8 bg-white border border-gray-200 rounded-lg shadow-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-800 font-bold text-xl">Edit Gallery Data</span>
<form id="AddGallery">
<div class="mb-6">
    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type<span class="text-red-500">*</span></label>
    
<div class="flex items-center mb-4">
    <input id="default-radio-1" type="radio" value="video" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" onclick="toggleInputType()">
    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Video</label>
</div>
<div class="flex items-center">
    <input checked id="default-radio-2" type="radio" value="foto" name="type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" onclick="toggleInputType()">
    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Foto</label>
</div>
</div>
<div class="mb-6">
    <label id="label_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image <span class="text-red-500">*</span></label>
    <div id="inputContainer">
     
    </div>
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
var galleryId = window.location.href.split('/').pop();
document.addEventListener('DOMContentLoaded', function () {
fetch(`http://localhost:8000/api/gallery/show`, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({ id: galleryId }),
})
    .then(response => response.json())
    .then(galleryData => {
        // Populate form with gallery data
        //console.log(galleryData);

        const radioButtons = document.getElementsByName('type');
        radioButtons.forEach(radio => {
            if (radio.value === galleryData.data.type.toString()) {
                radio.checked = true;
            }
        });// Assuming you want to join the tags with a comma
         toggleInputType();
    })
    .catch(error => console.error('Error fetching gallery data:', error));

    function postForm(event) {
        event.preventDefault();  // Prevent the default form action

        const form = document.getElementById('AddGallery'); // Correct form ID
        const formData = new FormData(form);
        //console.log(formData);
        formData.append('id',galleryId);

        fetch('http://localhost:8000/api/gallery/update', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.is_success) {
                // Redirect to /admin if successful
                window.location.href = `/admin/gallery`;
            } else {
                // Handle the case where save failed
                console.error('Failed to save data:', data.message);
                // You can display an error message to the user or take other actions
            }
        })
        .catch(error => console.error('Error during fetch:', error));
    }

    // Add event listener to the form to listen for submit events
    const form = document.getElementById('AddGallery'); // Correct form ID
    form.addEventListener('submit', postForm);
});
</script>
<script>
 function toggleInputType() {
        var inputContainer = document.getElementById("inputContainer");
        var radioVideo = document.getElementById("default-radio-1");
        var label = document.getElementById('label_file');
        
        // Remove existing input elements
        inputContainer.innerHTML = '';

        // Create a new input element
        var newInput;

        if (radioVideo.checked) {
            // If "Video" is selected, create a text input
            newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.id = 'video';
            newInput.name = 'file';
            label.textContent = "Video";
        } else {
            // If "Foto" is selected, create the Dropzone file input
            var fotoHTML = `
                      
<div class="flex items-center justify-center w-3/12">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input name="file" id="dropzone-file" type="file" class="hidden" />
    </label>
</div> `;
            
            // Insert the HTML into the inputContainer
            inputContainer.innerHTML = fotoHTML;
            label.textContent = "Image";
        }

        // Add the new input element to the container
        if (newInput) {
            var linebreak = document.createElement('br');
            inputContainer.appendChild(newInput);
            inputContainer.appendChild(linebreak);
        }

        // Create and append label_detail outside the conditional block
        var label_detail = document.createElement('small');
        label_detail.id = 'label_detail';
        if (radioVideo.checked) {
            label_detail.textContent = "Put your video link here";
        } 
        inputContainer.appendChild(label_detail);
    }


</script>


@endsection