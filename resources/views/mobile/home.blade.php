@extends('layouts.mobile')

@section('addCss')
<style>
a {
  text-decoration: none; /* Remove underline */
  color: inherit; /* Inherit color from parent */
}
</style>
@endsection

@section('addJs')
<script>
const PAGE = '{{ url("/") }}';
const REST = '{{ url("/rest") }}';
</script>
<script src="{{ asset('js/helper.js') }}"></script>
<script src="{{ asset('js/document/main.js') }}"></script>
@endsection

@section('content')
<ul class="m-list">
    <li><a href="#documentWaiting">Document Waiting</a></li>
    <li><a href="#documentApprove">Document Approved</a></li>
    <li><a href="#documentReject">Document Rejected</a></li>
</ul>
@endsection