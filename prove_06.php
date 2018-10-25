

<!DOCTYPE html>
<html>
    
  <head>
    
	<?php include 'bootstrapScripts.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<?php
	try {
        $dbUrl = getenv('DATABASE_URL');
                
        $dbOpts = parse_url($dbUrl);
                
        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');
                
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "Error!: $msg";
        die();
        }

  ?>
	
    <title>Prove 6</title> 
  </head>
  
  <body>
	<h1>PHP Data Modification</h1>
        <ul id="list1">
        <?php foreach ($db->query("SELECT * FROM student") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["first_name"]); ?>
                    <?php echo($row["last_name"]); ?>
                </strong>
                &ndash;
                &ldquo;<?php echo($row["grade_level"]); ?>&rdquo;
				
            </li>
        <?php endforeach; ?>
        </ul>
        <hr />
        <form method="POST" name="scriptureForm">
            Book: <input type="text" name="book" />
            <br />
			Chapter: <input type="number" name="chapter" min="1" step="1" />
            <br />
			Verse: <input type="number" name="verse" min="1" step="1" />
            <br />
			Content: <textarea name="content" rows="10" cols="20"></textarea>
			<br />
			<?php foreach ($db->query("SELECT * FROM public.topic") as $row): ?>
				<input type="checkbox" name="topics[]" value="<?=$row['id']?>"> <?=$row['name']?><br>
			<?php endforeach; ?>
			<br />
			<input type="checkbox" name="newTopicCheck" value="isNewTopicCheck" />
			New Topic: <input type="text" name="newTopicText" />
			<input type="button" value="Submit" onclick="sendScriptures();" />
            <!-- <input type="submit" value="Submit" formaction="teach06p2.php" /> Stretch 1 and 2 -->
        </form>
  </body>
  
 </html>