<html>  
    <head>  

        <title>Online Polling System</title>


        <!-- Bootstap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- Google-Font -->
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="Style.css">
    </head>  
    <body> 
    <div id="header"></div>
      <header class="nav-menu">
        <div class="container">  
            <div class="row">
              <div class="col-md-4">
                <div class="menu-header">
                  <h4>Online Voting System</h4>
                </div>
              </div>
              <div class="col-md-5 col-md-offset-3">
                <div id="menu">
                  <ul>
                    <li class="active"><a href="#header">Home</a></li>
                    <li><a href="admin_login.php">Admin Login</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Log Out</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          </header>

          <section class="banner" id="admin">
            <div class="banner-content">
            </div>
          </section>

        <div class="poll-body">
          <div class="container">

            <br />  
            <br />
   <br />
   <h2 align="center">Welcome, This is Live Poll System</h2><br />
   <div class="row">
    <div class="col-md-6">
     <form method="post" id="poll_form">
      <h3 class="cms-head">Which is the Best CMS Software for Website Development In 2020?</h3>
      <br />
      <div class="radio">
       <label><input type="radio" name="poll_option" class="poll_option" value="Wordpress" /><h4>Wordpress</h4></label>
      </div>
      <div class="radio">
       <label><input type="radio" name="poll_option" class="poll_option" value="Drupal" /><h4>Drupal</h4></label>
      </div>
      <div class="radio">
       <label><input type="radio" name="poll_option" class="poll_option" value="Shopify" /><h4>Shopify</h4></label>
      </div>
      <div class="radio">
       <label><input type="radio" name="poll_option" class="poll_option" value="Magento" /><h4>Magento</h4></label>
      </div>
      <div class="radio">
       <label><input type="radio" name="poll_option" class="poll_option" value="WooCommerce" /><h4>WooCommerce</h4></label>
      </div>
      <br />
      <input type="submit" name="poll_button" id="poll_button" class="btn btn-primary submit-btn" />
     </form>
     <br />
    </div>
    <div class="col-md-6">
     <br />
     <br />
     <br />
     <h4 class="live-poll">Live Poll Result!</h4><br />
     <div id="poll_result"></div>
    </div>
   </div>
   
   
   <br />
   <br />
   <br />
   </div>
  </div>

  <footer class="footer-section">
    <div class="container">
        <p>&#169;Copyright Vote. 2020 Alright Reserved</p>
      </div>
  </footer>


<script>  
$(document).ready(function(){
  
 fetch_poll_data();

 function fetch_poll_data()
 {
  $.ajax({
   url:"fetch_poll_data.php",
   method:"POST",
   success:function(data)
   {
    $('#poll_result').html(data);
   }
  })  
 }
 

 $('#poll_form').on('submit', function(event){
  event.preventDefault();
  var poll_option = '';
  $('.poll_option').each(function(){
   if($(this).prop("checked"))
   {
    poll_option = $(this).val();
   }
  });
  if(poll_option != '')
  {
   $('#poll_button').attr("disabled", "disabled");
   var form_data = $(this).serialize();
   $.ajax({
    url:"poll.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#poll_form')[0].reset();
     $('#poll_button').attr('disabled', false);
     fetch_poll_data();
     alert("Poll Submitted Successfully");
    }
   });
  }
  else
  {
   alert("Please Select Option");
  }
 });

});  
</script>

<script src="main.js"></script>
    </body>  
</html>