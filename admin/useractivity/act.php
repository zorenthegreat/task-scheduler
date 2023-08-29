<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
</head>
<body>
	<h1>Welcome to the Admin Dashboard</h1>
	<h2>Recent User Activity</h2>
	<table>
		<thead>
			<tr>
				<th>User ID</th>
				<th>User Name</th>
				<th>Activity</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
				$activities = array(
					array('user_id' => 1, 'user_name' => 'John', 'activity' => 'Logged in', 'date' => '2023-04-27'),
					array('user_id' => 2, 'user_name' => 'Mary', 'activity' => 'Updated profile', 'date' => '2023-04-26'),
					array('user_id' => 3, 'user_name' => 'Bob', 'activity' => 'Created a post', 'date' => '2023-04-25'),
				);
				foreach ($activities as $activity) {
					echo "<tr>";
					echo "<td>" . $activity['user_id'] . "</td>";
					echo "<td>" . $activity['user_name'] . "</td>";
					echo "<td>" . $activity['activity'] . "</td>";
					echo "<td>" . $activity['date'] . "</td>";
					echo "</tr>";
        }