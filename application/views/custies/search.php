    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            	<div class="form-group">
	                
					<?php echo validation_errors(); 
						$data = array(
						    'name' => $this->input->post('name'),
						    'street' => $this->input->post('street'),
						    'phone' => $this->input->post('phone'),
						    'townzip' => $this->input->post('townzip')
						    );
					?>

					<?php echo form_open(base_url().'index.php/custies/search', 'class="form-inline", id="search"'); 

						echo "<div class='form-group'>";
						echo "<label for='name'>Name:</label><input type='text' name='name' id='name' class='form-control' value='".$data['name']."'' ></div>";
						echo "<div class='form-group'>";
						echo "<label for='street'>Street:</label><input type='text' name='street' id='street' class='form-control' value='".$data['street']."'' ></div>";
						echo "<div class='form-group'>";
						echo "<label for='townzip'>TownZip:</label><input type='text' name='townzip' id='townzip' class='form-control' value='".$data['townzip']."'' ></div>";
						
						echo "<div class='form-group'>";
						echo "<label for='phone'>phone:</label><input type='text' id='phone' name='phone' class='form-control' value='".$data['phone']."'' ></div>";
						?>
												
						<input class="btn btn-default" type="submit" name="submit" value="Search" />
					</form>
				</div>
            </div>
        </div>
    </div>
    <!-- /.container -->