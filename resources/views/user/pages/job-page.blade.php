@extends('user.layouts.app')
@section('user_content')
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Get your job</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<!-- Job List Area Start -->
<div class="job-listing-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Left content -->
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="small-section-tittle2 mb-45">
                            <div class="ion"> <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                          d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                </svg>
                            </div>
                            <h4>Filter Jobs</h4>
                        </div>
                    </div>
                </div>
                <!-- Job Category Listing start -->
                <div class="job-category-listing mb-50">
                    <!-- single one -->
                    <div class="single-listing">
                        <div class="small-section-tittle2">
                            <h4>Job Category</h4>
                        </div>
                        <!-- Select job items start -->
                        <div class="select-job-items2" >
                            <select name="select" id="selectCategory">
                            </select>
                        </div>
                        <!--  Select job items End-->
                        <!-- select-Categories start -->
                        <div class="select-Categories pt-80 pb-50">
                            <div class="small-section-tittle2">
                                <h4>Job Type</h4>
                            </div>
                            <label class="container">Full Time
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Part Time
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Remote
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Freelance
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->
                    </div>
                    <!-- single two -->
                    <div class="single-listing">
                        <div class="small-section-tittle2">
                            <h4>Job Location</h4>
                        </div>
                        <!-- Select job items start -->
                        <div class="select-job-items2">
                            <select name="select">
                                <option value="">Anywhere</option>
                                <option value="">Category 1</option>
                                <option value="">Category 2</option>
                                <option value="">Category 3</option>
                                <option value="">Category 4</option>
                            </select>
                        </div>
                        <!--  Select job items End-->
                        <!-- select-Categories start -->
                        <div class="select-Categories pt-80 pb-50">
                            <div class="small-section-tittle2">
                                <h4>Experience</h4>
                            </div>
                            <label class="container">1-2 Years
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">2-3 Years
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">3-6 Years
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">6-more..
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->
                    </div>
                    <!-- single three -->
                    <div class="single-listing">
                        <!-- select-Categories start -->
                        <div class="select-Categories pb-50">
                            <div class="small-section-tittle2">
                                <h4>Posted Within</h4>
                            </div>
                            <label class="container">Any
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Today
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 2 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 3 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 5 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Last 10 days
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->
                    </div>
                    <div class="single-listing">
                        <!-- Range Slider Start -->
                        <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                            <div class="small-section-tittle2">
                                <h4>Filter Jobs</h4>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <!-- <div id="slider-range"></div> -->
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex align-items-center">
                                        <div class="price_text">
                                            <p>Price :</p>
                                        </div>
                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from" id="amount" readonly />
                                            <span>to</span>
                                            <input type="text" class="js-input-to" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- Range Slider End -->
                    </div>
                </div>
                <!-- Job Category Listing End -->
            </div>
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <section class="button-area">
                    <div class="container box_1170 border-top-generic" id="categoryList">

                    </div>
                </section>
                <section class="featured-job-area" id="jobList">

                </section>
                <!-- Featured_job_end -->
            </div>
        </div>
    </div>
</div>
<!-- Job List Area End -->
<!--Pagination Start  -->
<div class="pagination-area pb-115 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Pagination End  -->

<script>
    jobList();
    categoryList();
    async  function categoryList() {
        let res = await axios.get("/user_category_list");

        res.data.forEach((element,index) => {
            let data =`<option value="">${element['category_name']}</option>`
            $("#selectCategory").append(data);
        })

    }

    async function jobList() {
        let res = await axios.get("/user_job_list");
        console.log(res.data);

        res.data.forEach((element,index) => {
            let data = `
            <div class="container" >
                        <div class="single-job-items mb-30">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href=""><img src="${element['company']['company_logo']}" width="90px"></a>
                                </div>
                                <div class="job-tittle job-tittle2">
                                    <a href="/user_single_job/${element.id}">
                                        <h4>${element['job_title']}</h4>
                                    </a>
                                    <ul>
                                        <li>${element['company']['company_name']}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>${element['job_location']}</li>
                                        <li>${element['job_salary']}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link items-link2 f-right">
                                <a href=>${element['job_type']}</a>
                                <span>7 hours ago</span>
                            </div>
                        </div>
                        <!-- single-job-content -->

                    </div>`

            $("#jobList").append(data);
        })
    }


</script>
@endsection
