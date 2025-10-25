@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card mb-3">
      <div class="card-header">Add Sale</div>
      <div class="card-body">
        <form action="{{ route('sales.store') }}" method="POST">
          @csrf
          <div class="mb-2">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}">
            @error('date')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-2">
            <label class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}">
            @error('customer_name')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-2">
            <label class="form-label">Item</label>
            <input type="text" name="item" class="form-control" value="{{ old('item') }}">
            @error('item')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="row">
            <div class="col">
              <label class="form-label">Quantity</label>
              <input type="number" name="quantity" class="form-control" value="{{ old('quantity',1) }}">
              @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="col">
              <label class="form-label">Rate</label>
              <input type="text" name="rate" class="form-control" value="{{ old('rate','0.00') }}">
              @error('rate')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>

          <div class="mt-3">
            <button class="btn btn-primary">Save Sale</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <h5>All Sales</h5>
    <table class="table table-sm table-bordered bg-white">
      <thead><tr>
        <th>Date</th><th>Customer</th><th>Item</th><th>Qty</th><th>Rate</th><th>Total</th><th>Actions</th>
      </tr></thead>
      <tbody>
        @forelse($sales as $s)
        <tr>
          <td>{{ $s->date->format('Y-m-d') }}</td>
          <td>{{ $s->customer_name }}</td>
          <td>{{ $s->item }}</td>
          <td>{{ $s->quantity }}</td>
          <td>{{ number_format($s->rate,2) }}</td>
          <td>{{ number_format($s->total_amount,2) }}</td>
          <td>
            <a href="{{ route('sales.edit', $s) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('sales.destroy', $s) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete sale?')">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">No sales yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
