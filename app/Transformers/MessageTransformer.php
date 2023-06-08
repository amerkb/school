<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class MessageTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($message)
    {
        return [
            "id"=>$message->id,
            "sender_id"=>$message->user_id,
            "sender"=>str_replace("App\Models\\", "",$message->user_type),
            "type_message"=>$message->type,
            "body"=>$message->body,
            "read_all"=>$message->read_all,
            "receipt_all"=>$message->receipt_all,
            "Date_created"=>Carbon::createFromFormat( 'Y-m-d H:i:s' ,$message->created_at)->format("Y-m-d H:i:s"),

        ];
    }
}
