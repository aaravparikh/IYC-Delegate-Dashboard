<?php

require_once("dashboardHeader.php");

?>
  <script type="text/javascript">
    function refreshData(){
      var display = document.getElementById("content");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "chat.php");
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          display.innerHTML = this.responseText;
          setTimeout(refreshData(), 3000);
        } else {
          setTimeout(refreshData(), 3000);

        };
      }
    }

    refreshData();
  </script>



</container>

<div class="containerMUN">
  <div class="chatItem chatBoard">
    <p>Delegate chat for <?php echo $_SESSION["committee"] ?></p>
    <div class="chatTabs">
      <a class="chatGroups" href="#fullCommittee">Full Committee</a>
      <a class="chatGroups" href="#executiveBoard">Executive Board</a>
      <a class="chatGroups" href="#moderator">Moderator|Rapporteur</a>
      <a class="chatGroups" href="#secreteriat">Secretariat</a>
      <?php
      $chatList = getChats($conn, $_SESSION["committee"]);

      while ($row = $chatList->fetch_assoc()) {
        foreach ($row as $r) {
          print '<a class="chatGroups" href="#' . $r . '">' . $r . '</a> ';
        }
      }

      ?>
    </div>
    <div class="scrollDiv">

      <div id="fullCommittee" class="chatContent">
        <h2 style="text-align: center;">Chat with Full Committee</h2>

        <div class="chatWindow" id="content">
          <?php
          $result = getGroupChatContent($conn, $_SESSION["committee"]);
          while ($row = $result->fetch_assoc()) {
            if ($row["author"] != $_SESSION["country"]) {
              print '<div class="chatMessage"><span class="auth">' . $row["author"] . '</span><br>' . $row["message"] . '<br><span class=leftMeta>' . $row["timeSent"] . '</span></div>';
            } else {
              print '<div class="chatMessageSelf"><span class="auth">' . $row["author"] . '</span><br>' . $row["message"] . '<br><span class=leftMeta>' . $row["timeSent"] . '</span></div>';
            }
          }
          ?> 
          
        </div> 
  
        <div class=userInput>
          <form action="send.inc.php" method="POST">
          <input type="text" name="message  " class="chatBox" placeholder="Type a message">
          <button class="chatSend">Send</button>
          </form>
        </div>
      </div>
      <div id="executiveBoard" class="chatContent">
        <h2>Chat with Executive Board</h2>
        <div class="chatWindow">
          <?php
          /*             getChatContent($conn, "executiveBoard", $_SESSION["country"])
 */          ?>
        </div>
      </div>

    </div>
  </div>

  <div class="chatItem resources">
    <iframe class='responsive-iframe' src="https://drive.google.com/embeddedfolderview?id=1ZiQ2tDuVw1leb19wqnKqojXS695WxzlE#grid" frameborder="0"></iframe>

  </div>

</div>
</div>