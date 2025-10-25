@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        Edit Sale - {{ $sale->customer_name }}
      </div>
      <div class="card-body">
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-2">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $sale->date->format('Y-m-d')) }}">
            @error('date')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-2">
            <label class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $sale->customer_name) }}">
            @error('customer_name')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-2">
            <label class="form-label">Item</label>
            <input type="text" name="item" class="form-control" value="{{ old('item', $sale->item) }}">
            @error('item')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="row">
            <div class="col">
              <label class="form-label">Quantity</label>
              <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $sale->quantity) }}">
              @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="col">
              <label class="form-label">Rate</label>
              <input type="text" name="rate" class="form-control" value="{{ old('rate', $sale->rate) }}">
              @error('rate')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-success">Update Sale</button>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
