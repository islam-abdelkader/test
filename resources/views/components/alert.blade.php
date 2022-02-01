@if (Session::has('success')|| Session::has('error'))
<div class="container alert {{ Session::has('success') ? 'success': 'error' }}" id="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {!! Session::get('success') ?? Session::get('error') !!}
</div>
@endif
