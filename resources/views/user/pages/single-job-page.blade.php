@extends('user.layouts.app')
@section('user_content')
<div class="job-post-company pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Left Content -->
            <div class="col-xl-7 col-lg-8">
                <!-- job single -->
                <div class="single-job-items mb-50">
                    <div class="job-items">
                        <div class="company-img company-img-details">
                            <a href="#"><img src="{{$job->company->company_logo}}" width="150px"></a>
                        </div>
                        <div class="job-tittle">
                            <a href="#">
                                <h4>{{$job->job_title}}</h4>
                            </a>
                            <ul>
                                <li>{{ $job->company->company_name }}</li>
                                <li><i class="fas fa-map-marker-alt"></i>{{$job->job_location}}</li>
                                <li>{{$job->job_type}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- job single End -->

                <div class="job-post-details">
                    <div class="post-details1 mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Description</h4>
                        </div>
                        <p>{{$job->job_description}}</p>
                    </div>
                    <div class="post-details2  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>{{ $job->job_qualification }}</h4>
                        </div>
                        <ul>
                            <li>{{$job->job_benefits}}</li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- Right Content -->
            <div class="col-xl-4 col-lg-4">
                <div class="post-details3  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>Job Overview</h4>
                    </div>
                    <ul>
                        <li>Posted date : <span>{{$job->created_at}}</span></li>
                        <li>Location : <span>{{$job->job_location}}</span></li>
                        <li>Vacancy : <span>02</span></li>
                        <li>Job nature : <span>{{$job->job_type}}</span></li>
                        <li>Salary :  <span>{{$job->job_salary}}</span></li>
                        <li>Application date : <span>{{$job->job_deadline}}</span></li>
                    </ul>
                    <div class="apply-btn2">
                        <a href="#" class="btn">Apply Now</a>
                    </div>
                </div>
                <div class="post-details4  mb-50">
                    <!-- Small Section Tittle -->
                    <div class="small-section-tittle">
                        <h4>Company Information</h4>
                    </div>
                    <span>{{$job->company->company_name}}</span>
                    <p>{{$job->company->company_description}}</p>
                    <ul>
                        <li>Name: <span>{{$job->company->company_name}}</span></li>
                        <li>Web : <span>{{$job->company->company_website}}</span></li>
                        <li>Email: <span>{{$job->company->company_email}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
