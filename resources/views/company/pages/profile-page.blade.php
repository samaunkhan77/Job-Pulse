@extends('company.layout.sidenav-layout')
@section('company_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">
                        <h4>User Profile</h4>
                        <hr/>
                        <div class="container-fluid m-0 p-0">
                            <div class="row m-0 p-0">
                                <div class="col-md-4 p-2">
                                    <label>Email Address</label>
                                    <input readonly id="email" placeholder="User Email" class="form-control" type="email"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Company Name</label>
                                    <input id="company_name" placeholder="First Name" class="form-control" type="text"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Company Address</label>
                                    <input id="company_address" placeholder="Last Name" class="form-control" type="text"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Company Website</label>
                                    <input id="company_website" placeholder="company website" class="form-control"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Company Description</label>
                                    <input id="company_description" placeholder="Company Description" class="form-control"/>
                                </div>
                                <div class="col-md-4 p-2">
                                    <label>Mobile Number</label>
                                    <input id="mobile" placeholder="Mobile" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        getProfile();
        async function getProfile(){
            try{
                let res = await axios.get('/companyProfile',HeaderToken());
                console.log(res.data);
                document.getElementById('email').value=res.data['data']['company_email'];
                document.getElementById('company_name').value=res.data['data']['company_name'];
                document.getElementById('company_address').value=res.data['data']['company_address'];
                document.getElementById('mobile').value=res.data['data']['company_phone'];
                document.getElementById('company_website').value=res.data['data']['company_website'];
                document.getElementById('company_description').value=res.data['data']['company_description'];

            }
            catch(e){
                unauthorized(e.response.status)
            }
        }


        async function onLogout() {
            showLoader();
            try {
                await axios.post('/logout', {}, HeaderToken());
                successToast("Logout successful");
                // Redirect or perform other actions after logout
            } catch (error) {
                console.error("Logout error:", error);
                errorToast("Error during logout");
            } finally {
                hideLoader();
            }
        }

    </script>

@endsection
