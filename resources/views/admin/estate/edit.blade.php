@extends('layout.admin-layout')

@section('admin-content')

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Edit Information</span>
    <br>
    <div class="m-2">
        <form action="{{route('estate-edit-update',$estate_detail->id)}}" method="POST">
            @csrf 
            <div class="mb-4 inline-block md:w-1/3 w-full m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2"> Estate Name : </label><input type="text" name="estate_name" id="estate_name" value="{{$estate_detail->estate_name}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 inline-block md:w-1/3 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2"> Manager Name : </label><input type="text" name="manager_name" id="manager_name" value="{{$estate_detail->manager_name}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Year of Planting : </label><input type="text" name="year" id="year" value="{{$estate_detail->year}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Total Area (Ha.) : </label><input type="text" name="total_area" id="total_area" value="{{$estate_detail->total_area}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Planted Area (Ha.) : </label><input type="text" name="planted_area" id="planted_area" value="{{$estate_detail->planted_area}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Matured Area (Ha.) : </label><input type="text" name="matured_area" id="matured_area" value="{{$estate_detail->matured_area}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Inmatured Area (Ha.) : </label><input type="text" name="inmatured_area" id="inmatured_area" value="{{$estate_detail->inmatured_area}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Abbreviation : </label><input type="text" name="abbreviation" id="abbreviation" value="{{$estate_detail->abbreviation}}" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4  inline-block md:w-1/3 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2">Type of Plant : </label>
                <select name="plant_type" id="plant_type" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Palm Oil">Palm Oil</option>
                </select>
            </div>
            <br>
            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">                 
                <button type="reset" class="bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-lg p-2">Reset Form </button>
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Submit &rarr; </button>
            </div>


        </form>
    </div>
</div>

@endsection