<?php
	require("config.php");
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_POST['id'];
		$filename = $_POST['filename'];
		$vote = $_POST['vote'];
		
		// add votes to user info
		$user_votes = query("SELECT votes FROM users WHERE id = ?", $id);
		if (count($user_votes) > 0)
		{
			$user_votes = $user_votes[0];
			$user_votes = $user_votes["votes"] + $vote;
			
			// add vote
			$results = query("UPDATE users SET votes = ? WHERE id = ?", 
					$user_votes, $id);
				
			// some reason voting failed
			if ($results === false)
			{
				apologize ("could not vote!");
			}
		}
		else
		{
			apologize ("Voting failed!");
		}
		
		// add votes to photo info
		$img_votes = query("SELECT votes FROM photos WHERE id = ? AND filename = ?", $id, $filename);
		if (count($img_votes) > 0)
		{
			$img_votes = $img_votes[0];
			$img_votes = $img_votes["votes"] + $vote;

			// add vote
			$results = query("UPDATE photos SET votes = ? WHERE id = ? AND filename = ?", 
					$img_votes, $id, $filename);
				
			// some reason voting failed
			if ($results === false)
			{
				apologize ("could not vote!");
			}
			
			// redirect user
			voted ("Vote accepted!... Redirecting back...", "photos.php");
		}
		else
		{
			apologize ("Voting failed!");
		}
	}
?>
	