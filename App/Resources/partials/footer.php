<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('footer').outerHeight();

    $(window).scroll(function(event) {
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $('footer').removeClass('myfooter').addClass('nav-up');
        } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $('footer').removeClass('nav-up').addClass('myfooter');
            }
        }

        lastScrollTop = st;
    }
</script>
<!------ Include the above in your HEAD tag ---------->

<!-- Footer -->
<footer class="myfooter">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                    <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/pankaj.kandpal.1004"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="https://twitter.com/pankaj_k_08"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a target="_blank" href="https://www.instagram.com/p4nk4j_/"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a traget="_blank" href="javascript:void();"><i class="fa fa-github"></i></a></li>

                </ul>
            </div>
            </hr>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p>E-Library is developed to serve the readers with a wide variety of books, making their journey meaningful </p>
                <p class="h6">&copy All right Reversed.<a class="text-green ml-2"></a>
            </div>
            </hr>
        </div>
    </div>
</footer>
<!-- ./Footer -->