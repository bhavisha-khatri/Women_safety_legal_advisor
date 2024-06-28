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
				$licence_no = "";
				$photo = "";
				$about_us = "";
				$court = "";
				$practice_area = "";
				$experiance_year = "";
				$language = "";
				$specialization = "";
				$status = "";
				$id = isset($_GET['id']) ? $_GET['id'] : '';

				if ($id) {
					$sql = mysqli_query($conn, "select * from advocate where id = '{$id}'");
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
							$licence_no = $row['licence_no'];
							$photo = "../" . $row['photo'];
							$about_us = $row['about_us'];
							$court = $row['court'];
							$practice_area = $row['practice_area'];
							$experiance_year = $row['experiance_year'];
							$language = $row['language'];
							$specialization = $row['specialization'];
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
										echo ("<h2>Edit Advocate</h2>");
									} else {
										echo ("<h2>Add Advocate</h2>");
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
											<form method="post" action="save-advocate.php" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group row margin_bottom_10">
													<label class="control-label col-sm-2" for="name">Name:</label>
													<div class="col-sm-10">
														<input type="hidden" name="id" value="<?= $id; ?>">
														<input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?= $name; ?>" required> <br>
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
													<label class="control-label col-sm-2" for="class">Licence No:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="licence_no" placeholder="Enter Licence no" name="licence_no" value="<?= $licence_no; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Photo:</label>
													<div class="col-sm-10">
														<?php
														if ($photo) {
														?><img src="<?= $photo; ?>" width="30px" height="30px"><?php
																											}
																												?>
														<input type="file" class="form-control" id="photo" name="photo" value="<?= $photo; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">About Us:</label>
													<div class="col-sm-10">
														<textarea rows="4" cols="69" class="form-control" name="about_us" placeholder="Enter About us..."><?= $about_us; ?></textarea><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Court:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="court" placeholder="Enter Court" name="court" value="<?= $court; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Practice Area:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="practice_area" placeholder="Enter Practice Area" name="practice_area" value="<?= $practice_area; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Experiance Year:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="experiance_year" placeholder="Enter Experiance Year" name="experiance_year" value="<?= $experiance_year; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Language:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="court" placeholder="Enter Language" name="language" value="<?= $language; ?>"><br>
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-sm-2" for="class">Specialization:</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="specialization" placeholder="Enter Specialization" name="specialization" value="<?= $specialization; ?>"><br>
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
															<a class="btn btn-primary" href="display-advocate.php">Back</a>
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