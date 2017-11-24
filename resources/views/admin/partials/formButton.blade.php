<div class="box-footer">
	@if(isset($delete))
	<div class="pull-left">
		<a href="javascript:deleteGrid('{{ $delete }}','{{ csrf_token() }}','delete')" type="button" class="btn btn-danger" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
	</div>
	@endif
	<div class="pull-right">
		<button class="btn btn-warning" type="button" id="reset">
			<i class="fa fa-refresh" style="margin-right:5px"></i> Refresh
		</button>
		<button class="btn btn-primary" type="submit">
			<i class="fa fa-file" style="margin-right:5px"></i> Save
		</button>
		@if(!isset($no_continue))
		<button class="btn btn-success"  type="submit" name="save_continue" value="Save and Continue">
			<i class="fa fa-check" style="margin-right:5px"></i> Save &amp; Continues
		</button>
		@endif
	</div>
	<div class="clearfix"></div>
</div>