<?php

require_once("dashboardHeader.php");

?>
<script type="text/javascript">
  /*    $(document).ready(function(){
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
  });  */

  

  function submitForm() {
    var message = $("#message").val();
    $.post("submitChat.php", {
      message: message
    });
    $('#chatForm')[0].reset();
  }

</script>



</container>

<div class="containerMUN">
  <div class="chatItem chatBoard">
    <p>Delegate chat for <?php echo $_SESSION["committee"] ?></p>
    <div class="chatTabs">
      <a class="chatGroups" href="#fullCommittee">Full Committee</a>
      <a class="chatGroups" href="#executiveBoard">Executive Board</a>
      <a class="chatGroups" href="#moderator">Moderator|Rapporteur</a>
      <a class="chatGroups" href="#secretariat">Secretariat</a>
      <?php
      $chatList = getChats($conn, $_SESSION["committee"]);

      while ($row = $chatList->fetch_assoc()) {
        foreach ($row as $r) {
          if($r == $_SESSION["country"]){
          }else{
          print '<a class="chatGroups" href="#' . $r . '">' . $r . '</a> ';
        }}
      }

      ?>
    </div>
    <div class="scrollDiv">

      <div id="fullCommittee" class="chatContent">
        <h2 style="text-align: center;">Chat with Full Committee</h2>

        <div class="chatWindow" id="content">
          <?php
          $_SESSION['receiverCountry'] = 'all';
          getGroupChatContent($conn, $_SESSION["committee"], $_SESSION["receiverCountry"]);

          ?>

        </div>

        <div class=userInput>
          <?php
          $_SESSION["receiverCountry"] = 'all';
          $_SESSION["position"] = '#fullCommittee';

          print ' <form id="chatForm" action=submitChat.php?location=' . $_SESSION["receiverCountry"] . '&position=' . $_SESSION["position"] . ' method="POST">' ?>
          <input type="text" name="message" class="chatBox" placeholder="Type a message" id="message">
          <button class="chatSend" type="submit" value="submit" name="submit">Send</button>

          </form>
        </div>
      </div>

      <div id="executiveBoard" class="chatContent">
        <h2>Chat with Executive Board</h2>
        <div class="chatWindow" id="content">
          <?php
          $_SESSION['receiverCountry'] = 'eb';
          getChatContent($conn, $_SESSION["committee"], $_SESSION["receiverCountry"], $_SESSION["country"]);

          ?>

        </div>

        <div class=userInput>
          <?php
          $_SESSION["receiverCountry"] = 'eb';
          $_SESSION["position"] = '#executiveBoard';

          print ' <form id="chatForm" action=submitChat.php?location=' . $_SESSION["receiverCountry"] . '&position=' . $_SESSION["position"] . ' method="POST">' ?>
          <input type="text" name="message" class="chatBox" placeholder="Type a message" id="message">
          <button class="chatSend" type="submit" value="submit" name="submit">Send</button>

          </form>
        </div>
      </div>

      <div id="moderator" class="chatContent">
        <h2>Chat with Moderator</h2>
        <div class="chatWindow" id="content">
          <?php
          $_SESSION['receiverCountry'] = 'moderator';
          getChatContent($conn, $_SESSION["committee"], $_SESSION["receiverCountry"], $_SESSION["country"]);

          ?>

        </div>

        <div class=userInput>
          <?php
          $_SESSION["receiverCountry"] = 'moderator';
          $_SESSION["position"] = '#moderator';

          print ' <form id="chatForm" action=submitChat.php?location=' . $_SESSION["receiverCountry"] . '&position=' . $_SESSION["position"] . ' method="POST">' ?>
          <input type="text" name="message" class="chatBox" placeholder="Type a message" id="message">
          <button class="chatSend" type="submit" value="submit" name="submit">Send</button>

          </form>
        </div>
      </div>

      <div id="secretariat" class="chatContent">
        <h2>Chat with Secretariat</h2>
        <div class="chatWindow" id="content">
          <?php
          $_SESSION['receiverCountry'] = 'secretariat';
          getChatContent($conn, $_SESSION["committee"], $_SESSION["receiverCountry"], $_SESSION["country"]);

          ?>

        </div>

        <div class=userInput>
          <?php
          $_SESSION["receiverCountry"] = 'secretariat';
          $_SESSION["position"] = '#secretariat';

          print ' <form id="chatForm" action=submitChat.php?location=' . $_SESSION["receiverCountry"] . '&position=' . $_SESSION["position"] . ' method="POST">' ?>
          <input type="text" name="message" class="chatBox" placeholder="Type a message" id="message">
          <button class="chatSend" type="submit" value="submit" name="submit">Send</button>

          </form>
        </div>
      </div>

      <?php
      $chatList = getChats($conn, $_SESSION["committee"]);
      while ($row = $chatList->fetch_assoc()) {
        foreach ($row as $r) {
          $_SESSION['receiverCountry'] = $r;

          if($r == $_SESSION["country"]){
            
          }else{
          print '<div class="chatContent" id=' . $r . '>
            <h2>Chat with ' . $r . '</h2>
              <div class="chatWindow" id="content">';
                getChatContent($conn, $_SESSION["committee"], $_SESSION["receiverCountry"], $_SESSION["country"]);
              print '</div>
            ';
            $_SESSION["receiverCountry"] = $r;
            $_SESSION["position"] = ('#'.$r);
             print '<div class="userInput">';
            print '<form id="chatForm" action=submitChat.php?location=' . $_SESSION["receiverCountry"] . '&position=' . $_SESSION["position"] . ' method="POST">';
          print '<input type="text" name="message" class="chatBox" placeholder="Type a message" id="message"><button class="chatSend" type="submit" value="submit" name="submit">Send</button>
          </form>'; 
           print '</div></div>'; 
        }}
      } ?>

    </div>
    </div>

  <div class="chatItem resources">
    <iframe class='responsive-iframe' src="https://drive.google.com/embeddedfolderview?id=1ZiQ2tDuVw1leb19wqnKqojXS695WxzlE#grid" frameborder="0"></iframe>

  </div>

</div>
</div>