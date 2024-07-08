<x-mail::message>
# Introduction

The body of your message.

{{-- <x-mail::button :url="{{route('home')}}">
Test Button
</x-mail> --}}
<a href="{{route('home')}}">home page</a>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
