<x-app-layout>
    <div class="py-12">

        <div class="container mx-auto mt-10 mb-10 px-10">
            <div class="grid grid-cols-8 gap-4 mb-4 p-5">
                <div class="col-span-4 mt-2">
                    <h1 class="text-3xl font-bold text-white">
                        Lists Users
                    </h1>
                </div>
                <div class="col-span-4">
                    <div class="flex justify-end">
                        <a href="{{ route('user-das.create') }}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" id="add-user-btn">
                            + Create New User
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white p-5 rounded shadow-sm">
                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full table-auto border">
                    <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">No</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Name</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Email</th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $user)
                            <tr class="border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$key+1}}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $user->name }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $user->email }}</td>
                                
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">

                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user-das.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" id="{{ $user->id }}-delete-btn">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-sm text-gray-900 px-6 py-4 whitespace-nowrap" colspan="4">Data user tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>

</x-app-layout>
