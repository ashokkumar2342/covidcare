<select class="form-control" id="block_id" name="block_id"  onclick="callAjax(this,'{{ route('village',$district_id) }}','village')">
	<option selected="selected" value="">Select Block MCS</option>
@foreach ($blocksMcs as $blocksMc)
  <option value="{{ $blocksMc->id }}">{{ $blocksMc->name_e }}</option>
@endforeach 
</select>