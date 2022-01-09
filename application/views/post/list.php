<!-- Header Template -->
<?php include_once(TEMPLATE_PATH . '/partial/_top_menu.php')  ?>
<main class="flex-margin1">
	<div class="container">
		<div class="row content-header bg-white mt-2 py-2">
			<div class="col-auto me-auto content-header__title">
			<h2><?php echo $page_header ?></h2>
			</div>
			<div class="col-auto">
				<a class="btn btn-default" href="/post/new" title="Add new"><i class="bi bi-plus-lg"></i><i id="preloader"></i> Add</a>
			</div>
		</div>
	</div>	
	<section class="post post__list">
		<div class="container">
			<div class="content">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="box">
							<div class="box-body table-responsive">
								<table id="data_table" data-table-name="post" class="table table-hover">
									<thead>
										<tr>
											<th width="1%">ID</th>
											<th>Title</th>
											<th width="1%">&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php //echo $todo; 
										foreach ($todo as $row) {
										?>
										<tr class="tr_table" data-query="<?php  echo $row['id'] ?>" data-action="edit">
											<td><?php  echo $row['id'] ?></td>
											<td><?php  echo $row['title'] ?></td>
											<td><i class="bi bi-chevron-right"></i></td>
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