 {{-- start delete Students --}}
 <div class="modal fade" id="return_studen{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('Graduates.update','test')}}" method="post">
            @method('PUT')
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Students_trans.student_back') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ trans('Students_trans.Warning_student_Graduate') }} {{$student->name}}</p>
                <input type="hidden" name="id" value="{{$student->id}}" >
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                    <button type="submit"
                            class="btn btn-info">{{ trans('Students_trans.Click') }}</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
{{-- End delete Students --}}