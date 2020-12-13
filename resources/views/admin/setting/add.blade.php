   @extends('admin.layout.index')
  @section('content')
  <!-- Page Content -->
        <div id="page-wrapper">
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <div class="main-conten">
        <div>
            <div class="card">
                <h4 class="card-header">Setting</h4>
                <div class="card-body p-0 col-md-4  ">
                    <form accept-charset="utf-8" action="{{route('setting.insert').'?type='.request()->type}}" method="post">
                        @csrf
                        <fieldset >
                            <div class="form-group">
                                <label for="disabledTextInput">Config key</label>
                                <input type="text" name="config_key"  class="form-control" placeholder="Config name" required >
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Config value</label>
                              @if(request()->type==='Text')
                              <input type="text" name="config_value"  class="form-control" placeholder="Config value" required >
                              @elseif(request()->type==='Textarea')
                              <textarea rows="5" type="text" name="value"  class="form-control" placeholder="Config value" required ></textarea>
                              @endif
                            </div>
                            
                            <div class="form-group">
                                <label>Status:</label>
                                <label class="radio-inline">
                                    <input name="status" value="1" checked="" type="radio">Hiện
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="0" type="radio">Ẩn
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
        <!-- /#page-wrapper -->
@endsection