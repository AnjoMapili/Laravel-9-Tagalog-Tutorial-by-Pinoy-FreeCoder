<?php

namespace App\Http\Controllers;

use App\Models\Students;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller 
{
    public function index(){
        $data = array("students" => DB::table('students')->orderBy('created_at','desc')->simplePaginate(10));
        
       
        // $data = Students::where('id',6)->get();  //Get specific name by id

        // $data = Students::where('first_name','like','%bert%')->get(); // kukunin nya yong mga bert sa pangalan using ('like','%%')
        // $data = Students::where('age','=',19)->orderBy('first_name')->get(); // kukunin nya yong mga 19 pataas sa pangalan 
        // $data = Students::where('age','>=',19)->orderBy('first_name','asc')->get(); // kukunin nya yong mga 19 pataas sa pangalan by ascending or  'desc' for descending.
        // $data = Students::where('age','>=',19)->orderBy('first_name','asc')->limit(5)->get(); // kukunin nya yong mga 19 pataas sa pangalan by ascending then tapos lima lang kukunin kaya may limit.
        // $data = DB::table('students')
        //             ->select(DB::raw('count(*) as gender_count, gender'))
        //             ->groupBy('gender')->get();
        // $data = Students::where('id',100)
        //                 ->firstOrFail()
        //                 ->get();// firstOrfail function is ito yong ginagamit kung existing ba yong id or hindi.
    

        return view('students.index',$data);
    } 
    public function show($id){
        $data = Students::findOrFail($id);// findOrfail ito yong i didisplay yong yong single data ng student
        // dd($data);
        return view('students.edit',['student'=>$data]);
    }
    public function create(){
        return view('students.create')->with('title','Add New');
    }
   public function store(Request $request){
    $validated = $request ->validate([
        "first_name" => ['required', 'min:4'],
        "last_name" => ['required', 'min:4'],
        "gender" => ['required'],
        "age" => ['required'],
        "email" => ['required','email', Rule::unique('students','email')],
       
      ]);

        Students::create($validated);
        return redirect('/')->with('message','New student was added successfully!');
   }
   public function update(Request $request, Students $student){
    // dd($request);
    $validated = $request ->validate([
       
        "first_name" => ['required', 'min:4'],
        "last_name" => ['required', 'min:4'],
        "gender" => ['required'],
        "age" => ['required'],
        "email" => ['required','email'],
       
      ]);
      $student->update($validated);
      return redirect('/')->with('message','Data was successfully updated');
   }
   public function destroy(Students $student){
        $student->delete();
        return redirect('/')->with('message','Data was successfully deleted');
   }
}
