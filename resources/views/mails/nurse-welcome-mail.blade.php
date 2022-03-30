@component('mail::message')
# @lang("Welcome to VideoMED/ Formats")

@lang("The following information will allow you to access the format platform to send to patients. As soon as you log in you can change your password.")

@component('mail::panel')
<b>@lang('Link'):</b> https://www.videomed.org/formatos<br>
<b>@lang('Email Username'):</b> {{ $username }}<br>
<b>@lang(' Password'):</b> {{ $password }}<br>
@endcomponent

@lang('Thank You')<br>
<br>
{{ $adminname }}<br>
{{ $institution_name }}<br>
{{ $address }}<br>
{{ $telnumber }}<br>
@endcomponent
