<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="grid auto-cols-auto grid-flow-col">
                            <div class="mr-3 block flex justify-between rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark text-black">
                                <div>
                                    <h5 class="mb-2 text-xl font-medium leading-tight">{{ $users }}</h5>
                                    <p class="mb-4 text-base">Users</p>
                                </div>
                            </div>
                            <div class="mr-3 block flex justify-between rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark text-black">
                                <div>
                                    <h5 class="mb-2 text-xl font-medium leading-tight">{{ $departments }}</h5>
                                    <p class="mb-4 text-base">Departments</p>
                                </div>
                            </div>
                            <div class="mr-3 block flex justify-between rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark text-black">
                                <div>
                                    <h5 class="mb-2 text-xl font-medium leading-tight">{{ $kpis }}</h5>
                                    <p class="mb-4 text-base">KPIs</p>
                                </div>
                            </div>
                            <div class="mr-3 block flex justify-between rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark text-black">
                                <div>
                                    <h5 class="mb-2 text-xl font-medium leading-tight">{{ $reportCount }}</h5>
                                    <p class="mb-4 text-base">Reports</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="mb-2">{{ __('Performance Summary') }}</h2>

                    @foreach($reports as $userReports)
                        @php $user = $userReports->first()->user; @endphp
                        <div class="mr-3 block rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark text-black">
                            <h5 class="mb-2 text-xl font-medium leading-tight">{{ $user->name }} ({{ $user->email }})</h5>
                            <table class="table-auto w-full">
                                <thead class="bg-white-700">
                                    <tr>
                                        <th>#</th>
                                        <th>KPI Title</th>
                                        <th>Report</th>
                                        <th>Score (%)</th>
                                        <th>Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userReports as $index => $report)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $report->kpi->title }}</td>
                                            <td>{{ $report->report }}</td>
                                            <td>{{ $report->score }}</td>
                                            <td>{{ $report->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
