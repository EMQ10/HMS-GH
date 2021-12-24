<div class="row mt-4" id="vital_div" style="display: none;" >
        <div class="col-lg-8 offset-lg-2" style="font-size:20px;">
          
            <fieldset class="p-3 m-4" style="border:solid 4px rgb(55, 168, 202); border-style:outset; border-radius:20px;">
                <form >
                
                    <div class="row mb-1">
                         
                        <div class="col-sm-6">
                            <label>Temperature <span class="text-danger">*</span> </label>
                            <input style="font-size:20px;" class="form-control" type="text"  name="temperature"  value="{{ $visit->vital->temperature }}" readonly>
                            @error('temperature')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br>
                        </div>
                        <div class="col-sm-6">
                            <label>Heart Rate<span class="text-danger">*</span> </label>
                            <input style="font-size:20px;" class="form-control" type="text"  name="heart_rate" value="{{ $visit->vital->heart_rate }}" readonly>
                            @error('heart_rate')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br>
                        </div>
                    
                        <div class="col-sm-6">
                            <label>Blood Pressure <b>(Diastolic)</b> <span class="text-danger">*</span> </label>
                            <input style="font-size:20px;" class="form-control" type="text"  name="bp_diastolic" value="{{ $visit->vital->bp_diastolic }}" readonly>
                            @error('bp_diastolic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br>
                        </div>
                        <div class="col-sm-6">
                            <label>Blood Pressure <b>(Systolic)</b> <span class="text-danger">*</span> </label>
                            <input style="font-size:20px;" class="form-control" type="text"  name="bp_systolic" value="{{ $visit->vital->bp_systolic }}" readonly>
                            @error('bp_systolic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br>
                        </div>
                        <div class="col-sm-6">
                            <label>Height <span class="text-danger">*</span> </label>
                            <input style="font-size:20px;" class="form-control" type="text"  name="height" value="{{ $visit->vital->height }}" readonly>
                            @error('height')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br>
                        </div>
                        <div class="col-sm-6">
                            <label>Weight <span class="text-danger">*</span> </label>
                            <input style="font-size:20px;" class="form-control" type="text"  name="weight" value="{{ $visit->vital->weight }}" readonly> 
                            @error('weight')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror <br>
                        </div>
    
                    </div>
                    
                    
                </form>
            </fieldset>
        </div>
    </div>




    





















