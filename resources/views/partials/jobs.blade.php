<div class="row">
    <div class="col-md-1">
        <img src="/logos/{{ $job->company->company_logo }}" alt="logo" height="30">
    </div>
    <div class="col-md-3 text-left">
        {{ $job->job_title }}
    </div>
    <div class="col-md-2">
        Salary : {{ $job->salary }}
    </div>
    <div class="col-md-4">
        <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $job->location->location }}
    </div>
    <div class="col-md-2">
        <a href="{{ Route('single_job',[$job->id]) }}" class="btn btn-sm border border-success rounded-7 float-right form-control">{{ $job->job_type }}</a>
    </div>
</div>