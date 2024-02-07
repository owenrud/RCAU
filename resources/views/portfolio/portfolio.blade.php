@extends('layouts.main')
@section('content')



<div class="flex flex-col my-auto mx-auto w-10/12 p-4 bg-white border border-gray-200 overflow-y-auto space-y-4 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-900 font-bold">
Data Portfolio
</span>
<hr>
<div class="justify-between">
<button id="btnAdd" onclick="openFormAddPortfolio()" type="button" class="max-w-sm text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-l hover:from-purple-500 hover:via-purple-600 hover:to-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
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
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3">
                    End Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
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
function openFormAddPortfolio(){
    window.location.href ="/admin/portfolio/create";
}

async function fetchPortfolioData() {
    try {
      const response = await fetch('http://localhost:8000/api/portfolio/all');
      const PortfolioData = await response.json();

     if (PortfolioData.is_success) {
  console.log(PortfolioData.data);

  const table = document.getElementById('tableBody');
  table.innerHTML = '';

  // Check if data is an array and not empty
  if (Array.isArray(PortfolioData.data) && PortfolioData.data.length > 0) {
    // Use forEach to loop through the data array
    PortfolioData.data.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `<td class="px-6 py-4">${item.id}</td>
                       <td class="px-6 py-4">${item.title}</td>
                       <td class="px-6 py-4">${item.start}</td>
                       <td class="px-6 py-4">${item.end}</td>
                       <td class="px-6 py-4">${item.price}</td>
                       <td class="px-6 py-4">${item.status}</td>
                       <td class="px-6 py-4">${item.foto_project}</td>
                    <td class="px-6 py-4  text-center">
                                    <button class="text-blue-600 px-2" onclick="editPorto(${item.id})">Edit</button>
                                    <button class="text-red-600" onclick="deletePorto(${item.id})">Delete</button>
                                 </td>`;

      table.appendChild(row);
    });
  } else {
    console.error('No data or invalid data structure');
  }
}else {
        console.error('Error fetching plans data:', plansData.error_message || plansData.message);
        return [];
      }
    } catch (error) {
      console.error('Error fetching plans data:', error);
      return [];
    }
  }
fetchPortfolioData();
//Define the editporto and deleteporto functions as needed
function editPorto(portoId) {
    window.location.href="/admin/portfolio/edit/"+portoId;
}

 async function deletePorto(portoId) {
    try {
        const response = await fetch('http://localhost:8000/api/portfolio/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: portoId }),
        });

        const data = await response.json();

        if (data.is_success) {
            window.location.reload();
        } else {
            console.log("Error");
        }
    } catch (error) {
        console.error('Error deleting porto:', error);
    }
}

</script>
@endsection