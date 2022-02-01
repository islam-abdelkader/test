@php
$var = Session::has('success') ? 'green': 'red';
@endphp
@if (Session::has('success')|| Session::has('error'))
<div id="alert" class="relative px-4 py-3 text-{{ $var }}-700 bg-{{ $var }}-100 border border-{{ $var }}-400 rounded" role="alert">
    <strong class="font-bold">Holy smokes!</strong>
    <span class="block sm:inline">Something seriously bad happened.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn"
        onclick="this.parentElement.style.display='none';">&times;</span>
</div>
@endif
