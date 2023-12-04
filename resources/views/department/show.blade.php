@extends('layouts.main')

@section('template_title')
    {{ $department->name ?? "{{ __('Show') Department" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Department</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $department->title }}
                        </div>
                        <div class="form-group">
                            <strong>Parent Id:</strong>
                            {{ $department->parent_id }}
                        </div>
                        <div class="form-group">
                            <strong>Director Id:</strong>
                            {{ $department->director_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
