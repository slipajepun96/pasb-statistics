@extends('layout.admin-layout')

@section('admin-content')

<style>
    @media only screen and (max-width: 900px) {
    .display-none{
        display: none;
    }
}
</style>
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl m-2 my-3 font-bold">User Setting</span>
    <div class="m-2">
        <a href="/admin/user/register"><button class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg inline-flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
        </svg> &nbsp;
        Register New User</button></a>
</div>
<div class=" lg:flex lg:inline-block">
    <div class="bg-white m-2 p-2 text-black rounded-xl lg:w-full">
        <span class="text-2xl m-2 font-semibold my-3">User List</span>
        <br>
        @if(session('status'))
        <div class="flex p-4 mb-4 text-yellow-700 border-t-4 border-yellow-300 bg-yellow-50 " role="alert" id="status_message">
            <div class="ml-3 text-sm font-medium">
                {{session('status')}}
            </div>
        </div>
        @endif
        @if(session('delete'))
        <div class="flex p-4 mb-4 text-red-700 border-t-4 border-red-300 bg-red-50 " role="alert" id="status_message">
            <div class="ml-3 text-sm font-medium">
                {{session('delete')}} 
            </div>
        </div>
        @endif
        
        <div class="m-2">
            <div class="relative overflow-x-auto">
                <table class="w-full text-md text-left text-gray-900 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                        <tr>
                            <th scope="col" class="px-6 py-3" width="">
                                User Name
                            </th>
                            <th scope="col" class="px-6 py-3" width="">
                                Account Level
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users_list->count()==0)
                                <tr>
                                    <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                                </tr>
                        @else
                        @foreach($users_list as $user_list)
                        <tr class="bg-white border-b font-medium ">
                            <td class="px-6 py-4">
                                {{$user_list->name}}<br><p class="text-xs text-gray-600">{{$user_list->email}}</p>
                            </td>
                            <td class="px-6 py-4  text-sm">
                                @if($user_list->is_an_admin==2)
                                <div class="rounded-md outline outline-2 outline-yellow-500 p-0.5 px-1 inline-flex uppercase">Super</div>
                                @elseif($user_list->is_an_admin==1)
                                <div class="rounded-md outline outline-2 outline-green-500 p-0.5 px-1 inline-flex uppercase">Admin</div>
                                @else
                                <div class="rounded-md outline outline-2 outline-blue-300 p-0.5 px-1 inline-flex uppercase">Viewer</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if(Auth::user()->is_an_admin==2||Auth::user()->is_an_admin==1)
                                
                                <div class="inline-flex">

                                    {{-- up to admin/ down to viewer button --}}
                                    @if($user_list->is_an_admin==0)
                                    <form action="/admin/user/{{$user_list->id}}/upgrade" method="POST" onsubmit="return confirm('Are you sure to upgrade {{$user_list->name}} access from VIEWER to ADMIN  ?')">
                                        @csrf <button type=sumbit class="bg-green-600 hover:bg-green-700 rounded-lg p-2 text-white inline-flex mx-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
                                        </svg>
                                        
                                    Upgrade to Admin
                                    </button>
                                    </form>
                                    @elseif($user_list->is_an_admin==1)
                                    <form action="/admin/user/{{$user_list->id}}/downgrade" method="POST" onsubmit="return confirm('Are you sure to downgrade {{$user_list->name}} access from ADMIN to VIEWER  ?')">
                                        @csrf <button type=sumbit class="bg-cyan-600 hover:bg-cyan-700 rounded-lg p-2 text-white inline-flex mx-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                    Downgrade to Viewer 
                                    </button>
                                    </form>
                                    @else
                                    ~SuperAdmin~
                                    
                                    @endif
                                    
                                    {{-- delete button --}}
                                    
                                    @if($user_list->is_an_admin!=2)
                                    @if(Auth::user()->id!=$user_list->id)
                                    
                                    <form action="/admin/user/delete/{{$user_list->id}}'" method="POST" onsubmit="return confirm('Are you sure to delete  ?')">
                                        @csrf 
                                        <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 inline-flex mx-1 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                    @endif
                                    @endif
                                </div>
                                
                                @else
                                
                                    You don't have access to these control
                                
                                @endif
                            </td>

                        </tr>
                        @endforeach
                            @endif
                    </tbody>
                </table>
            </div>
            

        </div>
    </div>
<div class="bg-white m-2 p-2 text-black rounded-xl lg:w-full">
    
    <span class="text-2xl font-semibold m-2 my-3">Temporarily Registered User List</span>
    @if(session('delete2'))
    <div class="flex p-4 mb-4 text-red-700 border-t-4 border-red-300 bg-red-50 " role="alert" id="status_message">
        <div class="ml-3 text-sm font-medium">
            {{session('delete2')}} 
        </div>
    </div>
    @endif
    <div class="m-1">
        <div class="relative overflow-x-auto">
           <table class="w-full text-md text-left text-gray-900 ">
               <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                   <tr>
                       <th scope="col" class="px-6 py-3" width="">
                           User Name
                       </th>
                       <th scope="col" class="px-6 py-3" width="">
                           Date Temporarily Registered
                       </th>
                       <th scope="col" class="px-6 py-3">
                           Action
                       </th>
                   </tr>
               </thead>
               <tbody>
                   @if($temp_users_list->count()==0)
                           <tr>
                               <td colspan=5 align="center" class="text-sm text-gray-700">Currently no temporary user/s.</td>
                           </tr>
                   @else
                   @foreach($temp_users_list as $temp_user_list)
                   <tr class="bg-white border-b ">
                       <td class="px-6 py-4 font-medium ">
                           {{$temp_user_list->name}}<br><p class="text-xs text-gray-600">{{$temp_user_list->email}}</p>
                       </td>
                       <td class="px-6 py-4 font-medium ">
                        <p class="text-sm"><?php echo $temp_user_list->created_at;?></p>
                       </td>

                       <td class="px-6 py-4">
                           
                               
                               {{-- delete button --}}
                               
                             
                               <form action="/admin/user/temp/delete/{{$temp_user_list->id}}'" method="POST" onsubmit="return confirm('Are you sure to delete  ?')">
                                   @csrf 
                                   <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 inline-flex mx-1 text-white">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                           <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                         </svg>
                                          Delete
                                   </button>
                               </form>
                           </div>
                   
                       </td>

                   </tr>
                   @endforeach
                       @endif
               </tbody>
           </table>
       </div>
       

   </div>
</div>
</div>

@endsection