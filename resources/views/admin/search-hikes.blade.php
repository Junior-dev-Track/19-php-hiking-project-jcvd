@section('pageTitle', 'Admin panel - Edit hikes')
@section('meta_description', 'JCVD - Admin panel - Edit hikes')

<x-app-layout>
    <x-slot name="header">
            {{ __('Admin - Edit hikes') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <form class="max-w-sm mx-auto" method="POST" action="{{route('admin.search-hikes') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-700 uppercase 
                             dark:text-gray-400">Search a hike</label>
                            <input type="text" id="user" name="hike" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('hike')}}" placeholder="Corsica" required />
                            <x-input-error :messages="$errors->get('hike')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                            
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </form>
                </div>
            </div>
            @if(isset($hikes))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Distance
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Duration
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Elevation
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hikes as $hike)                    
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$hike->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$hike->location}}
                            </td>
                            <td class="px-6 py-4">
                                {{$hike->distance}}
                            </td>
                            <td class="px-6 py-4">
                                {{$hike->duration}}
                            </td>
                            
                            <td class="px-6 py-4">
                                {{$hike->elevation_gain}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('hike.edit', ['id' => $hike->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{route('admin.edit-hike', ['id' => $hike->id, 'delete' => 'yes'])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
            @endif
    </div>
</x-app-layout>