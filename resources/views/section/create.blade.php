<div class = "modal fade " id = "AddSection" wire:ignore.self data-backdrop = "static"  >
    <div class="modal-dialog modal-xl" style = " width:3250px">
        <div class="modal-content">
            <div class="modal-header">
                  <h3 class = "modal-title">  Add New Section </h3>
                  <button class = "close" data-dismiss= "modal">&times</button>
            </div>
            <div class="modal-body"  >
                <form  wire:submit.prevent = "store" method="POST" enctype="multipart/form-data" autocomplete = "off">
                    @csrf
                    @forelse($addMore as $more)
                    <div class="form-row">
                        <div class="col">
                            <label for = "">Section Name</label>
                            <input type = "text"  wire:model = "section_name.{{$more}}" class = "form-control" autocomplete = "off">
                            @error('section_name')
                            <span class = "text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="col-sm-1" data-toggle = "tooltip" data-placement = "top" title = "status" >
                            <label  class = "switch" style = "margin-top:2.2em !important">status
                            <input type ="checkbox" wire:model = "section_status.{{$more}}" class= "form-control">
                            <span class = "slider"></span>
                            </label>
                            
                        </div>
                        <div class="col-sm-1">
                            <button class ="btn-success" style = "margin-top:35px; position:absolute; left:-30px;" wire:ignore wire:click.prevent = "addMore"><!---addMore the name used in the livewire controller-->
                                <i class = "fa fa-plus"></i>
                            </button> 
                            @if ($loop->index > 0)
                            <button class ="btn-danger"  wire:ignore wire:click.prevent = "Remove({{$loop->index}})" style = "margin-top:35px; position:absolute; left:10px;">
                                <i class = "fa fa-times"></i>
                            </button> 
                            @endif  
                        </div>
                    </div>
                    @empty
                    @endforelse
                    <div class = "card-footer">
                        <button type="submit " class = "btn-primary btn-block ">Create Section</button>
                        <button type="button " class = "btn-danger btn-block " data-dismiss = "modal"> close</button>
                    </div>
                        

                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .switch{
    position:relative;
    display:inline-block; 
    width:50px;
    height:24px;
    top:5px;
    }

    .switch input{
      opacity:0px;
      width:0px;
      height:0px;
    }

    .slider{
       position:absolute;
       cursor:pointer;
       top:0px;
       left:0px;
       right:0px;
       bottom:0px;
       background-color:#ccc;
       -webkit-transition:.4s;
       transition:4s;

    }

    .switch::before{
        position:absolute;
        content:'';
        height:26px;
        width:26px;
        left:4px;
        bottom: 4px;
        background-color:white;
        -webkit-transition:.4s;
        transition:.4s;    
    }

    input:checked+.slider{
        background-color:#2196f3;

    }
    input:focus+.slider{
        box-shadow:0 01px #2196f3;
    }
    input:checked+.slider:before{
        -webkit-transform:translateX(26px);
        -ms-transform:translateX(26px);
        transform:translateX(26px);

    }

    .slider.round{
        border-radius:34px;
    }
    .slider.slider.round::before{
     border-radius:50px;
    }

  
</style>

