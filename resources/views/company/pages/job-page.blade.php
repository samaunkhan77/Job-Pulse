@extends('company.layout.sidenav-layout')
@section('company_content')
    @include('company.components.job.job-list')
    @include('company.components.job.job-delete')
    @include('company.components.job.job-create')
    @include('company.components.job.job-update')
@endsection
