<?php

namespace App\Transformers;

use App\Models\Conversation;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ConversationTransformer extends TransformerAbstract
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
    public function transform(Conversation $conversation)
    {
        return  [

            'conversation_id' => $conversation->id,
            'label' => $conversation->label,
            "type"=>$conversation->type,
          //  "last_message"=>$conversation->message_id,
            "conversation_image"=>null,
            "Date_created "=>Carbon::createFromFormat( 'Y-m-d H:i:s' , $conversation->created_at )->format("Y-m-d H:i:s"),
        ];
    }
}
