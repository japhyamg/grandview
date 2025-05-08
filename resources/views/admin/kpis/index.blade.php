<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('KPIs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <h2>{{ __('Manage KPIs') }}</h2>
                        <a href="{{ route("admin.kpis.create") }}" class=" mb-3  inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase transition ease-in-out duration-150">Assign KPI</a>
                    </div>


                    <table class="table-auto w-full">
                        <thead class="bg-slate-700">
                            <tr>
                                <th class="font-semibold p-4 text-slate-200 text-left">#</th>
                                <th class="font-semibold p-4 text-slate-200 text-left">Title</th>
                                <th class="font-semibold p-4 text-slate-200 text-left">Description</th>
                                <th class="font-semibold p-4 text-slate-200 text-left">Target</th>
                                <th class="font-semibold p-4 text-slate-200 text-left">Weight(%)</th>
                                <th class="font-semibold p-4 text-slate-200 text-left">Assigned To</th>
                                <th class="font-semibold p-4 text-slate-200 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($kpis)
                                @foreach ($kpis as $index => $kpi)
                                    <tr>
                                        <td class="p-4">{{ $index+1 }}</td>
                                        <td class="p-4">{{ $kpi->title }}</td>
                                        <td class="p-4">{{ $kpi->description}}</td>
                                        <td class="p-4">{{ $kpi->target}}</td>
                                        <td class="p-4">{{ $kpi->weight}}%</td>
                                        <td class="p-4">{{ $kpi->user->name}}</td>
                                        <td class="p-4 flex justify-center">
                                            <a href="{{ route("admin.kpis.edit", $kpi->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mr-1">Edit</a>
                                            <a href="#" onclick="confirmDelete('kpi-{{ $kpi->id }}')" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</a>
                                            <form method="POST" action="{{ route("admin.kpis.destroy", $kpi->id) }}" id="kpi-{{ $kpi->id }}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td class="w-full">No Data</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(formId){
        var result = confirm('Are you sure you want to delete this item?');
        if (result==true) {
            document.getElementById(formId).submit();
        }
    }
</script>