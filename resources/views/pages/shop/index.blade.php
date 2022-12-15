@extends('layouts.auth.app')

@push('styles')
@endpush

@section('content')
<shop-index shop="{{ $shop }}" url="{!! url('api') !!}"></shop-index>
@endsection

@push('scripts')
@endpush