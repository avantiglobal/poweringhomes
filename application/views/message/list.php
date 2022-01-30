<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/_top_menu.php')  ?>
<main>
	<div class="container">
		<div class="row content-header bg-white mt-2 py-2">
			<div class="col-auto me-auto content-header__title">
			<h2><?php echo $page_header ?></h2>
			</div>
			<!-- <div class="col-auto">
				<a class="btn btn-default" href="/message/new" title="Add new"><i class="bi bi-plus-lg"></i><i id="preloader"></i> Add</a>
			</div> -->
		</div>
	</div>	
	<section class="message message__list">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="box">
							<div class="box-body table-responsive">
								<table id="data_table" data-table-name="message" class="table table-hover">
									<thead>
									<tr>
										<!-- <th width="1%">ID</th> -->
										<th width="25%">Sender</th>
										<th>Message</th>
										<th>Date</th>
									</tr>
									</thead>
									<tbody>
									<?php 
										foreach ($messages as $row) {
									?>
									<tr class="tr_table<?php if ($row['message_read'] == 0)  echo " table-info" ?>" data-query="<?php  echo $row['message_id'] ?>" data-action="edit" >
										<!-- <td><?php //echo $row['id'] ?></td> -->
										<td class="fw-bold m-0"><?php echo $row['sender'] ?></td>
										<td class="text-muted">
											<?php echo substr($row['message'],0,80) ?>
										</td>
										<td class="text-muted">
											<?php echo $row['message_date'] ?>
										</td>
										<!-- <td><?php //echo $row['state'] ?></td> -->
										<!-- <td><?php //echo $row['message_date'] ?></td> -->
										<!-- <td align="center"><?php //echo '$' .$row['bill_amount'] ?></td> -->
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