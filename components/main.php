<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

		<div class="row">
			<div class="col-12 col-lg-8 col-xxl-9 d-flex">
				<div class="card flex-fill">
					<div class="card-header d-flex justify-content-between">
						<h5 class="card-title mb-0">Peripherals</h5>
						<a data-bs-toggle="modal" data-bs-target="#createItem"><i class="align-middle me-2" data-feather="plus"></i></a>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
								<th>Brand</th>
								<th>Unit</th>
								<th>Serial Number</th>
								<th>Purchase Date</th>
								<th>Set</th>
								<!-- <th>Status</th>
								<th>Assignee</th> -->
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$db = mysqli_connect('localhost', 'root', '', 'capy_inventory');

								$get_peripherals = "SELECT * FROM peripherals";
								$result = mysqli_query($db, $get_peripherals);

								while ($peripherals = mysqli_fetch_assoc($result)) {
									echo '<tr>';
										echo '<td style="display: none">' . $peripherals['component_id'] . '</td>';
										echo '<td>' . $peripherals['brand'] . '</td>';
										echo '<td>' . $peripherals['unit'] . '</td>';
										echo '<td>' . $peripherals['serial_number'] . '</td>';
										echo '<td>' . $peripherals['purchase_date'] . '</td>';
									
										$set = $peripherals['set_id'];

										if($set == 0) {
											echo '<td>None</td>';
										} else {
											$get_setID = "SELECT *
											FROM set_bundle 
											WHERE set_id = '$set'";
												
											$result_set = mysqli_query($db, $get_setID);

											if (mysqli_num_rows($result_set) > 0) {
												while ($set = mysqli_fetch_assoc($result_set)) {
													$set = $set['set_name'];
													echo '<td>' . $set . '</td>';
												}
											} else {
												echo '<td>None</td>';
											}                    
										}

										echo '
											<td>
												<a href="" data-bs-toggle="modal" data-bs-target="#deleteItem" class="item">
													<i class="align-middle me-2" data-feather="trash-2"></i>
												</a>
												<a data-bs-toggle="modal" data-bs-target="#editItem" class="item" id="' . $peripherals['component_id'] . '">
													<i class="align-middle" data-feather="settings"></i>
												</a>
											</td>';
									echo '</tr>';
								}
								?>
							<!-- <tr>
								<td>Project Apollo</td>
								<td class="d-none d-xl-table-cell">01/01/2021</td>
								<td class="d-none d-xl-table-cell">31/06/2021</td>
								<td><span class="badge bg-success">Done</span></td>
								<td class="d-none d-md-table-cell">Vanessa</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-12 col-lg-4 col-xxl-3 d-flex">
				<div class="card flex-fill w-100">
					<div class="card-header d-flex justify-content-between">
						<h5 class="card-title mb-0">Sets</h5>
						<a data-bs-toggle="modal" data-bs-target="#createSet"><i class="align-middle me-2" data-feather="plus"></i></a>
					</div>
					<table class="table table-hover my-0">
						<thead>
							<tr>
								<th>Set</th>
								<!-- <th>Status</th>
								<th>Assignee</th> -->
								<th class="col-md-1">Edit</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$db = mysqli_connect('localhost', 'root', '', 'capy_inventory');

							$get_sets = "SELECT * FROM set_bundle";
							$result = mysqli_query($db, $get_sets);

							while ($sets = mysqli_fetch_assoc($result)) {
								echo '<tr>';
									echo '<td style="display: none">' . $sets['set_id'] . '</td>';
									echo '<td>' . $sets['set_name'] . '</td>';
									echo '
									<td>
										<a href="" data-bs-toggle="modal" data-bs-target="#deleteSet" class="set">
											<i class="align-middle me-2" data-feather="trash-2"></i>
										</a>
									</td>';
								echo '</tr>';
							}
						?>
							<!-- <tr>
								<td><span class="badge bg-success">Done</span></td>
								<td class="d-none d-md-table-cell">Vanessa Tucker</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
			
		</div>

	</div>
</main>

<script>
	$('.set').click(function(){
		$tr = $(this).closest('tr');

		$data = $tr.children('td').map(function(){
			return $(this).text();
		}).get();

		$('.modal #set').html($data[1]);
		$('#deleteSet #delete').attr('href','lib/delete.php?set='+ $data[0]);
		
	});

	$('.item').click(function(){
		$tr = $(this).closest('tr');

		$data = $tr.children('td').map(function(){
			return $(this).text();
		}).get();

		// change to class

		$('#item').val($data[0]);
		$('#brand').val($data[1]);
		$('#unit').val($data[2]);
		$('#serial').val($data[3]);
		$('#purchaseDate').val($data[4]);
		$('#set').text($data[5]);

		$('#deleteItem #item').val($data[0]);
		$('#deleteItem #brand').val($data[1]);
		$('#deleteItem #unit').val($data[2]);
		$('#deleteItem #serial').val($data[3]);
		$('#deleteItem #purchaseDate').val($data[4]);
		$('#deleteItem #set').val($data[5]);
		
		$('#deleteItem #delete').attr('href','lib/delete.php?item='+ $data[0]);
	}); 
	
</script>
