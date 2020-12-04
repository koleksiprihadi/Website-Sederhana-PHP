<script>
    $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('color');
            }

            else {
                  $('nav').removeClass('color');
            }
      })
</script>