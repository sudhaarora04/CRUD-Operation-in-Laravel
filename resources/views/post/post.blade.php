<div class="row">
	<div class="col-md-12">
		<h1>Simple Laravel CRUD Operation using Ajax</h1>
	</div>
</div>

<div class="row">
	<div class="table table-responsive">
		<table class="table table-bordered" id="table">
			<tr>
				<th width="150">No</th>
				<th>Title</th>
				<th>Body</th>
				<th>Create At</th>
				<th class="text-center" width="150px">
					<a href="#" class="create-modal btn btn-sucess btn-sm">
						<i class="glyphicon glyphicon-plus"></i>
					</a>
				</th>
			</tr>
			{{ csrf_field() }}
			<?php $no=1; ?>
			@foreach ($post as $key => $value)
			<tr class="post{{$value->id}}">
				<td>{{ $no++ }}</td>
				<td>{{ $value->title }}</td>
				<td>{{ $value->body }}</td>
				<td>{{ $value->create_at }}</td>
				<td>
					<a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="$value->body">
						<i class="fa fa-eye"></i>
					</a>
					<a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value-id}}"></a>
				</td>
			</tr>
		</table>
	</div>
</div>