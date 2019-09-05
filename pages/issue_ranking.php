<?php
$t_ratings = plugin_get()->getRatings();

layout_page_header( plugin_lang_get( 'title' ) );
layout_page_begin( );
?>

<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="widget-box widget-color-blue2">
	<div class="widget-header widget-header-small">
		<h4 class="widget-title lighter">
			<i class="ace-icon fa fa-text-width"></i>
			<?php echo plugin_lang_get( 'title' ) . ': ' . plugin_lang_get( 'ranking_title' )?>
		</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main no-padding">

<?php
	if( empty( $t_ratings ) ) {
?>
			<div class="container-fluid">
				<br>
				<div class="alert alert-warning center">
					<?php echo plugin_lang_get( 'no_data' ); ?>
				</div>
				&nbsp;
			</div>
<?php
	} else {
?>

			<div class="table-responsive">
				<div class="widget-toolbox padding-8 clearfix">
					<a class="btn btn-primary btn-white btn-round "
					   href="<?php echo plugin_page( 'issue_ranking_xls' ); ?>">
						<?php echo plugin_lang_get( 'excel_download' ); ?>
					</a>
				</div>

				<table class="table table-bordered table-condensed table-striped">
					<tr>
						<th><?php echo lang_get( 'id' ); ?></th>
						<th><?php echo lang_get( 'summary' ); ?></th>
						<th><?php echo plugin_lang_get( 'rating_count' ); ?></th>
						<th><?php echo plugin_lang_get( 'ACS_label' ); ?></th>
						<th><?php echo plugin_lang_get( 'ASPU_label' ); ?></th>
						<th><?php echo plugin_lang_get( 'rating_high' ); ?></th>
						<th><?php echo plugin_lang_get( 'rating_low' ); ?></th>
					</tr>
<?php
foreach( $t_ratings as $bugid => $data) {
	$bug = bug_get( $bugid );
?>
					<tr>
						<td><?php print_bug_link( $bug->id ); ?></td>
						<td><?php echo string_display_line( $bug->summary ) ?></td>
						<td><?php echo $data['no_of_ratings'] ?></td>
						<td><?php echo $data['sum_of_ratings'] ?></td>
						<td><?php echo $data['avg_rating'] ?></td>
						<td><?php echo $data['highest_rating'] ?></td>
						<td><?php echo $data['lowest_rating'] ?></td>
					</tr>
<?php
}
?>
				</table>
			</div>
<?php
	} # if empty result set
?>
		</div>
	</div>
</div>

</div>
<?php
layout_page_end();
