<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Behavior Tracker</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="project1_home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Behavior Events<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="project1_events_view.php">View Event</a></li>
		  <li><a href="project1_event_add.php">Add Event</a></li>
          <li><a href="project1_event_edit_list.php">Edit Event</a></li>
        </ul>
      </li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Student<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="project1_students_view.php">View/Edit Students</a></li>
		  <li><a href="project1_student_add.php">Add Student</a></li>
        </ul>
      </li>
	  <li class=""><a href="project1_logout.php">Log Out</a></li>
	  
    </ul>
  </div>
</nav>
 