<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sign') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full datatable">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">ID</th>
                                <th class="border px-6 py-4">Name</th>
                                <th class="border px-6 py-4">Address</th>
                                <th class="border px-6 py-4">Phone</th>
                                <th class="border px-6 py-4">Email</th>
                                <th class="border px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td class="border px-6 py-4">{{ $i }}</td>
                                    <td class="border px-6 py-4">Name {{ $i }}</td>
                                    <td class="border px-6 py-4">Address {{ $i }}</td>
                                    <td class="border px-6 py-4">Phone {{ $i }}</td>
                                    <td class="border px-6 py-4">Email {{ $i }}</td>
                                    <td class="border px-6 py-4">Action {{ $i }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
