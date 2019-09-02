<script src="{{asset('js/toastr.min.js')}}"></script>
    
    
<script>
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @endif
</script>

<script>
        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
    </script>

<script>
        @if(Session::has('warning'))
            toastr.warning("{{Session::get('warning')}}")
        @endif
    </script>