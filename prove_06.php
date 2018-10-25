<?php
try
{
  $dbUrl = getenv('DATABASE_URL');
  $dbOpts = parse_url($dbUrl);
  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>

<!DOCTYPE html>
<html>
    
  <head>
    <meta charset="utf-8">
    <title>Prove 6</title> 
<script type="application/javascript">
function sendScriptures() {
	
}
</script>	
  </head>
  
  <body>
	<h1>Scripture Resources</h1>
        <ul id="list1">
        <?php foreach ($db->query("SELECT s.book, s.chapter, s.verse, s.content, string_agg(t.name, ', ') FROM scriptures s JOIN scripture_topic st ON s.id = st.scripture_id JOIN topic t ON st.topic_id = t.id GROUP BY s.id") as $row): ?>
            <li>
                <strong>
                    <?php echo($row["book"]); ?>
                    <?php echo($row["chapter"]); ?>:<?php echo($row["verse"]); ?>
                </strong>
                &ndash;
                &ldquo;<?php echo($row["content"]); ?>&rdquo;
				 Topics: <?=$row["string_agg"]?>
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