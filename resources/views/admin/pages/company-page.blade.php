@extends('admin.layout.sidenav-layout')
@section('content')
    @include('admin.components.company.company-list')
    @include('admin.components.company.company-delete')
    @include('admin.components.company.company-create')
    @include('admin.components.company.company-update')
@endsection
