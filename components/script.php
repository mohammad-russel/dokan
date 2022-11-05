<script>
    $(document).ready(function() {
        $(".hide").hide();
        $(".show").click(function() {
            $(".hide").fadeIn();
            $(".show").slideUp();
          
            $(".slider").slideDown()
            
        })
        $(".hide").click(function() {
            $(".hide").fadeOut();
            $(".show").slideDown();
            $(".slider").slideUp()

        })
    })
</script>