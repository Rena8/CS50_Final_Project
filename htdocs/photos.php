<?php
	require("config.php");
	
	// render header
	render("header.html", ["title" => "header"]);
?>
<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","vote.php?vote="+int,true+"username='.);
  xmlhttp.send();
}
</script>

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
                    <h2 class="intro-text text-center">Vote for
                        <strong>ones you like</strong>
                    </h2>
                    <hr>
                </div>
				<div class="col-sm-4 text-center">
					<?php
						for ($i = 0; $i < 3; $i++)
						{
							echo '<table border="0" style="width:30px">
							<tr><td style="max-width: 10px>';							
							$title = "title";
							$username = "user";
							$img = "uploaded_img/unavailable.png";
							
							// get number of photos
							$number = query("SELECT * FROM photos");
							if ($number > 0)
							{
								$number = count($number);
								// chose random photo
								$number = rand(1, $number);								
							}
							
							// get info for phto
							$info = query("SELECT * FROM photos WHERE number = ?", $number);											
							if (count($info) > 0)
							{						
								$info = $info[0];

								$img = "uploaded_img/3.jpg";
								$title = $info["title"];
								$id = $info["id"];
								$filename = $info["filename"];
								$votes = $info["votes"];
															
								$username = query("SELECT username FROM users WHERE id = '$id'");
								
								if (count($username) > 0)
								{
									$username = $username[0];
									$username = $username["username"];
								}
								$img = "uploaded_img/".$filename."";
							}
							// display info and photo
							echo '<td style="max-width: 200px;">
							<img class="img-responsive" src="'.$img.'" alt="'.$img.'">
							 <h3>'.$title.'
								<small>by '.$username.'</small>
							</h3>
							<form action="vote.php" method="post" enctype="multipart/form-data">
								<fieldset>
									<input type="hidden" name="id" value="'.$id.'"/>
									<input type="hidden" name="filename" value="'.$filename.'"/>
									<input type="hidden" name="vote" value="1"/>
									<button type="submit" class="btn btn-default" value="'.$title.'">+</button>
								</form>
								Votes: '.$votes.'
								<form action="vote.php" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="'.$id.'"/>
									<input type="hidden" name="filename" value="'.$filename.'"/>
									<input type="hidden" name="vote" value="-1"/>
									<button type="submit" class="btn btn-default" value="'.$title.'">-</button>
								</fieldset>	
								</form>
							<br>
							<hr width="100%">
							</div></td></tr>';			
							$oldnum = $number;
						}
					?>
					</tr>
				</table>
                <div class="clearfix"></div>
            </div>

            <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        
                    </li>
                    <li class="active">
                        <a href='photos.php'><h2>Refresh photos!</h2></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
        </div>
    </div>
<?php
	// render footer
	render("footer.html", ["title" => "footer"]);
?>	
