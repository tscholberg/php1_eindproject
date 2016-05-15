<div class="bg upload-pict">
   <div class="container upload-pict">
	   <form action="{$siteurl}/upload" method="POST" enctype="multipart/form-data">
			<input type="file" name="imageUpload" id="imageUpload" class="hide"/>
			   <label for="imageUpload" class="btn btn-default btn-block">Select file</label><br/>
			   <img src="" class="imagePreview" id="imagePreview" alt="Image preview" width="250px"/>

				<div class="form-group">
					<label class="upload-pic-lbl">Description</label>
					<input type="text" name="description" class="form-control description" id="description" placeholder="Description">
				</div>

				<button type="submit" name="btnUploadPic" class="btn btn-primary btn-block">Upload</button>
		</form>
	</div>
</div>

<script src="{$siteurl}/js/jquery.js"></script>
