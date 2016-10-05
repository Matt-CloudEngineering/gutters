<div class='container'>
	<div class="row">
	    <div class="col-lg-9">
	    	<div class="table-responsive">
	    	  	<table class="table table-hover">
					<tr>
						<th>Name</th>
						<th>Street</th>
						<th>Town, State Zip</th>
						<th>Phone</th>
					</tr>
					<!--Load each record and create row in table with data -->	
					<?php foreach ($custies as $custies_item): ?>

					    <tr class="table.hover">
					    	<td><a href="<?php echo site_url('custies/view/'.$custies_item['cust_id']); ?>"><?php echo $custies_item['name']; ?></a></td>
					    	<td><?php echo $custies_item['street']; ?></td>
					        <td><?php echo $custies_item['townzip'] ?></td>
					        <td><?php echo $custies_item['phone'] ?></td>

					    </tr>
					       
					<?php endforeach; ?>
				</table>
			</div>
		</div>
		<div class="col-lg-3">
			<img class="img-rounded" width="166px" height="132px" src="<?= base_url() ?>images/leafy.jpg" alt="Gutter full of Leaves" >
			<img class="img-rounded" width="166px" height="132px" src="<?= base_url() ?>images/leafy.jpg" alt="Gutter full of Leaves" >
			<img class="img-rounded" width="166px" height="132px" src="<?= base_url() ?>images/leafy.jpg" alt="Gutter full of Leaves" >
		</div>
	</div>
</div>


