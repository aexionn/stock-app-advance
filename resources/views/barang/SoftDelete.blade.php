<x-layout :title="$title">
    @section('content')
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="font-[sans-serif] overflow-x-auto py-4">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 whitespace-nowrap">
                        <tr>
                            <th class="p-4 text-left text-sm font-medium text-white">Nama Barang</th>
                            <th class="p-4 text-left text-sm font-medium text-white">Deskripsi</th>
                            <th class="p-4 text-left text-sm font-medium text-white">Harga</th>
                            <th class="p-4 text-left text-sm font-medium text-white">Tersimpan Sejak</th>
                            <th class="p-4 text-left text-sm font-medium text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach ($soft as $item)
                            <tr class="even:bg-blue-50">
                                <td class="p-4 text-sm text-black">{{ $item['nm_barang'] }}</td>
                                <td class="p-4 text-sm text-black">{{ $item['deskripsi'] }}</td>
                                <td class="p-4 text-sm text-black">{{ $item['harga'] }}</td>
                                <td class="p-4 text-sm text-black">{{ $item['created_at'] }}</td>
                                <td class="flex items-center">
                                    <a onclick="return confirm('Apa anda yakin ingin mengembalikan Data ini')" class="inline-block w-5 fill-green-500 hover:fill-green-700" href="/restore/barang/{{ $item['id_barang'] }}" title="Ubah">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            width="25px" height="70px" viewBox="0 0 94.391 94.391"
                                            xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M92.709,70.866L58.111,10.938c-2.238-3.886-6.42-6.304-10.91-6.304c-4.495,0-8.68,2.415-10.908,6.297L1.685,70.866
                                                        c-2.247,3.885-2.247,8.71,0,12.594c2.247,3.885,6.42,6.297,10.908,6.297h69.209c4.49,0,8.669-2.412,10.903-6.297
                                                        C94.951,79.576,94.951,74.751,92.709,70.866z M86.902,80.106c-1.048,1.82-2.994,2.946-5.1,2.946H12.593
                                                        c-2.103,0-4.057-1.129-5.106-2.946c-1.047-1.817-1.047-4.072,0-5.887l34.612-59.942c1.042-1.815,2.996-2.941,5.099-2.941
                                                        c2.103,0,4.052,1.129,5.099,2.948L86.902,74.22C87.949,76.037,87.949,78.289,86.902,80.106z"/>
                                                    <path d="M55.217,50.901l-2.108,1.205c0,0-0.144,0.082-0.377,0.212l9.603,2.468c0.589-2.256,1.691-6.605,2.498-9.759l-2.648,1.511
                                                        l-2.156-3.811c-1.006-1.759-2.85-4.982-4.53-7.918c-0.938-1.625-1.821-3.171-2.471-4.314c-0.803,0.204-2.026,0.479-4.037,0.921
                                                        c-1.794,0.4-4.674,1.03-5.716,1.35l-0.525,0.478l-5.025,6.595l5.169,3.679l4.4-6.471L55.217,50.901z"/>
                                                    <path d="M68.576,58.362l-5.77,2.666l3.477,7.114H50.349v-2.868l-6.92,7.108c1.67,1.622,4.892,4.743,7.232,7.015v-3.021h18.479
                                                        c0.22-0.801,0.596-2.019,1.212-4.011c0.527-1.68,1.355-4.346,1.629-5.465l-0.185-0.88L68.576,58.362z"/>
                                                    <path d="M27.563,49.05l2.708,1.277l-0.998,2.189c0,0-0.337,0.726-0.849,1.804l-0.939,1.975c-1.535,3.248-3.798,8.056-5.077,10.767
                                                        c0.63,0.533,1.566,1.389,3.094,2.785c1.364,1.26,3.574,3.289,4.38,3.922l0.603,0.13l8.295,0.335l0.063-6.341l-7.777,0.106
                                                        l4.847-10.267c0.56-1.185,0.946-1.972,0.946-1.972l1.034-2.193l2.19,1.044c0,0,0.151,0.068,0.375,0.178l-3.47-9.277
                                                        C34.81,46.324,30.616,47.9,27.563,49.05z"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <form action="/delPermanent/barang/{{ $item['id_barang'] }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $item['nm_barang'] }}')" class="m-4" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-yellow-500 hover:fill-yellow-700" viewBox="0 0 24 24">
                                                <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"/>
                                                <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="font-[sans-serif] overflow-x-auto flex flex-row">
                <a href="/restore/barang" type="button"
                class="px-5 py-2 rounded-lg text-sm tracking-wider font-medium border 
                border-green-700 outline-none bg-transparent hover:bg-green-700 text-green-700 
                hover:text-white transition-all duration-300">Kembalikan Semua Data</a>
                <form action="/delPermanent/barang" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"
                    class="px-5 py-2 ml-2 rounded-lg text-sm tracking-wider font-medium border 
                    border-blue-700 outline-none bg-transparent hover:bg-blue-700 text-blue-700 
                    hover:text-white transition-all duration-300">Hapus Semua Data</button>
                </form>
            </div>
        </div>
    @endsection
</x-layout>