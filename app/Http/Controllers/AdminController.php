<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use function Symfony\Component\Console\Helper\resetIOCodepage;
use App\Models\News;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new doctor;
        $image = $request->file;

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('doctorImage', $imageName);
        $doctor->image = $imageName;

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    public function show_appointment()
    {
        $data = appointment::all();
        return view('admin.show_appointment', compact('data'));
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $data = Appointment::find($id);
        $data->status = 'canceled';
        $data->save();
        return redirect()->back();
    }

    public function showDoctor()
    {
        $data = Doctor::all();
        return view('admin.show_doctor', compact('data'));
    }

    public function delete_doctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_doctor($id)
    {
        $data = Doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function edit_doctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('doctorImage', $imageName);
            $doctor->image = $imageName;
        }


        $doctor->save();
        return redirect()->back()->with('message', 'Updated successfully');
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::find($id);

        $news->title = $request->title;
        $news->content = $request->content;
        // Add any other fields you want to update

        $news->save();

        return redirect()->back()->with('message', 'News updated successfully');
    }

    public function show_news()
    {
        $newsList = News::all();
        return view('admin.news_list', compact('newsList'));
    }

    public function editNews($id)
    {
        $news = News::find($id);
        return view('admin.edit_news', compact('news'));
    }
}
