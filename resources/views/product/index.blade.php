<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Photo</th>
                        <th class="border px-6 py-4">Name</th>
                        <th class="border px-6 py-4">Store</th>
                        <th class="border px-6 py-4">Price</th>
                        <th class="border px-6 py-4">Description</th>
                        <th class="border px-6 py-4">Stock</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($product as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4 ">
                                    <img src="{{ $item->picturePath }}" class="rounded float-left" style="width:200px">
                                </td>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4 ">{{ $item->store->name }}</td>
                                <td class="border px-6 py-4">{{ number_format ($item->price) }}</td>
                                <td class="border px-6 py-4">{{($item->description) }}</td>
                                <td class="border px-6 py-4">{{ $item->stock }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('product.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $product->links() }}
            </div>
        </div>
    </div>    
</x-app-layout>
