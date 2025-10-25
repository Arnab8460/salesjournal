@extends('layouts.app')

@section('content')
<h4>Journal Entries</h4>
<table class="table table-sm table-bordered bg-white">
  <thead>
    <tr>
      <th>Date</th>
      <th>Description</th>
      <th>Debit</th>
      <th>Credit</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    @forelse($entries as $e)
      <tr>
        <td>{{ $e->date->format('Y-m-d') }}</td>
        <td>{{ $e->description }}</td>
        <td>{{ $e->debit_account }}</td>
        <td>{{ $e->credit_account }}</td>
        <td>{{ number_format($e->amount,2) }}</td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center">No journal entries.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
