<div class="field is-horizontal">
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input class="input" type="tags" name="name" placeholder="Add Tag" value="{{ old('name') ?? $tagNames }}">
                <p class="help is-danger">{{ $errors->first('name') }}</p>
            </div>
        </div>
    </div>
</div>
@csrf