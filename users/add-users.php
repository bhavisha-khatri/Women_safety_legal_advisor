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
				$mobile = "";
				$street = "";
				$city = "";
				$pincode = "";
				$state = "";
				$status = "";
				$id = isset($_GET['id']) ? $_GET['id'] : '';

				if ($id) {
					$sql = mysqli_query($conn, "select * from users where id = '{$id}'");
					if ($sql->num_rows > 0) {
						while ($row = $sql->fetch_assoc()) {
							$name = $row['name'];
							$username = $row['username'];
							$email_id = $row['email_id'];
							$password = $row['password'];
							$mobile = $row['mobile'];
							$street = $row['street'];
							$city = $row['city'];
							$pincode = $row['pincode'];
							$state = $row['state'];
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
										echo ("<h2>Edit Users</h2>");
									} else {
										echo ("<h2>Add Users</h2>");
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
											<form method="post" action="save-users.php" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group row margin_bottom_10">
													<label class="control-label col-sm-2" for="name">Name:</label>
													<div class="col-sm-10">
														<input type="hidden" name="id" value="<?= $id; ?>">
														<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?= $name; ?>" required> <br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="username">Username:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="<?= $username; ?>" required><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="email_id">Email Id:</label>
													<div class="col-sm-10">
														<input type="email" class="form-control" id="email_id" placeholder="Enter Emailid" name="email_id" value="<?= $email_id; ?>" required><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Password:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $password; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Mobile:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" value="<?= $mobile; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Street:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="street" placeholder="Enter Street" name="street" value="<?= $street; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">City:</label>
													<div class="col-sm-10">
														<select class="form-control" id="city" name="city">
															<?php
															$sql = mysqli_query($conn, "select * from cities");
															while ($row = $sql->fetch_assoc()) {
															?>
																<option value="<?= $row['id'] ?>" <?php if ($row['id'] == $city) {
																echo "selected";
															     } ?>>
																	<?= $row['name'] ?>
																</option>
															<?php
															}
															?>
														</select><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Pincode:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="pincode" placeholder="Enter Pincode" name="pincode" value="<?= $pincode; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">State:</label>
													<div class="col-sm-10">
														<select class="form-control" id="state" name="state">
															<?php
															$sql = mysqli_query($conn, "select * from states order by name ASC");
															while ($row = $sql->fetch_assoc()) {
															?>
																<option value="<?= $row['id'] ?>" <?php if ($row['id'] == $state) {
																	echo "selected";
																} ?>>
																	<?= $row['name'] ?>
																</option>
															<?php
															}
															?>
														</select><br>
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
															<a class="btn btn-primary" href="display-users.php">Back</a>
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