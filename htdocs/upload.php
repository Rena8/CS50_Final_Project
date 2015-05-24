<?php
	require ("config.php");

	// render header
	render("header.html", ["title" => "header"]);
	
	// render form
	render("upload_form.php", ["title" => "upload"]);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_FILES["photo"]["error"]))
		{
			if($_FILES["photo"]["error"] > 0)
			{
				echo "Error: " . $_FILES["photo"]["error"] . "<br>";
			} 
			else
			{
				$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
				
				$filename = $_FILES["photo"]["name"];
				
				$filetype = $_FILES["photo"]["type"];

				$filesize = $_FILES["photo"]["size"];
		   
				// Verify file extension
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
			
				// Verify file size - 5MB maximum
				$maxsize = 5 * 1024 * 1024;
				
				if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
		  
				// Verify MYME type of the file
				if(in_array($filetype, $allowed))
				{
					
					$filename = $_SESSION["id"] . $filename;
					
					// check if file exist
					if (!file_exists("uploaded_img/".$filename.""))
					{
						$upload = query("INSERT INTO photos (id, title, filename) VALUES(?, ?, ?)",
								$_SESSION["id"], $_POST["title"], $filename);
												
						// if info is uploaded move image
						if ($upload === false)
						{
							apologize("Your file was not uploaded successfully! :(");
						}
						else
						{					
							// move file to permanent folder on server
							move_uploaded_file($_FILES["photo"]["tmp_name"], "uploaded_img/" . $filename);
							success ("Your file was uploaded successfully.");					
						}
					}
					else
					{
						apologize("File already exist...");
					}
				} 
				else
				{
					echo "Error: There was a problem uploading your file - please try again."; 
				}
			}
		} 
		else
		{
			echo "Error: Invalid parameters - please contact your server administrator.";
		}
	}
?>
