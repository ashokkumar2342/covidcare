<select class="form-control" id="village_id" name="village_id">
	<option selected="selected" value="">Select Village</option>
@foreach ($villages as $village)
  <option value="{{ $village->id }}">{{ $village->name_e }}</option>
@endforeach 
</select>