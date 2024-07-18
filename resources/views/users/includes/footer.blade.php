<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="footer2">
                    <div class="footerlogo">
                        <a href="index.php">
                            <img src="{{ url('user-assets') }}/images/logo.png" class="img-fluid" alt="footerlogo">
                        </a>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit.</p>
                    </div>
                    <ul class="footer1 mt-4">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="about.php">ABOUT US</a></li>
                        <li><a href="service.php">SERVICES</a></li>
                        <li><a href="blog.php">BLOG</a></li>
                        <li><a href="gallery.php">GALLERY</a></li>
                        <li><a href="term.php">TERMS & CONDITIONS</a></li>
                    </ul>
                    <hr class="hr1">
                    <div class="footer3">
                        <p>Copyright © 2024 - All Rights Reserved.</p>
                        <div class="social1">
                            <a href="#">
                                <img src="{{ url('user-assets') }}/images/instagram.png" alt="insta">
                            </a>
                            <a href="#">
                                <img src="{{ url('user-assets') }}/images/facebook.png" alt="insta">
                            </a>
                            <a href="#">
                                <img src="{{ url('user-assets') }}/images/linkdin.png" alt="insta">
                            </a>
                        </div>
                        <div class="footer4">
                            <p>Download The App</p>
                            <div class="footer5">
                                <a href="#"><img src="{{ url('user-assets') }}/images/playstore.png" alt=""></a>
                                <a href="#"><img src="{{ url('user-assets') }}/images/appstore.png" alt=""></a>
                            </div>
                        </div>
                        <p>Privacy & Policy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="{{ url('user-assets') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ url('user-assets') }}/js/bootstrap.min.js"></script>
<script src="{{ url('user-assets') }}/js/slick.js"></script>
<script src="{{ url('user-assets') }}/js/slick.min.js"></script>
<script src="{{ url('user-assets') }}/js/owl.carousel.min.js"></script>
<script src="{{ url('user-assets') }}/js/owl-custom.js"></script>
<script src="{{ url('user-assets') }}/js/title.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="{{ url('user-assets') }}/js/custom.js"></script>

<script>
    document.getElementsByTagName("body")[0].style.overflowX = "hidden";
</script>


<script>
    $(document).ready(function() {
        $('#carousel1').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            animateOut: 'fadeOut',
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('#carousel2').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });
</script>

<!-- scroll-top the page  -->
<script>
    // scrool top animation 

    var btn = $('#button_top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '100');
    });
</script>

<!-- mouse animation -->
<script>
    $(window).mousemove(function(e) {
        $(".ring").css(
            "transform",
            `translateX(calc(${e.clientX}px - 1.25rem)) translateY(calc(${e.clientY}px - 1.25rem))`
        );
    });
</script>

<!-- Full page loader -->

<script>
    const LOADER_DELAY = 3000; // 2 seconds

    window.addEventListener("load", function() {
        const loader = document.getElementById("loader");

        setTimeout(function() {
            loader.style.display = "none";
        }, LOADER_DELAY);
    });
</script>


</body>

</html>
