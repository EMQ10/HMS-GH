<div class="mt-4 container" id="consult_div" style="display:none; " >
    <div class="col-sm-8 offset-2 text-center" >
        @if(session()->has('status'))
            <div class="alert alert-danger"> {{ session()->get('status') }}  </div>
        @endif
        @if(session()->has('mismatch'))
            <div class="alert alert-danger"> {{ session()->get('mismatch') }}  </div>
        @endif
    </div>

    {{-- @php
        dd($consultation);
    @endphp --}}
    
    <fieldset class="p-4" style="border:solid 4px rgb(79, 195, 114); border-style:inset; border-radius:10px;">
        <form class="col-sm-12 text-center" style="font-size:17px;"  action="{{ $action }}" method="POST">
            @csrf
            
            @if( !empty($consultation))
                @method('PUT')
            @endif
            <div class="row p-3 mt-4">
                  
                @empty($consultation)
                    <input class="form-control" type="hidden"  name="visit_id" value="{{ $visit->id }}">
                    <input class="form-control" type="hidden"  name="vital_id" value="{{ $visit->vital->id}}">
                @endempty
                
                <div class="col-sm-6 mb-1">
                    <label>Complaints<span class="text-danger">*</span> </label>
                    <textarea style="font-size:20px; resize: none; border-radius:12px; border:inset 3px rgb(123, 214, 154)" name="complaints" id="" cols="40" rows="6"> {{ $consultation->complaints ?? "" }}  </textarea>
                    @error('complaints')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                </div>

                <div class="col-sm-6 mb-1">
                    <label>Lab Request </label>
                    <textarea style="font-size:20px; resize: none; border-radius:12px;  border:inset 3px rgb(123, 214, 154)" name="lab" id="" cols="40" rows="6"> {{ $consultation->lab ?? "" }}</textarea>
                    @error('lab')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                </div>
            </div>

            <div class="row mb-1 p-3 mt-1">
                <div class="col-sm-6 mb-1">
                    <label>Diagnosis </label>
                    <textarea style="font-size:20px; resize: none; border-radius:12px; border:inset 3px rgb(123, 214, 154)" name="diagnosis" id="" cols="40" rows="6"> {{ $consultation->diagnosis ?? "" }}</textarea>
                    @error('diagnosis')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                </div>
               
                <div class="col-sm-6 mb-1">
                    <label>Prescription </label>
                    <textarea style="font-size:20px; resize: none; border-radius:12px; border:inset 3px rgb(123, 214, 154)" name="prescription" id="" cols="40" rows="6"> {{ $consultation->prescription ?? "" }}</textarea>
                    @error('prescription')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror <br>
                </div>
            </div>
        
                
                
                <div class="row">
                    <div class="col-sm-6 mb-1 offset-3">
                        <label>Advice </label>
                        <textarea style="text-align:left; font-size:20px; resize: none; border-radius:12px; border:inset 3px rgb(123, 214, 154)" name="advice" id="" cols="40" rows="6"> {{ $consultation->advice ?? "" }}</textarea>
                        @error('advice')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror <br>
                    </div>
                    
                </div>
                 

                <div class="m-t-20 text-center mb-4">
                    <button class="btn btn-success submit-btn">
                        @if( !empty($consultation))
                            Update
                        @endif
                        @empty($consultation)
                            Save
                        @endempty     
                    </button>
                </div>
        
            </div>
            
            
        </form>
    </fieldset>
    
</div>
