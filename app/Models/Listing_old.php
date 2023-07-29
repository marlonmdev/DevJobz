<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    
    public static function lists(){
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum1 dolor sit amet consectetur adipisicing elit. Sequi deleniti magnam temporibus consequatur perspiciatis reprehenderit numquam soluta? Unde ad laudantium, illo, iure doloribus consequatur numquam eveniet laboriosam accusantium fuga sunt.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum2 dolor sit amet consectetur adipisicing elit. Sequi deleniti magnam temporibus consequatur perspiciatis reprehenderit numquam soluta? Unde ad laudantium, illo, iure doloribus consequatur numquam eveniet laboriosam accusantium fuga sunt.'
            ],
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => 'Lorem ipsum3 dolor sit amet consectetur adipisicing elit. Sequi deleniti magnam temporibus consequatur perspiciatis reprehenderit numquam soluta? Unde ad laudantium, illo, iure doloribus consequatur numquam eveniet laboriosam accusantium fuga sunt.'
            ]
        ];
    }
    
    public static function find($id){
        $listings = self::lists();
        
        foreach($listings as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }
    
    }
}
