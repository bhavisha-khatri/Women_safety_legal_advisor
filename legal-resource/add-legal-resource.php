<!DOCTYPE html>
<html>
<?php include '../connection.php'; include '../head.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<body class="dashboard dashboard_1">
	<div class="full_container">
		<div class="inner_container">
			<?php include '../menu.php'; ?>
			<div id="content">
				<?php include '../topbar.php'; ?>
				<?php
				$title = $content = $upload_date = $author = "";
				$id = isset($_GET['id']) ? $_GET['id'] : '';
				if ($id) {
					$sql = mysqli_query($conn, "select * from legal_resource where id = '{$id}'");
					if ($sql->num_rows > 0) {
						while ($row = $sql->fetch_assoc()) {
							$title = $row['title'];
							$content = $row['content'];
							$upload_date = $row['upload_date'];
							$author = $row['author'];
						}
					} else {
						$id = "";
						echo "<script>Alert(No Record found with Associate id)</script>";
					}
				}
				?>
				<div class="midde_cont">
					<div class="container-fluid">
						<div class="row column_title">
							<div class="col-md-12">
								<div class="page_title">
									<?php
									if ($id) {
										echo ("<h2>Edit Legal Resource</h2>");
									} else {
										echo ("<h2>Add Legal Resource</h2>");
									}
									?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="white_shd full margin_bottom_30">
									<div class="row column1">
										<div class="col-sm-12 col-md-3"></div>
										<div class="col-sm-12 col-md-6 padding_infor_info">
											<div class="message"></div>
											<form method="post" action="save-legal-resource.php" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group row margin_bottom_10">
													<label class="control-label col-sm-2" for="title">Title:</label>
													<div class="col-sm-10">
														<input type="hidden" name="id" value="<?= $id; ?>">
														<input type="title" class="form-control" id="title" placeholder="Enter title" name="title" value="<?= $title; ?>" required><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="content">Content:</label>
													<div class="col-sm-10">
														<textarea rows="4" cols="69" class="form-control" id="editor" name="content" placeholder="Enter content..."><?= $content; ?></textarea><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="email_id">Upload Date:</label>
													<div class="col-sm-10">
														<input type="datetime-local" class="form-control" id="upload_date" placeholder="Enter uploaddate" name="upload_date" value="<?= $upload_date; ?>" required><br>
													</div>
												</div>
												<div class="form-group"><br>
													<div class="col-sm-offset-2 col-sm-10">
														<?php
														if ($id) {
														?>
															<a class="btn btn-primary" href="display-legal-resource.php">Back</a>
														<?php
														}
														?>
														<button type="submit" class="btn btn-primary">Submit</button>
													</div>
												</div>
											</form>
										</div>
										<div class="col-sm-12 col-md-6"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
	ClassicEditor
		.create(document.querySelector('#editor'))
		.catch(error => {
			console.error(error);
		});
</script>
<?php include '../script.php'; ?>
<script src="../js/ajax.js"></script>
</body>
</html>