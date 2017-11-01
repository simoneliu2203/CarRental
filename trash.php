<?php include('header.php') ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>


    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Show Popup Form</a>

    <div data-role="popup" id="myPopup" class="ui-content" style="width:250px; align: center">
      <form method="post" action="/action_page_post.php">
        <div>
          <h3>Login information</h3>
          <label for="usrnm" class="ui-hidden-accessible">Username:</label>
          <input type="text" name="user" id="usrnm" placeholder="Username">
          <label for="pswd" class="ui-hidden-accessible">Password:</label>
          <input type="password" name="passw" id="pswd" placeholder="Password">
          <input type="submit" data-inline="true" value="Log in">
        </div>
      </form>
    </div>


</body>
</html>
