<div class="form-row">
    <div class="form-group col-md-12">
        <label for="name" class="control-label">Name&nbsp;<span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" aria-describedby="Name" value="#"
            placeholder="Enter name" required>
        @if ($errors->has('name'))
            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="textarea" class="control-label">Textarea&nbsp;<span style="color:red">*</span></label>
        <textarea class="form-control" aria-describedby="textarea" name="textarea" placeholder="Enter record" id="textarea"
            required></textarea>

        @if ($errors->has('textarea'))
            <span class="text-danger text-left">{{ $errors->first('textarea') }}</span>
        @endif
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-12">
        <label for="option1" class="control-label">Option1&nbsp;<span style="color:red">*</span></label>
        <select class="form-control select2 mySelect" name="option1" id="option1" required autocomplete="true">
            <option value="#" style="display: none; color: transparent;" disabled>Choose record</option>
            <option value="#">#</option>
        </select>
        @if ($errors->has('option1'))
            <span class="text-danger text-left">{{ $errors->first('option1') }}</span>
        @endif
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-12">
        <label for="input8" class="control-label">Input Date&nbsp;<span style="color:red">*</span></label>
        <input type="input8" name="input8" class="form-control" aria-describedby="input8" value="#"
            id="input8" required />

        @if ($errors->has('input8'))
            <span class="text-danger text-left">{{ $errors->first('input8') }}</span>
        @endif
    </div>
</div>

<div class="col-md-12">
    <div class="card card-light h-100">
        <div class="card-header">
            <h3 class="card-title text-bold font-weight-bold">Upload Images</h3>
        </div>

        <div class="card-body">
            <!-- Dropzone Container -->
            <div id="dropzone-container" class="dropzone">
                <div class="dz-default dz-message">
                    <span>Drop images here or click to upload</span>
                </div>
                <!-- Input file field -->
                <input type="file" name="images[]" id="images" multiple style="display: none;"
                    accept=".jpg, .jpeg, .png, .svg" />
            </div>

            <!-- Image Preview Section -->
            <div id="image-preview" class="mt-3">
                <div id="preview-thumbnails" class="row"></div>
            </div>
        </div>
    </div>
</div>


{{-- Buttons --}}
<div class="form-group mt-4">
    <div class="row">
        @if (Route::currentRouteName() == 'page2.create')
            {{-- @can('subpage1.store') --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            {{-- @endcan --}}
        @elseif(Route::currentRouteName() == 'page2.edit')
            {{-- @can('subpage1.update') --}}
            <div class="col-md-2">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
            {{-- @endcan --}}
        @endif
        {{-- @can('subpage1.index') --}}
        <div class="col-md-2">
            <a href="{{ route('page2.index') }}" class="btn btn-default btn-block">Back</a>
        </div>
        {{-- @endcan --}}
    </div>
</div>