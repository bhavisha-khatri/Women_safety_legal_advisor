<!DOCTYPE html>
<html>
<?php
include '../connection.php';
include '../head.php';
?>

<body class="dashboard dashboard_1">
	<div class="full_container">
		<div class="inner_container">
			<?php include '../menu.php'; ?>
			<div id="content">
				<?php include '../topbar.php'; ?>
				<?php
				$name = "";
				$username = "";
				$email_id = "";
				$password = "";
				$status = "";
				$id = isset($_GET['id']) ? $_GET['id'] : '';

				if ($id) {
					$sql = mysqli_query($conn, "select * from admin where id = '{$id}'");
					if ($sql->num_rows > 0) {
						while ($row = $sql->fetch_assoc()) {
							$name = $row['name'];
							$username = $row['username'];
							$email_id = $row['email_id'];
							$password = $row['password'];
							$status = $row['status'];
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
										echo ("<h2>Edit Admin</h2>");
									} else {
										echo ("<h2>Add Admin</h2>");
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
											<form method="post" action="save-admin.php" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group row margin_bottom_10">
													<label class="control-label col-sm-2" for="name">Name:</label>
													<div class="col-sm-10">
														<input type="hidden" name="id" value="<?= $id; ?>">
														<input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?= $name; ?>" required><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="username">Username:</label>
													<div class="col-sm-10">
														<input type="username" class="form-control" id="username" placeholder="Enter Username" name="username" value="<?= $username; ?>" required><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="email_id">Email Id:</label>
													<div class="col-sm-10">
														<input type="email_id" class="form-control" id="email_id" placeholder="Enter Emailid" name="email_id" value="<?= $email_id; ?>" required><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Password:</label>
													<div class="col-sm-10">
														<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $password; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-offset-2 col-sm-10">
														<div class="checkbox"><br>
															<label><input type="checkbox" name="status" value="1" <?php if ($status == '1') { ?>checked="checked" <?php } ?>> Status</label>
														</div><br>
													</div>
												</div>
												<div class="form-group"><br>
													<div class="col-sm-offset-2 col-sm-10">
														<?php
														if ($id) {
														?>
															<a class="btn btn-primary" href="display-admin.php">Back</a>
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
	<?php include '../script.php'; ?>
	<script src="../js/ajax.js"></script>
</body>
</html>