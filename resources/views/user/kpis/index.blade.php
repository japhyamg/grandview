<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Assigned KPIs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <h2 class="mb-3">{{ __('View KPIs') }}</h2>
                        <a href="{{ route("user.create-report") }}" class=" mb-3  inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase transition ease-in-out duration-150">Submit Report</a>
                    </div>
                    <div class="grid auto-cols-auto grid-flow-col">
                        @forelse($kpis as $kpi)
                            <div class="mr-3 block flex justify-between rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark text-black">
                                <div>
                                    <h5 class="mb-2 text-xl font-medium leading-tight">{{ $kpi->title }} <small>({{ $kpi->weight }}%)</small></h5>
                                    <p class="mb-4 text-base">{{ $kpi->description }}</p>
                                    <p><strong>Target:</strong> {{ $kpi->target }}</p>
                                </div>
                                {{-- <a href="{{ route("admin.kpis.index") }}" class=" mb-3  inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase transition ease-in-out duration-150">Back</a> --}}
                            </div>
                        @empty
                            <p>No KPIs assigned.</p>
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>