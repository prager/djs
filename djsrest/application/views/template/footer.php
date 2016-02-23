</div>
</div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->    
    <script src="<?php echo base_url() ;?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ;?>/assets/js/custom.js"></script>
  
  <!-- javascript for carousel plugin -->
  <script src="<?php echo base_url() ;?>/assets/js/owl.carousel.min.js"></script>
  
  <!-- javascript for login page -->
 <script type="text/javascript">
  $(function() {

    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});
</script>

  <!-- footer starts here -->
  <footer id="footer-bottom">
    <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                      <p><b>Address:</b> 1825 Sutter St #C, Concord, CA 94520<b> | </b><b>Phone:</b> (925) 825-3277</p>
                    </div>
                </div>
            </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                      <b>Hours: </b>
                      Monday  Closed<b> | </b>
                      Tuesday 11AM–9PM<b> | </b>
                      Wednesday 11AM–9PM<b> | </b>
                      Thursday  11AM–9PM<b> | </b>
                      Friday  11AM–9PM<b> | </b>
                      Saturday  11AM–9PM<b> | </b>
                      Sunday  11AM–9PM
                    </div>
                </div>
            </div>
       </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <p>Copyright © 2016 - All Rights Reserved.Design and Developed By DJ's Bistro</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  </body>
</html>
     