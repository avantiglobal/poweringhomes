<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/_top_menu.php')  ?>
<main>
	<div class="container">
		<div class="row content-header bg-white mt-2 py-2">
			<div class="col-auto me-auto content-header__title">
			<h2><?php echo $page_header ?></h2>
			</div>
			<div class="col-auto">
				<a class="btn btn-default" href="/quote/new" title="Add new"><i class="bi bi-plus-lg"></i><i id="preloader"></i> Add</a>
			</div>
		</div>
	</div>	
	<section class="quote quote__list">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="box">
							<div class="box-body table-responsive">
								<table id="data_table" data-table-name="quote" class="table table-hover">
									<thead>
									<tr>
										<th width="1%">ID</th>
										<th>Name</th>
										<th>City</th>
										<th>State</th>
										<th>Req. Date</th>
										<th align="center">Bill Amount</th>
										<th align="center">Status</th>
									</tr>
									</thead>
									<tbody>
									<?php 
										foreach ($quotes as $row) {
									?>
									<tr class="tr_table" data-query="<?php  echo $row['id'] ?>" data-action="edit">
										<td><?php echo $row['id'] ?></td>
										<td><?php echo $row['name'] ?></td>
										<td><?php echo $row['city'] ?></td>
										<td><?php echo $row['state'] ?></td>
										<td><?php echo $row['quote_date'] ?></td>
										<td align="center"><?php echo '$' .$row['bill_amount'] ?></td>
										<td align="center"><span class="badge bg-info text-light rounded-pill align-text-bottom"><?php echo $row['quote_status'] ?></span></td>
									</tr>
									<?php
									}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>	