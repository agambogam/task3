
    <div class="form-group">
      <label class="col-md-2 control-label">Tittle</label>
      <div class="col-md-10">
        <!-- <input class="form-control" name="tittle" placeholder="Tittle" type="text"> -->
        {!! Form::text('tittle', null, array('class' => 'form-control', 'autofocus' => 'true')) !!}
      </div>
    </div>
    
      <label class="col-md-2 control-label">Choose Image</label>
      <div class="col-md-10">
    
        <!-- <input readonly="" class="form-control" placeholder="Browse..." type="text" name="image"> -->
        {!! Form::file('image', null) !!}
      </div>
    
    <div class="form-group">
      <label class="col-md-2 control-label">Description</label>
      <div class="col-md-10">
        <!-- <textarea class="form-control" rows="3" name="description"></textarea> -->
        {!! Form::textarea('description', null, array('class' => 'form-control', 'rows' => 10)) !!}
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        {!! link_to(route('root'), "Cancel", ['class' => 'btn btn-default']) !!}
        {!! Form::submit('Upload', array('class' => 'btn btn-primary')) !!}
      </div>
    </div>
