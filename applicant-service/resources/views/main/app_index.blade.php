@extends('layout.master')
@section('main_content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Applicant Form</h4>
                <form action="{{ route('app_store') }}" method="POST" id="sliderForm" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Name
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input class="form-control" name="app_name" id="appName" placeholder="Enter Your Name" required/>
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
                            <input type="email" name="app_email" id="app_email" class="form-control" placeholder="Enter Your Email" required/>
                            @if($errors->has('app_email'))
                                <span class="error">{{$errors->first('app_email')  }}</span>
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
                            <img class="mt-3 w-25" src="" id="output" alt="">
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
                                <input type="radio" class="" name="app_gender" value="1"/>
                                Male
                            </label>
                            <label class="col-sm-3" for="gender">
                                <input type="radio" class="" name="app_gender" value="2"/>
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
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="laravel"> Laravel</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="codeigniter"> Codeigniter</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="ajax"> Ajax</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="vue"> Vue Js</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="mysql"> MySQL</label>
                            <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="api"> API</label>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-success w-md px-5 me-1" id="subBtn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Skills</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($app_datas as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $data->app_name }}</td>
                                    <td class="text-center">{{ $data->app_email }}</td>
                                    <td class="text-center w-25">
                                        <img src="{{ asset('storage/applicant_image/'.$data->app_image)}}" class="w-25 h-50" alt="">
                                    </td>
                                    <td class="text-center">{{ $data->app_gender == 1 ? 'Male' : 'Female'  }}</td>
                                    <td class="text-center">
                                        @foreach(JSON_DECODE($data->app_skills) as $skill)
                                            <span>{{ $skill }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-success" title="Edit Slider Section" onclick="window.location.href='{{ route('app_edit', ['id' => $data->id]) }}'">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-action="{{ route('app_delete', ['id' => $data->id]) }}" onclick="deleteApplicants({{ $data->id }})" title="Delete Row">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection
