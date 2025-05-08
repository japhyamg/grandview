<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <h2>{{ __('Create Employee') }}</h2>
                        <a href="{{ route("admin.employees.index") }}" class=" mb-3  inline-flex items-center px-4 py-2 bg-cyan-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase transition ease-in-out duration-150">Back</a>
                    </div>

                    <div class="w-100">
                        <form method="post" action="{{ route('admin.employees.store') }}" class=" mt-6 space-y-6">
                            @csrf
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Name </label>
                                <input name="name" type="text" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('name'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Email Address </label>
                                <input name="email" type="email" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('email'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Password </label>
                                <input name="password" type="password" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @if ($errors->get('password'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Role </label>
                                <select name="role" id="role" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                @if ($errors->get('role'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div>
                                <label class='block mb-2 font-medium text-sm text-gray-700 dark:text-gray-300'>Department </label>
                                <select name="department" id="department" class="w-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    @if ($departments)
                                        @foreach ($departments as $dept)
                                            <option value="{{ $dept->slug }}">{{$dept->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->get('department'))
                                    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                                        @foreach ($errors->get('name') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <button type='submit' class='inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                Create
                            </button>

                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>