<!DOCTYPE html>
<?php
include("includes/connection.php");
include("functions/functions.php");
?>
<html>
  <head>
    <title>DUMMY MANAGE FRIENDS PAGE</title>
    <link rel="stylesheet" href="3b-friends.css"/>
    <script src="3c-friends.js"></script>
  </head>
  <body>
    <?php
    // (A) LOAD RELATIOSHIP LIBRARY + SET CURRENT USER
    require "2-lib-relation.php";
	$user = $_SESSION['user_email'];
	$get_user = "select * from users where user_email='$user'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
			$user_id = $row['user_id']; 

    // (B) PROCESS RELATIONSHIP REQUEST
    if (isset($_POST['req'])) {
      $pass = true;
      switch ($_POST['req']) {
        // (B1) ADD FRIEND
        case "add": $pass = $REL->request($user_id, $_POST['id']); break;
        // (B2) ACCEPT FRIEND
        case "accept": $pass = $REL->acceptReq($_POST['id'], $user_id); break;
        // (B3) CANCEL ADD
        case "cancel": $pass = $REL->cancelReq($user_id, $_POST['id']); break;
        // (B4) UNFRIEND
        case "unfriend": $pass = $REL->unfriend($user_id, $_POST['id'], false); break;
        // (B5) BLOCK
        case "block": $pass = $REL->block($user_id, $_POST['id']); break;
        // (B6) UNBLOCK
        case "unblock": $pass = $REL->block($user_id, $_POST['id'], false); break;
      }
      echo $pass ? "<div class='ok'>OK</div>" : "<div class='nok'>{$REL->error}</div>";
    }

    // (C) GET + SHOW ALL USERS
    $users = $REL->getUsers(); ?>
    <div id="userNow">You are now <?=$users[$user_id]?>.</div>
    <div id="userList"><?php
      $requests = $REL->getReq($user_id);
      $friends = $REL->getFriends($user_id);
      foreach ($users as $id=>$name) { if ($id != $user_id) {
        echo "<div class='urow'>";
        // (C1) USER ID & NAME
        echo "<div class='uname'>$id) $name</div>";

        // (C2) BLOCK/UNBLOCK
        if (isset($friends['b'][$id])) {
          echo "<button onclick=\"relate('unblock', $id)\">Unblock</button>";
        } else {
          echo "<button onclick=\"relate('block', $id)\">Block</button>";
        }

        // (C3) FRIEND STATUS
        // FRIENDS
        if (isset($friends['f'][$id])) { 
          echo "<button onclick=\"relate('unfriend', $id)\">Unfriend</button>";
        }
        // INCOMING FRIEND REQUEST
        else if (isset($requests['in'][$id])) { 
          echo "<button onclick=\"relate('accept', $id)\">Accept Friend</button>";
        }
        // OUTGOING FRIEND REQUEST
        else if (isset($requests['out'][$id])) { 
          echo "<button onclick=\"relate('cancel', $id)\">Cancel Add</button>";
        }
        // STRANGERS
        else { 
          echo "<button onclick=\"relate('add', $id)\">Add Friend</button>";
        }
        echo "</div>";
      }}
    ?></div>

    <!-- (D) NINJA RELATIONSHIP FORM -->
    <form id="ninform" method="post" target="_self">
      <input type="hidden" name="req" id="ninreq"/>
      <input type="hidden" name="id" id="ninid"/>
    </form>
  </body>
</html>