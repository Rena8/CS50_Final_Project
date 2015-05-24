<?php
	require("config.php");
	
	// render header
	render("header.html", ["title" => "header"]);
?>

    <div class="container">

        <!-- <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">About
                        <strong>business casual</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="img/slide-2.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <p>This is a great place to introduce your company or project and describe what you do.</p>
                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> -->
		
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
						<?php 
							$user = query("SELECT * FROM USERS WHERE id = ?", $_SESSION["id"]); 
							if ($user > 0)
								$user = $user[0];
								echo '<strong>Account: </strong>'.$user["username"].'	<strong>;</strong>	
									<strong>Votes: </strong>'.$user["votes"].'';
						?>
                    </h2>
                    <hr>
                </div>

            <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        
                    </li>
                    <li class="active">
						<?php 
							echo '<div class="col-sm-4 text-center">';
						
							// get number of photos
							$number = query("SELECT * FROM photos WHERE id = ?", $_SESSION["id"]);
							if (count($number) > 0)
							{
								$number = $number[0];
								$number = count($number);
								
								for ($i = 1; $i <= $number; $i++)
								{
									echo '<table border="0" style="width:30px">
									<tr><td style="max-width: 10px>';							
									
									// search for photos
									for ($j = $i; $j <= $number; $j++)
									{
										// get info for phto
										$info = query("SELECT * FROM photos WHERE id = ? AND number = ?", $_SESSION["id"], $i);	
										if (count($info) > 0)
										{						
											$info = $info[0];

											$img = "uploaded_img/3.jpg";
											$title = $info["title"];
											$id = $info["id"];
											$filename = $info["filename"];														
											$votes = $info["votes"];
											$img = "uploaded_img/".$filename."";
											

											// display info and photo
											echo '<td style="max-width: 200px;">
											<img class="img-responsive" src="'.$img.'" alt="'.$img.'">
											 <h3>'.$title.'
											</h3>
											<h3>Votes: '.$votes.' 
											</h3>
												<form action="delete.php" method="post" enctype="multipart/form-data">
												<div>
													<fieldset>
														<input type="hidden" name="title" value="'.$title.'"/>
														<button type="submit" class="btn btn-default" value="'.$title.'">Delete</button>
													</fieldset>	
												</div>
											<br>
											<hr width="100%">
											</div></td></tr>';
											$j = $number + 1;
										}
									}									
								}
							}
						?>
						</tr>
					</table>
					<div class="clearfix"></div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
        </div>
    </div>

