<?php
session_start();
require_once './database/database.php';
date_default_timezone_set('Asia/Manila');

$users_id = $_SESSION['users_id'];

$database = new Database();
$db = $database->connect();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tasks</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php require_once "./php/darkmode_check.php";
									echo $stylesheet; ?>">

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

		* {

			font-family: "Inter", sans-serif;
			color: #0d062d;

		}

		.navbar {
			border-bottom: 2px solid #dbdbdb;
		}

		.navbar-custom {
			background-color: var(--div) !important;
		}

		#sidebar {
			position: absolute;
			top: 0;
			left: 0;
		}

		.content {
			/* border: black solid 3px; */
			margin-left: 250px;
			/* margin-right: auto; */
		}


		.table {
			--bs-table-bg: transparent !important;
			table-layout: fixed;
			width: 100%;
		}

		td,
		th {
			word-wrap: break-word;
			white-space: normal;
			color: var(--text) !important;
		}
	</style>
</head>

<body>

	<!-- top navbar -->
	<nav class="navbar navbar-expand-sm navbar-light bg-light navbar-custom">
		<div class="container-fluid">
			<img class="navbar-brand" src="
			                                    <?php
												$user_id = $_SESSION['users_id'] ?? null;

												$color = "images/zenithfdlight.svg";

												if ($user_id) {
													try {

														$stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
														$stmt->bindParam(':user_id', $user_id);
														$stmt->execute();

														$user = $stmt->fetch(PDO::FETCH_ASSOC);

														if ($user && $user['is_darkmode'] == 1) {
															$color = "images/zenithfddark.svg";
														}
													} catch (PDOException $e) {
														echo "Error: " . $e->getMessage();
													}
												}
												echo $color;
												?>

			
			" alt="logo 2" style="width: 100px; height: auto; margin-inline: 20px;">
			<!-- <img class="navbar-brand" src="images/backbutton.svg" alt="logo 2" style="width: 26px; height: 20; margin: 0px; padding: 0px;"> -->
			<!-- <img class="navbar-brand" src="images/searchbar.svg" alt="logo 2" style="width: 417px; height: 44; margin-left: 60px; padding: 0px;"> -->

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li style="color: var(--text);" class="nav-item">
						Welcome,


						<?php


						try {
							$query = "SELECT username FROM users WHERE users_id = :users_id";
							$stmt = $db->prepare($query);
							$stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT);
							$stmt->execute();

							if ($stmt->rowCount() > 0) {
								$row = $stmt->fetch(PDO::FETCH_ASSOC);
								echo htmlspecialchars($row['username']);
							} else {
								echo "User not found.";
							}
						} catch (PDOException $e) {
							echo "Error: " . $e->getMessage();
						}
						?>!
					</li>

				</ul>
			</div>
		</div>
	</nav>





	<!-- sidebar -->
	<nav id="sidebar" class="flex-column p-3 d-flex justify-content-between" style="width: 200px; min-height: 100%; background-color: rgba(0, 0, 0, 0); border-right: 2px solid #dbdbdb; z-index: 29;">
		<ul class="nav flex-column" style="margin-top: 80px;">
			<li class="nav-item d-flex justify-content-start px-3">
				<a style="color: var(--text);" class="nav-link" href="home.php"> <img src="images/homebutton.svg">
					Home</a>
			</li>
			<li class="nav-item d-flex justify-content-start px-3" style="background-color: var(--primary); border-radius: 10px;">
				<a class="nav-link text-light" href="tasks.php"> <img src="images/taskbuttonlight.svg">
					Tasks</a>
			</li>
			<li class="nav-item d-flex justify-content-start px-3">
				<a style="color: var(--text);" class="nav-link" href="settings.php"> <img src="images/settingsbutton.svg">
					Settings</a>
			</li>
		</ul>


		<div>
			<hr>
			<?php

			// Check if the logout button is clicked
			if (isset($_POST['logout'])) {
				session_unset();
				session_destroy();
				header("Location: index.php");
				exit();
			}
			?>
			<div class="d-flex justify-content-center align-items-center">
				<form method="POST">
					<button type="submit" name="logout" style="background: none; border: none; cursor: pointer; display: flex; align-items: center;">
						<img style="height: 34px; width: 34px; margin-right: 5px;" src="
						
						
						                        <?php
												$user_id = $_SESSION['users_id'] ?? null;

												$color = "images/logoutbuttonlight.svg";

												if ($user_id) {
													try {

														$stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
														$stmt->bindParam(':user_id', $user_id);
														$stmt->execute();

														$user = $stmt->fetch(PDO::FETCH_ASSOC);

														if ($user && $user['is_darkmode'] == 1) {
															$color = "images/logoutbuttondark.svg";
														}
													} catch (PDOException $e) {
														echo "Error: " . $e->getMessage();
													}
												}
												echo $color;
												?>

						" alt="">
						<p style="margin: 0; padding: 0;">LOG OUT</p>
					</button>
				</form>
			</div>
		</div>
	</nav>

	<!-- contents -->

	<div class="content mt-5">

		<h1>Tasks</h1>

		<div class="d-flex justify-content-start mt-5">

			<!-- div -->
			<div style="height: auto; width: 1035px; background-color: var(--div); border-radius: 20px; margin-right: 30px; padding: 20px;">

				<div class="d-flex justify-content-end">
					<button style="margin: 0px; padding: 0px; border: none;" data-bs-toggle="modal" data-bs-target="#addTaskModal">
						<img src="images/addtask.svg" style="width: 30px; height: auto; background-color: var(--div);"
							onmouseover="this.style.filter='brightness(50%)'" onmouseout="this.style.filter='brightness(100%)'">
					</button>
				</div>

				<table class="table table-borderless">
					<thead>
						<tr>
							<th scope="col">Tasks</th>
							<th scope="col">Priority</th>
							<th scope="col">Description</th>
							<th scope="col">Due</th>
							<th scope="col">Status</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>



						<?php

						// Update overdue tasks
						$today_time = date('Y-m-d H:i:s');

						$updateQuery = "UPDATE tasks 
          						        SET is_overdue = 1 
          						        WHERE date_due < :today_time 
          						        AND is_finished = 0 
          						        AND users_id = :users_id";
						$updateStmt = $db->prepare($updateQuery);
						$updateStmt->bindParam(':today_time', $today_time);
						$updateStmt->bindParam(':users_id', $users_id);
						$updateStmt->execute();



						// Define the query to get tasks
						$query = "SELECT * FROM tasks WHERE users_id = :users_id";
						$stmt = $db->prepare($query);
						$stmt->bindParam(':users_id', $users_id);
						$stmt->execute();



						// Loop through each task and display in table rows
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							// Determine the status based on 'is_finished' and 'is_overdue'
							$status = "";
							if ($row['is_finished'] == 0 && $row['is_overdue'] == 0) {
								$status = "<p>Due</p>";
							} elseif ($row['is_finished'] == 1 && $row['is_overdue'] == 0) {
								$status = "<p style='color: green;'>Done</p>";
							} elseif ($row['is_finished'] == 0 && $row['is_overdue'] == 1) {
								$status = "<p style='color: red;'>Overdue</p>";
							} elseif ($row['is_finished'] == 1 && $row['is_overdue'] == 1) {
								$status = "<p style='color: red;'>Done with Overdue</p>";
							}




							$priority = htmlspecialchars($row['priority']);

							if ($priority == 'high') {
								$priorityStyle = '<div class="d-flex justify-content-center align-items-center mb-2" style="width: 45px; height: 35px; background-color: #ffdfdf; border-radius: 5px;">
													<p style="margin: 0px; padding: 0px; color: #ff0000;">High</p>
												  </div>';
							} elseif ($priority == 'medium') {
								$priorityStyle = '<div class="d-flex justify-content-center align-items-center mb-2" style="width: 70px; height: 35px; background-color: #ffffc3; border-radius: 5px;">
													<p style="margin: 0px; padding: 0px; color: #aaaa00;">Medium</p>
												  </div>';
							} else {
								$priorityStyle = '<div class="d-flex justify-content-center align-items-center mb-2" style="width: 43px; height: 35px; background-color: #f9eee3; border-radius: 5px;">
													<p style="margin: 0px; padding: 0px; color: #d58d49;">Low</p>
												  </div>';
							}



							$dateDue = htmlspecialchars($row['date_due']);
							$formattedDate = (new DateTime($dateDue))->format('F j, Y g:i A');


							// Display the row in the table
							echo "<tr>
            <td>" . htmlspecialchars($row['task_name']) . "</td>
            <td>" . $priorityStyle . "</td>
            <td>" . htmlspecialchars($row['task_description']) . "</td>
            <td>" . $formattedDate . "</td>
            <td>" . $status . "</td>


							<td>
								<button class=\"btn btn-sm btn-primary me-1\" data-bs-toggle=\"modal\" data-bs-target=\"#editModal\" onclick=\"openModal(" . $row['tasks_id'] . ", '" . $row['task_name'] . "', '" . $row['task_description'] . "', '" . $row['priority'] . "', '" . $row['date_due'] . "')\">
									<i class=\"bi bi-pencil\"></i> Edit
								</button>
								<button class=\"btn btn-sm btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#markDoneModal\" data-task-id=\"" . $row['tasks_id'] . "\">
									<i class=\"bi bi-trash\"></i> Done
								</button>
							</td>
          </tr>
		  
		  ";
						}

						?>



					</tbody>
				</table>
			</div>


		</div>
	</div>









	<!-- Add task modal-->
	<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true" data-bs-backdrop="static">
		<div class="modal-dialog">
			<div style="background-color: var(--div);" class="modal-content">
				<div style="background-color: var(--div-lighter);" class="modal-header">
					<h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="./php/add_task.php" method="post" id="taskForm">

						<!-- Hidden input for user ID -->
						<input type="hidden" name="users_id" value="<?php echo $_SESSION['users_id']; ?>">

						<div class="mb-3">
							<label style="color: var(--text);" for="task_name" class="form-label">Task Name</label>
							<input style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" type="text" class="form-control" id="task_name" name="task_name" required>
						</div>
						<div class="mb-3">
							<label style="color: var(--text);" for="task_description" class="form-label">Task Description</label>
							<textarea style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" class="form-control" id="task_description" name="task_description"></textarea>
						</div>
						<div class="mb-3">
							<label style="color: var(--text);" for="priority" class="form-label">Priority</label>
							<select style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" class="form-select" id="priority" name="priority">
								<option style="color: var(--text);" value="high">High</option>
								<option style="color: var(--text);" value="medium">Medium</option>
								<option style="color: var(--text);" value="low">Low</option>
							</select>
						</div>

						<div class="mb-3" style="display: none;">
							<input type="hidden" id="date_start" name="date_start" value="">
							<input type="hidden" name="form_type" value="form_tasks">
						</div>

						<div class="mb-3">
							<label style="color: var(--text);" for="date_due" class="form-label">Due Date</label>
							<input style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" type="datetime-local" class="form-control" id="date_due" name="date_due" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="saveTaskButton" form="taskForm">Save Task</button>
				</div>
			</div>
		</div>
	</div>











	<!-- mark done modal -->
	<div class="modal fade" id="markDoneModal" tabindex="-1" aria-labelledby="markDoneModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div style="background-color: var(--div);" class="modal-content">
				<div style="background-color: var(--div-lighter);" class="modal-header">
					<h5 class="modal-title" id="markDoneModalLabel">Mark Task as Done</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p style="color: var(--text);">Are you sure you want to mark this task as done?</p>
					<!-- Hidden Task ID Input -->
					<input type="hidden" id="task_id" name="task_id" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="markAsDone()">Mark as Done</button>
				</div>
			</div>
		</div>
	</div>






	<!-- edit modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div style="background-color: var(--div);" class="modal-content">
				<div style="background-color: var(--div-lighter);" class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Edit Task</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- Form for editing the task -->
					<form id="editTaskForm">
						<input type="hidden" id="tasks_id_edit_modal" name="tasks_id">
						<div class="mb-3">
							<label style="color: var(--text);" for="task_name_edit_modal" class="form-label">Task Name</label>
							<input style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" type="text" class="form-control" id="task_name_edit_modal" name="task_name">
						</div>
						<div class="mb-3">
							<label style="color: var(--text);" for="task_description_edit_modal" class="form-label">Task Description</label>
							<textarea style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" class="form-control" id="task_description_edit_modal" name="task_description"></textarea>
						</div>
						<div class="mb-3">
							<label style="color: var(--text);" for="priority_edit_modal" class="form-label">Priority</label>
							<select style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" class="form-select" id="priority_edit_modal" name="priority">
								<option style="color: var(--text);" value="low">Low</option>
								<option style="color: var(--text);" value="medium">Medium</option>
								<option style="color: var(--text);" value="high">High</option>
							</select>
						</div>

						<div class="mb-3">
							<label style="color: var(--text);" for="date_due_edit_modal" class="form-label">Due Date</label>
							<input style="background-color: var(--div-lighter); border: var(--div); color: var(--text);" type="datetime-local" class="form-control" id="date_due_edit_modal" name="date_due" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="saveTask()">Save Changes</button>
				</div>
			</div>
		</div>
	</div>















	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		// adjust sidebar height
		window.addEventListener('resize', adjustSidebarHeight);
		document.addEventListener('DOMContentLoaded', adjustSidebarHeight);

		function adjustSidebarHeight() {
			const bodyHeight = document.body.clientHeight;
			const sidebar = document.getElementById('sidebar');
			if (sidebar) {
				sidebar.style.height = bodyHeight + 'px';
			}
		}



		// mark as done
		var markDoneModal = document.getElementById('markDoneModal');
		markDoneModal.addEventListener('show.bs.modal', function(event) {
			var button = event.relatedTarget;
			var taskId = button.getAttribute('data-task-id');
			var taskIdInput = document.getElementById('task_id');
			taskIdInput.value = taskId;
		});

		function markAsDone() {
			var taskId = document.getElementById('task_id').value;

			fetch('./php/mark_done.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					},
					body: 'task_id=' + taskId
				})
				.then(response => response.text())
				.then(data => {
					if (data === 'success') {
						window.location.href = './tasks.php';
					} else {
						alert('Failed to mark as done.');
					}
				})
				.catch(error => console.error('Error:', error));

		}







		// edit
		function openModal(tasks_id, task_name, task_description, priority, date_due) {
			document.getElementById('tasks_id_edit_modal').value = tasks_id;
			document.getElementById('task_name_edit_modal').value = task_name;
			document.getElementById('task_description_edit_modal').value = task_description;
			document.getElementById('date_due_edit_modal').value = date_due;

			const prioritySelect = document.getElementById('priority_edit_modal');
			for (let i = 0; i < prioritySelect.options.length; i++) {
				if (prioritySelect.options[i].value.toLowerCase() === priority.toLowerCase()) { // Case-insensitive comparison
					prioritySelect.selectedIndex = i;
					break;
				}
			}
		}





		function saveTask() {
			$.ajax({
				url: './php/edit_task.php', // Your PHP file
				type: 'POST',
				data: $('#editTaskForm').serialize(), // Grabs all your form data
				success: function(response) {
					// console.log(response); // Log the response from PHP
					// alert('Task updated! 🎉'); // Or whatever you wanna do on success
					// $('#editModal').modal('hide'); // Close that modal!
					window.location.href = './tasks.php';



				},
				error: function(error) {
					console.error('Error updating task 😫', error);
					alert('Something went wrong 😬');
				}
			});

		}
	</script>
</body>

</html>