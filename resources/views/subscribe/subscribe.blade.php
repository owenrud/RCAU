@extends('layouts.main')
@section('content')



<div class="flex flex-col my-auto mx-auto w-10/12 p-4 bg-white border border-gray-200 overflow-y-auto space-y-4 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<span class="text-purple-900 font-bold">
Data User Subscribe
</span>
<hr>

<div class="flex flex-col overflow-x-auto  shadow-lg  sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-purple-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                 <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                 <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                 <th scope="col" class="px-6 py-3">
                    Kategori
                </th>
                 <th scope="col" class="px-6 py-3">
                    Rumah tinggal
                </th>
                 <th scope="col" class="px-6 py-3">
                    Komersial
                </th>
                  <th scope="col" class="px-6 py-3">
                    Luas
                </th>
                  <th scope="col" class="px-6 py-3">
                    City
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
async function FetchSubsData(){
    const API ="http://localhost:8000/api/subscribe/all";
    const response = await fetch(API);
    const SubsData =await response.json();
    const table = document.getElementById('tableBody');

    SubsData.data.forEach((item, index) =>{
        const row = document.createElement('tr');
        
        
        row.innerHTML=`
        <td class="px-6 py-4">${item.id}</td>
        <td class="px-6 py-4">${item.nama}</td>
        <td class="px-6 py-4">${item.email}</td>
        <td class="px-6 py-4">${item.phone}</td>
        <td class="px-6 py-4">${item.kategori}</td>
        <td class="px-6 py-4">${item.rumah_tinggal} Lantai</td>
        <td class="px-6 py-4">${item.komersial}</td>
        <td class="px-6 py-4">${item.luas}</td>
        <td class="px-6 py-4">${item.city}</td>
        <button class="max-w-sm rounded-lg text-white text-center bg-blue-600 ml-4 mt-2 px-4 py-2.5" onclick="openEmailClient('${item.email}', 'Your Subject', 'Your Email Body')">Send Mail</button>
       `;
        
        table.appendChild(row);
    });
    
}
function openEmailClient(email, subject, body) {
    const mailtoLink = `mailto:${email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    window.location.href = mailtoLink;
}

FetchSubsData();
</script>
@endsection