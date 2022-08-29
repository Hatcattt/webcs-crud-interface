<div style="padding-bottom: 20px;">
    <span class="required">*</span> <small class="input-required">Inputs required</small>
</div>
<div class="form-group">
    <label for="name">Product (short name) <span title="required" class="required">*</span></label>
    {{ Form::text('product_cd', $product->product_cd, ['class' => 'form-control' . ($errors->has('product_cd') ? ' is-invalid' : ''), 'placeholder' => 'ex : aut']) }}
</div>
<div class="form-group">
    <label for="date_offered">Offered Date 
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('dateOfferer')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('date_offered', $product->date_offered, ['class' => 'form-control', 'id' => 'dateOfferer', 'placeholder' => 'Date Offered']) }}
</div>
<div class="form-group">
    <label for="date_retired">Retired Date
        <span style="padding-left: 20px;">
            <a href="#/" title="Current Date" class="fa-solid fa-clock" type="button" onclick="setCurrentDate('dateRetired')"></a>
        </span>
        <small>Now</small>
    </label>
    {{ Form::date('date_retired', $product->date_retired, ['class' => 'form-control', 'id' => 'dateRetired', 'placeholder' => 'Date Retired']) }}
</div>
<div class="form-group">
    <label for="name">Name <span title="required" class="required">*</span></label>
    {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'ex : auto loan']) }}
</div>
<div class="form-group">
    {{ Form::label('product_type', 'Type') }}
    {{ Form::select('product_type_cd', $type_cd, $product->product_type_cd, ['class' => 'form-control']) }}
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class="btn-back">
    <a title="Stop and return" role="button" href={{ route('product.index') }}> Cancel</a>
</div>

<script>
    let dateNow = "{{ date('Y-m-d'); }}"

    function setCurrentDate(idDate) {
        document.getElementById(idDate).value = dateNow;
    }
</script>