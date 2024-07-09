@extends('header')

@section('othersContent')
    <form method="POST" action="{{route('mailsetting.store')}}" class="max-w-sm mx-auto " enctype="multipart/form-data">
        @csrf
            <div class="mb-5"> 
                <label for="mail_transport" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_transport</label>
                <input value="{{old('mail_transport')}}" type="text" id="mail_transport" name="mail_transport" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your mail_transport"/>
                @error('mail_transport') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div class="mb-5">
                <label for="mail_host" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_host</label>
                <input value="{{old('mail_host')}}" type="text" id="mail_host" name="mail_host" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Your mail_host"/>
                @error('mail_host') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div class="mb-5">
                <label for="mail_port" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_port</label>
                <input value="{{old('mail_port')}}" type="text" id="mail_port" name="mail_port" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Your mail_port"/>
                @error('mail_port') <p class="text-red-500">{{$message}}</p> @enderror
            </div> 
            <div id="mail_username" class="mb-5 "> 
                <label for="mail_username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_username</label>
                <input value="{{old('mail_username')}}" type="text" id="mail_username" name="mail_username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your mail_username"/>
                @error('mail_username') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div id="mail_password" class="mb-5 "> 
                <label for="mail_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_password</label>
                <input value="{{old('mail_password')}}" type="text" id="mail_password" name="mail_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your mail_password"/>
                @error('mail_password') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div id="mail_encryption" class="mb-5 "> 
                <label for="mail_encryption" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_encryption</label>
                <input value="{{old('mail_encryption')}}" type="text" id="mail_encryption" name="mail_encryption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your mail_encryption"/>
                @error('mail_encryption') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div id="mail_from" class="mb-5 "> 
                <label for="mail_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_from</label>
                <input value="{{old('mail_from')}}" type="text" id="mail_from" name="mail_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your mail_from"/>
                @error('mail_from') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
           
            <div id="mail_sender_name" class="mb-5 "> 
                <label for="mail_sender_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail_sender_name</label>
                <input value="{{old('mail_sender_name')}}" type="text" id="mail_sender_name" name="mail_sender_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your mail_sender_name"/>
                @error('mail_sender_name') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
           
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>


    @if(session('msg'))
    <div class="flex items-start max-sm:flex-col bg-green-100 text-green-800 p-4 rounded-lg relative" role="alert">
        <div class="flex items-center max-sm:mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] fill-green-500 inline mr-3" viewBox="0 0 512 512">
            <ellipse cx="256" cy="256" fill="#32bea6" data-original="#32bea6" rx="256" ry="255.832" />
            <path fill="#fff" d="m235.472 392.08-121.04-94.296 34.416-44.168 74.328 57.904 122.672-177.016 46.032 31.888z"
              data-original="#ffffff" />
          </svg>
          <strong class="font-bold text-sm">Success!</strong>
        </div>

        <span class="block sm:inline text-sm ml-4 mr-8 max-sm:ml-0 max-sm:mt-2">This is a success message that requires your attention requires your attention.</span>

        <svg xmlns="http://www.w3.org/2000/svg"
          class="w-7 hover:bg-green-200 rounded-lg transition-all p-2 cursor-pointer fill-green-500 absolute right-4 top-1/2 -translate-y-1/2" viewBox="0 0 320.591 320.591">
          <path
            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
            data-original="#000000" />
          <path
            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
            data-original="#000000" />
        </svg>
      </div>
    @endif



@endsection
