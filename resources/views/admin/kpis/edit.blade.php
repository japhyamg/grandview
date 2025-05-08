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
                        <h2>{{ __('Edit KPI') }} - {{ $kpi->title }}</h2>
                        <a href="{{ route("admin.kpis.index") }}" class=" mb-3  inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase transition ease-in-out duration-150">Back</a>
                    </div>

                    <div class="w-100">
                        <form method="post" action="{{ route('admin.kpis.update', $kpi->id) }}" class=" mt-6 space-y-6">
                            @csrf
                            @method('put')
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>KPI Title </label>
                                <input name="title" value="{{ $kpi->title }}" type="text" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('title'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('title') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Description </label>
                                <textarea name="description" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ $kpi->description }}</textarea>
                                @if ($errors->get('description'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Target (eg 85.00) </label>
                                <input name="target" type="number" value="{{ $kpi->target }}" placeholder="0.00" step=".01" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('target'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Weight (%) </label>
                                <input name="weight" type="number" value="{{ $kpi->weight }}" placeholder="0.00" step=".01" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('weight'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Employee</label>
                                <select name="user" id="user" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    @if ($users)
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" @if ($kpi->user_id == $user->id) selected @endif>{{$user->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->get('user'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <button type='submit' class='inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                Update
                            </button>

                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>