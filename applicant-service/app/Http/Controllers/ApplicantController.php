<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function applicantIndex()
    {
        $data = Applicant::all();
        return response(
            [
                'success'  => true,
                'data' => $data
            ]
        );
    }
    public function applicantStore(Request $request)
    {

        $request->validate(
            [
                'app_name'  => 'required',
                'app_email' => 'required|email|max:255|unique:applicants',
                'app_image' => 'mimes:jpg,png|max:2048'
            ],
            [
                'app_name.required'     => 'Name is Required.',
                'app_email.required'    => 'Email is Required.',
                'app_email.email'       => 'Email Must be type of Email.',
                'app_email.max'         => 'Email length must be in 255 Letter.',
                'app_email.unique'      => 'This email is Already Exists',
                'app_image.required'    => 'Image is required.',
                'app_image.mimes'       => 'Only Jpg and Png can be uploaded',
                'app_image.max'         => 'Maximum File Upload Size is 2MB'
            ]
        );

        $data = Applicant::newApplicants($request);
        return response(
            [
                'success'   => true,
                'data'      => $data
            ]
        );
    }
    public function applicantEdit(Request $request, $id)
    {
        $request->validate(
            [
                'app_name'  => 'required',
                'app_email' => 'required|email|max:255',
                'app_image' => 'nullable|mimes:jpg,png|max:2048'
            ],
            [
                'app_name.required'     => 'Name is Required.',
                'app_email.required'    => 'Email is Required.',
                'app_email.email'       => 'Email Must be type of Email.',
                'app_email.max'         => 'Email length must be in 255 Letter.',
                'app_email.unique'      => 'This email is Already Exists',
                'app_image.required'    => 'Image is required.',
                'app_image.mimes'       => 'Only Jpg and Png can be uploaded',
                'app_image.max'         => 'Maximum File Upload Size is 2MB'
            ]
        );
        $data = Applicant::updateApplicant($request, $id);
        return response(
            [
                'success'  => true,
                'data' => $data
            ]
        );
    }
    public function applicantDelete($id)
    {
        if (Applicant::applicantsDelete($id))
        {
            $data['success'] = true;
            $data['message'] = 'Section Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Success Can not be Deleted !';
            return response()->json($data, 200);
        }
    }
}
