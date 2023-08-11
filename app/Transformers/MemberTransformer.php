<?php

namespace App\Transformers;

use App\Models\Member;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Str;

class MemberTransformer extends TransformerAbstract
{

   protected string $joined;
    protected string $type;
    public function __construct(string $joined,$type) {
     $this->joined=$joined;
     $this->type=$type;
    }

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
    public function transform($user)
    {
        return  [
            "Member_id"=>$user->id,
            "Member_name"=>$user->name==null?$user->Name:$user->name,
            "Member_type"=>str_replace("App\Models\\", "", $this->type),
            "join_date "=>Carbon::createFromFormat( 'Y-m-d H:i:s' , $this->joined )->format("Y-m-d H:i:s"),
            "phone"=>$user->phone,
        ];
    }
}
