<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Member;
use App\Models\Message;
use App\Models\Recipient;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Traits\GeneralTrait;
use App\Transformers\ConversationTransformer;
use App\Transformers\MemberTransformer;
use App\Transformers\MessageTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;

class ChatController extends Controller
{
    use GeneralTrait;
    public function get_conversation(Request $request){
        $members=Member::with("conversation")->where([
            ["user_type",role($request->role)],
            ["user_id",Auth::guard($request->role)->id()],
        ])->get();
        $conversationTransfermer=[];
        foreach ($members as $index=> $member){
        $conversation=$member->conversation;
        $conversationTransfermer[$index] = fractal($conversation, new ConversationTransformer())->toArray();
        $conversationTransfermer[$index]= $conversationTransfermer[$index]["data"];
        }
       return $this ->returnData("conversation" ,$conversationTransfermer,"count_conversation",$members->count());
    }

    public function get_members(Request $request){
        $members=Member::with("user")->where([
            ["conversation_id",$request->conversation_id]
        ])->get();

        $memberTransfermer=[];
        foreach ($members as $index=> $member){
            $user=$member->user;
            $joined=$member->joined_at;
            $type=$member->user_type;
            $memberTransfermer[$index] = fractal($user, new MemberTransformer($joined,$type))->toArray();
            $memberTransfermer[$index]= $memberTransfermer[$index]["data"];
        }

        return $this ->returnData("Members" ,$memberTransfermer,"count_members",$members->count());
    }
    public function get_message(Request $request){
        $conversation=Conversation::with("messages")->where([
            ["id",$request->conversation_id]
        ])->get();
        $mesageTransfermer=[];
        $messages=$conversation[0]->messages;
        foreach ($messages as $index=> $message){
             $message;
            $mesageTransfermer[$index] = fractal($message, new MessageTransformer())->toArray();
            $mesageTransfermer[$index]= $mesageTransfermer[$index]["data"];
        }
        return $this ->returnData("Messages" ,$mesageTransfermer,"count_message",$messages->count());
    }
    public function add_message(Request $request){
        Message::create([
            "user_type"=>role($request->role),
            "user_id"=>Auth::guard($request->role)->id(),
            "body"=>$request->body,
            "conversation_id"=>$request->conversation_id,
        ]);
        return $this ->returnSuccessMessage("successfully sent");
    }
    public function delete_message(Request $request){
       $message= Message::find($request->message_id);
        if (!$message){
            return $this ->returnError(404,"the message not found");
        }
        $message->delete();
        return $this ->returnSuccessMessage("successfully deleted");
    }


}
