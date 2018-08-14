@extends('master')
@section('content')
<div id="content">
<div id="content-header">
  <h1>Subject</h1>
</div>
  <hr>
      <div class="widget-box">
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Subject Id :</label>
              <div class="controls">
                <input type="text" class="span11" name="sub_id" placeholder="Subject Id" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Subject Name</label>
              <div class="controls">
                <input type="text"  class="span11" name="sub_name" placeholder="Subject Name"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Class id :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name" />
              </div>
              <div class="control-group">
              <label class="control-label">marks :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
    </div>
      @endsection