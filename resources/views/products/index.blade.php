<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-center bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                                    Categories</th>
                                <th
                                    class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($products as $product )
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm leading-5 text-gray-800">{{ $product->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <div class="text-sm leading-5 text-blue-900">{{ $product->name }}</div>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap border-b border-gray-500">
                                @foreach ( $product->categories as $category )
                                {{ $category->name }} <span class="text-red-700"> {{ $loop->last ? '' : '&' }}</span>
                                @endforeach
                                </td>
                                <td
                                    class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap border-b border-gray-500">
                                    <a href="{{ route('products.edit',$product->id) }}"
                                        class="px-6 py-2 text-blue-500 transition duration-300 border border-blue-500 rounded hover:bg-blue-700 hover:text-white focus:outline-none">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
