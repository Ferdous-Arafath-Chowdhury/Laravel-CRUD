<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class Student_Controller extends Controller
{
    public function init()
    {
        $stud = Student::orderBy('id', 'desc')->paginate(6);
        return view('student', ['col' => $stud]);
    }

    public function saveT(Request $req)
    {
        $student =  new Student();
        $student->name = $req->Name;
        $student->email = $req->Email;
        $student->address = $req->Address;
        $student->class = $req->Class;
        // $student->image = $req->image;

        //Some additional Things to Add Image

        if($req ->image)
        {
            $ext = $req->image->getClientOriginalExtension();
            $f_name = time().'.'.$ext;
            $req->image->move(public_path().'/uploads/students/',$f_name);
            $student->Image = $f_name;
        $student->save(); 
      // return redirect('student');
      $req->session()->flash('success', 'Student Added successfully.');
      //return redirect()->route('st')->with('success', 'Student Added successfully.');
      return redirect('student');
      
    } 

} 

    public function edit($id) 
    {
         $sel_stdudent = Student::find($id);
          return view('edit' , ['stud' => $sel_stdudent]);
    } 

    public function update($id, Request $req) 
    {
         $student = Student::find($id);
         $student->name = $req->Name;
         $student->email = $req->Email;
         $student->address = $req->Address;
         $student->class = $req->Class;
         // $student->image = $req->image;
 
         //Some additional Things to Add Image
 
         if($req ->image)
         {
            $oldphoto = $student->image;
             File::delete(public_path().'/uploads/students/',$oldphoto);

             $ext = $req->image->getClientOriginalExtension();
             $f_name = time().'.'.$ext;
             $req->image->move(public_path().'/uploads/students/',$f_name);
             $student->Image = $f_name;
             $student->save();  
             $req->session()->flash('success', 'Student updated successfully.');

             return redirect('student');
         

    }
}   

public function destroy($id)
{
    $student = Student::find($id);

    // Check if the student with the given ID exists
    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    // Delete the student record from the database
    $student->delete();

    return redirect()->back()->with('success', 'Student deleted successfully.');
}

    // Existing methods...

    // public function generatePDF($id)
    // {
    //     $student = Student::find($id);

    //     if (!$student) {
    //         return redirect()->back()->with('error', 'Student not found.');
    //     }
     
    //     $pdf = new Dompdf();
    //    // $data = ['student' => $student];


    //    // $imageUrl = asset('uploads/students/'.$student->Image);
    // //    $imageUrl = public_path('/uploads/students/' . $student->Image);

    // $imageUrl = Storage::disk('public')->url('uploads/students/' . $student->Image);
 
    //    dd($imageUrl);
    //    if (!file_exists($imageUrl)) {
    //     return redirect()->back()->with('error', 'Image not found.');
    // }

    //    // $data['imageUrl'] = $imageUrl;

    //    $data = ['student' => $student, 'imageUrl' => $imageUrl];
        
    //     $pdf->loadHtml(View::make('pdf_view', $data)->render());

    //     // (Optional) Set the paper size and orientation
    //     $pdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $pdf->render();

    //    //  Output the generated PDF to the browser (force download)
    //    // return $pdf->stream('student_information.pdf');  

    //    return new Response($pdf->output(), 200, [
    //     'Content-Type' => 'application/pdf'
    // ]);


      
    // }





// ...

public function generatePDF($id)
{
    $student = Student::find($id);

    if (!$student) {
        return redirect()->back()->with('error', 'Student not found.');
    }

    $pdf = new Dompdf();

    // Convert image to base64-encoded data URI
    $imagePath = public_path('/uploads/students/' . $student->Image);
    $imageData = File::get($imagePath);
    $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageData);

    $data = ['student' => $student, 'imageUrl' => $imageBase64];

    $pdf->loadHtml(View::make('pdf_view', $data)->render());

    // (Optional) Set the paper size and orientation
    $pdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $pdf->render();

    // Output the generated PDF to the browser (inline display)
    return new Response($pdf->output(), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="student_information.pdf"',
    ]);
        
}

}

  



