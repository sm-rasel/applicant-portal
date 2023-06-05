@extends('layout.master')
@section('main_content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Applicant Form</h4>
                <form action="{{ route('app_update', ['id' => $e_data->id]) }}" method="POST" id="sliderForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Name
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control summernote" name="app_name" value="{{ $e_data->app_name }}" id="sliderDescription" placeholder="Enter Your Name"/>
                            @if($errors->has('app_name'))
                                <span class="error">{{ $errors->first('app_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Email
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="email" name="app_email" value="{{ $e_data->app_email }}" id="buttonText" class="form-control" placeholder="Enter Your Email" required/>
                            @if($errors->has('app_email'))
                                <span class="error">{{ $errors->first('app_email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Image
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="file" name="app_image" id="sliderImage" onchange="loadFile(event)" class="form-control"/>
                            <img class="mt-3 w-50" src="{{ asset('storage/applicant_image/'.$e_data->app_image)}}" id="output" alt="">
                            @if($errors->has('app_image'))
                                <span class="error">{{ $errors->first('app_image') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Gender
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-6">
                            <label class="col-sm-3" for="gender">
                                <input type="radio" class="" {{ $e_data->app_gender === 1 ? 'checked' : '' }} name="app_gender" value="1"/>
                                Male
                            </label>
                            <label class="col-sm-3" for="gender">
                                <input type="radio" class="" {{ $e_data->app_gender === 2 ? 'checked' : '' }} name="app_gender" value="2"/>
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3 col-form-label">
                            <label>Skills</label>
                            <span class="text-danger me-1">*</span>
                        </div>
                        <div class="col-sm-6 col-form-label">
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="laravel" {{ (is_array(old('app_skills')) && in_array('laravel', old('app_skills'))) ? ' checked' : '' }}> Laravel</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="codeigniter" > Codeigniter</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="ajax"> Ajax</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="vue"> Vue Js</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="mysql"> MySQL</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="api"> API</label>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-success w-md px-5 me-1" id="sliderBtn">Update</button>
                            <button type="reset" class="btn btn-outline-danger w-md px-5" onclick="window.location.href='{{ route('app_index') }}'">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
@endsection
