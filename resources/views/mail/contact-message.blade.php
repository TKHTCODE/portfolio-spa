@component('mail::message')
# Introduction

Someone sent you the message
"{{ $message }}"

Email:
{{ $email }}

Thanks,<br>

@endcomponent