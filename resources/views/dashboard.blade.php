<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cabbagesoft Technologies') }}
        </h2>
    </x-slot>
@php
//   print_r($Sign_table);die();
@endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">DOB</th>

                          </tr>
                        </thead>
                        <tbody>
                            @if (isset($Sign_table) && $Sign_table!="")
                                    @foreach ($Sign_table as $Sign_table )
                                    <tr>
                                        <td>{{$Sign_table['id']}}</td>
                                        <td>{{$Sign_table['fname']}}</td>
                                        <td>{{$Sign_table['lname']}}</td>
                                        <td>{{$Sign_table['email']}}</td> 
                                        <td>{{$Sign_table['mobile']}}</td>
                                        <td>{{$Sign_table['dob']}}</td>            
                                      </tr>
                                    @endforeach
                                
                            @endif
                                                   
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
