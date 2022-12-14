<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/js/jquery-1.9.1.min.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script>
    $('body').on('click', '.copyButton', function () {
        console.log(213)
        let button = $(this)
        let data = button.text();
        navigator.clipboard.writeText(data);
    })

</script>