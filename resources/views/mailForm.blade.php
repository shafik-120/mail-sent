@extends('header') 

@section('othersContent')

<form method="POST" action="{{route('sendingEmail')}}" class="max-w-sm mx-auto " enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
      <label for="mail_subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">mail subject</label>
      <input type="mail_subject" name="mail_subject" id="mail_subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Mail Subject" required />
    </div>
    <div class="mb-5">
      <label for="mail_body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail Body</label>
      <textarea name="mail_body" id="mail_body" cols="30" rows="10" id="mail_body" placeholder="Enter Mail Body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
    </div>
    <div class="mb-5">
      <label for="sent_mails" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Person mail</label>
      <input type="sent_mails" name="sent_mails" id="sent_mails" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Mail Subject" required />
    </div>
    
    <div class="flex items-start mb-5  flex-column">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="mail_files">Upload file</label><br>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="mail_files[]" aria-describedby="mail_files_help" id="mail_files" type="file" multiple>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
@endsection