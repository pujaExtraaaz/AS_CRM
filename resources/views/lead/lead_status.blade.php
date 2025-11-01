<div class="table-responsive">
	<table class="table table-striped mb-0">
		<thead>
			<tr>
				<th>{{ __('Date/Time') }}</th>
				<th>{{ __('Status') }}</th>
				<th>{{ __('Sales User') }}</th>
				<!--<th>{{ __('Remark') }}</th>-->
			</tr>
		</thead>
		<tbody>
			@forelse ($logs as $log)
				<tr>
					<td>{{ optional($log->created_at)->format('Y-m-d H:i') }}</td>
					<td>{{ $status[$log->lead_status] }}</td>
					<td>{{ optional($log->creator)->name ?? '-' }}</td>
					<!--<td>{{ $log->remark }}</td>-->
				</tr>
			@empty
				<tr>
					<td colspan="4" class="text-center text-muted">{{ __('No status logs found.') }}</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>