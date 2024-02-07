@extends('layouts.main')
@section('content')



<div class="flex flex-col my-auto mx-auto w-10/12 p-4 bg-white border border-gray-200 overflow-y-auto space-y-4 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-900 font-bold">
Data Services
</span>
<hr>
<div class="justify-between">
<button id="btnAdd" onclick="openFormAddServices()" type="button" class="max-w-sm text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-l hover:from-purple-500 hover:via-purple-600 hover:to-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
<svg class="w-5 h-5 me-2 text-white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
<path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
</svg>
Add data
</button>
</div>
<div class="flex flex-col overflow-x-auto  shadow-lg  sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-purple-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Tags
                </th>

                <th scope="col" class="text-center px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody id="tableBody">
           
        </tbody>
    </table>
  
</div>
</div>


@endsection

@section('script')

<script>
function openFormAddServices(){
    window.location.href ="/admin/services/create";
}

async function fetchServicesData() {
    try {
      const response = await fetch('http://localhost:8000/api/services/all');
      const ServicesData = await response.json();

      if (ServicesData.is_success) {
        // Return an array of promises for each plan
        console.log(ServicesData.data);
        const table = document.getElementById('tableBody');
        table.innerHTML = '';
        ServicesData.data.forEach(item=>{
 const row = document.createElement('tr');
        row.innerHTML = `<td class="px-6 py-4">${item.id}</td>
        <td class="px-6 py-4">${item.nama}</td>
                            <td class="px-6 py-4">${parseTags(item.tags)}</td>
                         <td class="px-6 py-4  text-center">
                                    <button class="text-blue-600 px-2" onclick="editServices(${item.id})">Edit</button>
                                    <button class="text-red-600" onclick="deleteServices(${item.id})">Delete</button>
                                 </td>`;
                            
                            table.appendChild(row);
        })
       function parseTags(tagsString) {
    // Parse the JSON string to a JavaScript array
    const tagsArray = JSON.parse(tagsString);

    // Join the array elements into a string for display
    return tagsArray.join(', ');
}

      } else {
        console.error('Error fetching plans data:', plansData.error_message || plansData.message);
        return [];
      }
    } catch (error) {
      console.error('Error fetching plans data:', error);
      return [];
    }
  }
fetchServicesData();

function editServices(servicesId) {
    window.location.href="/admin/services/edit/"+servicesId;
}

 async function deleteServices(servicesId) {
    try {
        const response = await fetch('http://localhost:8000/api/services/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: servicesId }),
        });

        const data = await response.json();

        if (data.is_success) {
            window.location.reload();
        } else {
            console.log("Error");
        }
    } catch (error) {
        console.error('Error deleting services:', error);
    }
}
</script>
@endsection