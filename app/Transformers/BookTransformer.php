<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
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
    public function transform($book)
    {


        return [
            "Book_Id"=>$book->id,
            "Book_Name"=>$book->title,
            "Book_Category"=>$book->category->name,
            "Book_path"=>'attachments/book/'.$book->file_name,


        ];
    }
}
