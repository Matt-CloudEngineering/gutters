    <style>
    .form-control {
    	width:75%;
    }
    label {
    	width:65px;
    	text-align: left;
    }
    </style>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-9">

				<?php
				echo "<p>Customer Record Editor</p>";
				?>

				<?php echo validation_errors(); ?>

				<?php echo form_open('custies/edit'); 

					echo "<div class='form-group'>";

					echo "<label>Cust_ID:</label><span style='margin-bottom:5px'>".$custies_item['cust_id']."</span><br/><br/>";

					echo "<label>Name:</label><input type='text' name='name'  class='form-control' value='".$custies_item['name']."' ><br/>";

					echo "<label>Street:</label><input type='text' name='street'  class='form-control' value='".$custies_item['street']."' ><br/>";

					echo "<label>TownZip:</label><input type='text' name='townzip'  class='form-control' value='".$custies_item['townzip']."' ><br/>";

					echo "<label>phone:</label><input type='text' name='phone'  class='form-control' value='".$custies_item['phone']."' ><br/>";
					?>
					<br>
					<input class="btn btn-default" type="submit" name="submit" value="Update Customer" />
					</div>
				</form>

            </div>
        </div>
    </div>
    <!-- /.container -->