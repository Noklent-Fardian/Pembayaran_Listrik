<div class="row">
    <div class="col-md-12">
        @include('components.alert')
        <form action="{{ ($model) ? route($pack['route']['update'], $model) : route($pack['route']['store']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($model)
                <input type="hidden" name="_method" value="PUT">
            @endif
            
            <div class="row">
                @php
                    $attribute = 'nama_level';
                @endphp
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="{{$attribute}}">{{$pack['show'][$attribute]}}<span class="text-danger fs-6">*</span></label>
                        <input type="text" name="{{$attribute}}" placeholder="{{$pack['show'][$attribute]}}" value="{{ ($model) ? $model->$attribute : ''}}" class="form-control @error($attribute) is-invalid @enderror" @if (!$model) required @endif autofocus>
                        @error($attribute) 
                        <p>
                            <small class="text-rose">{{$message}}</small>
                        </p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @if ($model)
                    <input type="submit" value="Simpan" class="btn bg-red border">
                    <input type="submit" value="Simpan dan ulang" name="saveAndContinueEditing" class="btn bg-light-yellow border">
                    @else
                    <input type="submit" value="Simpan" class="btn bg-emarald border">
                    <input type="submit" value="Simpan dan ulang" name="saveAndAddAnother" class="btn bg-yellow border">
                    @endif
                    <input type="reset" value="Hapus" class="btn bg-rose border">
                </div>
            </div>
        </form>
    </div>
</div>