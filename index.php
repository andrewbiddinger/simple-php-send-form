<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <title>Simple Send Form</title><!-- Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"><!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 column">
        <div id="mainform">
          <?php if($_GET['message'] == 'sent'): ?>

          <div class="alert alert-success">
            Thank you! Your message has been sent.
          </div><?php else: ?><!-- Required Div Starts Here -->

          <form action="/send.php" class="form-horizontal" id="form" method="post" name="contactform">
            <div class="form-group">
              <input class="form-control" id="inputName" name="inputName" placeholder="Name *" required="" type="text">
            </div>

            <div class="form-group">
              <input class="form-control" id="inputEmail" name="inputEmail" placeholder="Email *" required="" type="email">
            </div>

            <div class="form-group">
              <input class="form-control" id="inputContact" name="inputContact" placeholder="Phone Number" type="text">
            </div>

            <div class="form-group">
              <textarea class="form-control" id="inputMessage" name="inputMessage" placeholder="Details / Message"></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-black" type="submit">Send Message</button>
            </div>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>