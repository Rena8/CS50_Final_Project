<div class="row">
    <div class="box">
        <div class="col-lg-12">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<h2 color:yellow>Upload File</h2>
				<fieldset>
					<div class="form-group">
						<input autofocus class="form-control" name="title" placeholder="title" type="text"/>
					</div>
					<label for="fileSelect">Filename:</label>
					<input type="file" name="photo" id="fileSelect"><br>
					<input type="submit" name="submit" value="Upload">
				</fieldset>	
			</div>
		</div>
	</div>
</div>