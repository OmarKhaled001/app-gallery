
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset("app-assets/vendors/js/vendors.min.js")}}"></script>
<script src="{{asset("app-assets/js/core/app-menu.min.js")}}"></script>
<script src="{{asset("app-assets/js/core/app.min.js")}}"></script>

@yield('js')
<script>
    $(window).on('load',  function(){
    if (feather) {
        feather.replace({ width: 14, height: 14 });
    }
    })
</script>
