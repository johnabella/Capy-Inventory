<!-- Modal -->
<div class="modal fade" id="createSet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="lib/create.php" method="post" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create set</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input required type="text" class="form-control" placeholder="Set" name="newSet">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="createSet">
                </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="createItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="lib/create.php" method="post" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <input required type="text" class="form-control" placeholder="Brand" name="brand">
                        </div>
                        <div class="col">
                            <input required type="text" class="form-control" placeholder="Unit Name" name="unit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input required type="text" class="form-control" placeholder="Serial Number" name="serial">
                        </div>
                        <div class="col">
                            <input required type="date" class="form-control" name="purchaseDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <select required class="form-select mb-3" name="set">
                                <option disabled selected>Set</option>
                                <?php

                                    $get_sets = "SELECT * FROM set_bundle";
                                    $result = mysqli_query($db, $get_sets);
            
                                    while ($set = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $set['set_id'] . '">' . $set['set_name'] . '</option>';
                                    }  
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="createItem">
                </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="editItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="lib/update.php" method="post" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="item" id="item">
                    <div class="row mb-3">
                        <div class="col">
                            <input required type="text" class="form-control" placeholder="Brand" name="brand" id="brand">
                        </div>
                        <div class="col">
                            <input required type="text" class="form-control" placeholder="Unit Name" name="unit" id="unit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input required type="text" class="form-control" placeholder="Serial Number" name="serial" id="serial">
                        </div>
                        <div class="col">
                            <input required type="date" class="form-control" name="purchaseDate" id="purchaseDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <select required class="form-select" name="set">
                                <option selected id="set"></option>
                                <?php

                                    $get_sets = "SELECT * FROM set_bundle";
                                    $result = mysqli_query($db, $get_sets);
            
                                    while ($set = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $set['set_id'] . '">' . $set['set_name'] . '</option>';
                                    }  
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="editItem" value="Save">
                </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="editSet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="lib/update.php" method="post" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Set</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="setID" id="setID">
                            <input readonly type="text" class="form-control" name="set" id="set">
                        </div>
                        <div class="col">
                            <input type="hidden" name="empID" id="empID">
                            <select required class="form-select" name="assignee">
                                <option selected id="assignee"></option>
                                <option value="0">None</option>
                                <?php 
                                $get_emp = "SELECT * FROM employees ";
                                $result = mysqli_query($db, $get_emp);
        
                                while ($emp = mysqli_fetch_assoc($result)) {
                                    if($emp['set_id']){
                                        echo '<option disabled value="' . $emp['id'] . '">' . $emp['firstname'] . '</option>';
                                    } else {
                                        echo '<option value="' . $emp['id'] . '">' . $emp['firstname'] . '</option>';
                                        
                                    }
                                    
                                }  
                                ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="editSet" value="Save">
                </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteSet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this set?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="set"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger" id="delete">Delete</a>
            </div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this item?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="item" id="item">
                    <div class="row mb-3">
                        <div class="col">
                            <input disabled type="text" class="form-control" placeholder="Brand" name="brand" id="brand">
                        </div>
                        <div class="col">
                            <input disabled type="text" class="form-control" placeholder="Unit Name" name="unit" id="unit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input disabled type="text" class="form-control" placeholder="Serial Number" name="serial" id="serial">
                        </div>
                        <div class="col">
                            <input disabled type="date" class="form-control" name="purchaseDate" id="purchaseDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <input disabled type="text" class="form-control"  name="set" id="set">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" class="btn btn-danger" id="delete">Delete</a>
                </div>
		</div>
	</div>
</div>
