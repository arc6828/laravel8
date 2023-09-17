<div class="form-group {{ $errors->has('line') ? 'has-error' : ''}}">
    <label for="line" class="control-label">{{ 'Line' }}</label>
    <input class="form-control" name="line" type="number" id="line" value="{{ isset($orderline->line) ? $orderline->line : ''}}" >
    {!! $errors->first('line', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_id') ? 'has-error' : ''}}">
    <label for="order_id" class="control-label">{{ 'Order Id' }}</label>
    <input class="form-control" name="order_id" type="number" id="order_id" value="{{ isset($orderline->order_id) ? $orderline->order_id : ''}}" >
    {!! $errors->first('order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('movie_id') ? 'has-error' : ''}}">
    <label for="movie_id" class="control-label">{{ 'Movie Id' }}</label>
    <input class="form-control" name="movie_id" type="number" id="movie_id" value="{{ isset($orderline->movie_id) ? $orderline->movie_id : ''}}" >
    {!! $errors->first('movie_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($orderline->quantity) ? $orderline->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('order_date') ? 'has-error' : ''}}">
    <label for="order_date" class="control-label">{{ 'Order Date' }}</label>
    <input class="form-control" name="order_date" type="date" id="order_date" value="{{ isset($orderline->order_date) ? $orderline->order_date : ''}}" >
    {!! $errors->first('order_date', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
