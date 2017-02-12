<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TAMADOG</title>
  <script>

    document.addEventListener("DOMContentLoaded", function(event) {

      responseDiv = document.getElementById("responseDiv");
      allButtons = document.getElementsByTagName("button");
      myButtons = [];

      [].forEach.call(allButtons, function(el) {
        if(el.classList.contains("action")) {
          myButtons.push(el);
        }
      });

      myButtons.forEach(function (myButton) {
        myButton.addEventListener("click",function (e){
          action = e.target.id; // we get the action to do
          currentNode = e.target.previousSibling;
          while (currentNode.tagName != "SELECT") {
            currentNode = currentNode.previousSibling;
          } // we should have identified the concerned SELECT element
          mySelect = currentNode;
          var x = mySelect.selectedIndex;
          arg = mySelect.getElementsByTagName("option")[x].value //now the argument for it
          // have the object do the action
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              responseDiv.innerHTML = this.responseText;
            }
          };
          xhttp.open("POST", './animalManager.php', true);
          xhttp.setRequestHeader("Content-Type", "application/json");
          xhttp.send(JSON.stringify({action:action, arg:arg}));
        });
      });
    });

  </script>
  </head>
  <body>
<?php
include('Animal.class.php');
// initialize an object
$dog = new Animal();
$dog->setName("CrocBlanc");
$_SESSION["animal"] = $dog; // pass it to animalManager.php
?>
    <div>
      <select
        <option value = "apple">apple</option>
        <option value = "meat">meat</option>
        <option value = "junkFood">junkFood</option>
      </select>
      <button class = "action" id="eat">feed</button>
      <br/><br/>
      <select>
        <option value = "sleep">sleep</option>
        <option value = "sport">sport</option>
        <option value = "dev">dev</option>
        <option value = "tv">tv</option>
      </select>
      <button class = "action" id="activity">train</button>
    </div>
    <div id = "responseDiv">
    </div>
</body>
</html>
