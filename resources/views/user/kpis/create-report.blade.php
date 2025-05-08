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
                        <h2>{{ __('Submit Performance Report') }}</h2>
                        <a href="{{ route("user.viewkpis") }}" class=" mb-3  inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase transition ease-in-out duration-150">Back</a>
                    </div>

                    <div class="w-100">
                        <form method="post" action="{{ route('user.submit-report') }}" class=" mt-6 space-y-6">
                            @csrf
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Select KPI</label>
                                <select name="kpi" id="kpi" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    @if ($kpis)
                                        @foreach ($kpis as $kpi)
                                            <option value="{{ $kpi->id }}">{{$kpi->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->get('kpi'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Your Report </label>
                                <textarea name="report" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
                                @if ($errors->get('report'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Score (%) </label>
                                <input name="score" type="number" placeholder="0.00" step=".01" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('score'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>


                            <button type='submit' class='inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                Submit
                            </button>

                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>