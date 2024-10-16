 {{-- start delete imag --}}

 <div class="modal fade" id="Delete_libarary{{ $libarary->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('libararys.destroy' , 'test')}}" method="post">
            @method('delete')
            @csrf
            
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Students_trans.Delete_img') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ trans('libarary_trans.Warning_pdf') }}</p>
                <input type="hidden" name="libarary_id"  value="{{$libarary->id}}">
                <input type="hidden" name="file_name"  value="{{$libarary->file_name}}">
                
                
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('Students_trans.delete') }}</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
{{-- End delete imag --}}