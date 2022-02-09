<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.chosen').chosen();
    });
</script>
@yield('script')
