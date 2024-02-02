<x-app-layout>

        <div class="container mx-auto mt-10 mb-10 px-10">
            <div class="grid grid-cols-8 gap-4 p-5">
                <div class="col-span-4 mt-2">
                    <h1 class="text-3xl font-bold text-white">
                        CREATE NEW USER
                    </h1>
                </div>
                <div class="col-span-4">

                </div>
            </div>

            <div class="bg-white p-5 rounded shadow-sm">
                <form action="{{ route('user-das.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="title">Name</label>
                        <input type="text" class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded-full
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                        " name="name" value="{{ old('name') }}" required>

                        <!-- error message untuk name -->
                        @error('title')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="title">Email</label>
                        <input type="email" class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded-full
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                        " name="email" value="{{ old('email') }}" required>

                        <!-- error message untuk email -->
                        @error('title')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="title">Password</label>
                        <input type="password" class="
                            form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded-full
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                        " name="password" value="{{ old('password') }}" required>

                        <!-- error message untuk password -->
                        @error('title')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Save
                        </button>
                        <a href="{{ route('user-das.index') }}" class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Back
                        </a>
                    </div>

                </form>
            </div>
        </div>

    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

</x-app-layout>
