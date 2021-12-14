@extends('layouts.master')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Add Lesson Learned</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Lesson Learned List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Lesson Learned</li>
        </ol>
    </div>

</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">

                    <div class="d-flex flex-column">

                        <form class="form-horizontal form-disabled-button"  method="POST" action="{{ route('lessons.store') }}" id="lesson-create" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="project_location_id" value="{{ auth()->user()->project_location_id }}">
                           <div class="form-group row">
                                <label for="horizontal-firstname-input" class="col-3 col-form-label">Descipline Category</label>
                             <div class="col-4">
                                    <select name="desc_category" class="form-control">
                                        <option value="">Select Category</option>
                                        <option value="Civil">Civil</option>
                                        <option value="Electrical">Electrical</option>
                                        <option value="Mechanical">Mechanical</option>
                                        <option value="HVAC">HVAC</option>
                                        <option value="Planning">Planning</option>
                                        <option value="Safety">Safety</option>
                                    </select>
                                    @error('desc_category') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-email-input" class="col-3 col-form-label">Date Raised</label>
                             <div class="col-4">
                                    <input type="date" class="form-control" name="date_raised">
                                       @error('date_raised') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-firstname-input" class="col-3 col-form-label">Lesson Category</label>
                             <div class="col-4">
                                    <select name="lesson_category" class="form-control" id="category">
                                        <option value="">Select Category</option>
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                    </select>
                                    @error('lesson_category') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-email-input" class="col-3 col-form-label">Lesson Description</label>
                            <div class="col-9">
                                    <textarea class="form-control" name="event" placeholder="Give a clear detailed description of what happened and the impact. Lessons can be positive as well as negative"></textarea>
                                       @error('event') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                           <div class="form-group row">
                                <label for="horizontal-email-input" class="col-3 col-form-label">Early warning signs</label>
                            <div class="col-9">
                                    <textarea class="form-control" name="warning_signs" placeholder="Note any warning signs that could be picked up in future"></textarea>
                                       @error('warning_signs') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-email-input" class="col-3 col-form-label">Recommendations</label>
                            <div class="col-9">
                                    <textarea class="form-control" name="recommendations" placeholder="Recommendation for improvement or to remove the issue for future projects"></textarea>
                                       @error('recommendations') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-email-input" class="col-3 col-form-label">Action(s)</label>
                            <div class="col-9">
                                    <textarea class="form-control" name="action" placeholder=" Actions that will be taken to implement the lesson learned"></textarea>
                                       @error('action') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-firstname-input" class="col-3 col-form-label">Assign To</label>
                             <div class="col-4">
                                    <select name="owner" class="form-control basic">
                                        <option value="">Select ...</option>
                                        <option value="Architect">Architect</option>
                                        <option value="CAD Operator">CAD Operator</option>
                                        <option value="Company Representative">Company Representative</option>
                                        <option value="Construction Manager">Construction Manager</option>
                                        <option value="Document Control Supervisor">Document Control Supervisor</option>
                                        <option value="ES&H Manager">ES&H Manager</option>
                                        <option value="ES&H Officer">ES&H Officer</option>
                                        <option value="Field Engineer">Field Engineer</option>
                                        <option value="Field Supervisor">Field Supervisor</option>
                                        <option value="First Aider">First Aider</option>
                                        <option value="Planning and Scheduling Engineer">Planning and Scheduling Engineer</option>
                                        <option value="Procurement Manager">Procurement Manager</option>
                                        <option value="Project Controls Engineer">Project Controls Engineer</option>
                                        <option value="Project Manager">Project Manager</option>
                                        <option value="QA/QC Engineer">QA/QC Engineer</option>
                                        <option value="Quality Control Manager">Quality Control Manager</option>
                                        <option value="Quantity Surveyor">Quantity Surveyor</option>
                                        <option value="Quantity Surveyor / Cost Estimator">Quantity Surveyor / Cost Estimator</option>
                                        <option value="Resident Engineer">Resident Engineer</option>
                                        <option value="Scaffold Supervisor">Scaffold Supervisor</option>
                                        <option value="Site Nurse">Site Nurse</option>
                                        <option value="Stone Column Works Supervisor">Stone Column Works Supervisor</option>
                                        <option value="Store Keeper">Store Keeper</option>
                                        <option value="Superintendent">Superintendent</option>
                                        <option value="Technician">Technician</option>
                                    </select>
                                    @error('owner') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="form-group row">
                                <label for="horizontal-email-input" class="col-3 col-form-label">WBS ID</label>
                            <div class="col-4">
                                    <input type="text" class="form-control" name="wbs_id">
                                       @error('wbs_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                           <div class="row mb-2 riskLevel" style="display: none;">
                            <label for="horizontal-firstname-input" class="col-3 col-form-label">Risk Level</label>
                            <div class="col-md-4" >
                                <select name="risk_level" class="form-control">
                                    <option value="">Select Level</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('risk_level') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="horizontal-email-input" class="col-3 col-form-label">Attach Images</label>
                            <div class="col-sm-6">
                                {{-- <input type="file" class="form-control" name="images"> --}}
                                <div class="form-group">
                                    <div class="form-group custom-file-container" data-upload-id="myImage">
                                        <label><a href="#" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file" >
                                            <input type="file" class=" form-control" name="images[]"  multiple>
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                       <div class="form-group row">
                            <label for="horizontal-email-input" class="col-3 col-form-label">Attach File</label>
                        <div class="col-4">
                                <input type="file" class="form-control" name="attachment" >
                            </div>
                        </div>

                            <div class="float-right">
                                    <div>
                                        <a href="{{ route('lessons.index') }}" class="btn btn-dark waves-effect btn-label waves-light disabled-button-prevent"><i class="mdi mdi-arrow-left label-icon"></i> Cancel</a>
                                        <button  class="btn btn-primary w-md disabled-button-prevent" type="submit">Submit</button>
                                        <div class="spinner-prevent">
                                            <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                                        </div>
                                    </div>
                                </div>
                        </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Row -->


    <script src="/assets/plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        var secondUpload = new FileUploadWithPreview('myImage')
    </script>

@endsection

