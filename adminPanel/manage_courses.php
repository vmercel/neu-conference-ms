<?php
session_start();

include('../config.php');

if($_SESSION['status']!='admin'){
	echo "<div class=\"wrapper\" align=\"center\"> <h3>You have no right to view this page </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 0; URL=index.php');
	}


$page_title = "Manage Conferences";
include('header.php');
if(isset($_POST['add_conf'])){
	$c_id = trim($_POST['conf_id']);
	$c_title = trim($_POST['conf_title']);
	$c_loc = trim($_POST['conf_location']);
	$c_start = trim($_POST['conf_startdate']);
	$c_end = trim($_POST['conf_enddate']);

$sql = "INSERT INTO conferences (conferenceID, conferenceTitle, location, conferenceStartDate, conferenceEndDate) VALUES (?,?,?,?,?)";
$stmt = $conn ->prepare($sql);
$stmt -> bind_param("sssss", $c_id, $c_title, $c_loc, $c_start, $c_end);
$stmt -> execute();

	if($stmt){
		$msg = "<div class='alert alert-success'>Conference successfully Created!!</div>";
	}
}
include('side_bar.php');
?>


	<div class="col-sm-12 main">
		<div class="container-fluid">
			<h2>Manage Conferences</h2><hr/>
				<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
				<h3 class="text-center"><u>Add new Conference</u></h3><br/>
						<form method="POST">
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group text-center">
										<label for="question" class="text-center">Conference ID</label>
										<input type="text" name="conf_id" placeholder="Course code" class="form-control" required/>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group text-center">
										<label for="question" class="text-center">Conference Title</label>
										<input type="text" name="conf_title" placeholder="Conference Title" class="form-control" required/>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group text-center">
										<label for="question" class="text-center">Location</label>
										<input type="text" name="conf_location" placeholder="Conference Location" class="form-control"/>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group text-center">
										<label for="question" class="text-center">Start Date</label>
										<input type="date" name="conf_startdate" placeholder="Conference Start Date" class="form-control"/>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group text-center">
										<label for="question" class="text-center">End Date</label>
										<input type="date" name="conf_enddate" placeholder="Conference End Date" class="form-control"/>
									</div>
								</div>
								<div class="col-sm-3" style="padding-top:20px;">
									<button type="submit" class="btn btn-primary " name="add_conf"><span class="glyphicon glyphicon-save"></span> Save Conference</button>
								</div>
							</div>
						</form>
						<div><?php if(isset($msg)){ echo $msg;}?></div>
				</div>
			</div>
			<h3 class="text-center">All Registered Conferences</h3>
			<!--search form -->
				<div class="row">
					<div class="col-xs-6">
					</div>
					<div class="col-xs-6">
					<form method="GET" class="form-inline pull-right">
						<div class="form-group">
							<label for="">Search</label>
							<input type="text" name="search" class="form-control" required/>
							<select name="status" class="form-control">
							<option value="course_code">Course code</option>
							<option value="course_title">Course Title</option>
							<option value="unit">Unit</option>
							</select>
						</div>
						<button class="btn btn-default btn-sm" name="search_result"><span class="glyphicon glyphicon-search"></span> Search</button>
					</form>
					</div>
				</div><br/>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr>
						<th>S/N</th>
						<th>Conference Code</th>
						<th>Conference Title</th>
						<th>Location</th>
						<th colspan="2">Action</th>
						</tr>
			<?php
			if(isset($_GET['search_result'])){
				$table_name =  "conferences";
 					$column_name = trim($_GET['status']);
					$search = trim($_GET['search']);
					$f = $admin->search_record($table_name,$column_name,$search);
				}
				else{
					$f = $admin->get_all_courses();
				}
			for($i=0;$i<count($f);$i++){
				$course_id = $f[$i]['course_id'];
				$course_code = $f[$i]['course_code'];
				$course_title = $f[$i]['course_title'];
				$unit = $f[$i]['unit'];
				?>
				<tr>
					<td><?php echo $i + 1;?></td>
					<td><?php echo $course_code;?></td>
					<td><?php echo $course_title;?></td>
					<td><?php echo $unit;?></td>
					<td>
					<form method="POST">
						<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#course_settings-<?php echo $course_id;?>">
						<span class="glyphicon glyphicon-pencil"></span></button>
					</form>
						<div id="course_settings-<?php echo $course_id;?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
										<h2 class="text-center">Change Settings For <?php echo $course_code;?></h2><hr/>
										<div id="error-<?php echo $course_id;?>"></div>
								<div class="modal-body">
										<div class="msg"></div>
										<form class="form-horizontal" method="post">
										<div class="row">
											<div class="col-md-12">
													<div class="form-group">
														<label for="c_cde" class="control-label col-sm-4">Course code: </label>
														<div class="col-sm-8">
															<input type="text" id="c_code-<?php echo $course_id;?>" 
															class="form-control" value="<?php echo $course_code;?>" required>
														</div>
													</div>
													<div class="form-group">
														<label for="c_title" class="control-label col-sm-4">Course title: </label>
														<div class="col-sm-8">
															<input type="text" id="c_title-<?php echo $course_id;?>" 
															class="form-control" value="<?php echo $course_title;?>" required>
														</div>
													</div>
												<div class="form-group">
													<label for="time" class="control-label col-sm-4">Unit: </label>
													<div class="col-sm-8">
														<input type="text" id="unit-<?php echo $course_id;?>" 
														class="form-control" value="<?php echo $unit;?>">
													</div>
												</div>
											</div>

									</div>
										<div class="row">
											<div class="col-md-4 col-md-offset-4">
												<button type="button" onclick="update_course(<?php echo $course_id;?>)" 
													class="btn btn-primary btn-block btn-lg"><span class="glyphicon glyphicon-save"></span> Update Settings</button>
											</div>
										</div>
										<input type="text" id="c_id-<?php echo $course_id;?>" value="<?php echo $course_id;?>" style="display:none"/>
									</form>
								</div>
								</div>
							</div>
							</div>
						</div>
						<!--End of modal-->
					</td>
					<td>
					<form method="POST">
						<button type="button" onclick="delete_course(<?php echo $course_id;?>)" class="btn btn-danger btn-md">
						<span class="glyphicon glyphicon-delete"></span>X</button>
					</form>
					</td>
				</tr>
				<?php
			}?>
					</tbody>
				</table>
				<?php if(empty($f)){
					echo "<h3>No result found</h3><br/>";
				}?>
					<div style="font-weight:bold;">
					Total number of Courses: <?php echo $admin->total_no_courses();?>
					</div>
			</div>
		</div>
	</div>

 
<?php include('footer.php');?>