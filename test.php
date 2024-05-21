<!DOCTYPE html> 
<html> 
  
<body> 
    <?php 
    $link=$_GET["userid"];
    echo $link;
    ?>
    <h2>Welcome to GeeksforGeeks</h2> 
    <p>This is the example of <i>location.href</i> way. </p> 
    <input type="text" id="name" oninput="myfunc()">
    <p class="para"></p>
    <input type="text" id="input">
    <button onclick="myFunc()">Click me</button> 
  
    <!--script to redirect to another webpage-->
    <script src="test.js"> 
        // function myFunc() { 
        //     window.location.href = "http://www.geeksforgeeks.org/"; 
        // } 
    </script> 
</body> 
  
</html>