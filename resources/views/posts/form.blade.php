<div class="field is-horizontal">
    <div class="field-label">
        <label class="label" for="title">Title</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <input class="input is-medium" type="text" name="title" value="{{ old('title') ?? $post->title }}">
                <p class="help is-danger">{{ $errors->first('title') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="field is-horizontal">
    <div class="field-label">
        <label class="label" for="body">Body</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <textarea rows="8" class="textarea" name="body" id="body">{{ old('body') ?? $post->body }}</textarea>
                <p class="help is-danger">{{ $errors->first('body') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="field is-horizontal">
    <div class="field-label">
        <label class="label" for="tags">Tags</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <div class="select is-multiple">
                    <select name="tags" id="tags" multiple>
                        @foreach($tags->sortBy('name') as $tag)
                            <option @if(in_array($tag->name, $post->tags->pluck('name')->all())) selected @endif value="{{ $tag->name }}">
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input readonly class="input is-hidden" type="text" id="tagList" name="tagList" value="{{ $tagInput ?? '' }}">
        </div>
    </div>
</div>
<div class="content">
    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label" for="tagsField"></label>
        </div>
        <div class="field-body">
            <div id="tagsField" class="field is-grouped is-grouped-centered is-grouped-multiline">
                @foreach($post->tags->sortBy('name') as $postTag)
                    <div class="control">
                        <div class="tags has-addons">
                            <a class='tag is-primary is-capitalized'>{{ $postTag->name }}</a>
                            <a class='tag is-delete'></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="field is-horizontal">
    <div class="field-label">
        <label class="label" for="image">Image</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control">
                <div class="file is-left">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Choose a file…
                                </span>
                            </span>
                    </label>
                </div>
                <p class="help is-danger">{{ $errors->first('image') }}</p>
            </div>
        </div>
    </div>
</div>

@csrf