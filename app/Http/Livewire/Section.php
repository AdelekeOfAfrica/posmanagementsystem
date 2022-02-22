<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\section as SectionModel;


class Section extends Component
{
    //these function is used to replicate the input box used in the add section and it will not create more than 5
    public $addMore = [1];
    public $count = 0;
    public function addMore(){
        $countable = $this->count++;

        if ($countable < 5){
            $this->addMore[] = count($this->addMore) + 1;

        }
    }
    // end of the function 

    //to remove the replicate box
    public function Remove($index){
        $this->count--;
        unset($this->addMore[$index]);
    }
   

    //storing of the content into the database
    public $section_name,$section_status;
    public function store(){
        
        foreach ($this->section_name as $key=>$section){
            SectionModel::create([
                'section_name'=>$this->section_name[$key],
                'status'=>$this->section_status[$key] ?? 0 // if these status is empty 0 ese 1
                
            ]);
        }
        $this->FormReset();
    }
    //end of content into the database 

    //formreset function
    public function FormReset(){
        $this->section_name = '';
        $this->section_status = '';
        $this->addMore = [1];
    }

    public function render()
    {
        return view('livewire.section',['section'=>SectionModel::all()]);// this is linked to the table.blade of tje section


        
    }
}
