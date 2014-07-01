</head>
<body>
<div class="main">
  <div class="header">
    <div class="block_header">
      <div class="logo"><a href="index.html"><img src="images/logo.gif" width="306" height="124" border="0" alt="logo" /></a></div>
      <div class="clr"></div>
      <div style="float:right;">
        <div class="clr"></div>
        <div class="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
		<?php 
		if(isset($_SESSION["aid"]))
		{
		echo "<li><a href='analysis.php'>Analysis</a></li>";
		echo "<li><a href='fgenrtr.php'>Form Generator</a></li>";
		}
		else if(isset($_SESSION["uid"])) echo "<li><a href='status.php'>Form Status</a></li>";
		?>
		</ul>
    </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
   <div class="body">
    <div class="body_resize">
      <div class="left">
 <?php include 'php_files/left.php';?>
      </div>
      <div class="right">