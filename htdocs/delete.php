<?php
	require("config.php");
	
	$filename = query("SELECT filename FROM photos WHERE title = ?", $_POST["title"]);
	
	if ($filename === false)
	{
		apologize ("Image could not be deleted!");
	}
	else
	{
		// delete from server
		$filename = $filename[0];
		$filename = $filename["filename"];
		
		//get number of rows
		$rows = query("SELECT * FROM photos");
		if (count($rows) > 0)
		{
			// update auto increment
			$rows = count($rows);
			$ai = $rows - 1;
			$results = query("ALTER TABLE photos AUTO_INCREMENT = ".$ai."");
			if ($results === false)
			{
				apologize ("Image could not be deleted!");
			}
			else
			{
				// delete data in database
				$delete = query("DELETE FROM photos WHERE title = ?", $_POST["title"]);
				if ($delete === false)
				{
					apologize ("Image could not be deleted!");
				}
				// delete from server
				unlink('uploaded_img/'.$filename.'');
				echo $_POST["title"];
				deleted ("Image deleted!... Redirecting!".$_POST["title"]."");
				redirect("account.php");
			}
		}
		else
		{		
			apologize ("Image could not be deleted!");
		}
	}
?>