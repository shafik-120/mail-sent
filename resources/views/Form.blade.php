@extends('header')

@section('othersContent')
    <form method="POST" action="{{ route('mail.store') }}" class="max-w-sm mx-auto " enctype="multipart/form-data">
        @csrf
            <div class="mb-5"> 
                <label for="mail_all" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your All Email ~ TO</label>
                <input value="{{old('mail_all')}}" type="text" id="mail_all" name="mail_all" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your Send All Email"/>
                @error('mail_all') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div class="mb-5">
                <label for="mail_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail Subject</label>
                <input value="{{old('mail_subject')}}" type="text" id="mail_subject" name="mail_subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Your Email Subject"/>
                @error('mail_subject') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div class="mb-5">
                <label for="mail_body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail Body</label>
                <input value="{{old('mail_body')}}" type="text" id="mail_body" name="mail_body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Your Mail Body"/>
                @error('mail_body') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div class="mb-5">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="mail_files">Upload file</label><br>
              <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="mail_files[]" id="mail_files" type="file" multiple>
              @error('mail_files') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            {{-- form Mail --}}
            <div id="mail_all_from" class="mb-5 "> 
                <label for="mail_all_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your All Email ~ FROM</label>
                <input value="{{old('mail_all_from')}}" type="text" id="mail_all_from" name="mail_all_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Enter Your from All Email"/>
                @error('mail_all_from') <p class="text-red-500">{{$message}}</p> @enderror
            </div>
            <div class="flex items-start mb-5">
              <div class="flex items-center h-5">
                <input id="mailAllFrom" onclick="fromMail()" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
              </div>
              <label for="mailAllFrom" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
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
