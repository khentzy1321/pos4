@extends('layouts.admin')

@section('content')
@section('title', 'Invoices')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

<div class="row">
    <div class="col-sm-9">
      <h3>Invoice List</h3>
    </div>
    <div class="col-sm-3 pull-right">
        <a href1="{{ route('invoices.create') }}" class="btn btn-primary btn-sm openCreateModal">Add New Invoice</a>
        <a href="" class="btn btn-danger btn-sm">PDF</a>
        <a href="" class="btn btn-success btn-sm">Export</a>
    </div>
</div>

<input type="hidden" id="printUrl" data-print-url="{{ route('invoices.show', ['id', 'option' => 'optionvalue']) }}"

@endsection
