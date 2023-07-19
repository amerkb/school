<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Grade;
use App\Models\Member;
use App\Models\Section;
use App\Http\Requests\StoreSections;
use App\Models\Classroom;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $list_class = Classroom::all();
        $teachers = Teacher::all();
        return view(
            'pages.Sections.sections',
            compact('Grades', 'list_Grades', 'list_class', 'teachers')
        );
    }

    public function store(StoreSections $request)
    {

        try {


        $validated = $request->validated();
        $Sections = new Section();
        $Sections->Name_Section = $request->Name_Section_En;
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
        $Sections->Status = 1;
        $Sections->save();
        $Sections->teachers()->attach($request->teacher_id);
        toastr()->success(('Success'));
        //add teachers to members
        if (isset($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher) {
                $teacher = Teacher::with("Sections")->find($teacher);
                $teacher_id = $teacher->id;
                $Sections = $teacher->Sections;
//add teachers for conversation
                foreach ($Sections as $section) {
                    $Conversation = Conversation::where([
                        ["BelongTo_type", "App\Models\Classroom"],
                        ["BelongTo_id", $section->Class_id]
                    ])->get();

                    $is_member = Member::where([
                        ["user_type", "App\Models\Teacher"],
                        ["user_id", $teacher_id],
                        ["conversation_id", $Conversation[0]["id"]],
                    ])->get();
                    if (empty(collect($is_member)->toArray())) {
                        $member = new Member();
                        $member->user_type = "App\Models\Teacher";
                        $member->user_id = $teacher_id;
                        $member->conversation_id = $Conversation[0]["id"];
                        $member->joined_at = Carbon::now();
                        $member->save();
                    }
                }
//add teachers for conversation
                foreach ($Sections as $section) {
                    $Conversation = Conversation::where([
                        ["BelongTo_type", "App\Models\Section"],
                        ["BelongTo_id", $section->id]
                    ])->get();

                    $is_member = Member::where([
                        ["user_type", "App\Models\Teacher"],
                        ["user_id", $teacher_id],
                        ["conversation_id", $Conversation[0]["id"]],
                    ])->get();
                    if (empty(collect($is_member)->toArray())) {
                        $member = new Member();
                        $member->user_type = "App\Models\Teacher";
                        $member->user_id = $teacher_id;
                        $member->conversation_id = $Conversation[0]["id"];
                        $member->joined_at = Carbon::now();
                        $member->save();

                    }
                }
            }
        }
        //add teachers to members
        return redirect()->back();

    }

        catch(\Exception $e) {
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }

    public function update(StoreSections $request)
    {

        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->Name_Section = $request->Name_Section_En;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            if (isset($request->Status)) {
                $Sections->Status = 1;
            } else {
                $Sections->Status = 2;
            }

            // update pivot table
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array());
            }
            $Sections->save();

//delete all teachers from members
            if (isset($request->teacher_id))
            {
                foreach ($request->teacher_id as $teacher) {
                    $teacher = Teacher::with("Sections")->find($teacher);
                    $teacher_id = $teacher->id;
                    $Sections = $teacher->Sections;
//delete all teachers from members of class
                    foreach ($Sections as $section) {
                        $Conversation = Conversation::where([
                            ["BelongTo_type", "App\Models\Classroom"],
                            ["BelongTo_id", $section->Class_id]
                        ])->get();
                        $member = Member::where([
                            ["user_type", "App\Models\Teacher"],
                            ["conversation_id", $Conversation[0]["id"]],
                        ])->delete();
                    }
//delete all teachers from members of class
                    foreach ($Sections as $section) {
                        $Conversation = Conversation::where([
                            ["BelongTo_type", "App\Models\Section"],
                            ["BelongTo_id", $section->id]
                        ])->get();
                        $member = Member::where([
                            ["user_type", "App\Models\Teacher"],
                            ["conversation_id", $Conversation[0]["id"]],
                        ])->delete();
                    }
            }
                }
//add   teachers to members
            if (isset($request->teacher_id)) {
                foreach ($request->teacher_id as $teacher) {
                    $teacher = Teacher::with("Sections")->find($teacher);
                    $teacher_id = $teacher->id;
                    $Sections = $teacher->Sections;
//add teachers for conversation class
                    foreach ($Sections as $section) {
                        $Conversation = Conversation::where([
                            ["BelongTo_type", "App\Models\Classroom"],
                            ["BelongTo_id", $section->Class_id]
                        ])->get();

                        $is_member = Member::where([
                            ["user_type", "App\Models\Teacher"],
                            ["user_id", $teacher_id],
                            ["conversation_id", $Conversation[0]["id"]],
                        ])->get();
                        if (empty(collect($is_member)->toArray())) {
                            $member = new Member();
                            $member->user_type = "App\Models\Teacher";
                            $member->user_id = $teacher_id;
                            $member->conversation_id = $Conversation[0]["id"];
                            $member->joined_at = Carbon::now();
                            $member->save();
                        }
                    }
//add teachers for conversation section
                    foreach ($Sections as $section) {
                        $Conversation = Conversation::where([
                            ["BelongTo_type", "App\Models\Section"],
                            ["BelongTo_id", $section->id]
                        ])->get();

                        $is_member = Member::where([
                            ["user_type", "App\Models\Teacher"],
                            ["user_id", $teacher_id],
                            ["conversation_id", $Conversation[0]["id"]],
                        ])->get();
                        if (empty(collect($is_member)->toArray())) {
                            $member = new Member();
                            $member->user_type = "App\Models\Teacher";
                            $member->user_id = $teacher_id;
                            $member->conversation_id = $Conversation[0]["id"];
                            $member->joined_at = Carbon::now();
                            $member->save();

                        }
                    }
                }
            }

            toastr()->success(trans('Update'));
            return redirect()->route('section');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {

        try {


            $old_status = Section::where("id",$request->id)->pluck("Status")[0];
            $new_status=$old_status==0?1:0;
            $class = Section::findOrFail($request->id)->update(["Status"=>$new_status]);
            if ($new_status==1) {
                toastr()->success(('Active'));
            }
            else{
                toastr()->warning('No Active');
            }
            return redirect()->route('section');


        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}