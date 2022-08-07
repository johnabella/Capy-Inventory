<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Employees</strong></h1>

		<div class="row">
			<div class="col-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header d-flex justify-content-end">
						<a data-bs-toggle="modal" data-bs-target="#createEmployee"><i class="align-middle me-2" data-feather="plus"></i></a>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
								<th>First Name</th>
                                <th>Last Name</th>
								<th>Set</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$get_employees = "SELECT * FROM employees";
								$result = mysqli_query($db, $get_employees);

								while ($employees = mysqli_fetch_assoc($result)) {
                                    $setID = $employees['set_id'];
									echo '<tr>';
										echo '<td style="display: none">' . $employees['id'] . '</td>';
										echo '<td style="display: none">' . $employees['set_id'] . '</td>';
										echo '<td>' . $employees['firstname'] . '</td>';
										echo '<td>' . $employees['lastname'] . '</td>';
                                        

                                        $get_setName = "SELECT *
											FROM set_bundle 
											WHERE set_id = $setID";

                                        $result1 = mysqli_query($db, $get_setName);

                                        if (mysqli_num_rows($result1)){
                                            while ($set = mysqli_fetch_assoc($result1)) {
                                                echo '<td>' . $set['set_name'] . '</td>';
                                            }
                                        } else {
                                            echo '<td>None</td>';
                                        }
										echo '
											<td>
												<a href="" data-bs-toggle="modal" data-bs-target="#deleteEmployee" class="employee">
													<i class="align-middle me-2" data-feather="trash-2"></i>
												</a>
												
												<a data-bs-toggle="modal" data-bs-target="#editEmployee" class="employee">
													<i class="align-middle" data-feather="settings"></i>
												</a>
											</td>';
									echo '</tr>';
								}
								?>
						</tbody>
					</table>
				</div>
			</div>			
		</div>
	</div>
</main>