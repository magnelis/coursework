@if(Session::has('message'))
    <span class="text__success__custom">
        {{ Session::get('message') }}
    </span>
@endif

@error('error')
<span class="text__error__custom">{{$message}}</span>
@enderror
