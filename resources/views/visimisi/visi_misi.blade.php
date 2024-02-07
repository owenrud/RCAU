@extends('layouts.main')
@section('content')



<div class="flex flex-col my-auto mx-auto w-10/12 p-4 bg-white border border-gray-200 overflow-y-auto space-y-4 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-900 font-bold">
Data Visi
</span>
<hr>
<div class="justify-between">
<button id="btnAdd" onclick="openFormAddVisi()" type="button" class="max-w-sm text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-l hover:from-purple-500 hover:via-purple-600 hover:to-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
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
                    Deskripsi
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

<div class="flex flex-col my-auto mx-auto w-10/12 p-4 bg-white border border-gray-200 overflow-y-auto space-y-4 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-900 font-bold">
Data Misi
</span>
<hr>
<div class="justify-between">
<button id="btnAdd" onclick="openFormAddMisi()" type="button" class="max-w-sm text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-l hover:from-purple-500 hover:via-purple-600 hover:to-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
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
                    Deskripsi
                </th>
                <th scope="col" class="text-center px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody id="MisitableBody">
           
        </tbody>
    </table>
  
</div>
</div>

@endsection

@section('script')

<script>
function openFormAddVisi(){
    window.location.href ="/admin/visi/create";
}
function openFormAddMisi(){
    window.location.href ="/admin/misi/create";
}

async function fetchVisiData() {
    try {
      const response = await fetch('http://localhost:8000/api/visi/all');
      const visiData = await response.json();

      if (visiData.is_success) {
        // Return an array of promises for each plan
        console.log(visiData);
        const table = document.getElementById('tableBody');
        table.innerHTML = '';
        const row = document.createElement('tr');
        row.innerHTML = `<td class="px-6 py-4">${visiData.data.id}</td>
                            <td class="px-6 py-4">${visiData.data.deskripsi}</td>
                            <td class="px-6 py-4  text-center">
                                    <button class="text-blue-600 px-2" onclick="editVisi(${visiData.data.id})">Edit</button>
                                    <button class="text-red-600" onclick="deleteVisi(${visiData.data.id})">Delete</button>
                                 </td>`;
                            table.appendChild(row);

      } else {
        console.error('Error fetching plans data:', plansData.error_message || plansData.message);
        return [];
      }
    } catch (error) {
      console.error('Error fetching plans data:', error);
      return [];
    }
  }
  async function fetchMisiData() {
    try {
      const response = await fetch('http://localhost:8000/api/misi/all');
      const misiData = await response.json();

      if (misiData.is_success) {
        // Return an array of promises for each plan
        console.log(misiData);
        const table = document.getElementById('MisitableBody');
        table.innerHTML = '';
        misiData.data.forEach(item=>{
           const row = document.createElement('tr');
        row.innerHTML = `<td class="px-6 py-4">${item.id}</td>
                            <td class="px-6 py-4">${item.deskripsi}</td>
                            <td class="px-6 py-4  text-center">
                                    <button class="text-blue-600 px-2" onclick="editMisi(${item.id})">Edit</button>
                                    <button class="text-red-600" onclick="deleteMisi(${item.id})">Delete</button>
                                 </td>`;
                            table.appendChild(row);

        });
       
      } else {
        console.error('Error fetching plans data:', plansData.error_message || plansData.message);
        return [];
      }
    } catch (error) {
      console.error('Error fetching plans data:', error);
      return [];
    }
  }
fetchVisiData();
fetchMisiData();

function editVisi(visiId) {
    window.location.href="/admin/visi/edit/"+visiId;
}

 async function deleteVisi(visiId) {
    try {
        const response = await fetch('http://localhost:8000/api/visi/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: visiId }),
        });

        const data = await response.json();

        if (data.is_success) {
            window.location.reload();
        } else {
            console.log("Error");
        }
    } catch (error) {
        console.error('Error deleting visi:', error);
    }
}


function editMisi(misiId) {
    window.location.href="/admin/misi/edit/"+misiId;
}

 async function deleteMisi(misiId) {
    try {
        const response = await fetch('http://localhost:8000/api/misi/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: misiId }),
        });

        const data = await response.json();

        if (data.is_success) {
            window.location.reload();
        } else {
            console.log("Error");
        }
    } catch (error) {
        console.error('Error deleting misi:', error);
    }
}
</script>
@endsection